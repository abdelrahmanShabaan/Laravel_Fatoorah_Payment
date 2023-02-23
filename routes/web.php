<?php

use App\Http\Controllers\Fattorah\FatoorahController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('pay' , [FatoorahController::class , 'payorder'])->name('payNow');

/**
 * THis for getwaypayment success message and failed messages
 */
Route::get('callback',function(){ return 'success'; }); 
Route::get('error',function(){ return 'payment failed '; });
