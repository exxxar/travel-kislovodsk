<?php


use App\Classes\PogodaKlimat\PogodaIKlimatAPI;
use App\Events\TelegramNotificationProfileVerifiedEvent;
use App\Exports\Dictionary\DictionaryExport;
use App\Exports\TourGroupExport;
use App\Http\Controllers\AdminVerifiedController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\WebNotificationController;
use App\Models\Booking;
use App\Models\Chat;
use App\Models\ChatUsers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Telegram\Bot\FileUpload\InputFile;
use Telegram\Bot\Laravel\Facades\Telegram;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get("/test-esia", function (){
$config = [
    'clientId' => 'INSP03211',
    'redirectUrl' => 'https://rustravel.shop/callback',
    'portalUrl' => 'https://esia-portal1.test.gosuslugi.ru/',
    'privateKeyPath' =>   storage_path()."/app/public/cert/RSA.txt",
    'privateKeyPassword' => 'my-site.com',
    'certPath' =>
        storage_path()."/app/public/cert/RSA_TESIA.cer",
    'tmpPath' =>   storage_path()."/app/public/",
];


$esia = new \esia\OpenId($config);

return "<a href=\"".($esia->getUrl())."\">Войти через портал госуслуги</a>";

});

Route::get("/test-pogoda", function (){

    $pogoda = new PogodaIKlimatAPI();
    dd($pogoda->findLocation("Со"));

    dd($pogoda->getPogodaByRegionId("37193"));
    //dd($pogoda->getMonthAPI(27785, 2023,3));//

});
Route::get("/test-pdf", function (){
 /*   $mpdf = new \Mpdf\Mpdf([
        'format' => 'A4-L',
        'margin_left' => 0,
        'margin_right' => 0,
        'margin_top' => 0,
        'margin_bottom' => 0,
        'margin_header' => 0,
        'margin_footer' => 0,
    ]);


    $mpdf->SetDisplayMode('fullpage');


    for ($i=1;$i<=6;$i++)
        $mpdf->WriteHTML(
            view("pdf.tour-route-book-page-$i")
        );





    return $mpdf->Output("test.pdf","D");*/

    return view("pdf.route-passport-page-1");

});

Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');

Route::get('/storage/user/{id}/{folder}/{path}', [\App\Http\Controllers\API\TouristGuideController::class, "downloadDocument"]);
Route::get('/storage/user/{id}/{path}', [\App\Http\Controllers\API\TouristGuideController::class, "downloadImage"]);
Route::get('/load-template/{path}', [\App\Http\Controllers\API\TouristGuideController::class, "loadTemplate"]);

//Route::get('/storage/user/{id}/tour-objects/{path}',[\App\Http\Controllers\API\TouristGuideController::class,"downloadImage"]);

Route::view('/', 'pages.main')->name("page.main");
Route::view('/about', 'pages.about')->name("page.about");
Route::view('/settings', 'pages.settings')->name("page.settings");
Route::view('/contact-us', 'pages.contact-us')->name("page.contact-us"); // +
Route::view('/contacts', 'pages.contacts')->name("page.contacts"); // +
Route::view('/faq', 'pages.faq')->name("page.faq"); // проверить скрытие вопросов
Route::view('/favorites', 'pages.favorites')->name("page.favorites");
Route::view('/for-guides', 'pages.for-guides')->name("page.for-guides");
Route::view('/for-tourist', 'pages.for-tourist')->name("page.for-tourist");
Route::view('/group-register', 'pages.group-register')->name("page.group-register");
Route::view('/guide', 'pages.guide')->name("page.guide");

Route::view('/how-become-guide', 'pages.how-become-guide')->name("page.how-become-guide");
Route::view('/messages', 'pages.messages')->name("page.messages"); //in progress
Route::view('/partners', 'pages.partners')->name("page.partners");
Route::view('/privacy-policy', 'pages.privacy-policy')->name("page.privacy-policy");
Route::view('/rules', 'pages.rules')->name("page.rules");

Route::get('/tour/{id}', [\App\Http\Controllers\API\TourController::class, "show"])
    ->name("page.tour");

Route::get('/guide/{id}', [\App\Http\Controllers\API\TouristGuideController::class, 'show'])->name("page.guide");

Route::get('/tour-object/{id}', [\App\Http\Controllers\API\TourObjectController::class, "show"])
    ->name("page.tour-object");

Route::view('/tours-all', 'pages.tours-all')->name("page.tours-all");
Route::view('/tours-hot', 'pages.tours-hot')->name("page.tours-hot");
Route::view('/tour-objects', 'pages.tour-objects')->name("page.tour-objects");
Route::view('/tour-search', 'pages.tours-search')->name("page.tour-search");
Route::view('/not-found', 'errors.404')->name("page.not-found");
Route::view('/error', 'errors.500')->name("page.error");
Route::view('/success', 'errors.200')->name("page.success");

Route::middleware(["auth", "verified"])->group(function () {
    Route::get('/export-tours', [\App\Http\Controllers\API\TouristGuideController::class, "exportTours"]);
    Route::get('/export-dictionary', [\App\Http\Controllers\API\DictionaryController::class, "exportDictionary"]);

    Route::middleware(["is_guide"])->group(function () {
        Route::view('/guide-cabinet', 'pages.guide-cabinet')->name("page.guide-cabinet");
    });

    Route::middleware(["is_user"])->group(function () {
        Route::view('/user-cabinet', 'pages.user-cabinet')->name("page.user-cabinet");
    });

});


Route::prefix("api")
    ->group(function () {

        Route::post('/send-mchs-form', [\App\Http\Controllers\TourGroupController::class, "sendMCHSForm"]);
        Route::post('/send-question', [\App\Http\Controllers\TourGroupController::class, "sendQuestion"]);

        Route::controller(\App\Http\Controllers\SocialAuthController::class)
            ->group(function () {
                Route::post('/pre-registration', 'preRegistration');
                Route::post('/registration', 'registration');
                Route::post('/login', 'login');
                Route::post('/login-with-code', 'loginWithCode');
                Route::post('/pre-recovery', 'preRecovery');
                Route::post('/pre-recovery-code', 'preRecoveryCode');
                Route::post('/recovery', 'recovery');
            });


        Route::prefix("weather")
            ->controller(\App\Http\Controllers\API\WeatherController::class)
            ->group(function () {
                Route::post('/location', 'findWeatherLocation');
                Route::get('/locations', 'getAllWeatherLocations');
                Route::get('/{id}', 'getWeatherByRegionId');
            });

        Route::prefix("tour-categories")
            ->controller(\App\Http\Controllers\API\TourCategoryController::class)
            ->group(function () {
                Route::get('/', 'index');
            });


        Route::prefix("payment")
            ->controller(\App\Http\Controllers\PaymentController::class)
            ->group(function () {
                Route::get('/callback', 'callback');
                Route::post('/notification', 'notification');
                Route::post('/invoice', 'invoice');
                Route::post('/success', 'success');
                Route::post('/failure', 'failure');
            });


        Route::prefix("tour-objects")
            ->controller(\App\Http\Controllers\API\TourObjectController::class)
            ->group(function () {
                Route::get('/', 'loadGlobalTourObjects');
            });

        Route::prefix("tours")
            ->controller(\App\Http\Controllers\API\TourController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/all', 'all');
                Route::get('/max-tours-price', 'getMaxTourPrice');
                Route::get('/by-guide/{id}', 'getTourByGuide');
                Route::get('/hot', 'hot');
                Route::get('/watch/{id}', 'watch');
                Route::get('/{id}', 'show');
                Route::post('/search', 'search');
                Route::post('/search-by-coords', 'loadToursByCoords');
            });

        Route::prefix("favorites")
            ->controller(\App\Http\Controllers\API\FavoriteController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::post('/filtered', 'search');
                Route::post('/', 'store');
                Route::delete('/remove/{id}', 'destroy');
            });

        Route::prefix("dictionaries")
            ->controller(\App\Http\Controllers\API\DictionaryController::class)
            ->group(function () {
                Route::get('/', 'getAllDictionaries');
                Route::get('/locations', 'getLocations');
                Route::get('/tour-dates', 'getTourDates');
                Route::get('/self-tour-dates', 'getSelfTourDates');
                Route::get('/types', 'getAllTypes');
                Route::get('/groups/{type}', 'getTypeGroups');
                Route::get('/types/{id}', 'getByTypeId');

                Route::middleware(["is_admin_api"])->group(function () {
                    Route::post('/types', 'addType');
                    Route::post('/', 'addDictionary');
                    Route::get('/{id}', 'getById');
                    Route::delete('/{id}', 'removeDictionaryById');
                });
            });

        Route::prefix("chats")
            ->controller(\App\Http\Controllers\API\MessageController::class)
            ->group(function () {
                Route::get('/read-message/{messageId}', 'readMessage');
                Route::get('/self-message', 'selfMessages');
                Route::get('/messages/{chatId}', 'messageByChatId');
                Route::get('/users/{chatId}', 'getChatUsers');
                Route::get('/chats', 'chats');
                Route::post('/start-chat', 'startChat');
                Route::post('/start-group-chat', 'startGroupChat');
                Route::post('/send-message', 'sendMessage');
                Route::post('/send-file', 'sendFile');
                Route::delete('/remove/{id}', 'destroy');

            });

        Route::prefix("reviews")
            ->controller(ReviewController::class)
            ->group(function () {
                Route::get('/tour/{id}', 'showByTour');
                Route::get('/', 'index');
                Route::post('/', 'store');
                Route::get('/guide/{id}', 'showByGuide');
                Route::delete('/{id}', 'destroy');
            });

        Route::prefix("guide-cabinet")
            ->group(function () {

                Route::prefix("tours")
                    ->controller(\App\Http\Controllers\API\TourController::class)
                    ->group(function () {
                        Route::get('/request-tour-verified/{id}', [\App\Http\Controllers\API\TouristGuideController::class, 'requestTourVerified']);
                        Route::post('/upload-tours-excel', 'uploadToursExcel');
                        Route::get('/actual-booked-tours/{id}', 'loadActualGuideBookedTours');
                        Route::get('/archive-add/{id}', 'addGuideTourToArchive');
                        Route::delete('/archive-remove/{id}', 'removeGuideTourFromArchive');
                        Route::delete('/clear', 'removeAllTours');
                        Route::post('/duplicate/{id}', 'duplicate');

                        Route::post('/update/{id}', 'update');
                        Route::get('/', 'loadGuideToursByPage');
                        Route::post('/', 'store');
                        Route::get('/{id}', 'loadGuideTourById');
                        Route::delete('/{id}', 'destroy');
                    });

                Route::prefix("tour-objects")
                    ->controller(\App\Http\Controllers\API\TourObjectController::class)
                    ->group(function () {
                        Route::post('/search', 'search');
                        Route::post('/upload-tour-objects-excel', 'uploadTourObjectsExcel');
                        Route::delete('/clear-active', 'clearActive');
                        Route::delete('/clear-removed', 'clearRemoved');
                        Route::delete('/clear', 'clear');
                        Route::get('/restore-all', 'restoreAll');
                        Route::get('/restore/{id}', 'restore');
                        Route::delete('/remove/{id}', 'destroy');
                        Route::post('/edit/{id}', 'update');

                        Route::get('/{id}', 'loadGuideTourObjectById');

                        Route::get('/', 'loadGuideTourObjectsByPage');

                        Route::post('/', 'store');

                    });


                Route::prefix("schedules")
                    ->controller(\App\Http\Controllers\API\ScheduleController::class)
                    ->group(function () {
                        Route::get('/', 'index');
                        Route::post('/search', 'search');
                    });


                Route::controller(\App\Http\Controllers\API\TouristGuideController::class)
                    ->group(function () {
                        Route::get('/documents', 'getDocuments');
                        Route::post('/account', 'updateGuideAccounting');
                        Route::post('/company', 'updateCompanyInfo');
                        Route::post('/password', 'updatePassword');
                        Route::post('/profile', 'updateProfileInfo');
                        Route::post('/upload-image', 'uploadImage');
                        Route::post('/upload-document', 'uploadDocument');
                        Route::delete('/remove-document/{id}', 'removeDocument');
                    });


                Route::get('/request-profile-document-verified/{id}', [\App\Http\Controllers\API\TouristGuideController::class, 'requestProfileDocumentVerified']);
                Route::get('/request-profile-verified', [\App\Http\Controllers\API\TouristGuideController::class, 'requestProfileVerified']);

                Route::post('/booked-tour-info', [\App\Http\Controllers\API\BookingController::class, 'getBookedTourInfo']);
            });

        Route::prefix("user-cabinet")
            ->group(function () {

                Route::prefix("tours")
                    ->group(function () {
                        Route::prefix("watched")
                            ->controller(\App\Http\Controllers\API\UserWatchToursController::class)
                            ->group(function () {
                                Route::get('/', 'index');
                            });

                        Route::prefix("booked")
                            ->controller(\App\Http\Controllers\API\BookingController::class)
                            ->group(function () {
                                Route::get('/', 'selfBookedTours');
                            });

                    });


                Route::prefix("reviews")
                    ->controller(ReviewController::class)
                    ->group(function () {
                        Route::get('/', 'selfReviews');
                    });


                Route::controller(\App\Http\Controllers\API\TouristController::class)
                    ->group(function () {
                        Route::get('/documents', 'getDocuments');
                        Route::post('/account', 'updateAccounting');
                        Route::post('/password', 'updatePassword');
                        Route::post('/profile', 'updateProfileInfo');
                        Route::post('/upload-image', 'uploadImage');
                    });
            });


        Route::prefix("bookings")
            ->controller(\App\Http\Controllers\API\BookingController::class)
            ->group(function () {
                Route::post('/book-tour', 'bookATour');
            });


        Route::prefix("transactions")
            ->controller(\App\Http\Controllers\API\TransactionController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/request/{transactionId}', 'requestPaymentByTransactionId');
                Route::post('/search', 'getFilteredTransactions');
            });
    });

Route::prefix("admin")
    ->middleware(["is_admin"])
    ->group(function () {

        Route::view('/cabinet', 'pages.admin.cabinet')->name("page.admin.cabinet");
        Route::view('/tours', 'pages.admin.tours')->name("page.admin.tours");
        Route::view('/users-and-guides', 'pages.admin.users')->name("page.admin.users");
        Route::view('/transactions', 'pages.admin.transactions')->name("page.admin.transactions");
        Route::view('/tour-objects', 'pages.admin.tour-objects')->name("page.admin.tour-objects");


        Route::prefix("api")->group(function(){
            Route::prefix("tours")
                ->controller(\App\Http\Controllers\API\Admin\TourController::class)
                ->group(function () {
                    Route::get('/', 'index');
                    Route::get('/guides', 'getTourGuides');
                    Route::get('/restore/{id}', 'restoreTour');
                    Route::get('/accept-tour/{id}', [AdminVerifiedController::class,"acceptTour"]);
                    Route::get('/decline-tour/{id}', [AdminVerifiedController::class,"declineTour"]);
                    Route::get('/actual-booked-tours/{id}', 'loadActualBookedTours');
                    Route::get('/archive-add/{id}', 'addTourToArchive');
                    Route::delete('/archive-remove/{id}', 'removeTourFromArchive');
                    Route::post('/update/{id}', 'update');
                    Route::post('/', 'store');
                    Route::post('/search', 'search');
                    Route::get('/{id}', 'loadGuideTourById');
                    Route::delete('/{id}', 'destroy');
                });

            Route::prefix("tour-objects")
                ->controller(\App\Http\Controllers\API\Admin\TourObjectController::class)
                ->group(function () {
                    Route::get('/', 'index');

                    Route::post('/search', 'search');
                    Route::post('/upload-tour-objects-excel', 'uploadTourObjectsExcel');
                    Route::delete('/clear', 'clear');
                    Route::get('/restore-all', 'restoreAll');
                    Route::get('/restore/{id}', 'restore');
                    Route::delete('/remove/{id}', 'destroy');
                    Route::post('/edit/{id}', 'update');

                    Route::get('/{id}', 'loadGuideTourObjectById');



                    Route::post('/', 'store');

                });

            Route::prefix("transactions")
                ->controller(\App\Http\Controllers\API\Admin\TransactionController::class)
                ->group(function () {
                    Route::get('/', 'index');
                    Route::get('/request/{transactionId}', 'requestPaymentByTransactionId');
                    Route::post('/search', 'getFilteredTransactions');
                });

            Route::prefix("users-and-guides")
                ->controller(\App\Http\Controllers\API\Admin\UserController::class)
                ->group(function () {
                    Route::get('/', 'index');
                    Route::post('/search', 'search');
                });
        });

        Route::controller(\App\Http\Controllers\AdminVerifiedController::class)
            ->group(function () {
                Route::get('/accept-document/{id}', 'acceptDocument');
                Route::get('/decline-document/{id}', 'declineDocument');
                Route::get('/decline-profile/{id}', 'declineProfile');
                Route::get('/accept-profile/{id}', 'acceptProfile');
                Route::get('/decline-tour/{id}', 'declineTour');
                Route::get('/accept-tour/{id}', 'acceptTour');
            });
    });

require __DIR__ . '/auth.php';
require __DIR__ . '/web_admin.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
