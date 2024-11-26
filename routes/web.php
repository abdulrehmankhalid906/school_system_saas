<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;

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

Route::fallback(function(){
    return Redirect::to('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function(){

    Route::get('/profile',[CommonController::class, 'basic_profile'])->name('profile.index');
    Route::post('/profile-manage',[CommonController::class, 'basic_profile_update'])->name('profile.manage');

    Route::get('/school',[CommonController::class, 'basic_school'])->name('school.index');
    Route::post('/school-manage',[CommonController::class, 'basic_school_update'])->name('school.manage');

    Route::post('/sections-manage',[ClassController::class, 'manageSection'])->name('sections.manage');

    Route::get('/parents',[UserController::class,'allParents'])->name('index.parents');
    Route::post('/store-parent',[UserController::class,'createParent'])->name('store.parents');

    Route::get('/get-sections',[StudentController::class,'getSections'])->name('get.Section');


    Route::get('/student-bulk',[StudentController::class,'studentBulk'])->name('students.bulkcreate');


    //Imports
    route::post('/import-subjects', [SubjectController::class,'bulkImportSubject'])->name('imports.subjects');

    Route::resources([
        'users' => UserController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'schools' => SchoolController::class,
        'subjects' => SubjectController::class,
        'classes' => ClassController::class,
        'students' => StudentController::class,
        'teachers' => TeacherController::class,
        'site' => SiteController::class,
    ]);
});


