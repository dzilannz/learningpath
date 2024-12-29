<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LearningPathController;
use App\Http\Controllers\IbtitahController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SidangController;

// Halaman Login
Route::get('/login', function () {
    return view('login'); // resources/views/login.blade.php
})->name('login.form');

// Proses Login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Dashboard Mahasiswa
Route::get('/dashboard/{mahasiswaId}', [LearningPathController::class, 'show'])->name('dashboard');

// Submit Proof oleh Mahasiswa
Route::post('/dashboard/{mahasiswaId}/submit/{kategori}', [IbtitahController::class, 'submitProof'])->name('dashboard.submit');

// Dashboard Admin
Route::get('/dashboard-admin', function () {
    return view('dashboard_admin');
})->name('dashboard.admin');

// Admin Profile (Menampilkan Pending Submissions)
Route::get('/admin-profile', [AdminController::class, 'showPending'])->name('admin.profile');

// Submit Proof Ibtitah
Route::post('/ibtitah/submit/{kategori}', [IbtitahController::class, 'submitProof'])->name('ibtitah.submit');

// Approve/Reject Proof oleh Admin
Route::post('/ibtitah/approve/{id}', [IbtitahController::class, 'approveSubmission'])->name('ibtitah.approve');
Route::post('/ibtitah/reject/{id}', [IbtitahController::class, 'rejectSubmission'])->name('ibtitah.reject');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Sidang Routes
Route::post('/sidang/mark-complete/{id}/{task}', [SidangController::class, 'markComplete'])->name('sidang.markComplete');

// Mata Kuliah
Route::view('/mata-kuliah', 'matkul')->name('mataKuliah.index');
Route::get('/matkul/{semesterId}', [LearningPathController::class, 'showMatkul'])->name('matkul.detail');

// Halaman Utama
Route::get('/', function () {
    return view('home'); // resources/views/home.blade.php
})->name('home');

// Form untuk menambahkan Ibtitah (admin)
Route::get('/admin/ibtitah/form', [AdminController::class, 'showIbtitahForm'])->name('admin.ibtitah.form');

Route::post('/submit-proof', [IbtitahController::class, 'submitProof'])->name('ibtitah.submit');

Route::post('/ibtitah/approve/{id}/{kategori}', [AdminController::class, 'approve'])->name('ibtitah.approve');

