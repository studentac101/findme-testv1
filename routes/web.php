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

Route::get('/', function () {
    return view('app.login');
})->middleware('loggedin','validateBackHistory'); //the use of this middleware is that it will prevent the user to go back to the loginpage if he's still logged in

Route::post('/doLogin','LoginLogoutController@doLogin');
Route::get('/doLogout','LoginLogoutController@doLogout');


  // NOTE : middlewares will execute first then it will proceed to the request
  Route::group( [ 'middleware' => ['checkifloggedin','validateBackHistory'] ],function(){
    //Officer Controller
    Route::group(['prefix'=>'officers'],function(){
      Route::get('/','OfficerController@index');
      Route::get('/editprofile','OfficerController@edit');
      Route::post('/updateAvatar','OfficerController@updateAvatar');
      Route::post('/update','OfficerController@update');
      Route::post('/changePassword','OfficerController@changePassword');
        // this group will be checked if it is a head officer if true then it will allow the user to access these links
        Route::group( [ 'middleware' => ['officertype']  ],function(){
          Route::get('/editother/{id}','OfficerController@editOther')->middleware('officerinstationchecker');
          Route::get('/showallOfficers','OfficerController@show');
          Route::get('/createOfficer','OfficerController@create');
          Route::post('/storeOfficer','OfficerController@store');
          Route::post('/updateother/{id}','OfficerController@updateOther');
          Route::post('/resetpassword/{id}','OfficerController@resetPassword');
          Route::post('/activation/{id}','OfficerController@activation');
        });
    });





    // Petitioner Controller
    Route::group(['prefix'=>'petitioners'],function(){
      Route::get('/createPetitioner','PetitionerController@create');
      Route::post('/storePetitioner','PetitionerController@store');
      Route::get('/showallPetitioners','PetitionerController@show');
      Route::post('/updatePetitioner/{id}','PetitionerController@update');
      // id in the link is id of the petitioner
       // *Checks if that missing person was reported in the station of the current authenticated user* - middleware
      Route::get('/showallReports/{id}','PetitionerController@showallReports'); //this will show all the reports made by the petitioner - link
      // id in the link is id of the petitioner
      Route::get('/editPetitioner/{id}','PetitionerController@edit');
      Route::post('/activation/{id}','PetitionerController@activation');
    });





    // Missing Controller
    Route::group(['prefix'=>'missings'],function(){
      Route::get('/editMissing/{id}','MissingController@edit')->middleware('missingpersoninstationchecker');
      // id in the link is id of the petitioner
      Route::get('/createMissing/{id}','MissingController@create');
      // id in the link is id of the petitioner, passed id of the petitioner to put a value on the petitioner_id in the incident table
      Route::post('/storeMissing/{id}','MissingController@store');
    });

    // Sightings Controller
    Route::group(['prefix'=>'sightings'],function(){
      Route::get('/all','SightingController@show');
      Route::get('/detail/{id}','SightingController@detail');
      Route::post('/accept/{id}','SightingController@accept');
      Route::post('/decline/{id}','SightingController@decline');
    });


  });
