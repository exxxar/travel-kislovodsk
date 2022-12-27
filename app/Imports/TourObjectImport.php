<?php

namespace App\Imports;

use App\Models\TourObject;
use Carbon\Carbon;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Row;

class TourObjectImport implements OnEachRow
{
    public function onRow(Row $row)
    {
        $rowIndex = $row->getIndex();
        $row = $row->toArray();

        if ($rowIndex == 1)
            return null;


        if ($row[0] == '')
            return;

        $images = [];
        for ($i = 8; $i <= 18; $i++)
            if (!empty($row[$i]))
                array_push($images, $row[$i]);

        try {
            $tourObject = TourObject::create([
                'title' => $row[1] ?? null,
                'description' => $row[2] ?? null,
                'city' => $row[3] ?? null,
                'address' => $row[4] ?? null,
                'latitude' => $row[5] ?? 0,
                'longitude' => $row[6] ?? 0,
                'comment' => $row[7] ?? null,
                'creator_id' => Auth::user()->id,
                'photos' => $images,
            ]);
        } catch (\Exception $ex) {
            throw new \Exception("Ошибка структуры файла");
        }

    }
}
