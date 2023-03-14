<?php

namespace App\Exports\Dictionary;

use App\Models\DictionaryType;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DictionaryExport implements  WithMultipleSheets
{
    use Exportable;

    public $dictionary;

    public function __construct()
    {
        $this->dictionary  = DictionaryType::query()
            ->with(["dictionaries"])
            ->get();


    }

    public function sheets(): array
    {
        $tmp = [];

        foreach ($this->dictionary as $item){
            $item = (object)$item;
            array_push($tmp, new DictionaryPageExport($item->dictionaries,$item->title) );
        }
        return $tmp;
    }
}
