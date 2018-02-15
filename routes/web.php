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

Route::get('/', 'homeController@showHome');
Route::get('events', 'homeController@getEvents');
Route::get('save-nl-data', 'homeController@saveNewsletterData');

/* * ****************************BACKEND SECTION STARTS FROM HERE***************************** */
Route::get('administrator', function() {
    if (Session::get('admin_id') != '') {
        return Redirect::to('administrator/dashboard');
    } else {
        return View::make('admin.login');
    }
});
Route::post('admin-login', 'adminController@adminLogin');


//Admin Logout
Route::get('administrator/logout', array('uses' => 'adminController@logout'));

//forgot password - Admin
Route::get('administrator/forgot-psw-admin', function() {
    return View::make('admin.forgot-psw-admin');
});
Route::post('admin-forgot-psw-process', 'adminController@adminPswRecovery');

Route::group(['middleware' => ['checkadminlogin']], function() {

    Route::get('administrator/dashboard', function() {
        return View::make('admin.dashboard');
    });

    //My Account
    Route::get('administrator/my-account', 'adminController@viewAdminAccount');
    Route::post('update-admin-details', 'adminController@updateAdminDetails');

    //Changa Password
    Route::get('administrator/change-password-admin', 'adminController@viewChangePassword');
    Route::post('change-admin-psw', 'adminController@changeAdminPsw');

    //Manage SEO
    Route::get('administrator/manage-seo', 'adminController@viewManageSeo');
    Route::post('update-seo-details', 'adminController@updateSeoDetails');

    //Manage Contents
    Route::get('administrator/manage-contents', 'adminController@viewManageContents');
    Route::get('administrator/edit-content/{id}/edit', 'adminController@viewEditContent');
    Route::post('update-content', 'adminController@updateContent');

    //Manage Banners
    Route::get('administrator/manage-banners', 'adminController@viewManageBanners');

    Route::get('administrator/add-banner', 'adminController@viewAddBanner');
    Route::post('add-banner', 'adminController@saveBannerData');

    Route::get('administrator/edit-banner/{id}/edit', 'adminController@viewEditBanner');
    Route::post('update-banner', 'adminController@updateBanner');

    Route::get('administrator/manage-banners/{id}/delete', 'adminController@deleteBanner');

    //Manage Newsletter Admin Section
    Route::get('administrator/manage-newsletter', 'adminController@viewManageNewsletter');
    Route::get('administrator/manage-newsletter/{id}/delete', 'adminController@deleteNlEmail');
    Route::post('manage-newsletter', 'adminController@sendNewsletterMail');


    //Manage Category  Type
    Route::get('administrator/manage-category-type', 'adminController@viewManageCategoryType');

    Route::get('administrator/add-category-type', 'adminController@viewAddCategoryType');
    Route::post('add-category-type', 'adminController@saveCategoryTypeData');

    Route::get('administrator/edit-category-type/{id}/edit', 'adminController@viewEditCategoryType');

    Route::post('update-category-type', 'adminController@updateCategoryType');
    Route::get('administrator/manage-category-type/{id}/delete', 'adminController@deleteCategoryType');

    ###########  Manage Catergory ######################
    Route::get('administrator/manage-category', 'adminController@viewManageCategory');
    Route::get('administrator/add-category', 'adminController@viewAddCategory');
    Route::post('add-category', 'adminController@saveCategory');
    Route::get('administrator/manage-category/{id}/delete', 'adminController@deleteCategory');
    Route::get('administrator/edit-category/{id}/edit', 'adminController@viewEditCategory');
    Route::post('update-category', 'adminController@updateCategory');

    ##############  Manage Organizer ########################
    Route::get('administrator/manage-organizer', 'adminController@viewManageorganizer');
    Route::get('administrator/add-organizer', 'adminController@viewAddorganizer');

    ################# Manage Events #####################
    Route::get('administrator/manage-events', 'adminController@manageEvents');
    Route::get('administrator/add-events', 'adminController@addEvents');

});

#####  Ajax part Start ###############
Route::post('/getCategoryType', 'adminController@getCategoryType')->name('getCategoryType');
#####  Ajax Part End #################





/******************************BACKEND SECTION ENDS FROM HERE******************************/