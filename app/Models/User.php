<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded=['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function shifts()
    {
        return $this->belongsToMany(Shift::class,'shift_users','user_id','shift_id');
    }

    public function presensi()
    {
        return $this->belongsToMany(Presensi::class,'presensi_user','user_id','presensi_id')->withPivot('laporan','detail','attachment','status')->withTimestamps();
    }

    public function barcodes()
    {
        return $this->belongsToMany(Barcode::class,'barcode_users','user_id','barcode_id')->withPivot('deskripsi','range','attachment','selfie','tanggal_laporan','status')->withTimestamps();
    }

    // public function barcodes_second()
    // {
    //     return $this->belongsToMany(Barcode::class,'barcode_users_second','user_id','barcode_id')->withPivot('range','attachment','status')->withTimestamps();
    // }

    // public function user_presensi()
    // {
    //     return $this->hasMany(Presensi::class);
    // }
}
