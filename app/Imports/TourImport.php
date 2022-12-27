<?php

namespace App\Imports;

use App\Models\Dictionary;
use App\Models\Tour;
use App\Models\TourObject;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
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

        $comfort_loading = is_null($row[7]) ? false : (boolean)$row[7];

        $images = [];

        for ($i = 19; $i <= 28; $i++)
            if (!empty($row[$i]))
                array_push($images, $row[$i]);

        $tmp = Dictionary::getDurationTypes()
            ->get()
            ->pluck("id")
            ->toArray();
        $duration_type_id = $tmp[0];

        $tmp = Dictionary::getMovementTypes()
            ->get()
            ->pluck("id")
            ->toArray();
        $movement_type_id = $tmp[0];

        $tmp = Dictionary::getTourTypes()
            ->get()
            ->pluck("id")
            ->toArray();
        $tour_type_id = $tmp[0];

        $tmp = Dictionary::getPaymentTypes()
            ->get()
            ->pluck("id")
            ->toArray();
        $payment_type_id = $tmp[0];

        try {
            $tour = Tour::create([
                'title' => $row[1],
                'base_price' => $row[2] ?? 0,
                'discount_price' => $row[3] ?? 0,
                'short_description' => $row[4] ?? null,
                'min_group_size' => (int)$row[5] ?? 0,
                'max_group_size' => (int)$row[6] ?? 0,
                'comfort_loading' => $comfort_loading,
                'description' => $row[8] ?? null,
                'start_city' => $row[9] ?? null,
                'start_address' => $row[10] ?? null,
                'start_latitude' => $row[11] ?? 0,
                'start_longitude' => $row[12] ?? 0,
                'start_comment' => $row[13] ?? null,
                'preview_image' => $row[14] ?? null,
                'duration' => $row[16] ?? null,
                'include_services' => $row[17] ?? null,
                'exclude_services' => $row[18] ?? null,
                'images' => $images,
                'is_hot' => false,
                'is_active' => false,
                'is_draft' => true,
                'payment_infos' => [
                    "Онлайн картой (МИР, Visa, MasterCard).",
                    "Онлайн электронными деньгами (ЮMoney).",
                    "Оффлайн в офисе по адресу",
                ],
                'prices' => [
                    (object)[
                        "base_price" => $row[2],
                        "discount_price" => $row[3],
                        "has_discount" => false,
                        "ticket_type_id" => (Dictionary::getTicketTypes()
                            ->where("slug", "standard_ticket_type")
                            ->first())
                            ->id
                    ],
                    (object)[
                        "base_price" => $row[2],
                        "discount_price" => $row[3],
                        "has_discount" => false,
                        "ticket_type_id" => (Dictionary::getTicketTypes()
                            ->where("slug", "children_ticket_type")
                            ->first())
                            ->id
                    ],
                    (object)[
                        "base_price" => $row[2],
                        "discount_price" => $row[3],
                        "has_discount" => false,
                        "ticket_type_id" => (Dictionary::getTicketTypes()
                            ->where("slug", "family_ticket_type")
                            ->first())
                            ->id
                    ]

                ],
                'duration_type_id' => $duration_type_id,
                'movement_type_id' => $movement_type_id,
                'tour_type_id' => $tour_type_id,
                'payment_type_id' => $payment_type_id,
                'creator_id' => Auth::user()->id,
            ]);
        }catch (\Exception $ex){
            throw new \Exception("Ошибка структуры файла");
        }

    }
}
