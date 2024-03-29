<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeluarBarang extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function barang ()
    {
      return $this->belongsTo(Barang::class);
    }

    public function peminjamanBarang ()
    {
      return $this->belongsTo(PeminjamanBarang::class);
    }
}
