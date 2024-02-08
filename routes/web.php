<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\MasukBarangController;
use App\Http\Controllers\backend\KeluarBarangController;
use App\Http\Controllers\backend\ListBarangController;
use App\Http\Controllers\backend\HistoryBarangController;

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

  Route::get('ambilbarang' , [Controller::class, 'AmbilBarang'])
  ->name('ambil.barang');

  Route::get('kembalibarang' , [Controller::class, 'KembaliBarang'])
  ->name('kembali.barang');

  Route::get('pinjambarang' , [Controller::class, 'PinjamBarang'])
  ->name('pinjam.barang');

  Route::fallback(function () {
    return view('404_page');
  });
  
}); //End group User Middleware



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

  Route::get('/admin/peminjamanbarang' , 'PeminjamanBarang')->name('peminjaman.barang');

  Route::get('/admin/pengembalianbarang' , 'PengembalianBarang')->name('pengembalian.barang');

  Route::get('/admin/pengambilanbarang' , 'PengambilanBarang')->name('pengambilan.barang');

});

Route::controller(ListBarangController::class)->group(function(){
  
    Route::get('/admin/listbarang' , 'ListBarang')->name('list.barang');
    Route::get('/admin/viewlistbarang' , 'ViewListBarang')->name('view.list_barang');
});    

Route::controller(HistoryBarangController::class)->group(function(){
  
    Route::get('/admin/history' , 'History')->name('history');
    Route::get('/admin/historytimeline' , 'HistoryTimeline')->name('historytimeline');
});


}); //End group Admin Middleware

Route::fallback(function () {
  return view('404_page');
});