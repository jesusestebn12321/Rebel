<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(AddressTableSeeder::class);
        $this->call(UniversityTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(CareerTableSeeder::class);
        $this->call(DepartmentSeed::class);
        $this->call(MatterTableSeeder::class);
        $this->call(ContentTableSeed::class);
        $this->call(TeacherSeed::class);
    }
}
