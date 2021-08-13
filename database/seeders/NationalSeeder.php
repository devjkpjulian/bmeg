<?php

namespace Database\Seeders;

use App\Imports\NationalImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Seeder;

class NationalSeeder extends Seeder
{
    public function run()
    {
        Excel::import(new NationalImport, 'public/excel/nationals.xlsx');
    }
}
