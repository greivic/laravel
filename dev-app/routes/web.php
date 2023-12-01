<?php

use App\Http\Controllers\SesionController;
use App\Http\Controllers\Taskcontroller;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('login');
});
Route::post('/adminTasks',[Taskcontroller::class,'store'])->name('adminTasks');
Route::get('/adminTasks',[Taskcontroller::class,'indexAdmins'])->middleware('auth','admin')->name('adminTasks');
Route::patch('/adminTasks/{id}',[Taskcontroller::class,'update'])->name('adminTasks-update');
Route::delete('/adminTasks/{id}',[Taskcontroller::class,'destroy'])->name('adminTasks-delete');
Route::get('/tasks',[Taskcontroller::class,'index'])->middleware('auth')->name('tasks');

Route::view('/login',"login")->name('login');
Route::view('/registro',"register")->name('register');
Route::get('/logout',[SesionController::class,'logout'])->name('logout');
Route::post('/session',[SesionController::class,'login'])->name('session');
Route::post('/validate',[SesionController::class,'register'])->name('validate');