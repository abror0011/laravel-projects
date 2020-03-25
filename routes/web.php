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
Route::get('/services', 'SiteController@services')->name('services');
//News
Route::get('/news','SiteController@news')->name('news');
Route::get('/news/{id}','SiteController@newsMore')->name('news.more');
//About us
Route::get('/about-us', function(){
    return "News";
})->name('about');
//Contact
Route::get('/feedback', 'SiteController@contact')->name('contact');
Route::post('/feedback', 'SiteController@feedbackStore')->name('contact.store');
//Search
Route::get('/search', 'SiteController@search')->name('search');
//Admin routes
Route::namespace('Admin')->middleware('auth')->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', function() {
        return redirect()->route('admin.posts.index');
    })->name('dashboard');
    Route::resource('posts', 'PostsController');
    //Feedback routes
    Route::get('feedbacks', 'FeedbacksController@index')->name('feedbacks.index');
    Route::get('feedbacks/{id}/show', 'FeedbacksController@show')->name('feedbacks.show');
    Route::delete('feedbacks/{id}/delete', 'FeedbacksController@delete')->name('feedbacks.delete');
});
Auth::routes([
    'register' => false
]);

// Route::get('/home', 'HomeController@index')->name('home');
