<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\DashboardController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('mensajes/{mensaje}', [MensajeController::class, 'show'])->name('mensaje.show');
Route::post('mensajes', [MensajeController::class, 'store'])->name('mensaje.store');
