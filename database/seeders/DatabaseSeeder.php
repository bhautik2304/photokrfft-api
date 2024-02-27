<?php

namespace Database\Seeders;

use App\Models\orientation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $orientation = ['Landscape', 'Portrait', 'Square'];
        $size = ['8 X 8', '10 X 10', '12 X 12', '14 X 14', '15 X 15', '8 X 10', '8 X 12', '10 X 12', '11 X 14', '12 X 15', '12 X 16', '12 X 18', '10 x 08', '12 x 08', '12 x 09', '12 x 10', '14 x 11', '16 x 12',];
        $sheet = ['Thermal Sheet', 'White sheet', 'black sheet'];
        // \App\Models\User::factory(10)->create();
        orientation::create(['name' => 'Landscape']);
    }
}
