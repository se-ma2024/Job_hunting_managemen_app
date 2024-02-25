<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;

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

Auth::routes();

Route::get('/', [MainController::class, 'top'])->name('top');

Route::get('/home', [CompanyController::class, 'index'])->name('home');

Route::get('/home', [CompanyController::class, 'index'])->name('index');
Route::get('/createCompany', [CompanyController::class, 'createCompany'])->name('createCompany');
Route::get('/showProfile', [ProfileController::class, 'showProfile'])->name('showProfile');
Route::get('/createProfile', [ProfileController::class, 'createProfile'])->name('createProfile');
Route::get('/editProfile', [ProfileController::class, 'editProfile'])->name('editProfile');
Route::get('/{id}', [CompanyController::class, 'detailCompany'])->name('detailCompany');
Route::delete('/{id}', [CompanyController::class, 'delete'])->name('delete');
Route::post('/addCompanyDetail', [CompanyController::class, 'addCompanyDetail'])->name('addCompanyDetail');
Route::post('/addProfile', [ProfileController::class, 'addProfile'])->name('addProfile');
Route::get('/editCompany/{id}', [CompanyController::class, 'editCompany'])->name('editCompany');
Route::put('/updateCompany/{id}', [CompanyController::class, 'updateCompany'])->name('updateCompany');
Route::put('/updateProfile', [ProfileController::class, 'updateProfile'])->name('updateProfile');


