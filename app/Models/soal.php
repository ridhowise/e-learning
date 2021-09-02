<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class soal extends Model
{
    protected $table = 'soal';
    public $timestamps = true;

    public function quiz()
    {
      return $this->belongsTo('App\Models\quiz', 'quiz_id');
    }
}
