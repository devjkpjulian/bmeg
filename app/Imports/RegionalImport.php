<?php

namespace App\Imports;

use App\Models\Regional;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

class RegionalImport implements ToCollection
{
    use Importable;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Regional::create([
                'location_id' => $row[0],
                'name' => $row[1],
                'farm' => isset($row[2]) ? (is_null($row[2]) ? null : strtoupper($row[2])) : null,
                'location' => isset($row[3]) ? (is_null($row[3]) ? null : strtolower($row[3])) : null,
                'email' => isset($row[4]) ? (is_null($row[4]) ? null : $row[4]) : null,
                'contact' => isset($row[5]) ? (is_null($row[5]) ? null : $row[5]) : null,
                'fb' => isset($row[6]) ? (is_null($row[6]) ? null : $row[6]) : null,
                'ig' => isset($row[7]) ? (is_null($row[7]) ? null : $row[7]) : null,
                'website' => isset($row[8]) ? (is_null($row[8]) ? null : $row[8]) : null,
                'image' => isset($row[9]) ? (is_null($row[9]) ? null : $row[9]) : null,
            ]);
        }
    }
}
