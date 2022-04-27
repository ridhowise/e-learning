<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masuk extends Model
{
    protected $table = 'masuk';
    public $timestamps = true;

    public function barangmasuk()
    {
      return $this->hasMany('App\Models\barangmasuk', 'masuk_id');
    }
   
}
