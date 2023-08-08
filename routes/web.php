<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SuperAdmin;
// use App\Http\Middleware\TuKepala;

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
    return view('front.home');
});

//Route group
//Route to Agenda
// Route::resource('agenda', \App\Http\Controllers\AgendaController::class);
Route::get('agenda-index', [\App\Http\Controllers\AgendaController::class,'index'])->name('agenda.index');
Route::get('agenda-all', [App\Http\Controllers\AgendaController::class,'index_sestama'])->name('agenda_all.index');
Route::get('agenda', [App\Http\Controllers\AgendaController::class,'create'])->name('agenda.create');
Route::post('category', [App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
Route::get('agenda/{id}/edit', [App\Http\Controllers\AgendaController::class,'edit'])->name('agenda.edit');
Route::post('agenda-store', [App\Http\Controllers\AgendaController::class,'store'])->name('agenda.store');
Route::put('agenda/{id}/update', [App\Http\Controllers\AgendaController::class,'update'])->name('agenda.update');
Route::get('agenda-detail/{id}',[\App\Http\Controllers\AgendaController::class,'showdetail'])->name('agenda.showdetail');
//oute untuk destroy Agenda
Route::get('agenda/destroy/{id}', [\App\Http\Controllers\AgendaController::class,'destroy'])->name('agenda.destroy');
Route::post('select',[App\Http\Controllers\AgendaController::class, 'getDate'])->name('agenda.getdate');

//Route baru
Route::get('hello', function() {
    return '<h1>Belajar Laravel</h1>';
});

//Route to controller
// Route::get('index', [\App\Http\Controllers\AgendaController::class, 'index']);

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


//Route to Data Dukung
Route::resource('data_dukung', \App\Http\Controllers\DatadukungController::class);
Route::get('datadukung/{id}',[\App\Http\Controllers\DatadukungController::class,'showdatadukung'])->name('datadukung.showdatadukung');
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

//Route search
Route::get('/search', [AgendaController::class, 'search'])->name('search');

//route ketegory
Route::get('category', [App\Http\Controllers\CategoryController::class,'index'])->name('category.index');

Route::get('cat-create', [App\Http\Controllers\CategoryController::class,'create'])->name('category.create');
Route::post('category', [App\Http\Controllers\CategoryController::class,'store'])->name('category.store');
//route test
Route::get('test',function(){

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route tambah Pendamping
Route::post('/pendamping', [App\Http\Controllers\AddPendampingController::class, 'store'])->name('tambahpendamping.store');
//route destroy pendamping
Route::get('pendamping/destroy/{id}', [\App\Http\Controllers\AddPendampingController::class,'destroy'])->name('pendamping.destroy');
//Route to Data Humas
// Route::get('humas', [App\Http\Controllers\HumasController::class, 'index'])->name('datahumas.index');
Route::get('humas/create/{id}', [App\Http\Controllers\HumasController::class, 'create'])->name('humas.create');
Route::post('humas/store',[App\Http\Controllers\HumasController::class, 'store'])->name('humas.store');

