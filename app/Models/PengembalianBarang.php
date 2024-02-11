<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianBarang extends Model
{
    use HasFactory;
    protected $guarded = [];
  
    public function barang ()
    {
      return $this->belongsTo(PeminjamanBarang::class);
    }

    public function masukbarang ()
    {
      return $this->belongsTo(MasukBarang::class);
    }

    public function user ()
    {
      return $this->belongsTo(User::class);
    }
}
