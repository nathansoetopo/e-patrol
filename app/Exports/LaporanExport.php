<?php

namespace App\Exports;

use App\Models\Barcode;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomValueBinder;

class LaporanExport extends \PhpOffice\PhpSpreadsheet\Cell\StringValueBinder implements WithCustomValueBinder, FromView
{
    protected $barcodeID;

    function __construct($barcodeID) {
            $this->barcodeID = $barcodeID;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $laporan = Barcode::find($this->barcodeID);
        $satpam = $laporan->users()->get();
        return view('pages.exports.laporan-excel', [
            'satpam' => $satpam,
            'laporan' => $laporan,
        ]);
    }
}
