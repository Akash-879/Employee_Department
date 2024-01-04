<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;

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

Route::get('/', function () {
    return view('welcome');
});



// Route::resource('employees', EmployeeController::class);
Route::resource('departments', DepartmentController::class);


Route::resource('employees', EmployeeController::class)->except(['show']);
Route::get('/employees/report', [EmployeeController::class, 'report'])->name('employees.report');

// Add the following route for the show method
Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
