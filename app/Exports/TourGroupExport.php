<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class TourGroupExport implements FromView
{
    private $bookings;
    private $sheetTitle;



    public function __construct($data, $sheetTitle)
    {

        $this->bookings = $data;
        $this->sheetTitle = $sheetTitle;
    }


    public function view(): View
    {
        // TODO: Implement view() method.

        return view('exports.tour-group', [
            "title" => $this->sheetTitle,
            "bookings"=>$this->bookings

        ]);
    }


}
