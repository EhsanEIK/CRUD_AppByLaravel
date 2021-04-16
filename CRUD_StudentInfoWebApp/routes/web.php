<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\Login\LoginController;

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


//for login
Route::get('/login',    [LoginController::class, 'Login'])->name('login');
Route::post('/login',   [LoginController::class, 'Authenticate'])->name('login.confirm');

//for registration
Route::get('/login/register',   [LoginController::class, 'Register'])->name('register');
Route::post('/login/register',  [LoginController::class, 'Store'])->name('register.store');

//for AUTHENTICATE
Route::middleware('auth')->group(function () {
    
    Route::get('/', function () {
        return view('welcome');
    });

    //dashboard view
    Route::get('/dashboard', function () {
        return view('welcome');
    })->name('dashboard');
    
    //for logout & here this is old format(laravel 7) of writing controller in route
    Route::get('/logout', 'App\Http\Controllers\Login\LoginController@Logout')->name('logout');

    //for Students and create all route with resourece
    Route::resource('/students', StudentsController::class );

    //for Departments and create all route manually
    //Route::resource('departments', DepartmentsController::class );
    Route::get('/departments',                      [DepartmentsController::class, 'index'])->name('departments.index');
    Route::get('/departments/create',               [DepartmentsController::class, 'create'])->name('departments.create');
    Route::post('/departments',                     [DepartmentsController::class, 'store'])->name('departments.store');
    Route::get('/departments/{department}/edit',    [DepartmentsController::class, 'edit'])->name('departments.edit');
    Route::put('/departments/{department}',         [DepartmentsController::class, 'update'])->name('departments.update');
    Route::get('/departments/{department}',         [DepartmentsController::class, 'show'])->name('departments.show');
    Route::delete('/departments/{department}',      [DepartmentsController::class, 'destroy'])->name('departments.destroy');
    
    //for PDF Download Student List
    Route::get('/generate-pdf', [StudentsController::class, 'PDF'] )->name('students.pdf');
    
});