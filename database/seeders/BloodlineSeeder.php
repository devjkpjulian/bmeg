<?php

namespace Database\Seeders;

use App\Imports\BloodlineImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Seeder;

class BloodlineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new BloodlineImport, 'public/excel/bloodlines.xlsx');
    }
}
