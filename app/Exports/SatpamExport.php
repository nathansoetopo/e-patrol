<?php

namespace App\Exports;

use App\Models\user;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;

class SatpamExport implements FromCollection, WithHeadings, WithEvents
{
    /**
     * @return \Illuminate\Support\Collection
     */
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
        $type = DB::table('users')->select('id', 'name', 'nik', 'email', 'no_hp')->where('username', 'satpam')->get();
        return $type;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A1:G1')
                    ->getFont()
                    ->setBold(true);
            },
        ];
    }
}
