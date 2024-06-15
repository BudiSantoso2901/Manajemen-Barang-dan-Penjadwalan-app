<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\kontenController;
use App\Http\Controllers\ProfileController;


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
    return view('dashboard');
});
Route::prefix('user')->group(function () {
    Route::get('register', [UserController::class, 'register'])->name('register');
    Route::post('process-register', [UserController::class, 'processRegister']);
    Route::get('register-success/{id}', [UserController::class, 'registerSuccess']);

    // //view
    Route::get('/dash', [kontenController::class, 'dashVIew'])->name('dash');
    Route::get('/anggota', [kontenController::class, 'anggotaVIew'])->name('user.anggota');
    Route::get('/liputan', [kontenController::class, 'liputanVIew'])->name('user.liputan');
    Route::get('/jadwal', [kontenController::class, 'JadwalVIew'])->name('user.jadwal');
    Route::get('/barang', [kontenController::class, 'barangVIew'])->name('user.barang');

    // LOGIN & LOGOUT
    Route::get('login', [UserController::class, 'login'])->name('login');
    Route::post('process-login', [UserController::class, 'processLogin']);
    Route::get('process-logout', [UserController::class, 'logout'])->name('logout');

    //tampil isi data setiap konten
    Route::get('/input/liputan', [kontenController::class, 'inpuLiputanView'])->name('Form.inputLiputan');
    Route::post('/store', [kontenController::class, 'StoreLiputan'])->name('liputan.store');
    Route::get('/delete/{id}', [kontenController::class, 'destroyLiputan'])->name('liputan.delete');
    //FITUR
    Route::get('/input/jadwal', [kontenController::class, 'inputJadwal'])->name('Form.inputJadwal');
    Route::post('/jadwalStore', [kontenController::class, 'store_jadwal'])->name('jadwal.store');

    //Status Edit
    Route::get('/jadwal/status/{id}', [kontenController::class, 'status_view'])->name('Form.status');
    Route::put('/jadwal/status/edit/{id}', [kontenController::class, 'edit_status'])->name('status.update');

    //Profile
    Route::get('/profile', [ProfileController::class, 'profilePage'])->name('profile.view');
    Route::post('/profile/save', [ProfileController::class, 'save'])->name('profile.save');
});

Route::prefix('Admin')->middleware(['auth', 'check-access:1'])->group(function () {

    //USER
    Route::get('/view/anggota', [AdminController::class, 'viewAnggota'])->name('Admin.view.anggota');
    Route::get('/anggota/form', [AdminController::class, 'create'])->name('Admin.form.anggota');
    Route::post('/anggota/store', [AdminController::class, 'createAnggota'])->name('store.anggota');
    Route::get('/edit_anggota/{agt}', [AdminController::class, 'editAnggota'])->name('Admin.form.edit_anggota');
    Route::put('/edit_anggota/update/{agt}', [AdminController::class, 'updateAnggota'])->name('Admin.form.update');
    Route::get('/delete/anggota/{id}', [AdminController::class, 'userdelete'])->name('Admin.anggota.delete');

    //BARANG ADMIN CRUD
    Route::get('/view/barang', [AdminController::class, 'view_barang'])->name('Admin.view.barang');
    Route::get('/add/barang', [AdminController::class, 'add_barang'])->name('Admin.Form.inputbarang');
    Route::post('/store/barang', [AdminController::class, 'barang_store'])->name('barang.store');
    Route::get('/edit/barang/{id}', [AdminController::class, 'barangEdit'])->name('Admin.Form.edit_barang');
    Route::put('/update/barang/{id}', [AdminController::class, 'barangUpdate'])->name('Admin.barang.update');
    Route::get('/delete/barang/{id}', [AdminController::class, 'barangDelete'])->name('barang.delete');

    //LIPUTAN
    Route::get('/view/liputan', [AdminController::class, 'view_liputan'])->name('Admin.view.liputan');
    Route::get('/add/liputan', [AdminController::class, 'add_liputan'])->name('Admin.Form.inputLiputan');
    Route::post('/store/liputan', [AdminController::class, 'Store_Liputan'])->name('Admin.liputan.store');
    Route::get('/delete/liputan/{id}', [AdminController::class, 'liputandelete'])->name('Admin.liputan.delete');

    //JADWAL
    Route::get('/view/jadwal', [AdminController::class, 'view_jadwal'])->name('Admin.view.jadwal');
    Route::get('/add/jadwal', [AdminController::class, 'view_add_jadwal'])->name('Admin.Form.InputJadwal');
    Route::post('/store/jadwal', [AdminController::class, 'store_jadwal'])->name('Admin.jadwal.store');
    Route::get('/delete/jadwal/{id}', [AdminController::class, 'jadwaldelete'])->name('Admin.jadwal.delete');
    //jadwal status

    Route::get('/status/jadwal/edit/{id}', [AdminController::class, 'status_view_admin'])->name('Admin.Form.status');
    Route::put('/status/jadwal/{id}', [AdminController::class, 'edit_status'])->name('Admin.status');


    Route::get('/export-jadwal', [AdminController::class, 'export'])->name('export-jadwal');
    Route::get('/export-barang', [AdminController::class, 'exportBarang'])->name('export-barang');
});
