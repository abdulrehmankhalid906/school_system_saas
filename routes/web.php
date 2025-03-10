<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FeeController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CommonController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimeTableController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\SubscriptionController;

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

Route::get('/make-fresh-migrate', function(){
    Artisan::call('optimize:clear');
    Artisan::call('migrate:fresh --seed');
});

Route::get('/make-update-migrate', function(){
    Artisan::call('migrate');
});

// Route::get('/optimize', function(){
//     Artisan::call('optimize');
// });

Route::get('/', function () {
    return Redirect::to('/home');
});

Route::fallback(function(){
    return Redirect::to('/home');
});

Auth::routes();

Route::middleware(['auth'])->group(function(){

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/profile',[CommonController::class, 'basicDetails'])->name('profile.index');
    Route::post('/profile-manage',[CommonController::class, 'updateBasicDetails'])->name('profile.manage');
    Route::put('/update-password',[CommonController::class, 'updatePassword'])->name('update.password');

    // Route::middleware(['checkPayment'])->group(function(){
    Route::get('/school',[CommonController::class, 'basicSchoolDetails'])->name('school.index');
    Route::post('/school-manage',[CommonController::class, 'updateSchoolDetails'])->name('school.manage');
    Route::post('/manage-school-fee',[CommonController::class, 'manageSchoolFee'])->name('manage.school.fee');

    //Manage Classes + Sections
    Route::get('/manage-sections/{class_id}/{section_id?}',[ClassController::class, 'manageSection'])->name('manage.sections');
    Route::post('/sections-manage',[ClassController::class, 'Sectionmanage'])->name('sections.manage');

    Route::get('/get-sections',[StudentController::class,'getSections'])->name('get.Section');

    //Get Students
    Route::get('/get-students', [StudentController::class, 'getStudents'])->name('get.students');

    //Student Attendence
    Route::get('/mark-attendance',[AttendenceController::class,'index'])->name('get.attendence');
    Route::get('/get-attendence-students',[AttendenceController::class,'getAttendenceStudent'])->name('get.attendence.student');
    Route::post('/submit-attendance', [AttendenceController::class, 'submitAttendance'])->name('submit.attendence');
    Route::get('/show-attendance', [AttendenceController::class, 'showAttendance'])->name('show.attendence');

    //Generate Fee
    Route::get('/generate-fee',[FeeController::class,'index'])->name('generate.fee');
    Route::post('/generate-fee',[FeeController::class,'generateFee'])->name('generate.fees');

    //Teacher Permissions Attendance + Marks
    Route::get('/teacher-attendance',[TeacherController::class,'getTeacherAttendance'])->name('get.teacher.attendence');
    Route::post('/mark-teacher-attendance',[TeacherController::class,'markTeacherAttendance'])->name('mark.teacher.attendence');
    Route::get('/teacher-permissions/{id}',[TeacherController::class,'mangeTeacherPermission'])->name('teacher.permissions');
    Route::post('/store-teacher-permissions',[TeacherController::class,'storeTeacherPermission'])->name('store.teacher.permissions');

    //Testng Send SMS
    Route::post('/send-sms', [AttendenceController::class,'sendSMS'])->name('send.sms');

    //Exams + Grades
    Route::get('manage-exams/{id?}',[ExamController::class,'addEditExam'])->name('manage.exam');

    //Fees + Payment + installments
    Route::post('/single-fee-store', [FeeController::class,'singleFeeStore'])->name('single-fee-store');
    Route::get('/fee-history/{id}',[FeeController::class, 'feeHistory'])->name('fees.history');
    Route::post('/fee-payment',[FeeController::class, 'feesPayment'])->name('fees.payment');

    //School Payment + Billing History
    Route::get('/subscription-history', [SchoolController::class, 'billingHistory'])->name('subscription.history');

    //Permissions
    Route::get('/assign-permission/{id}', [RoleController::class, 'assignRolePermissions'])->name('role.assign.permission');
    Route::post('/assign-permission/{id}', [RoleController::class, 'updateRolePermissions'])->name('role.update.permission');

    //Bulk Imports
    Route::post('/import-subjects', [SubjectController::class,'bulkImportSubject'])->name('imports.subjects');
    Route::post('/bulk-import-teachers', [TeacherController::class, 'bulkImportTeacher'])->name('bulk.import.teacher');
    Route::post('/bulk-import-students', [StudentController::class, 'bulkImportStudent'])->name('bulk.import.student');

    //Notification System
    Route::get('/school-notificaions', [NotificationController::class, 'schoolUserNotifications'])->name('school.notifications');
    Route::post('/send-notifications', [NotificationController::class, 'sendNotifications'])->name('send.notifictions');
    Route::delete('/delete-notification/{id}', [NotificationController::class, 'deleteNotification'])->name('delete.notification');

    Route::resources([
        'users' => UserController::class,
        'roles' => RoleController::class,
        'permissions' => PermissionController::class,
        'schools' => SchoolController::class,
        'parents' => ParentController::class,
        'exams' => ExamController::class,
        'fees' => FeeController::class,
        'subjects' => SubjectController::class,
        'classes' => ClassController::class,
        'students' => StudentController::class,
        'teachers' => TeacherController::class,
        'timetables' => TimeTableController::class,
        'grades' => GradeController::class,
        'notifications' => NotificationController::class,
        'expenses' => ExpenseController::class,
        'subscriptions' => SubscriptionController::class,
    ]);
    // });
});
