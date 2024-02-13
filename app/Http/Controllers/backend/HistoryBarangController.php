<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\MasukBarang;
use App\Models\TambahBarang;
use App\Models\KeluarBarang;
use App\Models\PengembalianBarang;
use App\Models\PeminjamanBarang;
use App\Models\PengambilanBarang;

class HistoryBarangController extends Controller
{
    public function History()
    {  
      $barang = Barang::all();
      $pinjam = PeminjamanBarang::all();
      $ambil = PengambilanBarang::all();
      $kembali = PengembalianBarang::all();
      $tambah = TambahBarang::all();
      $masuk = MasukBarang::all();
      return view('admin.history.history_tes',compact('barang', 'pinjam', 'ambil', 'kembali'));
    }
    public function Search(Request $request)
    {
        $search = $request->search;
        $barang = Barang::where('nama_barang', 'LIKE', '%' . $search . '%')
                  ->orWhere('id', 'LIKE', '%' . $search . '%')
                  ->orWhere('serial_number', 'LIKE', '%' . $search . '%')
                  ->orWhere('id_barang', 'LIKE', '%' . $search . '%')
                  ->get();

        $tambah = TambahBarang::whereIn('barang_id', $barang->pluck('id'))
                  ->get();
        $masuk = MasukBarang::whereIn('barang_id', $barang->pluck('id'))
                  ->get();
        $pinjam = PeminjamanBarang::where('status', 'approved')
                  ->whereIn('barang_id', $barang->pluck('id'))
                  ->get();
        $ambil = PengambilanBarang::where('status', 'approved')
                  ->whereIn('barang_id', $barang->pluck('id'))
                  ->get();
        $kembali = PengembalianBarang::where('status', 'approved')
                  ->whereIn('barang_id', $barang->pluck('id'))
                  ->get();

        return view('admin.history.history', compact('barang','pinjam','ambil','kembali','tambah','masuk'));
    }

}
