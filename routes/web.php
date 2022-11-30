<?php


use App\Http\Controllers\API\ReviewController;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/storage/{path}',function ($path){
    try {
        $file = Storage::disk('local')->get("public/" . $path);
        return (new Response($file, 200))
            ->header('Content-Type', 'image/jpeg');
    } catch (FileNotFoundException $e) {
        return null;
    }
});

Route::view('/', 'pages.main')->name("page.main");
Route::view('/about', 'pages.about')->name("page.about");
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
Route::view('/tour-search', 'pages.tours-search')->name("page.tour-search");
Route::view('/not-found', 'pages.errors.404')->name("page.not-found");
Route::view('/error', 'pages.errors.500')->name("page.error");

Route::middleware(["auth"])->group(function () {

    Route::middleware(["is_guide"])->group(function () {
        Route::view('/guide-cabinet', 'pages.guide-cabinet')->name("page.guide-cabinet");
    });

    Route::middleware(["is_user"])->group(function () {
        Route::view('/user-cabinet', 'pages.user-cabinet')->name("page.user-cabinet");
    });

    Route::get('/logout', \App\Http\Controllers\SocialAuthController::class . '@logout')->name("logout");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix("api")
    ->group(function () {

        Route::controller(\App\Http\Controllers\SocialAuthController::class)
            ->group(function () {
                Route::post('/registration', 'registration');
                Route::post('/login', 'login');
            });


        Route::prefix("tour-categories")
            ->controller(\App\Http\Controllers\API\TourCategoryController::class)
            ->group(function () {
                Route::get('/', 'index');

            });

        Route::prefix("tours")
            ->controller(\App\Http\Controllers\API\TourController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::get('/all', 'all');
                Route::get('/max-tours-price', 'getMaxTourPrice');

                Route::get('/hot', 'hot');
                Route::get('/watch/{id}', 'watch');
                Route::get('/{id}', 'show');
                Route::post('/search', 'search');
            });

        Route::prefix("favorites")
            ->controller(\App\Http\Controllers\API\FavoriteController::class)
            ->group(function () {
                Route::get('/', 'index');
                Route::post('/filtered', 'search');
                Route::post('/', 'store');
                Route::delete('/clear', []);
                Route::delete('/remove/{id}', 'destroy');
            });

        Route::prefix("dictionaries")
            ->controller(\App\Http\Controllers\API\DictionaryController::class)
            ->group(function () {
                Route::get('/', 'getAllDictionaries');
                Route::get('/locations', 'getLocations');
                Route::get('/tour-dates', 'getTourDates');
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
                Route::get('/users', 'users');
                Route::get('/chats', 'chats');
                Route::post('/send-message', 'sendMessage');
                Route::post('/send-file', 'sendFile');
                Route::post('/send-transaction', 'sendTransaction');
            });

        Route::prefix("reviews")
            ->controller(ReviewController::class)
            ->group(function () {
                Route::get('/tour/{id}', 'showByTour');
                Route::get('/', 'index');
                Route::post('/', 'store');
                Route::get('/all', []);

                Route::get('/guide/{id}', 'showByGuide');
                Route::delete('/{id}', 'destroy');
            });

        Route::prefix("guide-cabinet")
            ->group(function () {

                Route::prefix("transactions")
                    ->controller(\App\Http\Controllers\API\TransactionController::class)
                    ->group(function () {
                        Route::get('/', 'index');
                        Route::post('/search', []);
                    });

                Route::prefix("tours")
                    ->controller(\App\Http\Controllers\API\TourController::class)
                    ->group(function () {

                        Route::get('/', 'loadGuideToursByPage');
                        Route::post('/search', []);
                        Route::get('/restore/{id}', []);
                        Route::get('/add/{id}', []);
                        Route::delete('/clear', []);

                        Route::delete('/remove/{id}', []);
                        Route::post('/', []);
                        Route::put('/{id}', []);
                    });

                Route::prefix("tour-objects")
                    ->controller(\App\Http\Controllers\API\TourObjectController::class)
                    ->group(function () {
                        Route::post('/search', 'search');
                        Route::delete('/clear-active', 'clearActive');
                        Route::delete('/clear-removed', 'clearRemoved');
                        Route::delete('/clear', 'clear');
                        Route::get('/restore-all', 'restoreAll');
                        Route::get('/restore/{id}', 'restore');
                        Route::delete('/remove/{id}', 'destroy');
                        Route::get('/', 'loadGuideTourObjectsByPage');
                        Route::post('/', 'store');
                        Route::put('/{id}', 'update');
                    });


                Route::prefix("schedules")
                    ->controller(\App\Http\Controllers\API\ScheduleController::class)
                    ->group(function () {
                        Route::get('/', 'index');
                    });

                Route::get('/messages/{userId}', []);
                Route::get('/users', []);

                Route::controller(\App\Http\Controllers\API\TouristGuideController::class)
                    ->group(function(){
                        Route::post('/company', 'updateCompanyInfo');
                        Route::post('/password', 'updatePassword');
                        Route::post('/profile', 'updateProfileInfo');
                        Route::post('/upload-image', 'uploadImage');
                    });


                Route::post('/send-message', []);
                Route::post('/send-file', []);
                Route::post('/send-transaction', []);
            });

        Route::prefix("user-cabinet")
            ->group(function () {

                Route::prefix("transactions")
                    ->group(function () {
                        Route::get('/', []);
                        Route::post('/search', []);
                    });

                Route::prefix("tours")
                    ->group(function () {
                        Route::prefix("watched")
                            ->group(function () {
                                Route::get('/', []);
                                Route::post('/search', []);
                                Route::get('/restore/{id}', []);
                                Route::get('/add/{id}', []);
                                Route::delete('/clear', []);
                            });

                        Route::prefix("booked")
                            ->group(function () {
                                Route::get('/', []);
                                Route::post('/search', []);
                                Route::delete('/clear', []);
                            });


                        Route::post('/', []);
                        Route::put('/{id}', []);
                    });

                Route::prefix("tour-objects")
                    ->group(function () {
                        Route::prefix("active")
                            ->group(function () {
                                Route::get('/', []);
                                Route::post('/search', []);
                                Route::delete('/clear', []);
                            });

                        Route::prefix("removed")
                            ->group(function () {
                                Route::get('/', []);
                                Route::post('/search', []);
                                Route::get('/restore/{id}', []);
                            });

                        Route::delete('/remove/{id}', []);
                        Route::post('/', []);
                        Route::put('/{id}', []);
                    });

                Route::prefix("schedules")
                    ->group(function () {

                    });

                Route::get('/messages/{userId}', []);
                Route::get('/users', []);
                Route::post('/send-message', []);
                Route::post('/send-file', []);
                Route::post('/send-transaction', []);
            });


        Route::prefix("bookings")
            ->group(function () {
                Route::get('/', []);
                Route::get('/all', []);
                Route::post('/book-tour', []);
                Route::delete('/remove/{id}', []);
            });


    });

require __DIR__ . '/auth.php';
require __DIR__ . '/web_admin.php';


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
