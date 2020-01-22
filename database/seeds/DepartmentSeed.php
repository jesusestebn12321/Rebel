<?php

use Illuminate\Database\Seeder;
use Equivalencias\Department;
class DepartmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         Department::create([
            'slug'=> str_slug('Departamento-trial-1'),
            'department'=>'CS. COMPUTACIÓN',
            'area_id'=>'1',
        ]);
    }
}
