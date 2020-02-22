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

//Home page
Route::get('/', 'SiteController@home')->name('home');
//Services page
Route::get('/services', function() {
    return "Service";
})->name('services');
//News
Route::get('/news', function(){
    return "News";
})->name('news');
//About us
Route::get('/about-us', function(){
    return "News";
})->name('about');
//Contact
Route::get('/feedback', 'SiteController@contact')->name('contact');