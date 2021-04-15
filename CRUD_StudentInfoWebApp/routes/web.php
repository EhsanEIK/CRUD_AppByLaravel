<?php

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


//for login
Route::get('login', 'App\Http\Controllers\Login\LoginController@Login')->name('login');
Route::post('login', 'App\Http\Controllers\Login\LoginController@Authenticate')->name('login.confirm');

//for registration
Route::get('login/register', 'App\Http\Controllers\Login\LoginController@Register')->name('register');
Route::post('login/register', 'App\Http\Controllers\Login\LoginController@Store')->name('register.store');

//for AUTHENTICATE
Route::middleware('auth')->group(function () {
    
    Route::get('/', function () {
        return view('welcome');
    });

    //dashboard view
    Route::get('dashboard', function () {
        return view('welcome');
    })->name('dashboard');
    
    //for logout
    Route::get('logout', 'App\Http\Controllers\Login\LoginController@Logout')->name('logout');

    //for Students and Departments
    Route::resource('students', 'App\Http\Controllers\StudentsController' );
    Route::resource('departments', 'App\Http\Controllers\DepartmentsController' );
    
    //for PDF Download Student List
    Route::get('students/generate-pdf', 'App\Http\Controllers\StudentsController@PDF' )->name('students.pdf');
    
});