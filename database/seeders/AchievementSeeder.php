<?php

namespace Database\Seeders;

use App\Imports\AchievementImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\Seeder;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new AchievementImport, 'public/excel/achievements.xlsx');
    }
}
