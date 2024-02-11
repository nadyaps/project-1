<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ListBarang;
use App\Models\MasukBarang;
use App\Models\PeminjamanBarang;
use App\Models\KeluarBarang;
use Illuminate\Support\Facades\DB;

class ListBarangController extends Controller
{
    public function ListBarang()
    {
      DB::table('masuk_barangs')->count();
        $masukbarang = MasukBarang::orderBy('id_barang', 'desc')->limit(5)->get();
      DB::table('peminjaman_barangs')->count();
        $keluarbarang = PeminjamanBarang::where('status', 'Approved')->orderBy('id', 'desc')->limit(5)->get();

        return view('admin.listBarang.admin_list_barang')->with(compact('keluarbarang', 'masukbarang'));
    }
    public function ViewListBarang($id)
    {
        $masuk = MasukBarang::find($id);
        $pinjam = PeminjamanBarang::find($id);
        return view('admin.listBarang.view_list', compact('masuk', 'pinjam'));
    }

}
