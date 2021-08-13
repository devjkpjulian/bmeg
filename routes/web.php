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

Route::get('/', function () {
    return view('auth.register');
});

Route::group(['middleware' => ['auth:sanctum']], function() {
    
    Route::resources([
        'users' => 'App\Http\Controllers\UserController',
        'nationals' => 'App\Http\Controllers\NationalController',
        'achievements' => 'App\Http\Controllers\AchievementController',
        'bloodlines' => 'App\Http\Controllers\BloodlineController',
        'bloodlines_images' => 'App\Http\Controllers\BloodlineImageController',
        'nationals_videos' => 'App\Http\Controllers\NationalVideoController',
        'regionals' => 'App\Http\Controllers\RegionalController',
        'regionals_location' => 'App\Http\Controllers\RegionalLocationController',
    ]);
    
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
