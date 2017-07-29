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
        $this->call(StatusAlertSeeder::class);
        $this->call(OfficeSeeder::class);
        $this->call(StatusRoundSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(AlertSeeder::class);
        $this->call(RoundSeeder::class);
    }
}
