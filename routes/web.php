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

Route::prefix("api")
    ->group(function () {

        Route::prefix("tours")
            ->group(function () {
                Route::get('/', []);
                Route::get('/all', []);
                Route::get('/hot', []);
                Route::post('/search', []);
            });

        Route::prefix("chats")
            ->group(function () {
                Route::get('/messages/{userId}', []);
                Route::get('/users', []);
                Route::post('/send-message', []);
                Route::post('/send-file', []);
                Route::post('/send-transaction', []);
            });

        Route::prefix("guide-cabinet")
            ->group(function () {

                Route::prefix("transactions")
                    ->group(function () {
                        Route::get('/', []);
                        Route::post('/search', []);
                    });

                Route::prefix("reviews")
                    ->group(function () {

                    });

                Route::prefix("tours")
                    ->group(function () {
                        Route::prefix("archive")
                            ->group(function () {
                                Route::get('/', []);
                                Route::post('/search', []);
                                Route::get('/restore/{id}', []);
                                Route::get('/add/{id}', []);
                                Route::delete('/clear', []);
                            });

                        Route::prefix("current")
                            ->group(function () {
                                Route::get('/', []);
                                Route::post('/search', []);
                                Route::delete('/clear', []);
                            });

                        Route::prefix("in-draft")
                            ->group(function () {
                                Route::get('/', []);
                                Route::post('/search', []);
                                Route::delete('/clear', []);
                            });

                        Route::delete('/remove/{id}', []);
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

        Route::prefix("tour-categories")
            ->group(function () {
                Route::get('/', []);
                Route::get('/all', []);
                Route::get('/top', []);
            });

        Route::prefix("dictionaries")
            ->group(function () {
                Route::get('/', []);
                Route::get('/types', []);
                Route::get('/groups/{type}', []);
            });

        Route::prefix("favorites")
            ->group(function () {
                Route::get('/', []);
                Route::post('/filtered', []);
                Route::get('/all', []);
                Route::get('/top', []);
                Route::post('/add', []);
                Route::delete('/clear', []);
                Route::delete('/remove/{id}', []);
            });

    });

require __DIR__ . '/auth.php';
require __DIR__ . '/web_admin.php';

