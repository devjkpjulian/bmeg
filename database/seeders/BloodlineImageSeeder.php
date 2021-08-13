<?php

namespace Database\Seeders;

use App\Imports\ImageImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Seeder;

class BloodlineImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new ImageImport, 'public/excel/images.xlsx');
    }
}
