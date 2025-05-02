<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InvoicController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;

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


Route::get('/login', [UserController::class, 'loginForm'])->name('login.form');
Route::post('/login', [UserController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/stdboyes', [HomeController::class, 'boy'])->name('all.boy');
    Route::get('/stdgirl', [HomeController::class, 'girl'])->name('all.girl');
    Route::get('/create/{id}', [InvoicController::class, 'create'])->name('create.invoice');
    Route::get('/invoice/{id}/show', [InvoicController::class, 'details'])->name('show.invoice');
    Route::post('/pay/{id}', [InvoicController::class, 'PayInvoice'])->name('invoice.pay');
    Route::get('/base-stage', [HomeController::class, 'bDetails'])->name('base.details');
    Route::post('student/search', [StudentController::class, 'search'])->name('student.search');
    Route::get('/students-by-date', [StudentController::class, 'getByDate'])->name('students.byDate');
    Route::get('/payment/invoice', [InvoicController::class, 'payment'])->name('invoice.payment');
    Route::post('/search/invoice', [InvoicController::class, 'search'])->name('search');
    
    // Resource Routes
    Route::resource('student', StudentController::class);
    Route::resource('invoice', InvoicController::class);
    Route::resource('report', ReportController::class);

    // get all student by chose class rom and gender
    Route::get('chose', [StudentController::class, 'chose'])->name('chose.gender');
    Route::get('chose/grad', [StudentController::class, 'grad'])->name('chose.grad');
    Route::get('classes/{id}', [StudentController::class, 'classes'])->name('classes');
    Route::get('allstudent/{id}', [StudentController::class, 'showAll'])->name('all.student');

});
