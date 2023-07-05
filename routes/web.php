<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TowerController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\ScheduleController;

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
Route::get('/', [LoginController::class,'showLoginForm'])->name('login');


Route::get('login', [LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);
// Route::post('register', [RegisterController::class,'register']);

Route::get('password/forget',  function () { 
	return view('pages.forgot-password'); 
})->name('password.forget');
Route::post('password/email', [ForgotPasswordController::class,'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class,'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class,'reset'])->name('password.update');


Route::group(['middleware' => 'auth'], function(){
	// logout route
	Route::get('/logout', [LoginController::class,'logout']);
	Route::get('/clear-cache', [HomeController::class,'clearCache']);

	// dashboard route  
	// Route::get('/dashboard', function () { 
	// 	return view('pages.dashboard'); 
	// })->name('dashboard');
	Route::get('/dashboard', [TowerController::class,'dashboard'])->name('dashboard');

	//only those have manage_user permission will get access
	Route::group(['middleware' => 'can:manage_user'], function(){
	Route::get('/users', [UserController::class,'index']);
	Route::get('/lines', [LineController::class,'index']);
	Route::get('/line', [LineController::class,'show']);
	Route::get('/tower', [TowerController::class,'show']);
	Route::get('/threshold', [TowerController::class,'showThreshold']);
	Route::post('/threshold/edit', [TowerController::class,'editThreshold'])->name('edit-threshold');
	Route::post('/line/create', [LineController::class,'storeLine'])->name('create-line');
	Route::get('/line/edit/{line}', [LineController::class,'edit'])->name('edit-line');
	Route::post('/line/update/{line}', [LineController::class,'update']);


	Route::get('/tower/edit/{tower}', [TowerController::class,'edit'])->name('edit-tower');
	Route::get('/recipients', [TowerController::class,'recipients']);
	Route::post('/add-recipients', [TowerController::class,'addRecipients'])->name('create-recipient');
	Route::get('/recipient/delete/{recipient}', [TowerController::class,'deleteRecipient']);
	Route::get('/email/schedule', [ScheduleController::class,'index']);
	Route::post('/email/storeSchedule', [ScheduleController::class,'store'])->name('create-schedule');
	Route::get('/email/schedule/delete/{schedule}', [ScheduleController::class,'destroy']);

	Route::post('/tower/update/{tower}', [TowerController::class,'update']);
	Route::get('/towers', [TowerController::class,'index']);
	Route::post('/tower/create', [TowerController::class,'store'])->name('create-tower');
	Route::get('/get-prev-tower', [TowerController::class, 'getPrevTower'])->name('get-prev-tower');
	Route::get('/user/get-list', [UserController::class,'getUserList']);
	Route::get('/line/get-list', [LineController::class,'getLineList']);
	Route::get('/tower/get-list', [TowerController::class,'getTowerList']);
	Route::get('/recipient/get-list', [TowerController::class,'getRecipientList']);
		Route::get('/user/create', [UserController::class,'create']);
		Route::post('/user/create', [UserController::class,'store'])->name('create-user');
		Route::get('/user/{id}', [UserController::class,'edit']);
		Route::post('/user/update', [UserController::class,'update']);
		Route::get('/user/delete/{id}', [UserController::class,'delete']);
	});

	//only those have manage_role permission will get access
	Route::group(['middleware' => 'can:manage_role|manage_user'], function(){
		Route::get('/roles', [RolesController::class,'index']);
		Route::get('/role/get-list', [RolesController::class,'getRoleList']);
		Route::post('/role/create', [RolesController::class,'create']);
		Route::get('/role/edit/{id}', [RolesController::class,'edit']);
		Route::post('/role/update', [RolesController::class,'update']);
		Route::get('/role/delete/{id}', [RolesController::class,'delete']);
	});


	//only those have manage_permission permission will get access
	Route::group(['middleware' => 'can:manage_permission|manage_user'], function(){
		Route::get('/permission', [PermissionController::class,'index']);
		Route::get('/permission/get-list', [PermissionController::class,'getPermissionList']);
		Route::post('/permission/create', [PermissionController::class,'create']);
		Route::get('/permission/update', [PermissionController::class,'update']);
		Route::get('/permission/delete/{id}', [PermissionController::class,'delete']);
	});

	// get permissions
	Route::get('get-role-permissions-badge', [PermissionController::class,'getPermissionBadgeByRole']);


});


//Route::get('/register', function () { return view('pages.register'); });