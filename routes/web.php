<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;

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
    return view('frontend.index');
})->name('index');

Route::get('/',[IndexController::class,'index'])->name('index');
Route::post('/calendar/event/store',[IndexController::class,'storeEvent'])->name('calendar.event.store');
Route::patch('/calendar/event/update/{id}',[IndexController::class,'updateEvent'])->name('calendar.event.update');
Route::delete('/calendar/event/delete/{id}',[IndexController::class,'deleteEvent'])->name('calendar.event.delete');
