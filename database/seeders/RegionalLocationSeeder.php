<?php

namespace Database\Seeders;

use App\Imports\LocationImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Seeder;

class RegionalLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new LocationImport, 'public/excel/regional_location.xlsx');
    }
}
