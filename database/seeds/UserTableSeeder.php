<?php

use Illuminate\Database\Seeder;
use Equivalencias\User;
use Illuminate\Support\Str as Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'slug'=> str_slug('Jesus-Villalta_25237118'),
            'name'=>'Jesus',
            'dni'=>25237118,
            'lastname'=>'Villalta',
            'email'=>'admin@gmail.com',
            'password' => bcrypt('123456'),
            'rol' => 0,
            'confirmed' => true,
        ]);
        User::create([
            'slug'=> str_slug('Jesus-Villalta_2523711'),
            'name'=>'Jesus',
            'dni'=>2523711,
            'lastname'=>'Villalta',
            'email'=>'admin@unerg.edu',
            'password' => bcrypt('123456'),
            'rol' => 1,
            'confirmed' => true,
        ]);
        User::create([
            'slug'=> str_slug('Jesus-Villalta_252371'),
            'name'=>'Jesus',
            'dni'=>252371,
            'lastname'=>'Villalta',
            'email'=>'root@gmail.com',
            'password' => bcrypt('123456'),
            'rol' => 2,
            'confirmed' => true,
        ]);

    }
}
