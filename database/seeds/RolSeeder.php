<?php

use Illuminate\Database\Seeder;
use Equivalencias\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rol::create([
            'rol'=>'Admin',
        ]);
        Rol::create([
            'rol'=>'Teacher',
        ]);
        Rol::create([
            'rol'=>'Estudiante',
        ]);
        Rol::create([
            'rol'=>'AdminCurricular',
        ]);
        Rol::create([
            'rol'=>'Coordinador',
        ]);
    }
}
