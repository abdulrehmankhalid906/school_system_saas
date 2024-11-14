<?php

use App\Http\Controllers\CommonController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\SubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return Redirect::to('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function(){

    Route::get('/profile',[CommonController::class, 'basic_profile'])->name('profile.index');
    Route::post('/profile-manage',[CommonController::class, 'basic_profile_update'])->name('profile.manage');

    Route::get('/school',[CommonController::class, 'basic_school'])->name('school.index');
    Route::post('/school-manage',[CommonController::class, 'basic_school_update'])->name('school.manage');

    Route::resources([
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'subjects' => SubjectController::class,
        'site' => SiteController::class,
    ]);
});

Route::fallback(function(){
    return Redirect::to('/home');
});

