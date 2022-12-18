<?php

namespace App\Exports\Dictionary;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DictionaryExport implements  WithMultipleSheets
{
    use Exportable;

    public $dictionary;

    public function __construct($dictionary)
    {
        $this->dictionary = $dictionary;
    }

    public function sheets(): array
    {
        return [
        /*    new DictionaryPageExport($this->dictionary["devices"],"Устройства"),
            new DictionaryPageExport($this->dictionary["bondaries"],"Рубежи"),
            new DictionaryPageExport($this->dictionary["device_groups"], "Группы устройств"),
            new DictionaryPageExport($this->dictionary["device_types"], "Типы устройств"),
            new DictionaryPageExport($this->dictionary["boundary_groups"], "Группы рубежей"),
            new DictionaryPageExport($this->dictionary["roles"], "Роли"),
            new DictionaryPageExport($this->dictionary["permissions"], "Разрешения"),*/
            // new DictionaryPageExport($this->reports,"voltage", "Напряжение"),
        ];
    }
}
