<?php

use App\Http\Controllers\API\BookingController;
use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\DictionaryController;
use App\Http\Controllers\API\DictionaryTypeController;
use App\Http\Controllers\API\DocumentController;
use App\Http\Controllers\API\FavoriteController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\ScheduleController;
use App\Http\Controllers\API\TourController;
use App\Http\Controllers\API\TourHasTourCategoryController;
use App\Http\Controllers\API\TourHasTourObjectController;
use App\Http\Controllers\API\TouristAgencyController;
use App\Http\Controllers\API\TouristGroupController;
use App\Http\Controllers\API\TouristGuideController;
use App\Http\Controllers\API\TouristMemberController;
use App\Http\Controllers\API\TourObjectController;
use App\Http\Controllers\API\TransactionController;
use App\Http\Controllers\API\UserWatchToursController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('company', CompanyController::class);
Route::apiResource('document', DocumentController::class);
Route::apiResource('profile', ProfileController::class);
Route::apiResource('tourist-agency', TouristAgencyController::class);
Route::apiResource('tourist-guide', TouristGuideController::class);
Route::apiResource('tourist-group', TouristGroupController::class);
Route::apiResource('tourist-member', TouristMemberController::class);
Route::apiResource('dictionary-type', DictionaryTypeController::class);
Route::apiResource('dictionary', DictionaryController::class);
Route::apiResource('tour-object', TourObjectController::class);
Route::apiResource('tour', TourController::class);
Route::apiResource('tour-has-tour-object', TourHasTourObjectController::class);
Route::apiResource('tour-has-tour-category', TourHasTourCategoryController::class);
Route::apiResource('transaction', TransactionController::class);
Route::apiResource('message', MessageController::class);
Route::apiResource('favorite', FavoriteController::class);
Route::apiResource('booking', BookingController::class);
Route::apiResource('review', ReviewController::class);
Route::apiResource('schedule', ScheduleController::class);
Route::apiResource('user-watch-tours', UserWatchToursController::class);
