<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\ResultController;

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


Route::redirect('/', '/contact');
Route::get('/contact', [ContactFormController::class, 'showContactForm'])->name('contact.form');
Route::post('/contact', [ContactFormController::class, 'submitContactForm'])->name('contact.submit');
Route::get('/result', [ResultController::class, 'index'])->name('result');
