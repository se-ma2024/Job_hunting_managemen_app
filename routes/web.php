<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\company_controller;

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

Route::get('/', [Company_Controller::class, 'index'])->name('index');
Route::get('/createCompany', [Company_Controller::class, 'createCompany'])->name('createCompany');
Route::get('/{id}', [Company_Controller::class, 'detail'])->name('detail');
Route::delete('/{id}', [Company_Controller::class, 'delete'])->name('delete');
Route::post('store', [Company_Controller::class, 'store'])->name('store');
Route::get('/edit/{id}', [Company_Controller::class, 'edit'])->name('edit');
Route::put('/update/{id}', [Company_Controller::class, 'update'])->name('update');