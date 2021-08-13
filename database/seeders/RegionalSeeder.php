<?php

namespace Database\Seeders;

use App\Imports\RegionalImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Seeder;

class RegionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new RegionalImport, 'public/excel/regionals.xlsx');
    }
}
