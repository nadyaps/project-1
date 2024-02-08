<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ListBarang;

class ListBarangController extends Controller
{
    public function ListBarang()
    {
        return view('admin.listBarang.admin_list_barang');
    }
    public function ViewListBarang()
    {
        return view('admin.listBarang.view_list');
    }
}
