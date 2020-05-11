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

Route::get('/mywebsite', 'WebsiteController@index');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function(){
	return view('admin.index');
});

Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@verify');

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/manager', 'ManagerController@index')->name('manager.managerindex');
	
	
Route::get('/signup', 'SignupController@index')->name('signup.index');
Route::post('/signup', 'SignupController@insert');
Route::get('/logout', 'LogoutController@index')->name('logout');;


Route::group(['middleware'=>['sess']], function(){
	Route::get('/admin', 'AdminController@index')->name('admin.index');
	Route::get('/admin/view_users', 'AdminController@list')->name('admin.list');
	Route::get('/admin/view_staffs', 'AdminController@list1')->name('admin.list1');
	Route::get('/admin/view_buscounters', 'AdminController@list2')->name('admin.list2');
	Route::get('/admin/view_buses', 'AdminController@list3')->name('admin.list3');
	Route::get('/manager/view_buses', 'ManagerController@list4')->name('manager.list4');
	
	Route::get('/admin/details/{id}', 'AdminController@show')->name('admin.show')->middleware('sess');
	
		Route::get('/admin/add', 'AdminController@add')->name('admin.add');
		Route::post('/admin/add', 'AdminController@insert');
		Route::get('/admin/edit/{id}', ['as'=>'admin.edit','uses'=>'AdminController@edit']);
		Route::post('/admin/edit/{id}', 'AdminController@update');
		Route::get('/admin/edit1/{id}', ['as'=>'admin.edit1','uses'=>'AdminController@edit1']);
		Route::post('/admin/edit1/{id}', 'AdminController@update1');
		Route::get('/admin/delete/{id}', 'AdminController@delete')->name('admin.delete');
		Route::post('/admin/delete/{id}', 'AdminController@destroy')->name('admin.destroy');
		Route::get('/admin/delete1/{id}', 'AdminController@delete1')->name('admin.delete1');
		Route::post('/admin/delete1/{id}', 'AdminController@destroy1')->name('admin.destroy1');
	    Route::get('/admin/delete2/{id}', 'AdminController@delete2')->name('admin.delete2');
		Route::post('/admin/delete2/{id}', 'AdminController@destroy2')->name('admin.destroy2');
		Route::get('/admin/edit2/{id}', ['as'=>'admin.edit2','uses'=>'AdminController@edit2']);
		Route::post('/admin/edit2/{id}', 'AdminController@update');
	//	Route::get('admin.list2/search', 'AdminController@searchBus')->name('search');
        Route::get('searchCounter', 'AdminController@searchCounter')->name('searchCounter');
		Route::get('search', 'AdminController@searchBus')->name('search');

});