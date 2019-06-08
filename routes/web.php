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


// user views
Route::get('user/profile','UserprofileController@index')->name('user.profile'); 
Route::post('user/profile/create', 'UserprofileController@store')->name('profile.create'); 
Route::post('user/coverletter', 'UserprofileController@coverletter')->name('cover.letter'); 
Route::post('user/resume', 'UserprofileController@resume')->name('resume'); 
Route::post('user/avatar', 'UserprofileController@avatar')->name('avatar'); 

//employer views
Route::view('employer/register', 'auth.employer-register')->name('employer.register');
Route::post('employer/register', 'EmployerRegisterController@employerRegister')->name('emp.register');
Route::post('applications/{id}', 'JobController@apply')->name('apply');


// company veiws 
Route::get('/company/{id}/{company}','CompanyController@index')->name('company.index');
Route::get('company/create','CompanyController@create')->name('company.view');
Route::post('company/create','CompanyController@store')->name('company.store'); 
Route::post('company/coverphoto','CompanyController@coverPhoto')->name('cover.photo'); 
Route::post('company/logo','CompanyController@companyLogo')->name('company.logo'); 

// jobs
Route::get('/','JobController@index');
Route::get('/jobs/create','JobController@create')->name('job.create');
Route::post('/jobs/create','JobController@store')->name('job.store');
Route::get('/jobs/{id}/edit','JobController@edit')->name('job.edit');
Route::post('/jobs/{id}/edit','JobController@update')->name('job.update');
Route::get('/jobs/my-job','JobController@myjob')->name('my.job');
Route::get('/jobs/{id}/{job}','JobController@show')->name('jobs.show');
Route::get('/jobs/applications', 'JobController@applicant')->name('applicant');
Route::get('/jobs/alljobs','JobController@allJobs')->name('alljobs');

// favorit jobs
Route::post('/save/{id}','FavoritController@saveJob'); 
Route::post('/unsave/{id}','FavoritController@unsaveJob'); 

// search 
Route::get('/jobs/search', 'JobController@searchJobs'); 

// Auth::routes();
Auth::routes(['verify' => true]);

// not really used for anything
Route::get('/home', 'HomeController@index')->name('home');
