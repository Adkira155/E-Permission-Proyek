<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardStudentController;
use App\Http\Controllers\DashboardTeacherClassController;
use App\Http\Controllers\DashboardTeacherController;
use App\Http\Controllers\DashboardTeacherMajorController;
use App\Http\Controllers\DashboardTeacherPermissionController;
use App\Http\Controllers\DashboardTeacherSubjectController;
use App\Http\Controllers\DashboardTeacherUserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SekolahController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('awal');
});
route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/siswa', [DashboardStudentController::class, 'index']);
    Route::resource('/guru', DashboardTeacherController::class);
    Route::get('/cariGuru', [DashboardTeacherController::class, 'cariGuru']);
    Route::resource('/mapel', DashboardTeacherSubjectController::class);
    Route::get('/cariMapel', [DashboardTeacherSubjectController::class, 'cariMapel']);
    Route::resource('/jurusan', DashboardTeacherMajorController::class);
    Route::get('/cariJurusan', [DashboardTeacherMajorController::class, 'cariJurusan']);
    Route::resource('/kelas', DashboardTeacherClassController::class);
    Route::get('/cariKelas', [DashboardTeacherClassController::class, 'cariKelas']);
    Route::resource('/pengguna', DashboardTeacherUserController::class);
    Route::get('/cariPengguna', [DashboardTeacherUserController::class, 'cariPengguna']);
    Route::get('/hapus', [DashboardTeacherUserController::class, 'hapus']);

    Route::get('/izin', [DashboardTeacherPermissionController::class, 'index']);
    Route::get('/izin/{id}', [DashboardTeacherPermissionController::class, 'show']);
    Route::get('/izin/{id}/accept', [DashboardTeacherPermissionController::class, 'accept']);
    Route::get('/izin/{id}/reject', [DashboardTeacherPermissionController::class, 'reject']);

    Route::get('/buat-izin', [PermissionController::class, 'index']);
    Route::post('/buat-izin', [PermissionController::class, 'store']);
    Route::get('/menunggu-persetujuan', [PermissionController::class, 'wait']);
    Route::get('/persetujuan-diterima', [PermissionController::class, 'accept']);
    Route::get('/persetujuan-ditolak', [PermissionController::class, 'reject']);

    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/datasekolah', [SekolahController::class, 'sekolah'])->name('sekolah');
    Route::get('/dataizin', [PermissionController::class, 'izin'])->name('izin');

    Route::get('/profile', [DashboardTeacherUserController::class, 'profile'])->name('profile');

});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginApp']);

    Route::get('/forgot', [AuthController::class, 'forgot'])->name('forgot');
    Route::get('/akun', [AuthController::class, 'aturakun'])->name('aturakun');
});

