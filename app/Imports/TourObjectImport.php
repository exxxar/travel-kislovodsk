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

        if (strpos(",", ($row[7] ?? '')) > 0)
            $photos = explode(",", $row[7]);
        else
            $photos = $row[7];

        $tourObject = TourObject::create([
            'title' => $row[0],
            'description' => $row[1],
            'city' => $row[2],
            'address' => $row[3],
            'latitude' => $row[4],
            'longitude' => $row[5],
            'comment' => $row[6],
            'creator_id' => Auth::user()->id,
            'photos' => json_encode("[$photos]"),
        ]);

    }
}
