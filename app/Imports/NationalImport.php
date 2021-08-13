<?php

namespace App\Imports;

use App\Models\National;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

class NationalImport implements ToCollection
{
    use Importable;

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            National::create([
                'fname' => $row[0],
                'lname' => $row[1],
                'farm' => strtoupper($row[2]),
                'location' => strtolower($row[3]),
                'email' => isset($row[4]) ? (is_null($row[4]) ? null : $row[4]) : null,
                'contact' => isset($row[5]) ? (is_null($row[5]) ? null : $row[5]) : null,
                'fb' => isset($row[6]) ? (is_null($row[6]) ? null : $row[6]) : null,
                'ig' => isset($row[7]) ? (is_null($row[7]) ? null : $row[7]) : null,
                'website' => isset($row[8]) ? (is_null($row[8]) ? null : $row[8]) : null,
                'image' => isset($row[9]) ? (is_null($row[9]) ? null : $row[9]) : null,
            ]);
        }

        return back();
    }
}
