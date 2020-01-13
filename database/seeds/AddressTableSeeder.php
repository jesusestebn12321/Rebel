<?php

use Illuminate\Database\Seeder;
use Equivalencias\Address;
class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'slug'=> str_slug('San_juan_1'),
            'addres'=>'San Juan de los morros',
        ]);
    }
}
