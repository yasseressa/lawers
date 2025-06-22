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


Route::get('/','\App\Http\Controllers\HomeController@get_all')->name('home');
Route::get('/about','\App\Http\Controllers\HomeController@get_about')->name('about');
Route::get('/contact','\App\Http\Controllers\HomeController@get_contact')->name('contact');
Route::get('/login','\App\Http\Controllers\HomeController@get_login')->name('login');
Route::post('/','\App\Http\Controllers\HomeController@post_login')->name('post_login');
Route::get('/signup','\App\Http\Controllers\HomeController@get_signup')->name('signup');
Route::post('/signup','\App\Http\Controllers\HomeController@post_signup')->name('post_signup');


    Route::post('/complaint','\App\Http\Controllers\ComplaintController@store')->name('complaint');

    Route::get('/logout','\App\Http\Controllers\HomeController@logout')->name('logout');

    Route::get('/posts','\App\Http\Controllers\PostController@selectAll')->name('posts');
    Route::post('/posts','\App\Http\Controllers\PostController@storePost')->name('add_post');
    Route::post('/posts/r','\App\Http\Controllers\PostController@storeReply')->name('add_reply');
    Route::post('/posts/s','\App\Http\Controllers\PostController@chooseLawyer')->name('select_lawyer');

    Route::get('/issues','\App\Http\Controllers\IssueController@selectAll')->name('issues');
    Route::get('/issue/{id}','\App\Http\Controllers\IssueController@selectOne')->name('issue');
    Route::post('/issue/{id}','\App\Http\Controllers\IssueController@edit')->name('issue_finish');

    Route::get('/profile','\App\Http\Controllers\UserProfileController@select')->name('profile');
    Route::post('/profile','\App\Http\Controllers\UserProfileController@edit')->name('edit_profile');

    Route::get('/lawyers','\App\Http\Controllers\LawyerController@selectAll')->name('lawyers');
    Route::post('/lawyers','\App\Http\Controllers\LawyerController@rateLawyer')->name('rate_lawyer');


Route::group(['prefix' => 'users'], function (){
    Route::get('index', '\App\Http\Controllers\UsersController@index');
    Route::post('store','\App\Http\Controllers\UsersController@store') ->name('users.store');
    Route::get('delete/{id}','\App\Http\Controllers\UsersController@delete') ->name('user.delete');
});
