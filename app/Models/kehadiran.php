<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kehadiran extends Model
{
    protected $table = 'kehadiran';
    public $timestamps = true;

    public function pertemuan()
    {
      return $this->belongsTo('App\Models\pertemuan', 'meeting_id');
    }

    public function user()
    {
      return $this->belongsTo('App\Models\User', 'user_id');
    }
}
