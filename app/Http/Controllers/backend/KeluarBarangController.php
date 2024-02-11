<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\KeluarBarang;
use App\Models\PeminjamanBarang;
use App\Models\PengambilanBarang;
use App\Models\MasukBarang;

class KeluarBarangController extends Controller
{
  public function PeminjamanBarang()
  {
    $pinjam = PeminjamanBarang::all();
    return view('admin.keluarBarang.peminjaman_barang', compact('pinjam'));
  }
  public function ViewPeminjaman($id)
  {
    $pinjam = PeminjamanBarang::find($id);
    return view('admin.keluarBarang.view_peminjaman', compact('pinjam'));
  }
  

  public function AcceptRequest($id)
  {
      $peminjamanBarang = PeminjamanBarang::find($id);
  
      if ($peminjamanBarang) {
          $peminjamanBarang->status = 'approved';
          $peminjamanBarang->save();
  
          $masukBarang = MasukBarang::find($peminjamanBarang->barang_id);
  
          if ($masukBarang) {
              $masukBarang->jumlah_barang = $masukBarang->jumlah_barang - $peminjamanBarang->jumlah_pinjam;
              $masukBarang->save();
  
              $notification = array(
                  'message' => 'Peminjaman Barang Berhasil di Approve',
                  'alert-type' => 'success'
              );
  
              return redirect()->back()->with($notification);
          } else {
              $notification = array(
                  'message' => 'Barang tidak ditemukan',
                  'alert-type' => 'error'
              );
  
              return redirect()->back()->with($notification);
          }
      } else {
          $notification = array(
              'message' => 'Peminjaman Barang tidak ditemukan',
              'alert-type' => 'error'
          );
  
          return redirect()->back()->with($notification);
      }
  }

  public function RejectRequest($id)
  {
      $peminjamanBarang = PeminjamanBarang::find($id);

      if ($peminjamanBarang) {
          $peminjamanBarang->status = 'reject';
          $peminjamanBarang->save();

          $notification = array(
              'message' => 'Peminjaman Barang Berhasil di Reject',
              'alert-type' => 'error'
          );

          return redirect()->back()->with($notification);
      } else {
          $notification = array(
              'message' => 'Peminjaman Barang tidak ditemukan',
              'alert-type' => 'error'
          );

          return redirect()->back()->with($notification);
      }
  }

  public function PengembalianBarang()
  {
    $table = KeluarBarang::latest()->get();
    return view('admin.keluarBarang.pengembalian_barang');
  }


  public function PengambilanBarang()
  {
    $ambil = PengambilanBarang::all();
    return view('admin.keluarBarang.pengambilan_barang', compact('ambil'));
  }

  public function ViewPengambilan($id)
  {
    $ambil = PengambilanBarang::find($id);
    return view('admin.keluarBarang.view_pengambilan', compact('ambil'));
  }

  public function AcceptAmbil($id)
  {
    $ambilBarang = PengambilanBarang::find($id);

    if ($ambilBarang) {
        $ambilBarang->status = 'approved';
        $ambilBarang->save();

        $masukBarang = MasukBarang::find($ambilBarang->barang_id);

        if ($masukBarang) {
            $masukBarang->jumlah_barang = $masukBarang->jumlah_barang - $ambilBarang->jumlah_ambil;
            $masukBarang->save();

            $notification = array(
                'message' => 'Pengambilan Barang Berhasil di Approve',
                'alert-type' => 'success'
            );

            return redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Barang tidak ditemukan',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } else {
        $notification = array(
            'message' => 'Pengambilan Barang tidak ditemukan',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
  }

  public function RejectAmbil($id)
  {
    $ambilBarang = PengambilanBarang::find($id);

    if ($ambilBarang) {
        $ambilBarang->status = 'reject';
        $ambilBarang->save();

        $notification = array(
            'message' => 'Pengambilan Barang Berhasil di Reject',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    } else {
        $notification = array(
            'message' => 'Pengambilan Barang tidak ditemukan',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }
  }


}
