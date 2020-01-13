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
            'rol'=>'Administrador',
        ]);
        Rol::create([
            'rol'=>'Profesor',
        ]);
        Rol::create([
            'rol'=>'Estudiante',
        ]);
        Rol::create([
            'rol'=>'Administrador Curricular',
        ]);
        Rol::create([
            'rol'=>'Coordinador',
        ]);
    }
}
