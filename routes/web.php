<?php

use App\Facades\Student;
use Illuminate\Support\Facades\Route;

use App\Services\StudentService;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/create',[App\Http\Controllers\HomeController::class,'create'])->name('create');
Route::get('/view/{id}',[App\Http\Controllers\HomeController::class,'view'])->name('view');
Route::get('/edit/{id}',[App\Http\Controllers\HomeController::class,'edit'])->name('edit');
Route::get('/delete/{id}',[App\Http\Controllers\HomeController::class,'delete'])->name('delete');
Route::post('/store',[App\Http\Controllers\HomeController::class,'store'])->name('store');
Route::post('/update/{id}',[App\Http\Controllers\HomeController::class,'update'])->name('update');
Route::get('/status/{id}',[App\Http\Controllers\HomeController::class,'changeStatus'])->name('status');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::get('/create',function(){
//     return Student::create();
// })->name('create');

// Route::get('/home',function(){
//     return Student::index();
// })->name('home');



// Route::get('/view/{id}',function(){
//     return Student::view('id');
// })->name('view');

// Route::get('/edit/{id}',function(){
//     return Student::edit();
// })->name('edit');


// Route::get('/status/{id}',function(){
//     return Student::changeStatus();
// })->name('status');


// Route::post('/store/{id}',function(){
//     return Student::store();
// })->name('store');

// Route::get('/delete{id}/',function(){
//     return Student::delete();
// })->name('delete');