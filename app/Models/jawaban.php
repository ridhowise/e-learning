<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jawaban extends Model
{
    protected $table = 'jawaban';
    public $timestamps = true;

    public function quiz()
    {
      return $this->belongsTo('App\Models\quiz', 'quiz_id');
    }

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function soal()
    {
      return $this->belongsTo('App\Models\soal', 'soal_id');
    }
}
