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
        return $this->belongsToMany(User::class,'shift_users','user_id','shift_id');
    }
}
