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
            'type'=>'1',
            'admin_confirmed'=>'1',
        ]);
    }
}
