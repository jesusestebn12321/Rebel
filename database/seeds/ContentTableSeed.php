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
            'title'=>'Estructura',
            'version'=>'1',
            'introdution'=>'asdasdasdasdasdsadasd',
            'content'=> 'asdasdasdasdasdasdasdasd',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_2'),
            'title'=>'Matematica',
            'version'=>'1',
            'introdution'=>'asdasdasdasdasdsadasd',
            'content'=> 'asdasdasdggggasdasdasdasdasd',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_4'),
            'title'=>'Logica',
            'version'=>'1',
            'introdution'=>'asdasdasdasdasdsadasd',
            'content'=> 'asdasdasdasdasaaaaaaaaaaaaaaaasdasdasd',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_5'),
            'title'=>'Algoritmo',
            'version'=>'1',
            'introdution'=>'asdasdasdasdasdsadasd',
            'content'=> 'asdasdasdasdasaaaaaaaaaaaaaaaasdasdasd',
            'matter_id'=>1
        ]);
    }
}
