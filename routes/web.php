<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GymController;

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

require __DIR__.'/auth.php';

/*Static pages*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');


/*Read*/
Route::get('/dashboard', [GymController::class, 'index'])->middleware(['auth'])->name('dashboard');

/*Create*/
Route::get('/create', [GymController::class, 'checkboxes'])->middleware(['auth'])->name('create');

Route::post('/create', [GymController::class, 'create'])->middleware(['auth']);


/*Update*/
Route::get('/update/{id}', [GymController::class, 'edit'])->middleware(['auth'])->name('update');
Route::post('/update/{id}', [GymController::class, 'update'])->middleware(['auth']);

/*Delete*/
Route::get('/delete/{id}', [GymController::class, 'destroy'])->middleware(['auth'])->name('delete');