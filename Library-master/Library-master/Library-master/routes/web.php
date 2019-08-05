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
Route::get('/dd', function () {
    return view('layouts._app');
});
//
// Route::get('/categoryy', function () {
//      return view('viewcategory0');
//      });
//      Route::get('/categoryy','GuestController@wel');


Route::get('/comment/{id}/delete','GuestController@destroy');
Route::post('comment/{id}',['uses'=>'GuestController@addComment','middleware'=>'auth'])->name('comment');
Route::get('/home','GuestController@wel');


Route::get('/', 'GuestController@welcome');
Route::get('/categoryy/{id}','GuestController@viewCategory')->name('category');
Route::get('/bookk/{id}','GuestController@viewBook')->name('book');
// Route::get('/download/{id}', 'GuestController@getDownload')->name('download')->middleware('auth');



Route::resource('/category','CategoryController');

Route::get('/category/7','CategoryController@show')->name('Religious');
Route::get('/category/4','CategoryController@show')->name('Politician');
Route::get('/category/5','CategoryController@show')->name('Social');
Route::get('/category/6','CategoryController@show')->name('Economic');
Route::get('/category/8','CategoryController@show')->name('Sports');
Route::get('/category/9','CategoryController@show')->name('Local');
Route::get('/category/10','CategoryController@show')->name('International');
Route::get('/category/11','CategoryController@show')->name('Artistic');
Route::get('/category/12','CategoryController@show')->name('News');


Route::get('/no-access', function () {
    return view('no-access')->withTitle('No Access');
});
Route::get('/disabled-user', function () {
    return view('disabled-user')->withTitle('Disabled Account');
});





Route::get('/category/{id}/delete','CategoryController@destroy');
Route::get('/category/{id}/edit','CategoryController@edit');
// Route::get('/category/paging','CategoryController@paging');
// Route::get('/category/search','CategoryController@search');
// Route::get('/category/search-paging','CategoryController@searchPaging');
// Route::get('/category/search','CategoryController@search');

// Route::resource('/category2','CategoryController2');
// Route::get('/category2/{id}/delete','CategoryController2@destroy');
// Route::get('/category2/{id}/edit','CategoryController2@edit');
//

Route::resource('/articles','ArticleController');

Route::get('/articles/{id}/delete','ArticleController@destroy');
Route::get('/articles/{id}/edit','ArticleController@edit');



Route::resource('/books','BookController');

Route::get('/books/{id}/delete','BookController@destroy');
Route::get('/books/{id}/edit','BookController@edit');


Route::get('/admin/menu/{id}/delete','Admin\MenuController@destroy');
Route::resource('/admin/menu', 'Admin\MenuController');


Route::get('/admin/slider/{id}/delete','Admin\SliderController@destroy');
Route::resource('/admin/slider', 'Admin\SliderController');


Route::get('/users/report/{view_type}', 'UserController@report');

Route::get('/users/contact','UserController@contact');
Route::get('/users/changepassword','UserController@changePassword');
Route::post('/users/changepassword','UserController@postChangePassword');



Route::get('/users/{id}/links','UserController@links');
Route::post('/users/{id}/links','UserController@postLinks');

Route::get('/users/{id}/delete','UserController@destroy');
Route::get('/users/{id}/edit','UserController@edit');
Route::resource('/users','UserController');




Route::get('admin/blank','AdminController@blank');
Route::get('admin/charts','AdminController@charts');
Route::get('admin/forgot_password','AdminController@forgot_password');
Route::get('admin','AdminController@index');
Route::get('admin/login','AdminController@login');
Route::get('admin/register','AdminController@register');
Route::get('admin/tables','AdminController@tables');
Route::get('admin/f404','AdminController@f404');

Auth::routes();

Route::get('/home', 'HomeController@index');
