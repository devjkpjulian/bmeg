<?php

namespace App\Imports;

use App\Models\BloodlineImage;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

class ImageImport implements ToCollection
{
    use Importable;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            BloodlineImage::create([
                'national_id' => $row[0],
                'bloodline_id' => isset($row[1]) ? (is_null($row[1]) ? null : $row[1]) : null,
                'image' => isset($row[2]) ? (is_null($row[2]) ? null : $row[2]) : null,
            ]);
        }
    }
}
