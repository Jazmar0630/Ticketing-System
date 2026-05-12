<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/', [TicketController::class, 'home'])->name('home');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/technical', [TicketController::class, 'technical'])->name('tickets.technical');
    Route::get('/arrangement', [TicketController::class, 'arrangement'])->name('tickets.arrangement');
    Route::get('/status', [TicketController::class, 'status'])->name('tickets.status');
    Route::get('/followup', [TicketController::class, 'followup'])->name('tickets.followup');
    Route::patch('/tickets/{ticket}/followup', [TicketController::class, 'updateFollowup'])->name('tickets.followup.update');
    Route::patch('/tickets/{ticket}/status', [TicketController::class, 'updateStatus'])->name('tickets.status.update');
    Route::patch('/tickets/{ticket}/technical', [TicketController::class, 'updateTechnical'])->name('tickets.technical.update');
    Route::patch('/tickets/{ticket}/arrangement', [TicketController::class, 'updateArrangement'])->name('tickets.arrangement.update');
});
