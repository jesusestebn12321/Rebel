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
            'title'=>'Mamalo',
            'content'=> 'asdasdasdasdasdasdasdasd',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_2'),
            'title'=>'Mamalos',
            'content'=> 'asdasdasdggggasdasdasdasdasd',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_3'),
            'title'=>'Mamaloss',
            'content'=> 'asdasdasdasadasdsdasdasdasdasd',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_4'),
            'title'=>'Mamalosss',
            'content'=> 'asdasdasdasdasaaaaaaaaaaaaaaaasdasdasd',
            'matter_id'=>1
        ]);
        Content::create([
            'slug'=> str_slug('Titlte_5'),
            'title'=>'Mamalosss',
            'content'=> 'asdasdasdasdasaaaaaaaaaaaaaaaasdasdasd',
            'matter_id'=>1
        ]);
    }
}
