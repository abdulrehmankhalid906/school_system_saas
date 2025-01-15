<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\TimeTableController;
use App\Models\TimeTable;

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

// Route::get('/migrate-fresh', function(){
//     Artisan::call('optimize:clear');
//     Artisan::call('migrate:fresh --seed');
// });

Route::get('/migrate', function(){
    Artisan::call('migrate');
});

Route::get('/optimize', function(){
    Artisan::call('optimize');
});

Route::get('/', function () {
    return Redirect::to('/home');
});

// Route::fallback(function(){
//     return Redirect::to('/home');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function(){

    Route::get('/profile',[CommonController::class, 'basicDetails'])->name('profile.index');
    Route::post('/profile-manage',[CommonController::class, 'updateBasicDetails'])->name('profile.manage');
    Route::put('/update-password',[CommonController::class, 'updatePassword'])->name('update.password');

    Route::get('/school',[CommonController::class, 'basicSchoolDetails'])->name('school.index');
    Route::post('/school-manage',[CommonController::class, 'updateSchoolDetails'])->name('school.manage');
    Route::post('/manage-school-fee',[CommonController::class, 'manageSchoolFee'])->name('manage.school.fee');

    //Manage Classes + Sections
    Route::get('/manage-sections/{class_id}/{section_id?}',[ClassController::class, 'manageSection'])->name('manage.sections');
    Route::post('/sections-manage',[ClassController::class, 'Sectionmanage'])->name('sections.manage');

    Route::get('/parents',[UserController::class,'allParents'])->name('index.parents');
    Route::post('/store-parent',[UserController::class,'createParent'])->name('store.parents');

    Route::get('/get-sections',[StudentController::class,'getSections'])->name('get.Section');

    //Get Students
    Route::get('/get-students', [StudentController::class, 'getStudents'])->name('get.students');

    //Attendence
    Route::get('/get-attendence',[AttendenceController::class,'index'])->name('get.attendence');
    Route::get('/get-attendence-students',[AttendenceController::class,'getAttendenceStudent'])->name('get.attendence.student');
    Route::post('/submit-attendance', [AttendenceController::class, 'submitAttendance'])->name('submit.attendence');
    Route::get('/show-attendance', [AttendenceController::class, 'showAttendance'])->name('show.attendence');

    //Generate Fee
    Route::get('/generate-fee',[FeeController::class,'index'])->name('generate.fee');
    Route::post('/generate-fee',[FeeController::class,'generateFee'])->name('generate.fees');

    //Teacher Permissions Attendance + Marks
    Route::get('/get-teacher-attendance',[TeacherController::class,'getTeacherAttendance'])->name('get.teacher.attendence');
    Route::post('/mark-teacher-attendance',[TeacherController::class,'markTeacherAttendance'])->name('mark.teacher.attendence');
    Route::get('/teacher-permissions/{id}',[TeacherController::class,'mangeTeacherPermission'])->name('teacher.permissions');
    Route::post('/store-teacher-permissions',[TeacherController::class,'storeTeacherPermission'])->name('store.teacher.permissions');

    //Testng Send SMS
    Route::post('/send-sms', [AttendenceController::class,'sendSMS'])->name('send.sms');

    //Exams + Grades
    Route::get('manage-exams/{id?}',[ExamController::class,'addEditExam'])->name('manage.exam');

    //School User Notifications
    Route::get('/school-notificaions', [NotificationController::class, 'schoolUserNotifications'])->name('school.notifications');

    //Fees + Payment + installments
    Route::post('/single-fee-store', [FeeController::class,'singleFeeStore'])->name('single-fee-store');
    Route::get('/fee-history/{id}',[FeeController::class, 'feeHistory'])->name('fees.history');
    Route::post('/fee-payment',[FeeController::class, 'feesPayment'])->name('fees.payment');

    //Permissions
    Route::get('/assign-permission/{id}', [RoleController::class, 'assignRolePermissions'])->name('role.assign.permission');
    Route::post('/assign-permission/{id}', [RoleController::class, 'updateRolePermissions'])->name('role.update.permission');

    Route::get('/student-bulk',[StudentController::class,'studentBulk'])->name('students.bulkcreate');
    // Route::post('/student-bulk-store',[StudentController::class,'storeBulkStudents'])->name('store.bulk.students');

    //Imports
    route::post('/import-subjects', [SubjectController::class,'bulkImportSubject'])->name('imports.subjects');

    Route::resources([
        'users' => UserController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'schools' => SchoolController::class,
        'exams' => ExamController::class,
        'fees' => FeeController::class,
        'subjects' => SubjectController::class,
        'classes' => ClassController::class,
        'students' => StudentController::class,
        'teachers' => TeacherController::class,
        'timetables' => TimeTableController::class,
        'notifications' => NotificationController::class,
        'expenses' => ExpenseController::class,
        'site' => SiteController::class,
    ]);
});


