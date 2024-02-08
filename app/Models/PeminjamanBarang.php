<?php

namespace App\Models;

use Cjmellor\Approval\Traits\MustBeApproved;  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;  
use App\Models\KeluarBarang;

class PeminjamanBarang extends Model
{

  use MustBeApproved;

  protected $guarded = [];
}
