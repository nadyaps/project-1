<?php

namespace App\Http\Controllers\backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MasukBarang;

class MasukBarangController extends Controller
{
    public function RegisterBarang()
    {
      $table = MasukBarang::oldest()->get();
      return view('admin.masukBarang.register_barang', compact('table'));
    } //End Method

    public function AddRegister()
    {
      return view('admin.masukBarang.add_register');
    } //End Method

    public function StoreRegister(Request $request)
    {
      $request->validate([
        'id_barang' => 'required',
        'serial_number' => 'required',
        'nama_barang' => 'required',
        'jumlah_barang' => 'required',
        'tanggal_masuk' => 'required',
      ]);

      $data = new MasukBarang;
      $data->id_barang = $request->id_barang;
      $data->serial_number = $request->serial_number;
      $data->nama_barang = $request->nama_barang;
      $data->tanggal_masuk = $request->tanggal_masuk;
      $data->jumlah_barang = $request->jumlah_barang;
      $data->jenis_barang = $request->jenis_barang;
      $data->lokasi_barang = $request->lokasi_barang;
      $data->deskripsi = $request->deskripsi;
      $data->resi_pengiriman = $request->resi_pengiriman;
      $data->pengirim = $request->pengirim;
      $data->owner = $request->owner;
      
      if($request->hasFile('photo_barang')){
        $file = $request->file('photo_barang');

        if($data->photo_barang){
          @unlink(public_path('barang_image/'.$data->photo_barang));
        }
        $filename = date('YmdHis').$file->getClientOriginalName();
        $file->move(public_path('barang_image'),$filename);
        $data->photo_barang = $filename;
      } 

      $data->save();
      $notification = array(
        'message' => 'Barang berhasil ditambahkan',
        'alert-type' => 'success'
      );
      return redirect()->route('register.barang')->with($notification);
    }//End Method

    public function ViewRegister($id)
    {
      $item = MasukBarang::find($id);
      return view('admin.masukBarang.view_register', compact('item'));

    } //End Method

    public function EditRegister($id)
    {
      $item = MasukBarang::findOrFail($id);
      return view('admin.masukBarang.edit_register', compact('item'));
    } //End Method

    public function UpdateRegister(Request $request)
    {
      $pid = $request->id;

      $data = MasukBarang::find($pid);
      $data->id_barang = $request->id_barang;
      $data->serial_number = $request->serial_number;
      $data->nama_barang = $request->nama_barang;
      $data->tanggal_masuk = $request->tanggal_masuk;
      $data->jumlah_barang = $request->jumlah_barang;
      $data->jenis_barang = $request->jenis_barang;
      $data->lokasi_barang = $request->lokasi_barang;
      $data->deskripsi = $request->deskripsi;
      $data->resi_pengiriman = $request->resi_pengiriman;
      $data->pengirim = $request->pengirim;
      $data->owner = $request->owner;

      if($request->hasFile('photo_barang')){
        $file = $request->file('photo_barang');

        if($data->photo_barang){
          @unlink(public_path('barang_image/'.$data->photo_barang));
        }
        $filename = date('YmdHis').$file->getClientOriginalName();
        $file->move(public_path('barang_image'),$filename);
        $data->photo_barang = $filename;
      }

      $data->save();
      $notification = array(
        'message' => 'Barang berhasil diubah',
        'alert-type' => 'success'
      );
      return redirect()->route('register.barang')->with($notification);
    } //End Method

    public function DeleteRegister($id)
    {
      $data = MasukBarang::find($id);
      if($data->photo_barang){
        @unlink(public_path('barang_image/'.$data->photo_barang));
      }
      $data->delete();
      $notification = array(
        'message' => 'Barang berhasil dihapus',
        'alert-type' => 'success'
      );
      return redirect()->route('register.barang')->with($notification);
    } //End Method
  
    public function TambahBarang()
    {
      $table = MasukBarang::latest()->get();
      return view('admin.masukBarang.tambah_barang', compact('table'));
    }//End Method

    public function AddTambah()
    {
      return view('admin.masukBarang.add_tambah');
    }//End Method

    public function SearchTambah(Request $request)
    {
        $id_barang = $request->input('id_barang');
        $serial_number = $request->input('serial_number');

        $barang = MasukBarang::where('id_barang', $id_barang)
                         ->where('serial_number', $serial_number)
                         ->first();

        if (!$barang) {
            session()->flash('error', 'Barang tidak ditemukan.');
            return redirect()->back();
        }

        return view('admin.masukBarang.add_tambah', compact('barang'));
    }//End Method

    public function TambahQuantity(Request $request)
    {
      $pid = $request->id;

        $barang = MasukBarang::findOrFail($pid);

        $barang->jumlah_barang += $request->input('jumlah_barang');
        $barang->tanggal_masuk = now();

        $barang->save();

        session()->flash('success', 'Berhasil menambahkan jumlah barang.');
        return redirect()->route('tambah.barang');
    }//End Method

}
