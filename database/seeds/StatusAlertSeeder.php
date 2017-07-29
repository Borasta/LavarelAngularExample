<?php

use Illuminate\Database\Seeder;

class StatusAlertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusAlerts = factory(App\StatusAlert::class, 5)->create();
    }
}
