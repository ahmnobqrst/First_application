<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

    

Route::get('collection','CollectTut@index');
Route::get('get_data','CollectTut@each_func');

Route::get('get_filter','CollectTut@filteration');

Route::get('transform','CollectTut@transform_data');


});

 








