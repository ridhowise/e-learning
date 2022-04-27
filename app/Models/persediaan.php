<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class persediaan extends Model
{
    protected $table = 'barang';
    public $timestamps = true;

    // public function class()
    // {
    //   return $this->belongsTo('App\Models\kelas', 'class_id');
    // }
    // public function soal(){
    // 	return $this->hasMany(soal::class,'soal_id');
    // }
    // public function nilai(){
    // 	return $this->hasMany(nilai::class,'persediaan_id');
    // }
    // public function jawaban(){
    // 	return $this->hasMany(jawaban::class,'persediaan_id');
    // }
}
