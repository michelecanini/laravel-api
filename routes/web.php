<?php

use App\Http\Controllers\Admin\DashboardController as DashboardController;
use App\Http\Controllers\Admin\ProjectController as ProjectController;
use App\Http\Controllers\Admin\TypeController as TypeController;
use App\Http\Controllers\Admin\TechnologyController as TechnologyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Verified;
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
    return view('home');
});

//GESTIONE INIZIALE DELLA ROTTA
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//GESTIONE ROTTA CON IL NUOVO CONTROLLER (admin)
Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('projects', ProjectController::class);
    Route::resource('types', TypeController::class);
    Route::resource('technologies', TechnologyController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [App\Http\Controllers\User\HomeController::class, 'index']);

require __DIR__.'/auth.php';

