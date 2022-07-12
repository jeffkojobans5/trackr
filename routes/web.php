<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivitiesController;
use App\Http\Controllers\HistoryController;


Route::group(['middleware' => ['auth']], function () { 
Route::post('activity/create' , [ActivitiesController::class , 'store'])->name('createActivity');
Route::get('/addActivity' , [ActivitiesController::class , 'index'])->name('addActivity');
Route::get('/' , [ActivitiesController::class , 'index'])->name('addActivity');
Route::get('/activty/{id}' , [ActivitiesController::class , 'getSingle'])->name('getSingle');
Route::get('/activty/edit/{id}' , [ActivitiesController::class , 'editSingle'])->name('editSingle');
Route::put('/activty/update/{id}' , [ActivitiesController::class , 'updateSingle'])->name('updateSingle');
Route::get('/allActivities' , [ActivitiesController::class , 'allActivities'])->name('allActivities');
Route::get('/searchActivities' , [ActivitiesController::class , 'searchActivities'])->name('searchActivities');
Route::get('/singleAct/{id}' , [ActivitiesController::class , 'singleAct'])->name('singleAct');
Route::get('/singleActEdit/{id}' , [HistoryController::class , 'singleActEdit'])->name('singleActEdit');
Route::get('/history/{id}' , [HistoryController::class , 'getAllHistory'])->name('getAllHistory');
Route::get('/dailyReport' , [ActivitiesController::class , 'dailyReport'])->name('dailyReport');
Route::get('/home' , [ActivitiesController::class , 'allActivities'])->name('allActivities');
});

Auth::routes();