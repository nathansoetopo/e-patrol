<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table='presensi';
    protected $guarded=['id'];

    public function users()
    {
        return $this->belongsToMany(User::class,'presensi_user','presensi_id','user_id')->withPivot('attachment','status')->withTimestamps();
    }

    public function shifts()
    {
        return $this->belongsTo(Shift::class,'shift_id');
    }
}
