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

// Route::get('/login', function () {
//     return view('home');
// });
// Route::get('/', function () {
//     return view('trangchu');
// });
Route::get('/','HomePageController@index')->name('homepage');
Route::get('/taive', function () {
    return view('download');
});

Route::get('/','HomePageController@index')->name('homepage');

Route::get('/feeds','feedscontroller@index')->name('feeds');

Route::get('/huongdan', function () {
    return view('tutorial');
});
Route::get('/lienhe', function () {
    return view('lienhe');
});
Auth::routes();

Route::any('/search','MainController@search')->name('search');

Route::get('/reading/{article_id}','ReadingController@reading');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user','middleware' => 'checklogin'],function(){
    Route::get('/','UserController@index')->name('user_dashboard');
    Route::prefix('article')->group(function(){
        Route::get('/new','UserController@show_creating_article');
        Route::delete('/delete','ArticleController@delete');
        Route::get('/view_ar/{article_id}','UserController@show_editing_article');
        Route::post('/update_article','ArticleController@update')->name('update_article');
        Route::get('/admin_deleled_info/{article_id}','ArticleController@getAdminDeletedInfo');
        Route::get('/list','ArticleController@getArticleList');
        Route::post('/create','ArticleController@create')->name('create_article');
        Route::get('/rules','UserController@showrule');
        Route::get('/review/{article_id}','ArticleController@getArticleByID');
      });
    Route::get('action/get_tags_list','TagController@getTagsBySearching');
    Route::get('action/get_subjects','SubjectController@getAllSubjects');
  
  });