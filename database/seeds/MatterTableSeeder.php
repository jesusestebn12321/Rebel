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
            'slug'=> str_slug('2trial-123424'),
            'version'=>'123123',
            'matter'=>'Matematica I',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);
        Matter::create([
            'slug'=> str_slug('2trial-2654645'),
            'version'=>'789789',
            'matter'=>'Matematica II',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);
        Matter::create([
            'slug'=> str_slug('2trial-3123'),
            'version'=>'345345345',
            'matter'=>'Algoritmo',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('2trial-3123ddd'),
            'version'=>'78987978',
            'matter'=>'Algoritmo',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('2trial-3123213'),
            'version'=>'789789',
            'matter'=>'Algoritmo',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('2trial-3345435'),
            'version'=>'789789',
            'matter'=>'Algoritmo',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('2trial-3435435'),
            'version'=>'789789',
            'matter'=>'Algoritmo',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('2trial-3345435'),
            'version'=>'12234234',
            'matter'=>'Algoritmo',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('2trial-3456456'),
            'version'=>'567658768',
            'matter'=>'Algoritmo',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('2trial-3476457'),
            'version'=>'4567457',
            'matter'=>'Algoritmo',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('2trial-34756456'),
            'version'=>'6645645',
            'matter'=>'Algoritmo',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('2trial-3345345546'),
            'version'=>'3455',
            'matter'=>'Algoritmo',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);Matter::create([
            'slug'=> str_slug('2trial-3745767897'),
            'version'=>'234',
            'matter'=>'Algoritmo',
            'semester'=>'cuatro',
            'credit'=>100,
            'ht'=>3,
            'hl'=>0,
            'hp'=>3,
            'career_id'=>'1',
        ]);
    }
}
