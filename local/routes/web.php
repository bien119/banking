<?php

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

Route::get('admin', 'UserController@logIn');
Route::get('admin/login', 'UserController@logIn');
Route::post('admin/login', 'UserController@logInPost');
Route::get('admin/logout', 'UserController@logOut');

Route::group(['prefix'=>'admin','middleware'=>'adminGate'], function() {
	Route::group(['prefix'=>'khachhang'], function() {
		Route::get('danhsach', 'KhachhangController@listAction');
		Route::get('danhsachtietkiem', 'KhachhangController@listtkAction');
		Route::get('danhsachchovay', 'KhachhangController@listcvAction');
		Route::get('them', 'KhachhangController@add_get_Action');
		Route::get('export', 'KhachhangController@downloadExcel');
		Route::post('them', 'KhachhangController@add_post_Action');
		Route::get('xoa/{id}', 'KhachhangController@deleteAction');
		// Route::get('sua/{id}', 'TheloaiController@edit_get_Action');
		// Route::post('sua/{id}', 'TheloaiController@edit_post_Action');
	});
	Route::group(['prefix'=>'laisuat'], function() {
		Route::get('danhsach', 'LaisuatController@listAction');
		Route::get('danhsachloan', 'LaisuatController@listLoanAction');
		Route::get('them', 'LaisuatController@add_get_Action');
		Route::get('themloan', 'LaisuatController@addloan_get_Action');
		Route::get('export', 'LaisuatController@downloadExcel');
		Route::post('them', 'LaisuatController@add_post_Action');
		Route::post('themloan', 'LaisuatController@addLoan_post_Action');
		Route::get('xoa/{id}', 'LaisuatController@deleteAction');
		Route::get('sua/{id}', 'LaisuatController@edit_get_Action');
		// Route::post('sua/{id}', 'TheloaiController@edit_post_Action');
	});
	Route::group(['prefix'=>'user'], function() {
		Route::get('danhsach', 'UserController@listAction');
		Route::get('them', 'UserController@add_get_Action');
		Route::post('them', 'UserController@add_post_Action');
		Route::get('xoa/{id}', 'UserController@deleteAction');
		Route::get('sua/{id}', 'UserController@edit_get_Action');
		Route::post('sua/{id}', 'UserController@edit_post_Action');
	});
});

Route::group(['prefix'=>'ajax'], function() {
	Route::get('loaitin/{idTheLoai}', 'AjaxController@getLoaiTin');
});