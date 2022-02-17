<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    
    protected $table='shifts';
    protected $guarded=['id'];

    public function users()
    {
        return $this->belongsToMany(User::class,'shift_users','shift_id','user_id');
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class,'shift_id');
    }
}
