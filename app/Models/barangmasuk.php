<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barangmasuk extends Model
{
    protected $table = 'barangmasuk';
    public $timestamps = true;

    public function masuk()
    {
      return $this->belongsTo('App\Models\masuk', 'masuk_id');
    }

    public function barang()
    {
      return $this->belongsTo('App\Models\persediaan', 'barang_id');
    }
    
}
