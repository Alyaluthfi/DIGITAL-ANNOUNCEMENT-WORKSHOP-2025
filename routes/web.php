<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnnouncementController;

// Rute untuk Halaman Utama Pengumuman
Route::get('/pengumuman', [AnnouncementController::class, 'index'])->name('announcements.index');

// Rute untuk Halaman Dashboard
//Route::get('/', [AnnouncementController::class, 'index'])->name('announcements.index');

// Rute untuk Halaman Detail Pengumuman
Route::get('/pengumuman/{slug}', [AnnouncementController::class, 'show'])->name('announcements.show');
