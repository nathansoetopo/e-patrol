<?php

namespace App\Exports;

use App\Models\user;
use Illuminate\Foundation\Auth\User as AuthUser;
use Maatwebsite\Excel\Concerns\FromCollection;

class SatpamExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select()->where('username', 'satpam')->get();
    }
}
