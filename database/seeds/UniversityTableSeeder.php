<?php

use Illuminate\Database\Seeder;
use Equivalencias\University;
class UniversityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        University::create([
            'slug'=> str_slug('UNERG-Sanjuan_1'),
            'university'=>'UNERG',
            'address_id'=> 1,
        ]);
    }
}
