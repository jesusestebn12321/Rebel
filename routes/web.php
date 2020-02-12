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
use Equivalencias\Career;

Route::get('/', function () {
	return view('auth.login');
});

Auth::routes();

Route::get('/Chart', 'HomeController@chart');

Route::get('/noPermission', function () {
	$matter_user=Auth::user();
	return view('permission.noPermission', compact('matter_user'));
});

Route::get('/ErrorContent/{id}', ['as'=>'content.error','uses'=>'ContentController@error']);


Route::get('/CareerPublic/{slug}','DownloadController@CareerPublic');
Route::get('/DownloadPublic',['as'=>'download.public','uses'=>'DownloadController@ContentPublic']);

Route::get('/Verify',['as'=>'verifi','uses'=>'VerifiController@index']); // rutas de verificacion de email
Route::get('/AdminVerify',['as'=>'admin-verify','uses'=>'VerifiController@AdminVerifyIndex']); // rutas de verificacion por admin index
Route::get('/register/verify/{code}','VerifiController@verify'); // rutas de verificacion de email

Route::group(['middleware'=>['verifiUser']],function(){

	Route::get('/Profile',['as'=>'profile-index','uses'=>'UsersController@profile']);
	Route::get('/Profile/upDate',['as'=>'profile.upData', 'uses'=>'ProfileController@update'] );
	
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/Users/upDate/{slug}',['as'=>'Users.up_date','uses'=>'UsersController@update']);

	Route::get('/Area/{id}','AreaController@show');
//Admin
	Route::group(['middleware'=>['authen','rol'],'rol_id'=>['1']],function(){

		Route::get('/telescope', ['uses'=>'\Laravel\Telescope\Http\Controllers\HomeController@index ']);

		//--------------------------------REPORTES------------------------------------
		
		
		Route::get('/VerificarEquivalencia/{slug}', 'VerifiController@verifyEquivalencia');
		
		Route::get('/ReporteArea', ['as'=>'report.area','uses'=>'DownloadController@adminArea']);

		Route::get('/ReporteCareer', ['as'=>'report.career','uses'=>'DownloadController@adminCareer']);

		Route::get('/ReporteTeacher', ['as'=>'report.teacher','uses'=>'DownloadController@adminTeacher']);

		Route::get('/ReporteMatter', ['as'=>'report.matter','uses'=>'DownloadController@adminMatter']);

		//--------------------------------------------------------------------


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
		Route::get('/University/Delete/{slug}',['as'=>'University.delete', 'uses'=>'UniversityController@delete'] );
		Route::get('/Contents/Delete/{slug}',['as'=>'Contents.delete', 'uses'=>'ContentController@destroy'] );
		Route::get('/Matters/delete/{slug}',['as'=>'Matters.delete','uses'=>'MatterController@destroy']);
		Route::get('/Career/Delete/{slug}',['as'=>'Careers.delete', 'uses'=>'CareerController@delete'] );

			//------------------------------------------endDESTROY----------------------------------------------------------

		Route::get('/Teacher',['as'=>'Teacher.index','uses'=>'TeacherController@index']);
		Route::get('/AdminVerify/{slug}',['as'=>'admin.verify','uses'=>'VerifiController@AdminVerify']);

		Route::get('/Coordinador',['as'=>'coordinador.index','uses'=>'TeacherController@indexCoordinador']);

		Route::get('/RemoverCargo/{slug}',['as'=>'coordinador.remove','uses'=>'TeacherController@coordinadorRemove']);

		Route::get('/CoordinadorAdd',['as'=>'coordinador.add','uses'=>'TeacherController@coordinadorAdd']);
		
		Route::post('/MattersUsers/create',['as'=>'MattersTeacher.add','uses'=>'MatterUserController@add']);
		Route::get('/MattersUsers/search/{dni}','MatterUserController@search');

	});

//Profesores
	Route::group(['middleware'=>['authen','rol'],'rol'=>['1','2']],function(){
		//middleware de verificacion por el admin
		Route::group(['middleware'=>['matter_user']],function(){
			
			

			//middleware de verificacion que solo sea el coordinado quien carge los contenidos
			Route::group(['middleware'=>['teacher_roles']],function(){

				Route::apiResource('/Contents','ContentController',['parameters'=>['Contents'=>'slug']]);
				
				Route::get('/Contenido/Crear/{slug}',['as'=>'Contents.create','uses'=>'ContentController@create']);

				Route::post('/Contenido/Store',['as'=>'Contents.coordinador.store','uses'=>'ContentController@store']);

				Route::apiResource('/MatterUser','MatterUserController',['parameters'=>['MatterUser'=>'slug'],'only'=>['index','update']]);
				Route::get('/Matter/Asignar',['as'=>'Matter.asignar.index','uses'=>'MatterController@asignarIndex']);
				
				Route::get('/seacherTeacher/{dni}','MatterUserController@search');

				Route::get('/Matter/Asignar/{id}',['as'=>'Matter.asignar.teacher','uses'=>'MatterUserController@asignar']);
				Route::get('/Matter/Asignar/Delete/{id}',['as'=>'Matter.asignar.delete','uses'=>'MatterUserController@destroy']);

				Route::post('/Matter/RollBackContent',['as'=>'rollback','uses'=>'ContentController@VersionBack']);

				Route::get('/DownloadTeacherMatter/{slug}',['as'=>'reportTeacher.matter','uses'=>'DownloadController@teacherMatter']);
				
				Route::get('/Contents/Edit/{slug}', ['as'=>'Contents.edit','uses'=>'ContentController@edit']);
				
				Route::get('/Contents/upDate/{slug}',['as'=>'Contents.up_date','uses'=>'ContentController@update']);
				
				Route::get('/Contents/Delete/{slug}',['as'=>'Contents.delete', 'uses'=>'ContentController@destroy'] );
				
				Route::get('/Contents/UpdateStatus/{slug}',['as'=>'Contents.update_status', 'uses'=>'ContentController@update_status'] );
			});
					
			Route::get('/Matter',['as'=>'Matter.index','uses'=>'MatterController@index']);
			Route::get('/Matter/Show/{slug}',['as'=>'Matter.show','uses'=>'MatterController@show']);
			Route::get('/Matter/Edit/{slug}',['as'=>'Matter.edit','uses'=>'MatterController@edit']);
				
			Route::get('/Matters/upDate/{slug}',['as'=>'Matters.up_date','uses'=>'MatterController@update']);
			
			Route::get('/Contents/{slug}', ['as'=>'Contents.show','uses'=>'ContentController@show']);
			
			
			Route::apiResource('/MatterUser','MatterUserController',['only'=>['store']]);
			
			Route::get('/Area/Show/{id}',['as'=>'Area.show','uses'=>'AreaController@show']);
			Route::get('/Career/Show/{id}',['as'=>'Career.show','uses'=>'CareerController@show']);
			Route::get('/Matter/Show/{id}',['as'=>'Matter.show','uses'=>'MatterController@showTwo']);


			Route::get('/VerificarEquivalencia/{slug}', 'VerifiController@verifyEquivalencia');

		});
		

	});

//Estudiasnte 
	Route::group(['middleware'=>['authen','rol'],'rol'=>['3']],function(){
		Route::get('/Download/{slug}',['as'=>'Download.index','uses'=>'DownloadController@index']);

		Route::get('/DownloadEquivalencias/{slug}',['as'=>'equivalencia','uses'=>'DownloadController@equivalenciaStudents']);
		
		Route::get('/DownloadAllContent',['as'=>'all.content','uses'=>'DownloadController@search_content']);
	});

//AdminCurricular 
	Route::group(['middleware'=>['authen','rol'],'rol'=>['4']],function(){

		Route::get('/Contents/{slug}', ['as'=>'Contents.show','uses'=>'ContentController@show']);
		
		Route::post('/Matter/RollBackContent',['as'=>'rollback','uses'=>'ContentController@VersionBack']);
		

		Route::get('/Matter/Show/{slug}',['middleware'=>'OneContent','as'=>'Matters.show','uses'=>'MatterController@showAll']);

		Route::get('/Matter/Career/{slug}',['as'=>'Matters.index.show','uses'=>'CareerController@showMatter']);
		
		
		Route::get('/Verify/Content/{slug}',['as'=>'verify.content','uses'=>'adminCurricular@verify']);
		
		Route::get('/ContentVigente/{id}',['as'=>'content.vigente','uses'=>'adminCurricular@one_content']);
		
		Route::get('/Remove/Content/{slug}',['as'=>'remove.content','uses'=>'adminCurricular@remove']);
		Route::get('/Matters',['as'=>'Matters.index','uses'=>'MatterController@index']);


		Route::get('/VerificarEquivalencia/{slug}', 'VerifiController@verifyEquivalencia');

	});


});