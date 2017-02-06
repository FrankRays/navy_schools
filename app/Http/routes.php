<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	return Redirect::route('dashboard');
});

Route::group(['middleware' => 'guest'], function(){

	Route::get('login', ['as'=>'login','uses' => 'Auth\AuthController@login']);
	Route::post('login', ['as'=> 'postlogin','uses' => 'Auth\AuthController@doLogin']);

	Route::get('register', ['as'=>'register','uses' => 'UserController@create']);
	Route::post('register', ['as'=>'postRegister','uses' => 'UserController@store']);

	// Password reset link request routes...
	Route::get('password/email', ['as' => 'passwordRequest','uses' => 'Auth\PasswordController@getEmail']);
	Route::post('password/email', ['as' => 'postPasswordRequest', 'uses' => 'Auth\PasswordController@postEmail']);
	// Password reset routes...
	Route::get('password/reset/{token}', ['as' => 'getReset', 'uses' =>'Auth\PasswordController@getReset']);
	Route::post('password/reset', ['as' => 'postReset', 'uses' => 'Auth\PasswordController@postReset']);

	// social login route
	Route::get('login/fb', ['as'=>'login/fb','uses' => 'SocialController@loginWithFacebook']);
	Route::get('login/gp', ['as'=>'login/gp','uses' => 'SocialController@loginWithGoogle']);

});

Route::group(array('middleware' => 'auth'), function()
{
	Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
	Route::get('profile', ['as' => 'profile', 'uses' => 'UserController@profile']);
	// Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));
	Route::get('change-password', array('as' => 'password.change', 'uses' => 'Auth\AuthController@changePassword'));
	Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'Auth\AuthController@doChangePassword'));

});

Route::group(['prefix' => 'admin', 'middleware' => ['auth'/*, 'role:admin'*/]], function()
{
	Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));

	//FO/NI CRD
	Route::get('foni', array('as' => 'foni', 'uses' => 'FilesController@foni'));
	Route::get('foni/create', array('as' => 'foni.create', 'uses' => 'FilesController@createFONI'));
	Route::post('foni/create', array('as' => 'foni.store', 'uses' => 'FilesController@storeFONI'));
	Route::get('foni/delete/{id}', array('as' => 'foni.delete', 'uses' => 'FilesController@deleteFONI'));

	//special instructions

	// // Demo CRUD
	// Route::get('demo',['as' => 'demo.index', 'uses' => 'DemoController@index']);
	// Route::get('demo/create',['as' => 'demo.create', 'uses' => 'DemoController@create']);
	// Route::post('demo',['as' => 'demo.store', 'uses' => 'DemoController@store']);
	// Route::get('demo/{id}/edit',['as' => 'demo.edit', 'uses' => 'DemoController@edit']);
	// Route::get('demo/{id}/show',['as' => 'demo.show', 'uses' => 'DemoController@show']);
	// Route::put('demo/{id}',['as' => 'demo.update', 'uses' => 'DemoController@update']);
	// Route::get('demo/delete/{id}',['as' => 'demo.delete', 'uses' => 'DemoController@destroy']);

	// Student CRUD
	Route::get('student',['as' => 'student.index', 'uses' => 'StudentsController@index']);
	Route::get('student/create',['as' => 'student.create', 'uses' => 'StudentsController@create']);
	Route::post('student',['as' => 'student.store', 'uses' => 'StudentsController@store']);
	Route::get('student/{id}/edit',['as' => 'student.edit', 'uses' => 'StudentsController@edit']);
	Route::get('student/{id}/show',['as' => 'student.show', 'uses' => 'StudentsController@show']);
	Route::put('student/{id}',['as' => 'student.update', 'uses' => 'StudentsController@update']);
	Route::get('student/delete/{id}',['as' => 'student.delete', 'uses' => 'StudentsController@destroy']);

	//Schools Routes
	Route::get('school/{id}',['as' => 'school.show', 'uses' => 'SchoolsController@show']);

	//school courses
	Route::get('school/{id}/course',['as' => 'school.course.index', 'uses' => 'SchoolsController@courseIndex']);
	Route::get('school/{id}/course/ongoing',['as' => 'school.course.ongoing', 'uses' => 'SchoolsController@ongoingCourses']);
	Route::get('school/{id}/course/awaiting',['as' => 'school.course.awaiting', 'uses' => 'SchoolsController@awaitingCourses']);
	Route::get('school/{id}/course/archive',['as' => 'school.course.archive', 'uses' => 'SchoolsController@archive']);
	Route::get('school/{id}/course/archive/{course_name}',['as' => 'school.course.archive.list', 'uses' => 'SchoolsController@archiveList']);
	Route::get('school/{id}/course/create',['as' => 'school.course.create', 'uses' => 'SchoolsController@createCourse']);
	Route::post('school/{id}/course/create',['as' => 'school.course.store', 'uses' => 'SchoolsController@storeCourse']);
	Route::get('school/{school_id}/course/show/{course_id}',['as' => 'school.course.show', 'uses' => 'SchoolsController@showCourse']);
	Route::get('school/{school_id}/course/edit/{course_id}',['as' => 'school.course.edit', 'uses' => 'SchoolsController@editCourse']);
	Route::put('school/{school_id}/course/update/{course_id}',['as' => 'school.course.update', 'uses' => 'SchoolsController@updateCourse']);
	Route::get('school/{school_id}/course/delete/{course_id}',['as' => 'school.course.delete', 'uses' => 'SchoolsController@deleteCourse']);
	//course appoval
	Route::get('school/{school_id}/course/approve/{course_id}',['middleware' => ['role:admin|engeneering|electrical|seamanship'],'as' => 'school.course.approve', 'uses' => 'SchoolsController@approveCourse']);
	
	//school syllabus
	Route::get('school/{id}/syllabus',['as' => 'school.syllabus', 'uses' => 'FilesController@showSyllabus']);

	//school classes
	Route::get('school/{id}/class',['as' => 'school.class.index', 'uses' => 'ClassesController@index']);
	Route::get('school/{id}/class/create',['as' => 'school.class.create', 'uses' => 'ClassesController@create']);
	Route::post('school/{id}/class/create',['as' => 'school.class.store', 'uses' => 'ClassesController@store']);
	Route::get('school/{school_id}/class/show/{class_id}',['as' => 'school.class.show', 'uses' => 'ClassesController@show']);
	Route::get('school/{school_id}/class/students/{class_id}',['as' => 'school.class.students', 'uses' => 'ClassesController@students']);
	Route::get('school/{school_id}/class/result/{class_id}',['as' => 'school.class.result', 'uses' => 'ClassesController@result']);
	Route::get('school/{school_id}/class/edit/{class_id}',['as' => 'school.class.edit', 'uses' => 'ClassesController@edit']);
	Route::put('school/{school_id}/class/update/{class_id}',['as' => 'school.class.update', 'uses' => 'ClassesController@update']);
	Route::get('school/{school_id}/class/delete/{class_id}',['as' => 'school.class.delete', 'uses' => 'ClassesController@destroy']);
	//course appoval
	Route::get('school/{school_id}/class/approve/{class_id}',['middleware' => ['role:admin|engeneering|electrical|seamanship'],'as' => 'school.class.approve', 'uses' => 'ClassesController@approve']);
});

/* // Language CRUD
	Route::get('language',['as' => 'language.index', 'uses' => 'LanguageController@index']);
	Route::get('language/create',['as' => 'language.create', 'uses' => 'LanguageController@create']);
	Route::post('language',['as' => 'language.store', 'uses' => 'LanguageController@store']);
	Route::get('language/{id}/edit',['as' => 'language.edit', 'uses' => 'LanguageController@edit']);
	Route::get('language/{id}/show',['as' => 'language.show', 'uses' => 'LanguageController@show']);
	Route::put('language/{id}',['as' => 'language.update', 'uses' => 'LanguageController@update']);
	Route::delete('language/{id}',['as' => 'language.delete', 'uses' => 'LanguageController@destroy']);

*/
