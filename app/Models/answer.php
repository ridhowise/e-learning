<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class answer extends Model
{
    protected $table = 'answer';
    public $timestamps = true;

    public function exam()
    {
      return $this->belongsTo('App\Models\exam', 'exam_id');
    }

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }
}
