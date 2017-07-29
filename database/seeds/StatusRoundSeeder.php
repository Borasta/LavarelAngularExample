<?php

use Illuminate\Database\Seeder;

class StatusRoundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statusRounds = factory(App\StatusRound::class, 5)->create();
    }
}
