<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TourExport implements FromView
{
    private $tours;

    public function __construct($data)
    {

        $this->tours = $data;
    }

    public function view(): View
    {
        return view('exports.tour', [
            "tours" => $this->tours
        ]);
    }

}
