<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pcr', function () {
    return 'Selamat Datang di Website Kampus PCR!';
}); //route tidak termasuk ke dalam kontroler

// Route::get('/mahasiswa/{$param1}', function () {
//     return 'Halo Mahasiswa';
// });test

// Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);
Route::get('/mahasiswa/{param1?}', [MahasiswaController::class, 'show'])->name('mahasiswa.show');

Route::get('/nama/{param1}', function ($param1) {
    return 'Nama saya: '.$param1;
}); //parameter di dalam route harus ada agar route dapat diakses
//param1 akan dimasukkan sebagai parameter fungsi, nantinya parameter tersebut akan diretrun ke website

Route::get('/nim/{param1?}', function ($param1 = '') { //parameter harus memiliki nilai dasar, misalnya ''
    return 'NIM saya: '.$param1;
}); //cara agar parameter bersifat opsional harus ditambahkan tanda ?



// Route::get('/mhs', function () {
//     return 'Halo Mahasiswa';
// })->name('mahasiswa.show');
//alias, berguna agar bila ada perubahan route, tidak perlu mengubah keseluruhan kode sampai ke view, karena di view pakai alias

Route::get('/about', function(){
    return view('halaman-about');
});

Route::get('/home',[HomeController::class,'index']);
Route::get('/pegawai',[PegawaiController::class,'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
