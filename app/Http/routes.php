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

	
	//school admin routes
	Route::group(['middleware' => ['role:admin']],function()
	{
		//stuffs module
		Route::get('staff/select',['as' => 'staff.select','uses' =>'AdminStuffController@select']);
		Route::get('staff/{type}',['as' => 'staff','uses' =>'AdminStuffController@index']);
		Route::get('staff/{type}/create',['as' => 'staff.create','uses' =>'AdminStuffController@create']);
		Route::post('staff/{type}/create',['as' => 'staff.store','uses' =>'AdminStuffController@store']);
		Route::get('staff/{staff_id}/edit',['as' => 'staff.edit','uses' =>'AdminStuffController@edit']);
		Route::put('staff/{staff_id}/edit',['as' => 'staff.update','uses' =>'AdminStuffController@update']);
		Route::get('staff/{staff_id}/delete',['as' => 'staff.delete','uses' =>'AdminStuffController@destroy']);

		//FONI menu CRD
		Route::get('foni', array('as' => 'foni', 'uses' => 'FilesController@foni'));
		Route::get('foni/create', array('as' => 'foni.create', 'uses' => 'FilesController@createFONI'));
		Route::post('foni/create', array('as' => 'foni.store', 'uses' => 'FilesController@storeFONI'));
		Route::get('foni/delete/{id}', array('as' => 'foni.delete', 'uses' => 'FilesController@deleteFONI'));

		//Other Files CRD
		Route::get('files/{type}', array('as' => 'otherfiles', 'uses' => 'FilesController@otherFiles'));
		Route::get('files/{type}/create', array('as' => 'otherfiles.create', 'uses' => 'FilesController@createOtherFiles'));
		Route::post('files/{type}/create', array('as' => 'otherfiles.store', 'uses' => 'FilesController@storeOtherFiles'));
		Route::get('files/{type}/delete/{id}', array('as' => 'otherfiles.delete', 'uses' => 'FilesController@deleteOtherFiles'));


	});

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
	
	//course syllabus
	Route::get('school/{school_id}/course/{course_id}/syllabus',['as' => 'school.course.syllabus.index', 'uses' => 'SchoolsController@indexSyllabus']);
	Route::post('school/{school_id}/course/{course_id}/syllabus',['as' => 'school.course.syllabus.store', 'uses' => 'SchoolsController@courseSyllabus']);
	Route::get('school/{school_id}/course/{course_id}/syllabus/{id}/delete',['as' => 'school.course.syllabus.delete', 'uses' => 'SchoolsController@deleteSyllabus']);

	//course special instruction
	Route::get('school/{school_id}/course/{course_id}/si',['as' => 'school.course.si.index', 'uses' => 'SchoolsController@indexSI']);
	Route::post('school/{school_id}/course/{course_id}/si',['as' => 'school.course.si.store', 'uses' => 'SchoolsController@courseSI']);
	Route::get('school/{school_id}/course/{course_id}/si/{id}/delete',['as' => 'school.course.si.delete', 'uses' => 'SchoolsController@deleteSI']);

	//class auto creation through cron job
	Route::get('class/check',['as' => 'class.check', 'uses' => 'ClassesController@checkClass']);

	//school classes
	Route::get('school/{id}/class',['as' => 'school.class.index', 'uses' => 'ClassesController@index']);
	Route::get('school/{id}/class/create',['as' => 'school.class.create', 'uses' => 'ClassesController@create']);
	//Route::post('school/{id}/class/create',['as' => 'school.class.store', 'uses' => 'ClassesController@store']);
	Route::get('school/{school_id}/class/show/{class_id}',['as' => 'school.class.show', 'uses' => 'ClassesController@show']);

	Route::get('school/{school_id}/class/edit/{class_id}',['as' => 'school.class.edit', 'uses' => 'ClassesController@edit']);
	Route::put('school/{school_id}/class/update/{class_id}',['as' => 'school.class.update', 'uses' => 'ClassesController@update']);
	Route::get('school/{school_id}/class/delete/{class_id}',['as' => 'school.class.delete', 'uses' => 'ClassesController@destroy']);

	//class appoval
	Route::get('school/{school_id}/class/approve/{class_id}',['middleware' => ['role:admin|engineering|electrical|seamanship'],'as' => 'school.class.approve', 'uses' => 'ClassesController@approve']);

	//class students
	Route::get('school/{school_id}/class/{class_id}/students',['as' => 'school.class.students', 'uses' => 'ClassesController@students']);
	Route::get('school/{school_id}/class/{class_id}/students/create',['as' => 'school.class.student.create', 'uses' => 'StudentsController@create']);
	Route::post('school/{school_id}/class/{class_id}/student/create',['as' => 'school.class.student.store', 'uses' => 'StudentsController@store']);

	Route::get('school/{school_id}/class/{class_id}/student/{id}/show',['as' => 'student.class.student.show', 'uses' => 'StudentsController@show']);
	Route::get('school/{school_id}/class/{class_id}/student/{id}/edit',['as' => 'school.class.student.edit', 'uses' => 'StudentsController@edit']);
	Route::put('school/{school_id}/class/{class_id}/student/{id}/update',['as' => 'school.class.student.update', 'uses' => 'StudentsController@update']);
	Route::get('school/{school_id}/class/{class_id}/student/{id}/delete',['as' => 'school.class.student.delete', 'uses' => 'StudentsController@destroy']);
	Route::get('school/{school_id}/class/{class_id}/student/{id}/show',['as' => 'school.class.student.show', 'uses' => 'StudentsController@show']);


	//class results
	Route::get('school/{school_id}/class/{class_id}/result',['as' => 'school.class.result', 'uses' => 'ResultsController@index']);

	Route::get('school/{school_id}/class/{class_id}/result/create',['as' => 'school.class.result.create', 'uses' => 'ResultsController@create']);
	Route::post('school/{school_id}/class/{class_id}/result/store',['as' => 'school.class.result.store', 'uses' => 'ResultsController@store']);

	Route::get('school/{school_id}/class/{class_id}/result/final',['as' => 'school.class.result.final', 'uses' => 'ResultsController@finalResult']);

	Route::get('school/{school_id}/class/{class_id}/result/{result_id}/edit',['as' => 'school.class.result.edit', 'uses' => 'ResultsController@edit']);
	
	Route::post('school/{school_id}/class/{class_id}/result/{result_id}/upgrade',['as' => 'school.class.result.upgrade', 'uses' => 'ResultsController@upgrade']);

	Route::get('school/{school_id}/class/{class_id}/result/{result_id}',['as' => 'school.class.result.show', 'uses' => 'ResultsController@show']);

	Route::post('school/{school_id}/class/{class_id}/result/{result_id}/file',['as' => 'school.class.result.file', 'uses' => 'ResultsController@file']);

	Route::post('school/{school_id}/class/{class_id}/result/{result_id}/update/{student_id}',['as' => 'school.class.result.update', 'uses' => 'ResultsController@update']);

	Route::get('school/{school_id}/class/{class_id}/result/{result_id}/delete',['as' => 'school.class.result.delete', 'uses' => 'ResultsController@destroy']);

	Route::get('school/{school_id}/class/{class_id}/result/{result_id}/approve',['as' => 'school.class.result.approve', 'uses' => 'ResultsController@approve']);



	//laboratories routes
	Route::get('school/{school_id}/laboratory',['as' => 'school.lab', 'uses' => 'LaboratoryController@index']);
	Route::get('school/{school_id}/laboratory/create',['as' => 'school.lab.create', 'uses' => 'LaboratoryController@create']);
	Route::post('school/{school_id}/laboratory/create',['as' => 'school.lab.store', 'uses' => 'LaboratoryController@store']);
	Route::get('school/{school_id}/laboratory/{lab_id}/show',['as' => 'school.lab.show', 'uses' => 'LaboratoryController@show']);
	Route::get('school/{school_id}/laboratory/{lab_id}/edit',['as' => 'school.lab.edit', 'uses' => 'LaboratoryController@edit']);
	Route::put('school/{school_id}/laboratory/{lab_id}/edit',['as' => 'school.lab.update', 'uses' => 'LaboratoryController@update']);	
	Route::get('school/{school_id}/laboratory/{lab_id}/delete',['as' => 'school.lab.delete', 'uses' => 'LaboratoryController@destroy']);
	//lab photos
	Route::get('school/{school_id}/laboratory/{lab_id}/photos',['as' => 'school.lab.photos', 'uses' => 'LaboratoryController@photos']);
	Route::post('school/{school_id}/laboratory/{lab_id}/photos/add',['as' => 'school.lab.photos.add', 'uses' => 'LaboratoryController@addPhoto']);
	Route::get('school/{school_id}/laboratory/{lab_id}/photos/{photo_id}/delete',['as' => 'school.lab.photos.delete', 'uses' => 'LaboratoryController@deletePhoto']);

	//stuffs module
	Route::get('school/{school_id}/staff/select',['as' => 'school.staff.select','uses' =>'StaffsController@select']);
	Route::get('school/{school_id}/staff/{type}',['as' => 'school.staff','uses' =>'StaffsController@index']);
	Route::get('school/{school_id}/staff/{type}/create',['as' => 'school.staff.create','uses' =>'StaffsController@create']);
	Route::post('school/{school_id}/staff/{type}/store',['as' => 'school.staff.store','uses' =>'StaffsController@store']);
	Route::get('school/{school_id}/staff/{staff_id}/edit',['as' => 'school.staff.edit','uses' =>'StaffsController@edit']);
	Route::put('school/{school_id}/staff/{staff_id}/edit',['as' => 'school.staff.update','uses' =>'StaffsController@update']);
	Route::get('school/{school_id}/staff/{staff_id}/delete',['as' => 'school.staff.delete','uses' =>'StaffsController@destroy']);

	//FO/NI CRD
	Route::get('school/{school_id}/foni', array('as' => 'school.foni', 'uses' => 'SchoolFilesController@foni'));
	Route::get('school/{school_id}/foni/create', array('as' => 'school.foni.create', 'uses' => 'SchoolFilesController@createFONI'));
	Route::post('school/{school_id}/foni/create', array('as' => 'school.foni.store', 'uses' => 'SchoolFilesController@storeFONI'));
	Route::get('school/{school_id}/foni/{id}/delete', array('as' => 'school.foni.delete', 'uses' => 'SchoolFilesController@deleteFONI'));

	//Special Instructions CRD
	Route::get('school/{school_id}/si', array('as' => 'school.tm', 'uses' => 'SchoolFilesController@tm'));
	Route::get('school/{school_id}/si/create', array('as' => 'school.tm.create', 'uses' => 'SchoolFilesController@createTM'));
	Route::post('school/{school_id}/si/create', array('as' => 'school.tm.store', 'uses' => 'SchoolFilesController@storeTM'));
	Route::get('school/{school_id}/si/{id}/delete', array('as' => 'school.tm.delete', 'uses' => 'SchoolFilesController@deleteTM'));

	//Correspondences CRD
	Route::get('school/{school_id}/cor', array('as' => 'school.cor', 'uses' => 'SchoolFilesController@cor'));
	Route::get('school/{school_id}/cor/create', array('as' => 'school.cor.create', 'uses' => 'SchoolFilesController@createCor'));
	Route::post('school/{school_id}/cor/create', array('as' => 'school.cor.store', 'uses' => 'SchoolFilesController@storeCOR'));
	Route::get('school/{school_id}/cor/{id}/delete', array('as' => 'school.cor.delete', 'uses' => 'SchoolFilesController@deleteCOR'));

});