<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Presensi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PresensiExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements WithCustomValueBinder, FromView, WithHeadings
{
    protected $presensiID;

    function __construct($presensiID)
    {
        $this->presensiID = $presensiID;
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $presensi = Presensi::find($this->presensiID);
        $satpam = $presensi->users()->get();
        return view('pages.exports.presensi-excel', [
            'satpam' => $satpam,
            'presensi' => $presensi,
        ]);
    }

    public function headings(): array
    {

        return [
            'ID',
            'Shift ID',
            'Name',
            'Start Time',
            'End Time',
            'Status',
            'Created At',
            'Updated At',
        ];
    }
}
