<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\daywise_stat;
use \App\Http\Middleware\OwnCors;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', [copy_csv::class, 'importDataFromCSV']);
// Route::put('/', function(){
//     return view('check');
// });\

// Route::get('/{strike}/{from}/{to}/{commission}/{call}/{put}/{stoploss}/{lot}', [daywise_stat::class, 'stat_day'])->name('myroute');
// Route::get('/',[daywise_stat::class,'stat_day']);
Route::get('/api/{strike}/{from}/{to}/{commission}/{call}/{sl?}/{lot_size?}', 
[daywise_stat::class, 'stat_day']);

