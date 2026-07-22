<?php

use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

// Public Web Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/item/{item}', [MenuController::class, 'getItem'])->name('menu.item');
Route::get('/tentang', [HomeController::class, 'about'])->name('about');
Route::get('/kontak', [HomeController::class, 'contact'])->name('contact');

// API Order Checkout Route
Route::post('/api/checkout/whatsapp', [OrderController::class, 'submitWhatsApp'])->name('checkout.whatsapp');

// Admin Auth Routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard & Menu CRUD Routes (Protected)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/menu', [AdminMenuController::class, 'index'])->name('menu.index');
    Route::get('/menu/create', [AdminMenuController::class, 'create'])->name('menu.create');
    Route::post('/menu', [AdminMenuController::class, 'store'])->name('menu.store');
    Route::get('/menu/{menu}/edit', [AdminMenuController::class, 'edit'])->name('menu.edit');
    Route::put('/menu/{menu}', [AdminMenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{menu}', [AdminMenuController::class, 'destroy'])->name('menu.destroy');
    Route::patch('/menu/{menu}/toggle', [AdminMenuController::class, 'toggleAvailability'])->name('menu.toggle');
});
