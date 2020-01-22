<?php

use Illuminate\Database\Seeder;
use Equivalencias\Content;

class ContentTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Content::create([
            'slug'=> str_slug('Titlte_1'),
            'justification'=>'Estructura',
            'version'=>'1',
            'purpose'=>'asdasdasdasdasdsadasd',
            'methodology'=>'asdasdasdasdasdsadasd',
            'evaluation'=>'asdasdasdasdasdsadasd',
            'content'=> 'asdasdasdasdasdasdasdasd',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_2'),
            'justification'=>'Matematica',
            'version'=>'1',
            'purpose'=>'asdasdasdasdasdsadasd',
            'methodology'=>'asdasdasdasdasdsadasd',
            'evaluation'=>'asdasdasdasdasdsadasd',
            'content'=> 'asdasdasdggggasdasdasdasdasd',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_4'),
            'justification'=>'Logica',
            'version'=>'1',
            'purpose'=>'asdasdasdasdasdsadasd',
            'methodology'=>'asdasdasdasdasdsadasd',
            'evaluation'=>'asdasdasdasdasdsadasd',
            'content'=> 'asdasdasdasdasaaaaaaaaaaaaaaaasdasdasd',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_5'),
            'justification'=>'Algoritmo',
            'version'=>'1',
            'purpose'=>'asdasdasdasdasdsadasd',
            'methodology'=>'asdasdasdasdasdsadasd',
            'evaluation'=>'asdasdasdasdasdsadasd',
            'content'=> 'asdasdasdasdasaaaaaaaaaaaaaaaasdasdasd',
            'matter_id'=>1
        ]);
    }
}
