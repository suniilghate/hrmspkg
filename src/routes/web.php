<?php

use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'web'], function () {
Route::get('/dashboard', [ITAIND\HRMSPKG\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['namespace' => 'ITAIND\HRMSPKG\Http\Controllers', 'middleware' => 'web'], function(){
    Route::resource('leaves', LeavesController::class);
    Route::resource('holidays', HolidaysController::class);
    Route::resource('users', UsersController::class);
    Route::resource('departments', DepartmentController::class);

    //User Details
    Route::get('/users/details/{id}', 'UsersController@details');
    Route::post('/users/userdetails/{id}', 'UsersController@userdetails');

    //User Leaves Requests
    Route::get('/userleaves/create', 'UserLeaveRequestController@create');
    Route::post('/userleaves/save', 'UserLeaveRequestController@save');
});
