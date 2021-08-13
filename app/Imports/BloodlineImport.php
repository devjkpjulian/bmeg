<?php

namespace App\Imports;

use App\Models\Bloodline;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

class BloodlineImport implements ToCollection
{
    use Importable;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Bloodline::create([
                'national_id' => $row[0],
                'title' => isset($row[1]) ? (is_null($row[1]) ? null : $row[1]) : null,
                'description' => isset($row[2]) ? (is_null($row[2]) ? null : $row[2]) : null,
            ]);
        }
    }
}
