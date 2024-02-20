<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DashboardHRController;
use App\Http\Controllers\FacultyAuthController;
use App\Http\Controllers\DocumentTypeController;

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
//route login
Route::get('/login', [FacultyAuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [FacultyAuthController::class, 'authenticate']);
 Route::get('/', [FacultyAuthController::class, 'index'])->name('login')->middleware('guest');
Route::get('/hmo/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/hmo/login', [AuthController::class, 'authenticate']);


Route::get('/hmo/register', [AuthController::class, 'register']);
Route::post('/hmo/register', [AuthController::class, 'process']);
Route::post('/hmo/logout', [FacultyAuthController::class, 'logout'])->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/hmo/dashboard', [DashboardHRController::class, 'index'])->middleware('auth');

//   Route::get('/', [FacultyAuthController::class, 'index']);

//route barang
// Route::resource('/barang', BarangController::class)->middleware('auth');

//route faculty

Route::resource('/faculty', FacultyController::class);

Route::get('/faculty/{email}/profile', [FacultyController::class, 'profile'])->middleware('auth');


//Document
Route::resource('/document', DocumentController::class)->middleware('auth');
Route::get('/documentf', [DocumentController::class, 'documentf'])->middleware('auth');
Route::get('/hrdocument', [DocumentController::class, 'hrdocument'])->middleware('auth');
Route::get('/document/{email}/mydocument', [DocumentController::class, 'mydocument'])->middleware('auth');
Route::get('/document/{document_name}/download', [DocumentController::class, 'download'])->middleware('auth');
Route::get('/document/{document_name}/faculty-edit', [DocumentController::class, 'faculty_edit'])->middleware('auth');
Route::get('/document/{document_name}/approved', [DocumentController::class, 'approved'])->middleware('auth');
Route::get('/document/{document_name}/disapproved', [DocumentController::class, 'disapproved'])->middleware('auth');
Route::post('/document/{document_name}/approved_now', [DocumentController::class, 'approved_now'])->middleware('auth');
Route::post('/document/{document_name}/disapproved_now', [DocumentController::class, 'disapproved_now'])->middleware('auth');

//route Document Type

Route::resource('/document_type', DocumentTypeController::class)->middleware('auth');
Route::get('/document-types', [DocumentTypeController::class, 'getDocumentTypes']);

//route department
Route::resource('/department', DepartmentController::class)->middleware('auth');
Route::get('/departments', [DepartmentController::class, 'getDepartmentTypes'])->middleware('auth');
