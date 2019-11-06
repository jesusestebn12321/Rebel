<?php

use Illuminate\Database\Seeder;
use Equivalencias\Teacher;

class TeacherSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Teacher::create([
            'slug'=> str_slug('teacher-trial-1'),
            'user_id'=>'2',
            'rol_id'=>'5',
            'admin_confirmed'=>'1',
        ]);
        Teacher::create([
            'slug'=> str_slug('teacher-trial-1'),
            'user_id'=>'5',
            'rol_id'=>'2',
            'admin_confirmed'=>'1',
        ]);
        Teacher::create([
            'slug'=> str_slug('teacherCoordinador-trial-1'),
            'user_id'=>'6',
            'rol_id'=>'2',
            'admin_confirmed'=>'1',
        ]);
    }
}
