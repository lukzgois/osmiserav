<?php

use App\Balance;
use Illuminate\Database\Seeder;

class BalanceTableSeeder extends Seeder {

    public function run()
    {
        Balance::create([
            'user_id' => 1,
            'person_id' => 2,
            'balance' => -50
        ]);

        Balance::create([
            'user_id' => 1,
            'person_id' => 3,
            'balance' => 10
        ]);

        Balance::create([
            'user_id' => 2,
            'person_id' => 1,
            'balance' => 0
        ]);

        Balance::create([
            'user_id' => 2,
            'person_id' => 3,
            'balance' => 0
        ]);

        Balance::create([
            'user_id' => 3,
            'person_id' => 1,
            'balance' => 0
        ]);

        Balance::create([
            'user_id' => 3,
            'person_id' => 2,
            'balance' => 0
        ]);

    }

}