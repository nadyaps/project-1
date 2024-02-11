<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\MasukBarangController;
use App\Http\Controllers\backend\KeluarBarangController;
use App\Http\Controllers\backend\ListBarangController;
use App\Http\Controllers\backend\HistoryBarangController;
use App\Http\Controllers\backend\PeminjamanBarangController;
use App\Http\Controllers\backend\PengambilanBarangController;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// User Group Middleware

Route::middleware(['auth', 'role:user'])->group(function () {

  Route::get('dashboard' , [Controller::class, 'Dashboard'])
  ->name('dashboard');

  Route::get('logout' , [Controller::class, 'UserLogout'])
  ->name('user.logout');

  Route::get('profile' , [Controller::class, 'Profile'])
  ->name('profile');
  Route::post('profile/store' , [Controller::class, 'ProfileStore'])
  ->name('profile.store');

  Route::get('change/password' , [Controller::class, 'ChangePassword'])
  ->name('change.password');
  Route::post('update/password' , [Controller::class, 'UpdatePassword'])
  ->name('update.password');

  Route::get('kembalibarang' , [Controller::class, 'KembaliBarang'])
  ->name('kembali.barang');

  Route::fallback(function () {
    return view('404_page');
  });
  
}); //End group User Middleware

Route::middleware(['auth', 'role:user'])->group(function () {

  Route::controller(PeminjamanBarangController::class)->group(function(){

    Route::get('pinjam/barang' , 'PinjamBarang')->name('pinjam.barang');
    Route::get('create/pinjam/barang' , 'CreatePinjamBarang')->name('create.pinjam.barang');
    Route::post('store/pinjam/barang' , 'StorePinjamBarang')->name('store.pinjam.barang');
    Route::get('view/pinjam/barang/{id}' , 'ViewPinjamBarang')->name('view.pinjam.barang');
    Route::post('update/pinjam/barang/' , 'UpdatePinjamBarang')->name('update.pinjam.barang');
    Route::get('delete/pinjam/barang/{id}' , 'DeletePinjamBarang')->name('delete.pinjam.barang');

  });

  Route::controller(PengambilanBarangController::class)->group(function(){

    Route::get('ambil/barang' , 'AmbilBarang')->name('ambil.barang');
    Route::get('create/ambil/barang' , 'CreateAmbilBarang')->name('create.ambil.barang');
    Route::post('store/ambil/barang' , 'StoreAmbilBarang')->name('store.ambil.barang');
    Route::get('view/ambil/barang/{id}' , 'ViewAmbilBarang')->name('view.ambil.barang');
    Route::post('update/ambil/barang/' , 'UpdateAmbilBarang')->name('update.ambil.barang');
    Route::get('delete/ambil/barang/{id}' , 'DeleteAmbilBarang')->name('delete.ambil.barang');

  });

}); // End group Auth + Role User Middleware


// Admin Group Middleware

Route::middleware(['auth', 'role:admin'])->group(function () {

  Route::get('/admin/user' , [AdminController::class, 'AdminUser'])
  ->name('admin.user');
  Route::get('/add/user' , [AdminController::class, 'AddUser'])
  ->name('add.user');
  Route::post('/store/user' , [AdminController::class, 'StoreUser'])
  ->name('store.user');
  Route::get('view/user/{id}' , [AdminController::class, 'UserView'])
  ->name('view.user');
  Route::get('delete/user/{id}' , [AdminController::class, 'UserDelete'])
  ->name('delete.user');
  
  Route::get('/admin/dashboard' , [AdminController::class, 'AdminDashboard'])
  ->name('admin.dashboard');

  Route::get('/admin/logout' , [AdminController::class, 'AdminLogout'])
  ->name('admin.logout');

  Route::get('/admin/profile' , [AdminController::class, 'AdminProfile'])
  ->name('admin.profile');
  
  Route::post('/admin/profile/store' , [AdminController::class, 'AdminProfileStore'])
  ->name('admin.profile.store');

  Route::get('/admin/change/password' , [AdminController::class, 'AdminChangePassword'])
  ->name('admin.change.password');

  Route::post('/admin/update/password' , [AdminController::class, 'AdminUpdatePassword'])
  ->name('admin.update.password');
  

}); //End group Admin Middleware

Route::get('/admin/login' , [AdminController::class, 'AdminLogin'])
->name('admin.login');

// Admin Group Middleware

Route::middleware(['auth', 'role:admin'])->group(function () {

// Masuk Barang Group Route
Route::controller(MasukBarangController::class)->group(function(){

    Route::get('/admin/registerbarang' , 'RegisterBarang')->name('register.barang');
    Route::get('/admin/addregister' , 'AddRegister')->name('add.register');
    Route::post('/admin/storeregister' , 'StoreRegister')->name('store.register');
    Route::get('/admin/viewregister/{id}' , 'ViewRegister')->name('view.register');
    Route::get('/admin/editregister/{id}' , 'EditRegister')->name('edit.register');
    Route::post('/admin/updateregister/' , 'UpdateRegister')->name('update.register');
    Route::get('/admin/deleteregister/{id}' , 'DeleteRegister')->name('delete.register');

    Route::get('/admin/tambahbarang' , 'TambahBarang')->name('tambah.barang');
    Route::get('/admin/addtambah' , 'AddTambah')->name('add.tambah');
    Route::get('/admin/search/tambah' , 'SearchTambah')->name('barang.search.tambah');
    Route::post('/admin/tambah/quantity' , 'TambahQuantity')->name('barang.tambah.quantity');
});

Route::controller(KeluarBarangController::class)->group(function(){

  Route::get('/admin/pengembalianbarang' , 'PengembalianBarang')->name('pengembalian.barang');

  Route::get('/admin/pengambilanbarang' , 'PengambilanBarang')->name('pengambilan.barang');
  Route::get('/admin/accept/ambil/{id}', 'AcceptAmbil')->name('accept.ambil');
  Route::get('/admin/reject/ambil/{id}', 'RejectAmbil')->name('reject.ambil');
  Route::get('/admin/view/pengambilan/{id}', 'ViewPengambilan')->name('view.pengambilan');

  Route::get('/admin/peminjamanbarang' , 'PeminjamanBarang')->name('peminjaman.barang');
  Route::get('/accept/request/{id}', 'AcceptRequest')->name('accept.request');
  Route::get('/reject/request/{id}', 'RejectRequest')->name('reject.request');
  Route::get('/view/peminjaman/{id}', 'ViewPeminjaman')->name('view.peminjaman');
});
// End Keluar Barang Group Route


Route::controller(ListBarangController::class)->group(function(){
  
    Route::get('/admin/listbarang' , 'ListBarang')->name('list.barang');
    Route::get('/admin/viewlistbarang/{id}' , 'ViewListBarang')->name('view.list_barang');
});    

Route::controller(HistoryBarangController::class)->group(function(){
  
    Route::get('/admin/history' , 'History')->name('history');
    Route::get('/admin/historytimeline' , 'HistoryTimeline')->name('historytimeline');
});


}); //End group Admin Middleware

Route::fallback(function () {
  return view('404_page');
});