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
	$matter_user=Auth::user();
	return view('permission.noPermission', compact('matter_user'));
});
Route::get('/ReporteArea', ['as'=>'report.area','uses'=>'DownloadController@adminArea']);

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
	
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/Users/upDate/{slug}',['as'=>'Users.up_date','uses'=>'UsersController@update']);

	Route::get('/Area/{id}','AreaController@show');
//Admin
	Route::group(['middleware'=>['authen','rol'],'rol_id'=>['0']],function(){

		//-------------------------------------------API------------------------------------------------------------------
		Route::apiResource('/University','UniversityController',['parameters'=>['University'=>'slug']]);
		Route::apiResource('/Areas','AreaController',['parameters'=>['Areas'=>'slug']]);
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
		Route::get('/Students/upDate/{slug}',['as'=>'Student.up_date','uses'=>'UsersController@Supdate']);

		//------------------------------------------endUPDATE------------------------------------------------------------------


		//--------------------------------------------SHOW---------------------------------------------------------------------
		Route::get('/MattersCareer/Show/{slug}',['as'=>'MattersCareer.show', 'uses'=>'CareerController@MatterCareerShow']);
		Route::get('/MatterUsersCareer/Show/{slug}',['as'=>'MatterUserCareer.show', 'uses'=>'UsersController@showTeacher']);
		Route::get('/Profile/Student/Show/{slug}',['as'=>'Profile.show', 'uses'=>'UsersController@showStudent']);
		Route::get('/Profile/Teacher/Show/{slug}',['as'=>'Profile.Teacher.show', 'uses'=>'TeacherController@show']);
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
	Route::group(['middleware'=>['authen','rol'],'rol'=>['1','0']],function(){
		//middleware de verificacion por el admin
		Route::group(['middleware'=>['matter_user']],function(){
			
			

			//middleware de verificacion que solo sea el coordinado quien carge los contenidos
			Route::group(['middleware'=>['teacher_roles']],function(){

				Route::apiResource('/Contents','ContentController',['parameters'=>['Contents'=>'slug']]);
				Route::apiResource('/MatterUser','MatterUserController',['parameters'=>['MatterUser'=>'slug'],'only'=>['index','update']]);
				Route::get('/Matter/Asignar',['as'=>'Matter.asignar.index','uses'=>'MatterController@asignarIndex']);
				Route::get('/seacherTeacher/{dni}','MatterUserController@search');
				Route::get('/Matter/Asignar/{id}',['as'=>'Matter.asignar.teacher','uses'=>'MatterUserController@asignar']);
				Route::get('/Matter/Asignar/Delete/{id}',['as'=>'Matter.asignar.delete','uses'=>'MatterUserController@destroy']);

			});
						
			Route::get('/Matter',['as'=>'Matter.index','uses'=>'MatterController@index']);
			Route::get('/Matter/Show/{slug}',['as'=>'Matter.show','uses'=>'MatterController@show']);
			Route::get('/Matter/Edit/{slug}',['as'=>'Matter.edit','uses'=>'MatterController@edit']);
				
			Route::get('/Matters/upDate/{slug}',['as'=>'Matters.up_date','uses'=>'MatterController@update']);
			
			Route::get('/Contents/{slug}', ['as'=>'Contents.show','uses'=>'ContentController@show']);
			Route::get('/Contents/upDate/{slug}',['as'=>'Contents.up_date','uses'=>'ContentController@update']);
			Route::get('/Contents/Delete/{slug}',['as'=>'Contents.delete', 'uses'=>'ContentController@destroy'] );
			
			Route::apiResource('/MatterUser','MatterUserController',['only'=>['store']]);
			
			Route::get('/Area/Show/{id}',['as'=>'Area.show','uses'=>'AreaController@show']);
			Route::get('/Career/Show/{id}',['as'=>'Career.show','uses'=>'CareerController@show']);
			Route::get('/Matter/Show/{id}',['as'=>'Matter.show','uses'=>'MatterController@showTwo']);

		});
		

	});

//Estudiasnte 
	Route::group(['middleware'=>['authen','rol'],'rol'=>['2']],function(){
		Route::get('/Download/{slug}',['as'=>'Download.index','uses'=>'DownloadController@index']);
	});

});