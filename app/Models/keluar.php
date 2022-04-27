<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class keluar extends Model
{
    protected $table = 'keluar';
    public $timestamps = true;

    public function barangkeluar()
    {
      return $this->hasMany('App\Models\barangkeluar', 'keluar_id');
    }
   
}
