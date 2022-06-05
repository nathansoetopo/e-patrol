<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;

class HrdExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements WithCustomValueBinder, FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function  view(): View
    {
        return view('pages.exports.hrd-excel', [
            'hrd' => User::role('hrd')->get()
        ]);
    }
}
