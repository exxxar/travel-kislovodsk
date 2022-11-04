<?php

use Illuminate\Support\Facades\Route;

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
Route::view('/guide-cabinet', 'pages.guide-cabinet')->name("page.guide-cabinet");
Route::view('/how-become-guide', 'pages.how-become-guide')->name("page.how-become-guide");
Route::view('/messages', 'pages.messages')->name("page.messages"); //in progress
Route::view('/partners', 'pages.partners')->name("page.partners");
Route::view('/privacy-policy', 'pages.privacy-policy')->name("page.privacy-policy");
Route::view('/rules', 'pages.rules')->name("page.rules");
Route::view('/tour', 'pages.tour')->name("page.tour");
Route::view('/tour-object', 'pages.tour-object')->name("page.tour-object");
Route::view('/tours-all', 'pages.tours-all')->name("page.tours-all");
Route::view('/tours-hot', 'pages.tours-hot')->name("page.tours-hot");
Route::view('/tour-search', 'pages.tour-search')->name("page.tour-search");
Route::view('/user-cabinet', 'pages.user-cabinet')->name("page.user-cabinet");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('bookings')->name('bookings/')->group(static function() {
            Route::get('/',                                             'BookingsController@index')->name('index');
            Route::get('/create',                                       'BookingsController@create')->name('create');
            Route::post('/',                                            'BookingsController@store')->name('store');
            Route::get('/{booking}/edit',                               'BookingsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'BookingsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{booking}',                                   'BookingsController@update')->name('update');
            Route::delete('/{booking}',                                 'BookingsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('companies')->name('companies/')->group(static function() {
            Route::get('/',                                             'CompaniesController@index')->name('index');
            Route::get('/create',                                       'CompaniesController@create')->name('create');
            Route::post('/',                                            'CompaniesController@store')->name('store');
            Route::get('/{company}/edit',                               'CompaniesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'CompaniesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{company}',                                   'CompaniesController@update')->name('update');
            Route::delete('/{company}',                                 'CompaniesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('dictionaries')->name('dictionaries/')->group(static function() {
            Route::get('/',                                             'DictionariesController@index')->name('index');
            Route::get('/create',                                       'DictionariesController@create')->name('create');
            Route::post('/',                                            'DictionariesController@store')->name('store');
            Route::get('/{dictionary}/edit',                            'DictionariesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DictionariesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{dictionary}',                                'DictionariesController@update')->name('update');
            Route::delete('/{dictionary}',                              'DictionariesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('dictionary-types')->name('dictionary-types/')->group(static function() {
            Route::get('/',                                             'DictionaryTypesController@index')->name('index');
            Route::get('/create',                                       'DictionaryTypesController@create')->name('create');
            Route::post('/',                                            'DictionaryTypesController@store')->name('store');
            Route::get('/{dictionaryType}/edit',                        'DictionaryTypesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DictionaryTypesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{dictionaryType}',                            'DictionaryTypesController@update')->name('update');
            Route::delete('/{dictionaryType}',                          'DictionaryTypesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('documents')->name('documents/')->group(static function() {
            Route::get('/',                                             'DocumentsController@index')->name('index');
            Route::get('/create',                                       'DocumentsController@create')->name('create');
            Route::post('/',                                            'DocumentsController@store')->name('store');
            Route::get('/{document}/edit',                              'DocumentsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'DocumentsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{document}',                                  'DocumentsController@update')->name('update');
            Route::delete('/{document}',                                'DocumentsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('favorites')->name('favorites/')->group(static function() {
            Route::get('/',                                             'FavoritesController@index')->name('index');
            Route::get('/create',                                       'FavoritesController@create')->name('create');
            Route::post('/',                                            'FavoritesController@store')->name('store');
            Route::get('/{favorite}/edit',                              'FavoritesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'FavoritesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{favorite}',                                  'FavoritesController@update')->name('update');
            Route::delete('/{favorite}',                                'FavoritesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('messages')->name('messages/')->group(static function() {
            Route::get('/',                                             'MessagesController@index')->name('index');
            Route::get('/create',                                       'MessagesController@create')->name('create');
            Route::post('/',                                            'MessagesController@store')->name('store');
            Route::get('/{message}/edit',                               'MessagesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'MessagesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{message}',                                   'MessagesController@update')->name('update');
            Route::delete('/{message}',                                 'MessagesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('profiles')->name('profiles/')->group(static function() {
            Route::get('/',                                             'ProfilesController@index')->name('index');
            Route::get('/create',                                       'ProfilesController@create')->name('create');
            Route::post('/',                                            'ProfilesController@store')->name('store');
            Route::get('/{profile}/edit',                               'ProfilesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ProfilesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{profile}',                                   'ProfilesController@update')->name('update');
            Route::delete('/{profile}',                                 'ProfilesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('reviews')->name('reviews/')->group(static function() {
            Route::get('/',                                             'ReviewsController@index')->name('index');
            Route::get('/create',                                       'ReviewsController@create')->name('create');
            Route::post('/',                                            'ReviewsController@store')->name('store');
            Route::get('/{review}/edit',                                'ReviewsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ReviewsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{review}',                                    'ReviewsController@update')->name('update');
            Route::delete('/{review}',                                  'ReviewsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('schedules')->name('schedules/')->group(static function() {
            Route::get('/',                                             'SchedulesController@index')->name('index');
            Route::get('/create',                                       'SchedulesController@create')->name('create');
            Route::post('/',                                            'SchedulesController@store')->name('store');
            Route::get('/{schedule}/edit',                              'SchedulesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'SchedulesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{schedule}',                                  'SchedulesController@update')->name('update');
            Route::delete('/{schedule}',                                'SchedulesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tours')->name('tours/')->group(static function() {
            Route::get('/',                                             'ToursController@index')->name('index');
            Route::get('/create',                                       'ToursController@create')->name('create');
            Route::post('/',                                            'ToursController@store')->name('store');
            Route::get('/{tour}/edit',                                  'ToursController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'ToursController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tour}',                                      'ToursController@update')->name('update');
            Route::delete('/{tour}',                                    'ToursController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tourist-agencies')->name('tourist-agencies/')->group(static function() {
            Route::get('/',                                             'TouristAgenciesController@index')->name('index');
            Route::get('/create',                                       'TouristAgenciesController@create')->name('create');
            Route::post('/',                                            'TouristAgenciesController@store')->name('store');
            Route::get('/{touristAgency}/edit',                         'TouristAgenciesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TouristAgenciesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{touristAgency}',                             'TouristAgenciesController@update')->name('update');
            Route::delete('/{touristAgency}',                           'TouristAgenciesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tourist-groups')->name('tourist-groups/')->group(static function() {
            Route::get('/',                                             'TouristGroupsController@index')->name('index');
            Route::get('/create',                                       'TouristGroupsController@create')->name('create');
            Route::post('/',                                            'TouristGroupsController@store')->name('store');
            Route::get('/{touristGroup}/edit',                          'TouristGroupsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TouristGroupsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{touristGroup}',                              'TouristGroupsController@update')->name('update');
            Route::delete('/{touristGroup}',                            'TouristGroupsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tourist-guides')->name('tourist-guides/')->group(static function() {
            Route::get('/',                                             'TouristGuidesController@index')->name('index');
            Route::get('/create',                                       'TouristGuidesController@create')->name('create');
            Route::post('/',                                            'TouristGuidesController@store')->name('store');
            Route::get('/{touristGuide}/edit',                          'TouristGuidesController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TouristGuidesController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{touristGuide}',                              'TouristGuidesController@update')->name('update');
            Route::delete('/{touristGuide}',                            'TouristGuidesController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tourist-members')->name('tourist-members/')->group(static function() {
            Route::get('/',                                             'TouristMembersController@index')->name('index');
            Route::get('/create',                                       'TouristMembersController@create')->name('create');
            Route::post('/',                                            'TouristMembersController@store')->name('store');
            Route::get('/{touristMember}/edit',                         'TouristMembersController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TouristMembersController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{touristMember}',                             'TouristMembersController@update')->name('update');
            Route::delete('/{touristMember}',                           'TouristMembersController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('tour-objects')->name('tour-objects/')->group(static function() {
            Route::get('/',                                             'TourObjectsController@index')->name('index');
            Route::get('/create',                                       'TourObjectsController@create')->name('create');
            Route::post('/',                                            'TourObjectsController@store')->name('store');
            Route::get('/{tourObject}/edit',                            'TourObjectsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TourObjectsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{tourObject}',                                'TourObjectsController@update')->name('update');
            Route::delete('/{tourObject}',                              'TourObjectsController@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('transactions')->name('transactions/')->group(static function() {
            Route::get('/',                                             'TransactionsController@index')->name('index');
            Route::get('/create',                                       'TransactionsController@create')->name('create');
            Route::post('/',                                            'TransactionsController@store')->name('store');
            Route::get('/{transaction}/edit',                           'TransactionsController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'TransactionsController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{transaction}',                               'TransactionsController@update')->name('update');
            Route::delete('/{transaction}',                             'TransactionsController@destroy')->name('destroy');
        });
    });
});
