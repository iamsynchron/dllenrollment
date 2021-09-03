<?php

use App\Http\Controllers\admin\AdminAnnouncementController;
use App\Http\Controllers\admin\AdminChangeSubController;
use App\Http\Controllers\admin\AdminCorReportController;
use App\Http\Controllers\admin\AdminDroppedStudController;
use App\Http\Controllers\admin\AdminEnrolledController;
use App\Http\Controllers\admin\AdminEnrollSettingsController;
use App\Http\Controllers\admin\AdminExcelReportController;
use App\Http\Controllers\admin\AdminIncompleteStudController;
use App\Http\Controllers\admin\AdminScheduleController;
use App\Http\Controllers\admin\AdminSectionReportController;
use App\Http\Controllers\admin\AdminStudAccController;
use App\Http\Controllers\admin\AdminStudSubController;
use App\Http\Controllers\admin\CreateAnnouncement;
use App\Http\Controllers\admin\IDNumberController;
use App\Http\Controllers\Auth\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\forms\AdditionalController;
use App\Http\Controllers\forms\ContactController;
use App\Http\Controllers\forms\EducationalOneController;
use App\Http\Controllers\forms\EducationalTwoController;
use App\Http\Controllers\forms\FamilyController;
use App\Http\Controllers\forms\PersonalController;
use App\Http\Controllers\student\SaveInfoController;
use App\Http\Controllers\student\SaveSubjectController;
use App\Http\Controllers\student\SignatureController;
use App\Http\Controllers\student\StudentProfileController;
use App\Http\Livewire\AdminDroppedStud;
use App\Http\Livewire\AdminStudAccount;
use App\Http\Livewire\AdminUpdateSub;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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

//Home
Route::get('/', function(){ return view('index'); })->name('studenthome');

//login
Route::get('/login', [LoginController::class, 'index'])->name('studentlogin');
Route::post('/login', [LoginController::class, 'authenticate']);

//logout
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

//Registration
Route::get('/register', [RegisterController::class, 'index'])->name('studentregister');
Route::post('/register', [RegisterController::class, 'store']);

//Dashboard Route
Route::group(['middleware' => ['auth']], function(){ Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); });



//Admin Dashboard Routes
Route::group(['middleware' => ['auth', 'role:admin']], function(){ 
    //Enroll Settings
    Route::get('/enroll-settings', [AdminEnrollSettingsController::class, 'index'])->name('enrollsettings');

    //Report
    Route::get('/excel-reports', [AdminExcelReportController::class, 'index'])->name('excelreport'); 
    Route::get('/excel-reports/COR', [AdminCorReportController::class, 'index'])->name('correport'); 
    Route::get('/excel-reports/section', [AdminSectionReportController::class, 'index'])->name('sectionreport'); 

    //Enrolled
    Route::get('/enrolled', [AdminEnrolledController::class, 'index'])->name('adminlist');
    Route::get('/enrolled/dropped', [AdminDroppedStudController::class, 'index'])->name('dropped'); 
    Route::get('/enrolled/incomplete', [AdminIncompleteStudController::class, 'index'])->name('incomplete'); 

    //Announcements
    Route::get('/announcements', [AdminAnnouncementController::class, 'index'])->name('announcement');
    Route::get('/announcements/create', [CreateAnnouncement::class, 'index'])->name('announcement-create');
    Route::post('/announcements/create', [CreateAnnouncement::class, 'store']);

    //Subjects Schedule
    Route::get('/schedule', [AdminScheduleController::class, 'index'])->name('schedule');

    //Student Accounts
    Route::get('/stud-accounts', [AdminStudAccController::class, 'index'])->name('accounts');
    Route::get('/stud-accounts/add', [IDNumberController::class, 'index'])->name('accounts-add');
    Route::post('/stud-accounts/add', [IDNumberController::class, 'store']);

    //Student Subjects
    Route::get('/stud-subjects', [AdminStudSubController::class, 'index'])->name('subjects');
    Route::get('/stud-subjects/update/{subid?}', AdminUpdateSub::class)->name('changesubjects');
});




//Reset Password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);
    
    
    
    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        //$request->all(),
        function ($user, $password) {
            
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();
            
            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('studentlogin')->with('statussuccess', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');





//Show Verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

//Verify Email
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

//Resend Email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');





//Student Dashboard Routes
Route::group(['middleware' => ['auth' ,'role:student']], function(){ 

    
    //Closed Enrollment
    Route::get('/closed', function(){ return view('errors.closedenroll'); })->name('closedenroll');

    //Forms Display with Controller
    Route::group(['middleware' => ['closedEnroll']], function(){ 
    Route::get('/enroll/information/personal', [PersonalController::class, 'index'])->name('formspersonal')->middleware('checkForms:studentpersonal');
    Route::get('/enroll/information/contact', [ContactController::class, 'index'])->name('formscontact')->middleware('checkForms:studentcontact');
    Route::get('/enroll/information/family', [FamilyController::class, 'index'])->name('formsfamily')->middleware('checkForms:studentfamily');
    Route::get('/enroll/information/additional', [AdditionalController::class, 'index'])->name('formsadditional')->middleware('checkForms:studentadditional');
    Route::get('/enroll/information/educational-one', [EducationalOneController::class, 'index'])->name('formseducone')->middleware('checkForms:studentschoolone');
    Route::get('/enroll/information/educational-two', [EducationalTwoController::class, 'index'])->name('formseductwo')->middleware('checkForms:studentschooltwo');
    });


    //Forms Post Store
    Route::post('/enroll/information/personal', [PersonalController::class, 'store']);
    Route::post('/enroll/information/contact', [ContactController::class, 'store']);
    Route::post('/enroll/information/family', [FamilyController::class, 'store']);
    Route::post('/enroll/information/additional', [AdditionalController::class, 'store']);
    Route::post('/enroll/information/educational-one', [EducationalOneController::class, 'store']);
    Route::post('/enroll/information/educational-two', [EducationalTwoController::class, 'store']);

    //Forms Update
    Route::group(['middleware' => ['closedEnroll']], function(){ 
    Route::get('/enroll/information/edit/personal', [PersonalController::class, 'edit'])->name('updatepersonal')->middleware('checkUpdate:studentpersonal');
    Route::get('/enroll/information/edit/contact', [ContactController::class, 'edit'])->name('updatecontact')->middleware('checkUpdate:studentcontact');
    Route::get('/enroll/information/edit/family', [FamilyController::class, 'edit'])->name('updatefamily')->middleware('checkUpdate:studentfamily');
    Route::get('/enroll/information/edit/additional', [AdditionalController::class, 'edit'])->name('updateadditional')->middleware('checkUpdate:studentadditional');
    Route::get('/enroll/information/edit/educational-one', [EducationalOneController::class, 'edit'])->name('updateeducone')->middleware('checkUpdate:studentschoolone');
    Route::get('/enroll/information/edit/educational-two', [EducationalTwoController::class, 'edit'])->name('updateeductwo')->middleware('checkUpdate:studentschooltwo');
    });
    //Forms Put
    Route::put('/enroll/information/edit/personal', [PersonalController::class, 'update']);
    Route::put('/enroll/information/edit/contact', [ContactController::class, 'update']);
    Route::put('/enroll/information/edit/family', [FamilyController::class, 'update']);
    Route::put('/enroll/information/edit/additional', [AdditionalController::class, 'update']);
    Route::put('/enroll/information/edit/educational-one', [EducationalOneController::class, 'update']);
    Route::put('/enroll/information/edit/educational-two', [EducationalTwoController::class, 'update']);

    //Subject Update
    Route::get('/enroll/edit/subjects', [SaveSubjectController::class, 'edit'])->name('updatesubjects')->middleware('no.subject');


    //Signature Post Store
    Route::post('/enroll/signature', [SignatureController::class, 'store']);
    Route::put('/enroll/signature', [SignatureController::class, 'update']);

   //Has Controller
    Route::get('/enroll/information', [SaveInfoController::class, 'index'])->name('studentinformation'); //Enrollment Step 1
    
    Route::group(['middleware' => ['closedEnroll']], function(){ 
    Route::get('/enroll/subjects', [SaveSubjectController::class, 'index'])->name('studentsubjects')->middleware('has.subject'); //Enrollment Step 2
    Route::get('/enroll/signature', [SignatureController::class, 'index'])->name('studentsignature'); //Enrollment Step 3
    });

    //Profile with Controller
    Route::get('/profile',  [StudentProfileController::class, 'index'])->name('studentprofile');
    Route::get('/profile/profile-pdf',  [StudentProfileController::class, 'profilepdf'])->name('profilepdf'); //MIS Form
    Route::get('/profile/cor-pdf',  [StudentProfileController::class, 'corpdf'])->name('corpdf'); //COR Form
    Route::get('/profile/schedule-pdf',  [StudentProfileController::class, 'schedpdf'])->name('schedpdf'); //Schedule Form
});

//Teacher Dashboard Routes
Route::group(['middleware' => ['auth', 'role:teacher']], function(){ 
    //No Controller
    Route::get('/subjects', function(){ return view('teacher.subjects'); })->name('teachersubjects');
});
