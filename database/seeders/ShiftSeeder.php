<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Shift Pagi',
                'start_time' => '07:00:00',
                'end_time' => '11:00:00',
            ],
            [
                'name' => 'Shift Siang',
                'start_time' => '11:00:00',
                'end_time' => '15:00:00',
            ],
            [
                'name' => 'Shift Sore',
                'start_time' => '15:00:00',
                'end_time' => '19:00:00',
            ],
            [
                'name' => 'Shift Malam',
                'start_time' => '19:00:00',
                'end_time' => '23:59:00',
            ],
        ])->each(function($shifts){
            \App\Models\Shift::create($shifts);
        });
    }
}
