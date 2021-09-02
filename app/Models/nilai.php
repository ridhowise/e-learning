<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    protected $table = 'nilai';
    public $timestamps = true;

    public function quiz()
    {
      return $this->belongsTo('App\Models\quiz', 'quiz_id');
    }
    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }
}
