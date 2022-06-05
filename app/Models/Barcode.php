<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    use HasFactory;

    protected $table='barcodes';
    protected $guarded=['id'];

    public function users()
    {
        return $this->belongsToMany(User::class,'barcode_users','barcode_id','user_id')->withPivot('range','attachment', 'selfie','status')->withTimestamps();
    }
}
