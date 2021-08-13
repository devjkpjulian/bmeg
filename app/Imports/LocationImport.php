<?php

namespace App\Imports;

use App\Models\RegionalLocation;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

class LocationImport implements ToCollection
{
    use Importable;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            RegionalLocation::create([
                'name' => $row[0],
            ]);
        }
    }
}
