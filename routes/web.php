<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\IncrementController;
use App\Http\Controllers\LeaveController;



Route::get('/login','LoginController@login')->name('login');
Route::post('/login/confirm','LoginController@loginConfirm')->name('login.confirm');
Route::middleware(['auth'])->group(function () {
Route::get('/', function () {
    return view('/dashboard');})->name('dashboard');

	Route::prefix('Setup')->group(function(){	
		Route::resource('/religion','ReligionController');
		Route::resource('/gender','GenderController');
		Route::resource('/users','UserController');
	});	
	Route::prefix('Admin')->group(function(){
		Route::get('/employee/status/{id}','CommonController@userStatus')->name('employee.status');
		Route::get('/promotion','CommonController@promotion')->name('promotion');
		Route::get('/promotion/edit/{employee_id}','CommonController@promotionEdit')->name('promotion.edit');
		Route::put('/promotion/update/{employee_id}','CommonController@promotionUpdate')->name('promotion.update');
		Route::get('/incement','IncrementController@index')->name('increment');
		Route::get('/incement/{employee_id}','IncrementController@edit')->name('increment.edit');
		Route::put('/incement/update/{employee_id}','IncrementController@update')->name('increment.update');
		
		Route::get('/leave','LeaveController@index')->name('leave');
		Route::get('/leave/create','LeaveController@create')->name('leave.create');
		Route::post('/leave/store','LeaveController@store')->name('leave.store');
	});
	Route::get('/logout','LoginController@logout')->name('logout');
});


