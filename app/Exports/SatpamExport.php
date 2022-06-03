<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;

class SatpamExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements WithCustomValueBinder, FromView
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  view(): View
    {
        return view('pages.exports.satpam-excel', [
            'satpam' => User::role('satpam')->get()
        ]);
    }
}
