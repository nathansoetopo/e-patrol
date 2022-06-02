<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Presensi;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;


class HrdExport implements FromCollection, WithHeadings, WithEvents
{
    public function headings(): array
    {

        return [
            'ID',
            'Nama',
            'NIK',
            'Email',
            'Phone',
            'Foto',
        ];
    }
    public function collection()
    {
        $IDsatpam = User::where('username', 'satpam')->pluck('id');
        // return $IDsatpam;
        // $name = DB::table('presensi_user')->where('user_id', $IDsatpam)->get();
        // $type = Presensi::where('user_id', $IDsatpam)->pluck('id', 'user_id', 'presensi_id', 'status');
        $type = DB::table('users')->select('id', 'name', 'nik', 'email', 'no_hp')->where('username', 'hrd')->get();
        return $type;
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:H1')
                    ->getFont()
                    ->setBold(true);
            },
        ];
    }
}
