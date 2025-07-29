<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleAuthController;

// Home Page
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');
// Page Projects
Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [App\Http\Controllers\ProjectController::class, 'show'])->name('projects.show');
// Page About
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
Route::get('/posts/{slug}', [App\Http\Controllers\AboutController::class, 'showPost'])->name('projects.showPost');
// Page Contact
Route::get('/contact', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
// Route::post('/contact', [App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
// Page Services
Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services.index');

// Google Auth API
Route::get('/auth', [GoogleAuthController::class, 'redirectToGoogle']);
Route::get('/callback', [GoogleAuthController::class, 'handleCallback'])->name('callback');
