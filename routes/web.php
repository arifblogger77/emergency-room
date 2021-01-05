<?php

use App\Http\Controllers\BedaController;
use Doctrine\DBAL\Schema\Index;
use Illuminate\Support\Facades\Auth;
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

Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route interactive
Route::get('/interactive', 'InteractiveController@index')->name('interactive');
Route::post('/interactive/simple', 'InteractiveController@simple')->name('interactive.simple');
Route::post('/interactive/normal', 'InteractiveController@normal')->name('interactive.normal');
Route::get('/interactive/list-table', 'InteractiveController@listTables')->name('interactive.list-table');

//route person
Route::get('/person', 'PersonController@index')->name('person');
Route::get('/person/add', 'PersonController@add')->name('person.add');
Route::post('person/new', 'PersonController@new')->name('person.new');
Route::get('/person/edit/{id}', 'PersonController@edit')->name('person.edit');
Route::put('/person/update/{id}', 'PersonController@update')->name('person.update');
Route::get('/person/delete/{id}', 'PersonController@delete')->name('person.delete');
Route::get('/person/detail/{id}', 'PersonController@detail')->name('person.detail');

//route address
Route::get('/person/detail/{id}/add-address', 'PersonController@addAddress')->name('address.add');
Route::post('/person/detail/{id}/new-address', 'PersonController@newAddress')->name('address.new');
Route::get('/person/detail/{id}/edit-address/{idAddress}', 'PersonController@editAddress')->name('address.edit');
Route::put('/person/detail/{id}/update-address/{idAddress}', 'PersonController@updateAddress')->name('address.update');
Route::get('/person/detail/{id}/delete-address/{idAddress}', 'PersonController@deleteAddress')->name('address.delete');

// route email
Route::get('/person/detail/{id}/add-email', 'PersonController@addEmail')->name('email.add');
Route::post('/person/detail/{id}/new-email', 'PersonController@newEmail')->name('email.new');
Route::get('/person/detail/{id}/delete-email/{idEmail}', 'PersonController@deleteEmail')->name('email.delete');

// route phoneno
Route::get('/person/detail/{id}/add-phoneno', 'PersonController@addPhoneno')->name('phoneno.add');
Route::post('/person/detail/{id}/new-phoneno', 'PersonController@newPhoneno')->name('phoneno.new');
Route::get('/person/detail/{id}/delete-phoneno/{idPhoneno}', 'PersonController@deletePhoneno')->name('phoneno.delete');

//route bed
Route::get('/bed', 'BedController@index')->name('bed');
Route::get('/bed/add', 'BedController@add')->name('bed.add');
Route::post('bed/new', 'BedController@new')->name('bed.new');
Route::get('/bed/delete/{id}', 'BedController@delete')->name('bed.delete');

//route shift
Route::get('/shift', 'ShiftController@index')->name('shift');
Route::get('/shift/add', 'ShiftController@add')->name('shift.add');
Route::post('shift/new', 'ShiftController@new')->name('shift.new');
Route::get('/shift/edit/{id}', 'ShiftController@edit')->name('shift.edit');
Route::put('/shift/update/{id}', 'ShiftController@update')->name('shift.update');
Route::get('/shift/delete/{id}', 'ShiftController@delete')->name('shift.delete');

//route med
Route::get('/med', 'MedController@index')->name('med');
Route::get('/med/add', 'MedController@add')->name('med.add');
Route::post('med/new', 'MedController@new')->name('med.new');
Route::get('/med/edit/{id}', 'MedController@edit')->name('med.edit');
Route::put('/med/update/{id}', 'MedController@update')->name('med.update');
Route::get('/med/delete/{id}', 'MedController@delete')->name('med.delete');

//route medication
Route::get('/medication', 'MedicationController@index')->name('medication');
Route::get('/medication/add', 'MedicationController@add')->name('medication.add');
Route::post('medication/new', 'MedicationController@new')->name('medication.new');
Route::get('/medication/edit/{id}', 'MedicationController@edit')->name('medication.edit');
Route::put('/medication/update/{id}', 'MedicationController@update')->name('medication.update');
Route::get('/medication/delete/{id}', 'MedicationController@delete')->name('medication.delete');

//person status
Route::get('/person-status', 'PersonStatusController@index')->name('status');
Route::get('/person-status/add-patient', 'PersonStatusController@addPatient')->name('patient.add');
Route::post('/person-status/new-patient', 'PersonStatusController@newPatient')->name('patient.new');
Route::get('/person-status/delete-patient/{id}', 'PersonStatusController@deletePatient')->name('patient.delete');
Route::get('/person-status/add-worker', 'PersonStatusController@addWorker')->name('worker.add');
Route::post('/person-status/new-worker', 'PersonStatusController@newWorker')->name('worker.new');
Route::get('/person-status/delete-worker/{id}', 'PersonStatusController@deleteWorker')->name('worker.delete');

// worker-shift
Route::get('/worker-shift', 'WorkerShiftController@index')->name('worker-shift');
Route::get('/worker-shift/edit-doctor/{id}', 'WorkerShiftController@editDons')->name('doctor.edit');
Route::put('/worker-shift/update-doctor/{id}', 'WorkerShiftController@updateDons')->name('doctor.update');
Route::get('/worker-shift/edit-nurse/{id}', 'WorkerShiftController@editNons')->name('nurse.edit');
Route::put('/worker-shift/update-nurse/{id}', 'WorkerShiftController@updateNons')->name('nurse.update');
Route::get('/worker-shift/edit-receptionist/{id}', 'WorkerShiftController@editRons')->name('receptionist.edit');
Route::put('/worker-shift/update-receptionist/{id}', 'WorkerShiftController@updateRons')->name('receptionist.update');

//beda
Route::get('/beda', 'BedaController@index')->name('beda');
Route::get('/beda/add', 'BedaController@add')->name('beda.add');
Route::post('beda/new', 'BedaController@new')->name('beda.new');
Route::get('/beda/edit/{id}', 'BedaController@edit')->name('beda.edit');
Route::put('/beda/update/{id}', 'BedaController@update')->name('beda.update');
Route::get('/beda/delete/{id}', 'BedaController@delete')->name('beda.delete');

//adm
Route::get('/adm', 'AdmController@index')->name('adm');
Route::get('/adm/add', 'AdmController@add')->name('adm.add');
Route::post('adm/new', 'AdmController@new')->name('adm.new');
Route::get('/adm/delete/{id}', 'AdmController@delete')->name('adm.delete');

//casedoc && triage
Route::get('/doctor-patient', 'DoctorPatientController@index')->name('doctor-patient');
Route::get('/doctor-patient/add-casedoc', 'DoctorPatientController@addCasedoc')->name('casedoc.add');
Route::post('/doctor-patient/new-casedoc', 'DoctorPatientController@newCasedoc')->name('casedoc.new');
Route::get('/doctor-patient/delete-casedoc/{id}', 'DoctorPatientController@deleteCasedoc')->name('casedoc.delete');
Route::get('/doctor-patient/add-triageby', 'DoctorPatientController@addTriageby')->name('triageby.add');
Route::post('/doctor-patient/new-triageby', 'DoctorPatientController@newTriageby')->name('triageby.new');
Route::get('/doctor-patient/delete-triageby/{id}', 'DoctorPatientController@deleteTriageby')->name('triageby.delete');

//supby && meda
Route::get('/nurse-patient', 'NursePatientController@index')->name('nurse-patient');
Route::get('/nurse-patient/add-supby', 'NursePatientController@addSupby')->name('supby.add');
Route::post('/nurse-patient/new-supby', 'NursePatientController@newSupby')->name('supby.new');
Route::get('/nurse-patient/delete-supby/{id}', 'NursePatientController@deleteSupby')->name('supby.delete');
Route::get('/nurse-patient/add-meda', 'NursePatientController@addMeda')->name('meda.add');
Route::post('/nurse-patient/new-meda', 'NursePatientController@newMeda')->name('meda.new');
Route::get('/nurse-patient/delete-meda/{id}', 'NursePatientController@deleteMeda')->name('meda.delete');
