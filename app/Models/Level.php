<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = "levels";

    protected $fillable = ['levels'];

    public function user(){
    	return $this->hasMany(User::class);
    }
}
