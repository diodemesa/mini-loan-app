<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoanController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    // return view('dashboard');
    return view('dashboard');
})->name('dashboard');

# LOAN APPLICATION
// Route::get('/loans', 'LoanController@index')->name('view.loans');

// Route::get('loans', 'LoanController@index')->name('view.loans')->middleware('auth.basic.once');
Route::middleware('auth:sanctum')->get('loans', 'LoanController@index')->name('view.loans')->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->prefix('loan')->group(function () {
	Route::get('/submit', 'LoanController@processLoanApplication')->name('loan.submit');
	Route::get('/{loan}', 'LoanController@show')->name('loan.repayments');
});
