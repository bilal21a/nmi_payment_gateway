<?php

use Illuminate\Support\Facades\Route;
use Omnipay\Omnipay;

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

Route::get('/unsecure', function () {
    return view('index');
});
// Route::get('/3ds', function () {
//     return view('3ds');
// });
Route::get('/','SecurePaymentController@step_1')->name('step_1');
Route::get('/test','SecurePaymentController@test')->name('test');
Route::post('/payment_done','SecurePaymentController@payment_done')->name('payment_done');

Route::post('step-2','SecurePaymentController@step_2')->name('step_2');
Route::post('direct-post-back-end','PaymentController@direct_post_back_end')->name('direct_post_back_end');

Route::post('done-payment','PaymentController@pay')->name('payment_save');
