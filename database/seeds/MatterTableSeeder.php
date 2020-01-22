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
            'version'=>'1',
            'matter'=>'Matematica',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('trial-1'),
            'version'=>'1',
            'matter'=>'Programacion',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('trial-2'),
            'version'=>'1',
            'matter'=>'Algoritmo',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('trial-3'),
            'version'=>'1',
            'matter'=>'Logica Matematica',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('trial-4'),
            'version'=>'1',
            'matter'=>'Electiva',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);
    }
}
