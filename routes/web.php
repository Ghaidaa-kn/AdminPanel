<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CompaniesController;

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
    return view('log_in');
});
// Route::get('/dashboard', function () {
//     return view('master');
// });

Route::post('/login' , [UserController::class, 'login']);

Route::get('/getEmployees' , [EmployeesController::class, 'index']);
Route::get('/getCompanies' , [CompaniesController::class, 'index']);

Route::get('/create_emp' , [EmployeesController::class, 'create']);
Route::post('/add_emp' , [EmployeesController::class, 'store']);
Route::get('/edit_emp/{id}' , [EmployeesController::class, 'edit']);
Route::get('/show_emp/{id}' , [EmployeesController::class, 'show']);
Route::post('/update_emp/{id}' , [EmployeesController::class, 'update']);
Route::get('/delete_emp/{id}' , [EmployeesController::class, 'destroy']);


Route::get('/create_comp' , [CompaniesController::class, 'create']);
Route::post('/add_comp' , [CompaniesController::class, 'store']);
Route::get('/edit_comp/{id}' , [CompaniesController::class, 'edit']);
Route::get('/show_comp/{id}' , [CompaniesController::class, 'show']);
Route::post('/update_comp/{id}' , [CompaniesController::class, 'update']);
Route::get('/delete_comp/{id}' , [CompaniesController::class, 'destroy']);

