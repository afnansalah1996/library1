<?php
use Illuminate\Http\Request;



Route::group([
    'prefix' => 'auth'
], function () {
    Route::get('category-all', 'CategoryAPIController@index');
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
        Route::post('change-password', 'AuthController@changePassword');
        Route::resource('category', 'CategoryAPIController');
    });
});
