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

/*Route::get('/', function () {
    return view('welcome');
});

/*Route::namespace('tester')->group(function (){


route::get('users','UserController@ShowAdmin');
route::get('delete','UserController@deleteuser');
route::get('us','UserController@operationmethod');

});

Route::get('users',function(){
   return "welcome";
});

/*Route::prefix('users')->group(function(){
Route::get('user','UserController@ShowAdmin');
Route::get('user1','UserController@deleteuser');
Route::get('user2','UserController@operationmethod');
});*/

/*Route::group(['prefix' => 'users'],function(){
    
    Route::get('/',function(){
        return "welcome";
    });

    Route::get('user','UserController@ShowAdmin');
    Route::get('user1','UserController@deleteuser');
    Route::get('user2','UserController@operationmethod');

});


Route::group(['namespace' => 'tester'] , function(){

  Route::get('data/{name}/{age}','FirstController@getdata')->middleware('auth');
  Route::get('name/{name}','FirstController@getname');
  Route::get('age/{age}','FirstController@getage');
});

Route::get('login',function(){
    return "must be login to access the data";
})->name('login');

route::get('users','UserController@index');

Route::group(['namespace' => 'tester'],function(){
    route::get('alaa','UserController@getview');
    route::get('use','UserController@operationmethod');
});

Route::group(['namespace'=>'tester'],function(){
    route::get('index','FirstController@getinfo');
});

//Route::get('indexe','FirstController@getnames');

Route::get('user1','UserController@deleteuser');

*/
const paginate = 5;
Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/',function(){
    return view('welcome');

});

Route::get('/Dashboard',function(){
    return 'not allowed';

})->name('backing');

route::get('fillable','TestController@getinfo');

//Route::group(['prefix'=>'offers'],function(){
   
//route::get('store','TestController@store');
//route::get('create','TestController@create');
//route::post('store','TestController@store')->name('store');

//route::get('pro','ProController@getinfo');
//route::Post('add','ProController@addproduct')->name('addation');

// this route is to mcamera package
/*Route::group(
[
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){ 
  
   Route::group(['prefix'=>'offers'],function(){
     route::get('pro','ProController@getinfo');
     route::Post('add','ProController@addproduct')->name('addation');
   });


});
*/
Route::group(['prefix'=>LaravelLocalization::setLocale(),'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],function(){

Route::group(['prefix'=>'offers'],function(){
  route::get('pro','ProController@getinfo');
  route::Post('add','ProController@addproduct')->name('addation');

  route::get('edit/{offer_id}','ProController@EditProduct');
  route::POST('update/{offer_id}','ProController@UpdateProduct')->name('offer.update');


  route::get('all','ProController@getdata');

  route::get('off','TestController@create');
  route::post('store','TestController@store')->name('store');

  route::get('show','TestController@ShowOfferData')->name('show');

  route::get('editoffer/{off_id}','TestController@EditOffer');

  route::get('update/{update_id}','TestController@ShowUpdate');
  route::post('updated/{update_id}','TestController@SaveUpdate')->name('updated');
  route::get('delete/{update_id}','TestController@DeletOffer')->name('delete');


  route::get('paginate','ProController@getwithpaginate')->name('paginate');


  route::get('getscope','HomeController@getscope');
 route::get('getscop','HomeController@getscopeactive');






 

    });
 ################## using ajax routes ######################

 route::group(['prefix'=>'ajax'],function(){

    route::get('ajax','Ajax@ajax_offer')->name('ajax_first');
    route::post('store_ajax','Ajax@ajax_offer_store')->name('store_ajax_first');

    route::get('showdatajax','Ajax@ShowOfferDataajax')->name('show_data_ajax');
    route::get('edit_ajax/{offer_id}','Ajax@edit_offer_ajax')->name('edit_ajax');

    route::get('update/{offer_id}','Ajax@ShowUpdate_ajax')->name('update_with_ajax');
    route::post('updated','Ajax@SaveUpdate_ajax')->name('save_update_with_ajax');

    route::post('delete_ajax','Ajax@DeletOfferajax')->name('delete_ajax_first');
 });


 #################### end using ajax routes ######################

  Route::get('/youtube', 'HomeController@getvideo')->name('youtube')->middleware('auth');


});

##################### ajax training #############



#################### ajax end training ############3

################33 middleware ##############

Route::group(['namespace' => 'Auth','prefix' => 'midoffers','middleware'=>'checkAge'],function(){

 route::get('get','MidController@adult')->name('getdata');



});

 route::get('site','Auth\MidController@site')->middleware('auth:web')->name('site');
route::get('admin','Auth\MidController@admin')->middleware('auth:admin')->name('admin');

route::get('admin/login','Auth\MidController@adminlogin')->name('adminlogin');
route::post('admin/login','Auth\MidController@saved')->name('saveadmin');



################################# relations ####################

route::get('select','Relations@getuser')->name('getuser');
route::get('doctor/{user_id}','Relations@showddata')->name('show.data');

################# one to many ###################3
route::get('many','Relations@hasrelation');
route::get('shows','Relations@getHosData')->name('getname');
route::get('doctor/{hospital_id}','Relations@showddata')->name('getdoctor');

route::get('editdoctor/{doctor_id}','Relations@editdoctor')->name('edit');
route::get('deletedoc/{doctor_id}','Relations@deletedoctor')->name('delete_doctor');

route::get('have','Relations@getcontain');

route::get('doctor_service','Relations@get_doctor_service');
route::get('service_doctor','Relations@get_service_doctor');

route::get('get_service_doctor/{doctor_id}','Relations@getServiceDoctor')->name('get_service');
route::post('save_service_doctor','Relations@saveServiceDoctor')->name('save_service');

#################################  end relations ####################

################################ one has through ###############

route::get('get_doctor_patient','Relations@getdoctorpatient')->name('get_doctor_patient');
route::get('get_country_doctor','Relations@getcountrydoctor')->name('get_conutry_doctor');


############################ accessors and mutators ####################3

route::get('accessor','HomeController@getaccessor');
route::get('accessor1','HomeController@getaccessor1');








######################## Training ####################
route::get('search','Training@search');
route::get('getsearch','Training@getresult')->name('result');





