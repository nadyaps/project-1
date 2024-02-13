<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TambahBarang;
use App\Models\MasukBarang;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;

class TambahBarangController extends Controller
{
  public function TambahBarang()
  {
    $tambah = TambahBarang::all();
    return view('admin.masukBarang.tambah_barang', compact('tambah'));
  }//End Method

  public function AddTambah()
  {
    $data = Barang::all();
    return view('admin.masukBarang.add_tambah', compact('data'));
  }//End Method

  public function StoreTambahBarang(Request $request)
  {
    $request->validate([
      'jumlah_tambah' => 'required',
      'tanggal_tambah' => 'required',
      'resi_pengiriman' => 'required',
      'pengirim' => 'required',
      'owner' => 'required',
      'deskripsi' => 'required',
    ]);
    $pid = $request->id_barang;
    $tambahbarang = TambahBarang::find($pid);
    $masukBarang = Barang::find($request->id_barang);
    $jumlah_barang =  $masukBarang->jumlah_barang + $request->jumlah_tambah;
    $masukBarang -> jumlah_barang = $jumlah_barang;
    $masukBarang->save();
    
    $tambahbarang = new TambahBarang();
    $tambahbarang->jumlah_tambah = $request->jumlah_tambah;
    $tambahbarang->tanggal_tambah = $request->tanggal_tambah;
    $tambahbarang->resi_pengiriman = $request->resi_pengiriman;
    $tambahbarang->pengirim = $request->pengirim;
    $tambahbarang->owner = $request->owner;
    $tambahbarang->deskripsi = $request->deskripsi;
    $tambahbarang->barang_id = Barang::find($request->id_barang)->id;
   

    if($request->hasFile('photo_tambahbarang')){
      $file = $request->file('photo_tambahbarang');

      if($tambahbarang->photo_tambahbarang){
        @unlink(public_path('tambah_image/'.$tambahbarang->photo_tambahbarang));
      }
      $filename = date('YmdHis').$file->getClientOriginalName();
      $file->move(public_path('tambah_image'),$filename);
      $tambahbarang->photo_tambahbarang = $filename;
    }

    $tambahbarang->save();

    $notification = array(
      'message' => 'Barang berhasil ditambahkan',
      'alert-type' => 'success'
    );
    return redirect()->route('tambah.barang')->with($notification);
  }//End Method

  public function ViewTambahBarang($id)
  {
    $tambah = TambahBarang::find($id);
    return view('admin.masukBarang.view_tambah', compact('tambah'));
  }//End Method

  public function EditTambahBarang($id)
  {
    $tambah = TambahBarang::findOrFail($id);
    return view('admin.masukBarang.edit_tambah', compact('tambah'));
  }//End Method


  public function UpdateTambahBarang(Request $request)
{
  $data = TambahBarang::find($request->id);

  $data->jumlah_tambah = $request->jumlah_tambah;
  $data->tanggal_tambah = $request->tanggal_tambah;
  $data->resi_pengiriman = $request->resi_pengiriman;
  $data->pengirim = $request->pengirim;
  $data->owner = $request->owner;
  $data->deskripsi = $request->deskripsi;

  if($request->hasFile('photo_tambahbarang')){
    $file = $request->file('photo_tambahbarang');

    if($data->photo_tambahbarang){
      @unlink(public_path('tambah_image/'.$data->photo_tambahbarang));
    }
    $filename = date('YmdHis').$file->getClientOriginalName();
    $file->move(public_path('tambah_image'),$filename);
    $data->photo_tambahbarang = $filename;
  }

  $data->save();
  $notification = array(
    'message' => 'Barang berhasil diubah',
    'alert-type' => 'success'
  );
  return redirect()->route('tambah.barang')->with($notification);
}

public function DeleteTambahBarang($id)
{
  $tambah = TambahBarang::find($id);
  if($tambah->photo_tambahbarang){
    @unlink(public_path('tambah_image/'.$tambah->photo_tambahbarang));
  }
  $tambah->delete();
  $notification = array(
    'message' => 'Barang berhasil dihapus',
    'alert-type' => 'success'
  );
  return redirect()->route('tambah.barang')->with($notification);
}

}
