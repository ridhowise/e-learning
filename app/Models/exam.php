<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    protected $table = 'exam';
    public $timestamps = true;

    public function class()
    {
      return $this->belongsTo('App\Models\kelas', 'class_id');
    }

}
