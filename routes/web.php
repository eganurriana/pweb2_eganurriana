<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IjinController;
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
    return view('auth.login');
}); 

Route::get('/dashboard', function () {
    return view('skydash.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'tampil'])->middleware(['auth','verified']);

Route::post('/ijin/store', [IjinController::class, 'store'])->middleware(['auth','verified']);
Route::get('/dashboard', [DashboardController::class, 'tampil'])->name('dashboard');
Route::get('/data', [DashboardController::class, 'data'])->name('data');

route::get('/ijin', [IjinController::class,'index'])->middleware(['auth','verified']);
route::get('/ijin/create',[IjinController::class,'create'])->middleware(['auth','verified']);

route::get('/ijin/{id}/edit',[IjinController::class,'edit']);

route::delete('/data/{id_ijin}', [DashboardController::class,'delete'])->middleware(['auth','verified']);

route::get('/form',[DashboardController::class,'form']);

require __DIR__.'/auth.php';
