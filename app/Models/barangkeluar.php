<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangkeluar extends Model
{
    protected $table = 'barangkeluar';
    public $timestamps = true;

    public function keluar()
    {
      return $this->belongsTo('App\Models\keluar', 'keluar_id');
    }

    public function barang()
    {
      return $this->belongsTo('App\Models\persediaan', 'barang_id');
    }
    
}
