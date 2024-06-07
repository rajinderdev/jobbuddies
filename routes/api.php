<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\JobController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\CampController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [PassportAuthController::class, 'register']);
Route::post('login', [PassportAuthController::class, 'login']);

// put all api protected routes here
Route::middleware('auth:api')->group(function () {
    Route::post('user-detail', [PassportAuthController::class, 'userDetail']);
    Route::post('logout', [PassportAuthController::class, 'logout']);
});
Route::get('job-list', [JobController::class, 'getJobList']);
Route::get('apply-job', [JobController::class, 'applyJob']);
Route::get('job-detail/{id}', [JobController::class, 'show']);
Route::post('/uploadlogo', [JobController::class, 'uploadlogo']);
Route::post('/uploadResume', [JobController::class, 'uploadResume']);
Route::post('/donation', [DonationController::class, 'donationPayment']);
Route::get('/total-donations', [DonationController::class, 'getTotalDonations']);
Route::post('/donation-payment-link', [DonationController::class, 'getPaymentByStripeUrl']);
Route::get('/get-checkout-link', [DonationController::class, 'getCheckoutUrl']);
// Route::get('/get-camp-registration-payment-url', [CampController::class, 'getCampRegistrationPaymentUrl']);
Route::post('/summer-registration', [CampController::class, 'summerRegistration']);
        