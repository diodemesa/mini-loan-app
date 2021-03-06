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

// # LOAN APPLICATION


Route::middleware('auth:sanctum')->get('loan', Loans::class);
// # TTD loading routes but controller needs fixing (update RouteServiceProvider namespace)
//Route::middleware('auth:sanctum')->apiResource('loan', 'LoanController');