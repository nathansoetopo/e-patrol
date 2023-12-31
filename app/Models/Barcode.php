<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barcode extends Model
{
    use HasFactory;

    protected $table='barcodes';
    protected $guarded=[];

    public function users()
    {
        // return $this->belongsToMany(User::class,'barcode_users','barcode_id','user_id')->withPivot('id', 'range','attachment', 'selfie','status')->withTimestamps();
        return $this->belongsToMany(User::class,'barcode_users','barcode_id','user_id')->withPivot('id', 'deskripsi','range','attachment','selfie','tanggal_laporan','status')->withTimestamps();
    }
}
