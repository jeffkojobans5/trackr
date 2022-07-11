<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\HistoryController;
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

Route::post('activity/create' , [ActivitiesController::class , 'store'])->name('createActivity');
Route::get('/' , [ActivitiesController::class , 'index'])->name('addActivity');
Route::get('/activty/{id}' , [ActivitiesController::class , 'getSingle'])->name('getSingle');
Route::get('/activty/edit/{id}' , [ActivitiesController::class , 'editSingle'])->name('editSingle');
Route::put('/activty/update/{id}' , [ActivitiesController::class , 'updateSingle'])->name('updateSingle');
Route::get('/allActivities' , [ActivitiesController::class , 'allActivities'])->name('allActivities');
Route::get('/searchActivities' , [ActivitiesController::class , 'searchActivities'])->name('searchActivities');

Route::get('/history/{id}' , [HistoryController::class , 'getAllHistory'])->name('getAllHistory');

Route::get('/users', function () {
    return view('users.users');
})->name('users');

Route::get('/profile', function () {
    return view('pages.updatePassword');
})->name('profile');