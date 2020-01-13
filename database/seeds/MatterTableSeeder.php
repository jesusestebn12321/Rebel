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
            'matter'=>'Matematica',
            'version'=>'v-1',
            'career_id'=>'1',
        ]);
    }
}
