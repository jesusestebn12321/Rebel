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
            'lastname'=>'Villalta',
            'dni'=>25237118,
            'email'=>'admin@gmail.com',
            'password' => bcrypt('123456'),
            'rol_id' => 1,
            'confirmed' => true,
        ]);
        User::create([
            'slug'=> str_slug('Jesus-Villalta_2523711'),
            'name'=>'Luis',
            'lastname'=>'Villalta',
            'dni'=>2523711,
            'email'=>'admin@unerg.edu',
            'password' => bcrypt('123456'),
            'rol_id' => 2,
            'confirmed' => true,
        ]);
        User::create([
            'slug'=> str_slug('Jesus-Villalta_252371'),
            'name'=>'Otilio',
            'lastname'=>'Villalta',
            'dni'=>252371,
            'email'=>'root@gmail.com',
            'password' => bcrypt('123456'),
            'rol_id' => 3,
            'confirmed' => true,
        ]);
        User::create([
            'slug'=> str_slug('Jesus-Villalta_25237'),
            'name'=>'Maria',
            'lastname'=>'Gonzalez',
            'dni'=>25237,
            'email'=>'curricular@gmail.com',
            'password' => bcrypt('123456'),
            'rol_id' => 4,
            'confirmed' => true,
        ]);
        User::create([
            'slug'=> str_slug('Jesus-Villalta_2'),
            'name'=>'Yesenia',
            'lastname'=>'Gonzalez',
            'dni'=>252,
            'email'=>'teacher@gmail.com',
            'password' => bcrypt('123456'),
            'rol_id' => 2,
            'confirmed' => true,
        ]);
        User::create([
            'slug'=> str_slug('Jesus-Villalta_22'),
            'name'=>'Franco',
            'lastname'=>'Alias',
            'dni'=>2523,
            'email'=>'coordinador@gmail.com',
            'password' => bcrypt('123456'),
            'rol_id' => 2,
            'confirmed' => true,
        ]);

    }
}
