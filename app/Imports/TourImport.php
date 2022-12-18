<?php

namespace App\Imports;

use App\Models\Tour;
use App\Models\TourObject;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Row;

class TourImport implements OnEachRow
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

        $tour = Tour::create([
            'title'=> $row[0],
            'base_price'=> $row[1],
            'discount_price'=> $row[2],
            'short_description'=> $row[3],
            'min_group_size'=> $row[4],
            'max_group_size'=> $row[5],
            'comfort_loading'=> $row[6],

            'description'=> $row[7],
            'start_city'=> $row[8],
            'start_address'=> $row[9],
            'start_latitude'=> $row[10],
            'start_longitude'=> $row[11],
            'start_comment'=> $row[12],
            'preview_image'=> $row[13],
            'duration'=> $row[14],
            'images'=> $row[15],
            'payment_infos'=> $row[16],
            'prices'=> $row[17],
            'include_services'=> $row[18],
            'exclude_services'=> $row[19],
            'duration_type_id'=> $row[20],
            'movement_type_id'=> $row[21],
            'tour_type_id'=> $row[22],
            'payment_type_id'=> $row[23],
            'creator_id'=> Auth::user()->id,

        ]);

    }
}
