<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'level_id', 'name', 'email', 'password', 'status_aktif',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function level(){
        return $this->belongsTo(Level::class,'level_id');
    }

    public function punyaLevel($level){
        // dd($this->Level);
        if($this->Level->level==$level){
            return true;
        }
        return false;
    }

    public function class(){
        return $this->belongsTo(kelas::class,'class_id');
    }
    public function nilai(){
    	return $this->hasMany(nilai::class,'quiz_id');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
