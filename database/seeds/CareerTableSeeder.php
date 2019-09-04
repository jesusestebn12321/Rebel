<?php

use Illuminate\Database\Seeder;
use Equivalencias\Career;
class CareerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Career::create([
            'slug'=> str_slug('IngSistema-Sanjuan_1'),
            'career'=>'IngSistema',
            'modalidad'=>'Semestre',
            'area_id'=>'1'
        ]);
        Career::create([
            'slug'=> str_slug('Medicina-Sanjuan_1'),
            'career'=>'Medicina',
            'modalidad'=>'Año',
            'area_id'=>'1'
        ]);
    }
}
