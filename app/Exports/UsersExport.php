<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::select()->where('username', 'hrd')->downloadExcel(
            $disk = null,
            $writerType = null,
            $headings = true
        )->get();
    }
}
