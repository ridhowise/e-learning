<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class meetingname extends Model
{
    protected $table = 'meetingname';
    public $timestamps = true;

    public function class()
    {
      return $this->belongsTo('App\Models\kelas', 'class_id');
    }
}
