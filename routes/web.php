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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/dashboard-user', 'HomeController@user');

	Route::group(['middleware' => ['can:admin']], function (){
  
	  Route::resource('residents', 'ResidentController');
		Route::resource('user', 'UserController');
		Route::resource('roles', 'RoleController');
		Route::get('role/permission', 'RoleController@rolePermission')->name('roles.permission');
		Route::post('role/permission', 'RoleController@addPermission')->name('roles.addPermission');
		Route::put('role/permission/{id}', 'RoleController@setRolePermission')->name('roles.setRolePermission');
	});

});
