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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

//App User
Route::get('/AppUsers', [App\Http\Controllers\AppUsersController::class, 'index'])->name('AppUsers');
Route::get('/ViewAddUser', [App\Http\Controllers\AppUsersController::class, 'ViewAddUser'])->name('View.Add.User');
Route::post('/AddUser', [App\Http\Controllers\AppUsersController::class, 'AddUser'])->name('Add.User');
Route::post('/AddUserRegister', [App\Http\Controllers\AppUsersController::class, 'AddUserRegister'])->name('Add.User.Register');
Route::get('/ViewEditUser/{id}', [App\Http\Controllers\AppUsersController::class, 'ViewEditUser'])->name('View.Edit.User');
Route::post('/EditUser', [App\Http\Controllers\AppUsersController::class, 'EditUser'])->name('Edit.User');
Route::post('/DeleteUser', [App\Http\Controllers\AppUsersController::class, 'DeleteUser'])->name('Delete.User');
Route::post('/LoginUser', [App\Http\Controllers\AppUsersController::class, 'LoginUser'])->name('Login.User');
Route::get('/LoginApi/{id}', [App\Http\Controllers\AppUsersController::class, 'LoginApi'])->name('Login.Api');

// Admin
Route::get('/Admins', [App\Http\Controllers\AppUsersController::class, 'ViewAdmins'])->name('Admins');
Route::get('/ViewAddAdmins', [App\Http\Controllers\AppUsersController::class, 'ViewAddAdmins'])->name('View.Add.Admins');
Route::post('/AddAdmin', [App\Http\Controllers\AppUsersController::class, 'AddAdmin'])->name('Add.Admin');
Route::get('/ViewEditAdmin/{id}', [App\Http\Controllers\AppUsersController::class, 'ViewEditAdmin'])->name('View.Edit.Admin');
Route::post('/EditAdmin', [App\Http\Controllers\AppUsersController::class, 'EditAdmin'])->name('Edit.Admin');
Route::post('/AdminPassword', [App\Http\Controllers\AppUsersController::class, 'AdminPassword'])->name('Admin.Password');



//Chat
Route::get('/Chat', [App\Http\Controllers\ChatController::class, 'index'])->name('Chat');
Route::get('/ViewChat/{id?}/{consultant_id?}', [App\Http\Controllers\ChatController::class, 'ViewChat'])->name('View.Chat');
Route::get('/ViewChat2/{id_two?}', [App\Http\Controllers\ChatController::class, 'ViewChat2'])->name('View.Chat2');





//Consultant 
Route::get('/Consultant', [App\Http\Controllers\ConsultantController::class, 'index'])->name('Consultant');
Route::get('/ViewAddConsultant', [App\Http\Controllers\ConsultantController::class, 'ViewAddConsultant'])->name('View.Add.Consultant');
Route::post('/AddConsultant', [App\Http\Controllers\ConsultantController::class, 'AddConsultant'])->name('Add.Consultant');
Route::get('/ViewEditConsultant/{id}', [App\Http\Controllers\ConsultantController::class, 'ViewEditConsultant'])->name('View.Edit.Consultant');
Route::post('/EditConsultant', [App\Http\Controllers\ConsultantController::class, 'EditConsultant'])->name('Edit.Consultant');
Route::post('/DeleteConsultant', [App\Http\Controllers\ConsultantController::class, 'DeleteConsultant'])->name('Delete.Consultant');


// Cases
Route::get('/Cases', [App\Http\Controllers\CasesController::class, 'index'])->name('Cases');
Route::post('/GetSummary', [App\Http\Controllers\CasesController::class, 'GetSummary'])->name('Get.Summary'); 
Route::get('/GetCaseConsultant/{id}/{type?}', [App\Http\Controllers\CasesController::class, 'GetCaseConsultant'])->name('Get.Case.Consultant');
Route::post('/EditCaseConsultant', [App\Http\Controllers\CasesController::class, 'EditCaseConsultant'])->name('Edit.Case.Consultant');
Route::post('/DeleteCaseConsultant', [App\Http\Controllers\CasesController::class, 'DeleteCaseConsultant'])->name('Delete.Case.Consultant');


// Route Consultent Admin panel
Route::get('/GetConsultentCase', [App\Http\Controllers\ConsultantController::class, 'GetConsultentCaseAdmin'])->name('Get.Consultent.Case.Admin');
Route::get('/ViewReport/{patient_Fk}/{consalutant_Fk}', [App\Http\Controllers\ConsultantController::class, 'ViewReport'])->name('View.Report');
Route::post('/EditCaseReport', [App\Http\Controllers\ConsultantController::class, 'EditCaseReport'])->name('Edit.Case.Report');
Route::get('/AssignedCasesAdmin', [App\Http\Controllers\ConsultantController::class, 'AssignedCasesAdmin'])->name('Assigned.Cases.Consultant');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::post('/GetSummary', [App\Http\Controllers\HomeController::class, 'GetSummary'])->name('Get.Summary'); 
//Route::get('/GetCaseConsultant/{id}', [App\Http\Controllers\HomeController::class, 'GetCaseConsultant'])->name('Get.Case.Consultant');
//Route::post('/EditCaseConsultant', [App\Http\Controllers\HomeController::class, 'EditCaseConsultant'])->name('Edit.Case.Consultant');
//Route::post('/DeleteCaseConsultant', [App\Http\Controllers\HomeController::class, 'DeleteCaseConsultant'])->name('Delete.Case.Consultant');


//theme
Route::get('/ViewMainPage', [App\Http\Controllers\PataintController::class, 'ViewMainPage'])->name('ViewMainPage');
Route::get('/ViewAbout', [App\Http\Controllers\PataintController::class, 'ViewAbout'])->name('ViewAbout');
Route::get('/ViewContact', [App\Http\Controllers\PataintController::class, 'ViewContact'])->name('ViewContact');
Route::get('/ViewQuestion', [App\Http\Controllers\PataintController::class, 'ViewQuestion'])->name('ViewQuestion');
Route::get('/ViewArtical', [App\Http\Controllers\PataintController::class, 'ViewArtical'])->name('ViewArtical');
Route::get('/ViewTeam', [App\Http\Controllers\PataintController::class, 'ViewTeam'])->name('ViewTeam');
Route::get('/RegisterPataint', [App\Http\Controllers\PataintController::class, 'RegisterPataint'])->name('RegisterPataint');
Route::get('/UserMainHome', [App\Http\Controllers\PataintController::class, 'UserMainHome'])->name('User.Main.Home');
Route::post('/AddPatintCase', [App\Http\Controllers\PataintController::class, 'AddPatintCase'])->name('Add.Patint.Case');
Route::get('/LogOutPatint', [App\Http\Controllers\PataintController::class, 'LogOutPatint'])->name('Log.Out.Patint');
Route::post('/CheckStuts', [App\Http\Controllers\PataintController::class, 'CheckStuts'])->name('Check.Stuts');
Route::post('/ResetPassword', [App\Http\Controllers\PataintController::class, 'ResetPassword'])->name('Reset.Password');
Route::get('/ViewResetPassword/{id}', [App\Http\Controllers\PataintController::class, 'ViewResetPassword'])->name('View.Reset.Password');
Route::post('/PatintResetPassword', [App\Http\Controllers\PataintController::class, 'PatintResetPassword'])->name('Patint.Reset.Password');





Auth::routes();



Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	 Route::get('map', function () {return view('pages.maps');})->name('map');
	 Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	 Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});


