<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\AuthController;

Route::get('/home', function () {
    return view('user.user_beranda');
});

Route::get('/admin', function () {
    return view('admin.admin_login');
});

Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/laporan', [StudentController::class, 'index'])->name('students.index');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
Route::get('/dashboard', [AdminDashboardController::class, 'index']);
Route::get('/download/{id}', [AdminDashboardController::class, 'download'])->name('students.download');
Route::resource('mentors', MentorController::class);
Route::get('/fh', [StudentController::class, 'indexFakultasHukum']);
Route::get('/ft', [StudentController::class, 'indexFakultasTeknik']);
Route::get('/fpsi', [StudentController::class, 'indexFakultasPsikologi']);
Route::get('/fai', [StudentController::class, 'indexFakultasAgamaIslam']);
Route::get('/fkip', [StudentController::class, 'indexFakultasKeguruanDanIlmuPendidikan']);
Route::get('/feb', [StudentController::class, 'indexFakultasEkonomiBisnis']);
Route::get('/fisipol', [StudentController::class, 'indexFakultasIlmuSosialDanPolitik']);
Route::get('/faperta', [StudentController::class, 'indexFakultasPertanian']);
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/beranda', [AuthController::class, 'beranda'])->name('beranda');
