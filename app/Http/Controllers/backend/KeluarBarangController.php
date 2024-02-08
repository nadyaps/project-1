<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KeluarBarang;

class KeluarBarangController extends Controller
{
  public function PeminjamanBarang()
  {
    $table = KeluarBarang::latest()->get();
    return view('admin.keluarBarang.peminjaman_barang');
  }

  public function PengembalianBarang()
  {
    $table = KeluarBarang::latest()->get();
    return view('admin.keluarBarang.pengembalian_barang');
  }

  public function PengambilanBarang()
  {
    $table = KeluarBarang::latest()->get();
    return view('admin.keluarBarang.pengambilan_barang');
  }
}
