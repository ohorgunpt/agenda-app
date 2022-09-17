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

Route::get('/', function () {
    return view('welcome');
});

//Route baru
Route::get('hello', function() {
    return '<h1>Belajar Laravel</h1>';
});

//Route to controller
Route::get('index', [\App\Http\Controllers\AgendaController::class, 'index']);

//Route to  master
Route::resource('agendatemplate', \App\Http\Controllers\AgendaController::class);

//Route to unit
Route::resource('unit', \App\Http\Controllers\UnitController::class);

//oute untuk destroy unit
Route::get('unit/destroy/{id}', [\App\Http\Controllers\UnitController::class,'destroy'])->name('unit.destroy');

//Route to Personel
Route::resource('personel', \App\Http\Controllers\PersonelController::class);

//oute untuk destroy unit
Route::get('personel/destroy/{id}', [\App\Http\Controllers\PersonelController::class,'destroy'])->name('personel.destroy');

//Route to Agenda
Route::resource('agenda', \App\Http\Controllers\AgendaController::class);
Route::get('agenda-detail/{id}',[\App\Http\Controllers\AgendaController::class,'showdetail'])->name('agenda.showdetail');
//oute untuk destroy Agenda
Route::get('agenda/destroy/{id}', [\App\Http\Controllers\AgendaController::class,'destroy'])->name('agenda.destroy');

//Route to Data Dukung
Route::resource('data_dukung', \App\Http\Controllers\DatadukungController::class);

//Route to Data Dukung
Route::resource('storage', \App\Http\Controllers\DatadukungController::class);

//oute untuk destroy Data Dukung
Route::get('datadukung/destroy/{id}', [\App\Http\Controllers\DatadukungController::class,'destroy'])->name('datadukung.destroy');

//Route to Sambutan
Route::resource('sambutan', \App\Http\Controllers\SambutanController::class);
Route::get('sambutan/input/{id}', [\App\Http\Controllers\SambutanController::class,'input'])->name('sambutan.input');
// Route::get('showsambutan',[\App\Http\Controllers\SambutanController::class,'show']);
//Route to Sambutan
Route::resource('index', \App\Http\Controllers\SambutanController::class);


//Route to Pointer
Route::resource('pointer', \App\Http\Controllers\PointerController::class);
Route::get('pointer/input/{id}', [\App\Http\Controllers\PointerController::class,'input'])->name('pointer.input');
//Route to Pointer
Route::resource('index', \App\Http\Controllers\PointerController::class);


//Route to Pointer
Route::resource('data_dukung', \App\Http\Controllers\DatadukungController::class);
Route::get('data_dukung/create/{id}', [\App\Http\Controllers\DatadukungController::class,'create'])->name('data_dukung.create');
//Route to Pointer
Route::resource('list', \App\Http\Controllers\DatadukungController::class);




