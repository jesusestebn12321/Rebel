<?php

use Illuminate\Database\Seeder;
use Equivalencias\Matter;

class MatterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Matter::create([
            'slug'=> str_slug('Medicina-Sanjuan_1'),
            'version'=>'v-1',
            'matter'=>'Matematica',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);
    }
}
