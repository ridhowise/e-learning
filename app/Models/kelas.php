<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    protected $table = 'class';
    public $timestamps = true;

    public function user(){
    	return $this->hasMany(User::class);
    }
}
