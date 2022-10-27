<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\employeeController;
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

Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::get('/greeting', function () {
    return 'Hello World';
});

//Route::get('create',[employeeController::class,'create'])->name('employee.index');
//Route::post('create',[employeeController::class,'store']);
//Route::resource('employee',employeeController::class);

Route::resource('employee',employeeController::class)->middleware(['auth','CustomAuth']);
