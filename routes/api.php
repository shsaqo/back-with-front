<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\ApiController;
use App\Http\Controllers\HomeSliderController;
use App\Http\Controllers\HomeProductController;
use App\Http\Controllers\HomeReviewController;
use App\Http\Controllers\HomeSpecialController;

Route::post('files-path', [ApiController::class, 'index']);
Route::post('delete-item', [ApiController::class, 'deleteHomeProductSlider']);
Route::get('slider', [HomeSliderController::class, 'frontSlider']);
Route::get('product', [HomeProductController::class, 'frontProduct']);
Route::get('review', [HomeReviewController::class, 'frontHomeReview']);
Route::get('special', [HomeSpecialController::class, 'frontSpecial']);
Route::post('api-send-mail', [ApiController::class, 'sendMail']);
