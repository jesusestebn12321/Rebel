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

// rama master  
use Equivalencias\Career;
Route::get('/Chart', 'HomeController@chart');

Route::get('/noPermission', function () {	
	return view('permission.noPermission');
});

Route::get('/', function () {
	return view('auth.login');
});
Route::get('/Verifi',['as'=>'verifi','uses'=>'VerifiController@index']); // rutas de verificacion de email
Route::get('/AdminVerify',['as'=>'admin-verify','uses'=>'VerifiController@AdminVerifyIndex']); // rutas de verificacion por admin index
Route::get('/register/verify/{code}','VerifiController@verify'); // rutas de verificacion de email
Auth::routes();

Route::group(['middleware'=>['verifiUser']],function(){

	Route::get('/Profile',['as'=>'profile-index','uses'=>'UsersController@profile']);
	Route::get('/Profile/upDate',['as'=>'profile.upData', 'uses'=>'ProfileController@update'] );
	
	Route::get('/Profile/User/upDate',['as'=>'User.up_date', 'uses'=>'UsersController@update'] );

	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/Area/{id}','AreaController@show');
//Admin
	Route::group(['middleware'=>['authen','rol'],'rol'=>['0']],function(){

//-------------------------------------------API------------------------------------------------------------------
		Route::apiResource('/University','UniversityController',['parameters'=>['University'=>'slug']]);
		Route::apiResource('/Areas','AreaController',['parameters'=>['Areas'=>'slug']]);
		Route::apiResource('/Careers','CareerController',['parameters'=>['Careers'=>'slug']]);
		Route::apiResource('/Careers','CareerController',['parameters'=>['Careers'=>'slug']]);
		Route::apiResource('/Matters','MatterController',['parameters'=>['Matters'=>'slug']]);
		Route::apiResource('/Contents','ContentController',['parameters'=>['Contents'=>'slug']]);
		Route::apiResource('/Users','UsersController',['parameters'=>['Contents'=>'slug']]);
//-------------------------------------------endAPI------------------------------------------------------------------


//-------------------------------------------EDIT------------------------------------------------------------------
		Route::get('/Matters/edit/{slug}',['as'=>'Matters.edit','uses'=>'MatterController@edit']);
//-------------------------------------------UPDATE------------------------------------------------------------------

		Route::get('/Matters/upDate/{slug}',['as'=>'Matters.up_date','uses'=>'MatterController@update']);
		Route::get('/MattersAll/upDate/{slug}',['as'=>'Matters.up_date.all','uses'=>'MatterController@updateAll']);
		Route::get('/Contents/upDate/{slug}',['as'=>'Contents.up_date','uses'=>'ContentController@update']);

//------------------------------------------endUPDATE------------------------------------------------------------------


//--------------------------------------------SHOW---------------------------------------------------------------------
		Route::get('/MattersCareer/show/{slug}',['as'=>'MattersCareer.show', 'uses'=>'CareerController@MatterCareerShow']);
		Route::get('/MatterUsersCareer/show/{slug}',['as'=>'MatterUserCareer.show', 'uses'=>'UsersController@show']);
		Route::get('/Profile/show/{slug}',['as'=>'Profile.show', 'uses'=>'UsersController@showStudent']);
//------------------------------------------endSHOW---------------------------------------------------------------------


//------------------------------------------DESTROY----------------------------------------------------------
		Route::get('/User/Delete/{slug}',['as'=>'User.delete','uses'=>'UsersController@destroy']);
		Route::get('/Areas/Delete/{slug}',['as'=>'Areas.delete', 'uses'=>'AreaController@delete'] );
		Route::get('/Careers/Delete/{slug}',['as'=>'University.delete', 'uses'=>'UniversityController@delete'] );
		Route::get('/Contents/Delete/{slug}',['as'=>'Contents.delete', 'uses'=>'ContentController@destroy'] );
		Route::get('/Matters/delete/{slug}',['as'=>'Matters.delete','uses'=>'MatterController@destroy']);
		Route::get('/University/Delete/{slug}',['as'=>'Careers.delete', 'uses'=>'CareerController@delete'] );

//------------------------------------------endDESTROY----------------------------------------------------------

		Route::get('/Teacher',['as'=>'Teacher.index','uses'=>'TeacherController@index']);
		Route::get('/AdminVerify/{slug}',['as'=>'admin.verify','uses'=>'VerifiController@AdminVerify']);
		Route::POST('/MattersUsers/create',['as'=>'MattersTeacher.add','uses'=>'MatterUserController@add']);
		Route::get('/MattersUsers/search/{dni}','MatterUserController@search');

	});

//Profesores
	Route::group(['middleware'=>['authen','rol'],'rol'=>['1']],function(){
		//middleware de verificacion por el admin
		Route::group(['middleware'=>['matter_user']],function(){
			Route::apiResource('/Content','MatterController',['parameters'=>['Content'=>'slug']]);
			Route::apiResource('/Matter','MatterController',['parameters'=>['Matter'=>'slug']]);
			Route::apiResource('/MatterUser','MatterUserController',['parameters'=>['MatterUser'=>'slug'],'only'=>['index','update']]);

		});
		Route::apiResource('/MatterUser','MatterUserController',['only'=>['store']]);
		Route::get('/Area/Show/{id}',['as'=>'Area.show','uses'=>'AreaController@show']);
		Route::get('/Career/Show/{id}',['as'=>'Career.show','uses'=>'CareerController@show']);
		Route::get('/Matter/Show/{id}',['as'=>'Matter.show','uses'=>'MatterController@showTwo']);

	});

//Estudiasnte 
	Route::group(['middleware'=>['authen','rol'],'rol'=>['2']],function(){
		Route::get('/Download/{slug}',['as'=>'Download.index','uses'=>'DownloadController@index']);

	});

});