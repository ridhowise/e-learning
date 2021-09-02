<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pertemuan extends Model
{
    protected $table = 'meeting';
    public $timestamps = true;

    public function class()
    {
      return $this->belongsTo('App\Models\kelas', 'class_id');
    }
}
