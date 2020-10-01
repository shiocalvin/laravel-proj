<?php

use App\Http\Controllers\AdminZoneController;
use App\Http\Controllers\AlienController;
use Illuminate\Support\Facades\Route;
use App\District;

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
    return view('welcome');
});

Route::get('/admin',function(){

    return view('Admin.index');

});

Route::get('/zone',function(){

    return view('zone.index');

});

Route::get('/center',function(){

   return view('center.index');

});

Route::get('/centertech',function(){

    return view('centertech.index');
 
 });

 Route::get('/hospital',function(){

    return view('hospital.index');
 
 });

Route::get('nbts/login','Auth\NbtsloginController@showlogin')->name('nbts.login');
Route::post('nbts/login','Auth\NbtsloginController@attemptLogin')->name('nbts.login.submit');

 Route::get('hosp/login','Auth\HospitalloginController@showlogin')->name('hospital.login');
 Route::post('hosp/login','Auth\HospitalloginController@attemptlogin')->name('hospital.login.submit');


Route::get('zone/{id}','ZoneController@indexy')->name('zone.indexy');
Route::resource('zone','ZoneController');


Route::get('admin','AdminZoneController@exec')->name('admin.index');


//Route::get('admin/{id}','AdminZoneController@showinfo')->name('admin.show');
 //Route::get('admin/{id}/editinfo','AdminZoneController@editinfo')->name('admin.edit');
 //Route::match(['put','patch'],'admin/updateinfo/{id}','AdminZoneController@updateinfo');

 Route::resource('admin/zone','AdminZoneController');
 Route::resource('admin/memo','AdmemoController');
 Route::get('admin/zone/create/{id}','AdminZoneController@createdirector')->name('zonedirector.create');
//  Route::post('admin/zone/1','AdminZoneController@storedirector');

Route::get('admin/zone/director/{id}/directoredit','AdminZoneController@editzonedirector')->name('director.edit');

//Route::get('zone/center/indexy/{id}','ZoneCenterController@indexy')->name('center.indexy');

Route::get('zone/{id}/center/create','ZoneCenterController@createy')->name('center.creates');
Route::get('zone/{id}/center/active','ZoneCenterController@active')->name('center.active');
Route::get('zone/{id}/center/inactive','ZoneCenterController@inactive')->name('center.inactive');
Route::get('zone/{zid}/center/active/{id}/edit','ZoneCenterController@edits')->name('center.edits');
Route::get('zone/{zid}/center/active/{id}','ZoneCenterController@shows')->name('center.shows');
Route::get('zone/{zid}/center/inactive/{id}','ZoneCenterController@shows')->name('center.shows');
Route::match(['put','patch'],'zone/center/active/{id}','ZoneCenterController@updateactive');
Route::resource('zone/center','ZoneCenterController');

// Route::get('/region/{region}/district','ZoneCenterController@getDistricts');

//Route::get('districts/get_by_region', 'DistrictsController@get_by_country')->name('districts.get_by_region');

//Auth::routes();
Route::get('zone/{zid}/center/{cid}/director/{id}/edit','CenterDirectorController@edits');
Route::resource('zone/center/director','CenterDirectorController');
Route::get('zone/{zid}/center/{id}/director/create','CenterDirectorController@createdir')->name('director.createid');

Route::get('center/{id}','CenterDirectorController@dashboard')->name('center.dashboard');
Route::get('center/{zid}/hospital/{hid}/labtechnician/{id}/edit','HospitalLabController@edits')->name('labtechnicianid.edits');
Route::resource('zone/hospital/labtechnician','HospitalLabController');
Route::get('center/{zid}/hospital/{id}/labtechnician/create/','HospitalLabController@createlabtech')->name('labtechnicianid.create');

Route::get('center/{id}/hospital/create','ZoneHospitalController@createy')->name('hospital.creates');
Route::get('center/{id}/hospital/active','ZoneHospitalController@active')->name('hospital.active');
Route::get('center/{zid}/hospital/active/{id}/edit','ZoneHospitalController@edits')->name('hospital.edits');
Route::get('center/{id}/hospital/inactive','ZoneHospitalController@inactive')->name('hospital.inactive');
Route::get('center/{zid}/hospital/active/{id}','ZoneHospitalController@shows')->name('hospital.shows');
Route::get('center/{zid}/hospital/inactive/{id}','ZoneHospitalController@shows')->name('hospital.shows');
Route::match(['put','patch'],'zone/hospital/{id}','ZoneHospitalController@updateactive');
Route::resource('zone/hospital','ZoneHospitalController');


Route::get('center/{id}/blooddrive','BloodDriveController@indexy')->name('center.blooddrive');
Route::get('center/{id}/blooddrive/create','BloodDriveController@create')->name('drive.store');
Route::get('center/{cid}/blooddrive/{id}/edit','BloodDriveController@editey');
Route::post('center/bloodrive/store','BloodDriveController@store');
Route::resource('center/blooddrive','BloodDriveController');

Route::get('center/{id}/centerlab','CenterLabController@index')->name('labtech.indy');
Route::get('center/{id}/centerlab/create','CenterLabController@create')->name('centerlab.create');
Route::post('center/centerlab','CenterLabController@store');
Route::get('center/{cid}/centerlab/{id}/edit','CenterLabController@edit');
Route::match(['put','patch'],'center/centerlab/{id}','CenterLabController@update');
Route::delete('center/centerlab/{id}','CenterLabController@destroy');

Route::get('center/{cid}/centerlab/{id}','DonorsController@dashboard');
Route::get('center/{cid}/centerlab/{id}/donor/create','DonorsController@create');
Route::post('center/centerlab/donor','DonorsController@store');
Route::get('center/{cid}/centerlab/{id}/donor','DonorsController@index');
Route::get('center/{cid}/centerlab/{lid}/donor/{id}/edit','DonorsController@edit');
Route::match(['put','patch'],'center/centerlab/donor/{id}','DonorsController@update');
Route::get('center/{cid}/centerlab/{lid}/donor/donate','DonorsController@untested');
Route::post('center/centerlab/donor/donate','DonorsController@updateuntested');
Route::get('center/{cid}/centerlab/{lid}/nondonor','NonDonorController@requestbagid');
Route::get('center/{cid}/centerlab/{lid}/nondonor/show/bloodbag','NonDonorController@show');
Route::post('center/centerlab/nondonor/donate','NonDonorController@store');

Route::get('center/{cid}/centerlab/{lid}/donor/donate/{id}','DonorsController@donate');
Route::get('center/{cid}/centerlab/{lid}/donor/{did}/bloodbag','DonorsController@bag');
Route::get('center/{cid}/centerlab/{id}/donor/testing','DonorsController@testing');
Route::get('center/{cid}/centerlab/{lid}/bloodbag/testing/{id}','DonorsController@results');
Route::post('center/{cid}/centerlab/{id}/bloodbag/testing','DonorsController@resultstore');

Route::get('center/{cid}/centerlab/{id}/transferblood','DonorsController@centersbloodbags');
Route::post('center/centerlab/transferblood/send','DonorsController@sendingbags');

Route::get('center/{cid}/centerlab/{id}/donor/hospital/testing','DonorsController@testingHospital');
Route::get('center/{cid}/centerlab/{lid}/bloodbag/hospital/testing/{id}','DonorsController@hospresults');
Route::post('center/{cid}/centerlab/{id}/bloodbag/hospital/testing','DonorsController@hospresultstore');

Route::get('center/{cid}/centerlab/{id}/receivedrequest','CenterRequestController@receivedrequest');
Route::match(['put','patch'],'center/centerlab/update/{id}','CenterRequestController@update');


Route::get('hospital/{hid}/hosplab/{id}','DonorsController@hospdashboard');
Route::get('hospital/{hid}/hosplab/{id}/donor/donate','DonorsController@untestedhospital');
Route::get('hospital/{hid}/hosplab/{lid}/donor/donate/{id}','DonorsController@hospdonate');
Route::post('hospital/hosplab/donor/donate','DonorsController@hospupdateuntested');
Route::get('hospital/{hid}/hosplab/{lid}/donor/{did}/bloodbag','DonorsController@hospbag');
Route::get('hospital/{hid}/hosplab/{lid}/bags/confirm','DonorsController@confirmation');
Route::match(['put','patch'],'hospital/hosplab/bag/{id}','DonorsController@confirmationupdate');

Route::get('hospital/{hid}/hosplab/{lid}/nondonor/hospital','NonDonorController@hosprequestbagid');
Route::post('hospital/hosplab/nondonor/donate','NonDonorController@hospstore');
Route::get('hospital/{hid}/hosplab/{lid}/nondonor/show/bloodbag','NonDonorController@hospshow');
Route::get('hospital/{hid}/hosplab/{lid}/request','HospitalRequestController@sendrequest');
Route::post('hospital/hosplab/requestbag','HospitalRequestController@store');
Route::get('hospital/{hid}/hosplab/{lid}/storage','HospitalRequestController@bloodstorage');

Route::post('hospital/hosplab/usebag','HospitalRequestController@usebag');





Route::get('/home', 'HomeController@index')->name('home');

 Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('ajax-district','ZoneController@ajaxregion');




// API ROUTES
// Route::get('center/{id}/blooddrive','BloodDriveController@indexy')->name('center.blooddrive');
// Route::get('center/{cid}/centerlab/{id}/donor','DonorsController@index');
