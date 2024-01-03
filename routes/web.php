<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function(){


    Route::match(['get','post'],'login','AdminController@login') ;

    Route::group(['middleware'=>['admin']],function(){
        Route::get('dashboard','AdminController@dashboard') ;
        Route::match(['get','post'],'update-password','AdminController@updatePassword') ;
        Route::post('check-current-password','AdminController@checkCurrentPassword') ;
        Route::get('logout','AdminController@logout') ;

    });
});

