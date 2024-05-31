<?php

//accounts
use App\Http\Controllers\AccountsController;

//admin
use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\PatientListController;
use App\Http\Controllers\admin\MessagesController;
use App\Http\Controllers\admin\PaymentInfoController;
use App\Http\Controllers\admin\CalendarController;
use App\Http\Controllers\admin\CommunityForumController;
use App\Http\Controllers\admin\PatientController;

//patient
use App\Http\Controllers\patient\PatientAuthController;
use App\Http\Controllers\patient\PatientAppointmentController;
use App\Http\Controllers\patient\PatientCommunityForumController;
use App\Http\Controllers\patient\PatientMessagesController;
use App\Http\Controllers\patient\PatientPaymentInfoController;

//dentistry
use App\Http\Controllers\dentistry\DentistryStudentCommunityForumController;
use App\Http\Controllers\dentistry\DentistryStudentAuthController;


use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[AccountsController::class,'index'])->name('accounts');

// for Admin
Route::get('/admin/login',[AuthController::class,'index'])->name('admin.login');
Route::post('/admin/login',[AuthController::class,'login'])->name('admin.login.submit');
Route::get('/admin/logout',[AuthController::class,'logout'])->middleware('auth')->name('admin.logout');

Route::get('/admin/patientlist',[PatientListController::class,'index'])->middleware('auth')->name('admin.patientlist');
Route::get('/admin/patientlist/update/{id}', [PatientListController::class, 'updatePatientlist'])->name('updatePatientlist');
Route::put('/admin/patientlist/updated/{id}', [PatientListController::class, 'updatedPatientlist'])->name('updatedPatientlist');
Route::delete('/admin/patientlist/delete/{id}', [PatientListController::class, 'deletePatientlist'])->name('deletePatientlist');

Route::get('/admin/patientlist/patient/{patientId}', [PatientController::class, 'showPatient'])->name('showPatient');
Route::post('/admin/patientlist/patient/{patientlistId}', [PatientController::class, 'addPatient'])->name('addPatient');

Route::get('/admin/messages',[MessagesController::class,'index'])->middleware('auth')->name('admin.messages');
Route::get('/admin/payment-info',[PaymentInfoController::class,'index'])->middleware('auth')->name('admin.paymentinfo');
Route::get('/admin/calendar',[CalendarController::class,'index'])->middleware('auth')->middleware('auth')->name('admin.calendar');
Route::get('/admin/community-forum',[CommunityForumController::class,'index'])->middleware('auth')->name('admin.communityforum');




// for Patient
Route::get('/patient/signup',[PatientAuthController::class,'registration'])->name('patient.registration');
Route::post('/patient/signup',[PatientAuthController::class,'signup'])->name('patient.signup');

Route::get('/patient/login',[PatientAuthController::class,'index'])->name('patient.login');
Route::post('/patient/login',[PatientAuthController::class,'login'])->name('patient.login.submit');
Route::get('/patient/logout',[PatientAuthController::class,'logout'])->middleware('auth')->name('patient.logout');

Route::get('/patient/appointment',[PatientAppointmentController::class,'index'])->name('patient.appointment');
Route::get('/patient/messages',[PatientMessagesController::class,'index'])->name('patient.messages');
Route::get('/patient/payment-info',[PatientPaymentInfoController::class,'index'])->name('patient.paymentinfo');
Route::get('/patient/community-forum',[PatientCommunityForumController::class,'index'])->name('patient.communityforum');



// for Student
Route::get('/dentistry-student/community-forum',[DentistryStudentCommunityForumController::class,'index'])->name('dentistrystudent.communityforum');

Route::get('/dentistry-student/signup',[DentistryStudentAuthController::class,'registration'])->name('dentistrystudent.registration');
Route::post('/dentistry-student/signup',[DentistryStudentAuthController::class,'signup'])->name('dentistrystudent.signup');

Route::get('/dentistry-student/login',[DentistryStudentAuthController::class,'index'])->name('dentistrystudent.login');
Route::post('/dentistry-student/login',[DentistryStudentAuthController::class,'login'])->name('dentistrystudent.login.submit');
Route::get('/dentistry-student/logout',[DentistryStudentAuthController::class,'logout'])->middleware('auth')->name('dentistrystudent.logout');
