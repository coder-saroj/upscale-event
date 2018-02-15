<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/', function () {
    return view('welcome');
});
/******************************BACKEND SECTION STARTS FROM HERE******************************/
Route::get('administrator', function(){
	return View::make('admin.login');
})->name('administrator');

Route::prefix('administrator')->group(function () {
});

//Admin Login
//Route::post('admin-login','adminController@adminLogin');
Route::post('admin-login','Auth\LoginController@login');

Route::get('administrator/dashboard','adminController@dashboard');

Route::post('administrator/logout', [
  'as' => 'admin_logout',
  'uses' => 'Auth\LoginController@logout'
]);

//Admin Logout
Route::get('administrator/logout', array('uses' => 'adminController@logout'));


//forgot password - Admin
Route::get('administrator/forgot-psw-admin', function(){	
	return View::make('admin.forgot-psw-admin');
});
Route::post('admin-forgot-psw-process','adminController@adminPswRecovery');

/******************************BACKEND SECTION ENDS FROM HERE******************************/