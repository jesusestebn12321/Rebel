<?php

use Illuminate\Database\Seeder;
use Equivalencias\MatterUser;

class MatterUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MatterUser::create([
            'matter_id'=>'1',
            'user_id'=>'1',
            
        ]);
    }
}
