<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ThankYouController;
use App\Http\Controllers\CodeScriptController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\HomeReviewController;
use App\Http\Controllers\HomeSpecialController;
use App\Http\Controllers\HomePageStatusController;
use App\Http\Controllers\HomeIndexController;
use App\Http\Controllers\WorkerController;

Route::get('/', [HomeIndexController::class, 'index']);

Auth::routes(['register' => false]);

Route::get('invitation-register', [WorkerController::class, 'invitationRegister'])->name('worker.invitationRegister');
Route::post('invitation-registration', [WorkerController::class, 'invitationRegistration'])->name('worker.registration');

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::group(['middleware' => 'redirect.middleware'], function () {
        Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    });

    Route::group(['middleware' => 'redirect.from.spec'], function() {
        Route::get('thank-you/create', [ThankYouController::class, 'create'])->name('thankYou.create');
    });

    Route::group(['middleware' => 'product.full'], function () {
        Route::get('/create-product', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store-product', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit-product/{slug}', [ProductController::class, 'edit'])->name('product.edit');
        Route::delete('/delete-product/{slug}', [ProductController::class, 'destroy'])->name('product.delete');
        Route::put('/update-product/{slug}', [ProductController::class, 'update'])->name('product.update');
    });

    Route::group(['middleware' => 'spec.full'], function () {
        Route::post('thank-you/store', [ThankYouController::class, 'store'])->name('thankYou.store');
        Route::delete('thank-you/{id}', [ThankYouController::class, 'delete'])->name('thankYou.delete');
        Route::put('thank-you/{id}', [ThankYouController::class, 'update'])->name('thankYou.update');
        Route::get('thank-you/edit/{id}', [ThankYouController::class, 'edit'])->name('thankYou.edit');
        Route::put('thank-you-element/{id}', [ThankYouController::class, 'updateElement'])->name('thankYou.updateElement');
    });

    Route::get('worker-setting/{user}', [WorkerController::class, 'settingWorker'])->name('worker.setting');
    Route::put('worker-setting/{user}', [WorkerController::class, 'settingUpdateWorker'])->name('worker.setting.update');

    Route::group(['middleware' => 'home'], function () {
        Route::resource('slider', HomeSliderController::class);
        Route::put('slider-status', [HomeSliderController::class, 'status'])->name('slider.status');
        Route::resource('home-product', HomeProductController::class);
        Route::put('home-product-status/{id}', [HomeProductController::class, 'status'])->name('homeProduct.status');
        Route::resource('home-review', HomeReviewController::class);
        Route::delete('home-review-file-delete/{id}', [HomeReviewController::class, 'deleteReviewFile'])->name('deleteReviewFile');
        Route::resource('home-special', HomeSpecialController::class);
        Route::post('home-status', [HomePageStatusController::class, 'status'])->name('home.status');
        Route::get('home-status', [HomePageStatusController::class, 'index'])->name('home.index');
    });




    Route::group(['middleware' => 'super.admin'], function () {
        Route::get('workers', [WorkerController::class, 'index'])->name('worker.index');
        Route::post('invitation', [WorkerController::class, 'invitation'])->name('worker.invitation');
        Route::get('workers/{user}', [WorkerController::class, 'editWorker'])->name('worker.edit');
        Route::put('workers/{user}', [WorkerController::class, 'updateWorker'])->name('worker.update');
        Route::delete('workers/{user}', [WorkerController::class, 'deleteWorker'])->name('worker.delete');

        Route::get('/colors', [ColorController::class, 'index'])->name('colors');
        Route::post('/color-create', [ColorController::class, 'create'])->name('color.create');
        Route::delete('/color-delete/{color}', [ColorController::class, 'delete'])->name('color.delete');

        Route::get('/password-change', [AuthController::class, 'changePasswordShow'])->name('changePasswordShow');
        Route::put('/password-change', [AuthController::class, 'changePassword'])->name('changePassword');

        Route::resource('code-script', CodeScriptController::class);
    });

});

Route::post('order-create', [OrderController::class, 'create'])->name('order.create');
Route::post('order-change-phone-number', [OrderController::class, 'changePhoneNumber'])->name('order.changePhoneNumber');
Route::post('like', [IndexController::class, 'like'])->name('like');
Route::post('call-back', [IndexController::class, 'callBackPhone'])->name('callBack');
Route::post('send-comment-email', [IndexController::class, 'sendCommentEmail'])->name('sendCommentEmail');

Route::group(['middleware' => 'slash'], function () {
    Route::view('legal-info', 'legal-info')->name('legalInfo');
    Route::view('privacy', 'privacy')->name('privacy');
    Route::get('{url}/thank-you', [OrderController::class, 'thankYou'])->name('thank-you');
    Route::get('/{slug}', [IndexController::class, 'index']);
});





