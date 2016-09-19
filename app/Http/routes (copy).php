<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', 'Admin\\AdminController@index');

Route::get('admin/give-role-permissions',[
    'middleware' => 'auth',
    'uses' => 'Admin\\AdminController@getGiveRolePermissions'
]);

Route::group(['middleware' => ['auth', 'roles'], 'roles' => 'super-admin', 'prefix' => 'admin'], function () {

    //Route::get('/dashboard', 'Admin\\DashboardController@showUser');

    Route::post('/give-role-permissions', 'Admin\\AdminController@postGiveRolePermissions');

	Route::resource('/roles', 'Admin\\RolesController');

	Route::resource('/permissions', 'Admin\\PermissionsController');

	Route::resource('/users', 'Admin\\UsersController');

    Route::resource('/users', 'Admin\\UsersController');

    Route::resource('/departments', 'Admin\\DepartmentController');
    
    Route::resource('/designations', 'Admin\\DesignationController');
    
});

Route::group(['middleware' => ['auth', 'roles'], 'roles' => 'admin', 'prefix' => 'testing'], function () {
    Route::get('/test', 'Admin\\DashboardController@showUser');
    //Route::auth();
    
    });

Route::get('/doing', 'HomeController@index')->middleware('superadmin'); 
/*Route::get('testing', [
     'middleware' => ['auth', 'roles'],
     'uses' => 'HomeController@index',
     'roles' => ['super-admin','fff']
]);*/

Route::get('admin/login', 'Auth\AuthController@getLogin');
Route::auth();


Route::get('/home', 'HomeController@index');
