<?php

namespace App\Imports;

use App\Models\Achievement;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

class AchievementImport implements ToCollection
{
    use Importable;
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            Achievement::create([
                'national_id' => $row[0],
                'title' => isset($row[1]) ? (is_null($row[1]) ? null : $row[1]) : null,
            ]);
        }
    }
}
