<?php

use Illuminate\Database\Seeder;
use Equivalencias\Area;
class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Area::create([
            'slug'=> str_slug('Infomatica-Sanjuan_1'),
            'area'=>'Informatica',
            'address_id'=>1,
            'university_id'=>1,
        ]);
        Area::create([
            'slug'=> str_slug('Medicina-Sanjuan_1'),
            'area'=>'Medicina',
            'address_id'=>1,
            'university_id'=>1,
        ]);
    }
}
