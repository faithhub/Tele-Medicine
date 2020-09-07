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

Route::get('/', 'Controller@index');
Route::get('/index', 'Controller@index');
Route::get('/home', 'Controller@index');
Route::get('/about', 'Controller@about');
Route::get('/contact', 'Controller@contact');

Route::get('redirect', 'Auth\LoginController@redirectBack');

Route::get('login/{driver}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{driver}/callback', 'Auth\LoginController@handleProviderCallback');

Route::match(['get', 'post'], 'login', 'Auth\LoginController@login')->name('login')->middleware('noauth');

Route::match(['get', 'post'], 'doctor-signup', 'Auth\RegisterController@doctorRegister')->middleware('noauth');

Route::match(['get', 'post'], 'patient-signup', 'Auth\RegisterController@patientRegister')->middleware('noauth');

Route::get('logout', 'Auth\LoginController@logout')->name('logout');


//Change Password
Route::post('chage', 'ChangePasswordController@change')->middleware('auth')->name('change-password');



Route::get('end_call', 'CallController@end_call');
Route::get('cancel_call', 'CallController@cancel_call');
Route::get('receive_call', 'CallController@receive_call');
Route::match(['get', 'post'], 'call_now', 'CallController@make_call');

//Patients Route
Route::get('payment', 'PaymentController@index')->middleware('auth');
Route::get('verify', 'PaymentController@verify')->middleware('auth');

Route::group(['prefix' => 'patient', 'before' => 'force.ssl', 'middleware' => ['auth', 'paid']], function () {
    Route::get('index', 'PatientController@index');
    Route::get('/', 'PatientController@index');
    Route::get('dashboard', 'PatientController@index');
    Route::get('password', 'PatientController@changePassword');
    Route::get('calling', 'PatientController@openTok');
    Route::get('view_prescription', 'PrescriptionController@view');
    Route::match(['get', 'post'], 'search_doctor', 'PatientController@search_doctor');
    Route::match(['get', 'post'], 'prescriptions', 'PrescriptionController@all');
    Route::match(['get', 'post'], 'profile', 'PatientController@profile');
    Route::match(['get', 'post'], 'appointment', 'PatientController@appointment');
    Route::match(['get', 'post'], 'book', 'PatientController@book_appointment');
});

//Doctors Route
Route::group(['prefix' => 'doctor', 'middleware' => ['auth', 'approve']], function () {
    Route::get('dashboard', 'DoctorController@index');
    Route::get('/', 'DoctorController@index');
    Route::get('index', 'DoctorController@index');
    Route::get('password', 'DoctorController@changePassword');
    Route::post('updatecv', 'DoctorController@updateCV');
    Route::post('create', 'PrescriptionController@create');
    Route::post('delete_appointment', 'PrescriptionController@delete');
    Route::get('prescriptions', 'PrescriptionController@index');
    Route::match(['get', 'post'], 'appointment',  'DoctorController@appointment');
    Route::post('updatepicture', 'DoctorController@updatePicture');
    Route::match(['get', 'post'], 'profile',  'DoctorController@profile');
    Route::match(['get', 'post'], 'create_prescription',  'DoctorController@create_prescribtion');
});

//Admin Route
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    Route::get('dashboard', 'AdminController@index');
    Route::get('/', 'AdminController@index');
    Route::get('index', 'AdminController@index');
    Route::match(['get', 'post'], 'web_settings',  'AdminController@web_settings');
    Route::get('doctors', 'AdminController@doctor');
    Route::get('patients', 'AdminController@patient');
    Route::get('payments', 'AdminController@payments');
    Route::get('prescriptions', 'AdminController@prescriptions');
    Route::get('appointments', 'AdminController@appointments');
    Route::get('password', 'AdminController@changePassword');
    Route::post('delete_doctor', 'AdminController@delete_doctor');
    Route::get('status', 'AdminController@status');
});
