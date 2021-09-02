<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    protected $table = 'quiz';
    public $timestamps = true;

    public function class()
    {
      return $this->belongsTo('App\Models\kelas', 'class_id');
    }
    public function soal(){
    	return $this->hasMany(soal::class,'soal_id');
    }
    public function nilai(){
    	return $this->hasMany(nilai::class,'quiz_id');
    }
    public function jawaban(){
    	return $this->hasMany(jawaban::class,'quiz_id');
    }
}
