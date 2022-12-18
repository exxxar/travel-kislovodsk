<?php

namespace App\Exports\Dictionary;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use function view;

class DictionaryPageExport implements FromView
{
    private $data;
    private $sheetTitle;



    public function __construct($data, $sheetTitle)
    {

        $this->data = $data;
        $this->sheetTitle = $sheetTitle;
    }

    public function view(): View
    {
        return view('exports.dictionary', [
            "title" => $this->sheetTitle,
            "dicionary"=>$this->data
        ]);
    }

}
