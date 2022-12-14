<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

use Illuminate\Http\Request;

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

Route::get('dashboard', [EmployeeController::class ,'user'])
->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/greeting', function () {
    return 'Hello World';
});

//Route::get('create',[employeeController::class,'create'])->name('employee.index');
//Route::post('create',[employeeController::class,'store']);
//Route::resource('employee',employeeController::class);

Route::resource('employee',EmployeeController::class)->middleware(['auth','CustomAuth']);
Route::get('Datatable/employee',[EmployeeController::class ,'getEmployee'])->name('employee.Datatable');
// Route::get('filter',[EmployeeController::class,'filter'])->name('filter');