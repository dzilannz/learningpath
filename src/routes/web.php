<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LearningPathController;
use App\Http\Controllers\IbtitahController;
use App\Http\Controllers\SidangController;
use App\Http\Controllers\AdminController;

// Halaman login
Route::get('/login', function () {
    return view('login'); // resources/views/login.blade.php
})->name('login.form');

// Proses Login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Dashboard Mahasiswa
Route::get('/dashboard/{mahasiswaId}', [LearningPathController::class, 'show'])->name('dashboard');

// Submit Proof oleh Mahasiswa
Route::post('/dashboard/{mahasiswaId}/submit/{kategori}', [LearningPathController::class, 'submitProof'])->name('dashboard.submit');

// Dashboard Admin
Route::get('/dashboard-admin', function () {
    return view('dashboard_admin'); // Mengarahkan ke file blade dashboard_admin
})->name('dashboard.admin');

// Admin Profile
Route::get('/admin-profile', [IbtitahController::class, 'showAdminProfile'])->name('admin.profile');


// Submit Proof Ibtitah (untuk admin jika diperlukan)
Route::post('/ibtitah/submit/{mahasiswaId}/{kategori}', [IbtitahController::class, 'submitProof'])->name('ibtitah.submit');

// Approve Proof oleh Admin
Route::post('/ibtitah/approve/{id}/{kategori}', [IbtitahController::class, 'approve'])->name('ibtitah.approve');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Sidang Routes (jika ada)
Route::post('/sidang/mark-complete/{id}/{task}', [SidangController::class, 'markComplete'])->name('sidang.markComplete');



Route::get('/admin-profile', [AdminController::class, 'showPending'])->name('admin.profile');

Route::get('/matkul/{semesterId}', [LearningPathController::class, 'showMatkul'])->name('matkul.detail');

Route::get('/admin-profile', [AdminController::class, 'showPending'])->name('admin.profile');
Route::get('/admin/ibtitah/form', [AdminController::class, 'showIbtitahForm'])->name('admin.ibtitah.form');
Route::post('/admin/ibtitah/store', [AdminController::class, 'storeIbtitah'])->name('admin.ibtitah.store');


Route::view('/mata-kuliah', 'matkul')->name('mataKuliah.index');

Route::post('/ibtitah/approve/{id}/{kategori}', [IbtitahController::class, 'approve'])->name('ibtitah.approve');

Route::get('/', function () {
    return view('home'); // resources/views/home.blade.php
})->name('home');



