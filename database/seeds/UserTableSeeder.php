<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

    public function run()
    {

        User::create([
            'name' => 'Lucas',
            'email' => 'lucaspgois@gmail.com',
            'password' => '123456'
        ]);

        User::create([
            'name' => 'User1',
            'email' => 'user1@dev.com',
            'password' => '123456'
        ]);

        User::create([
            'name' => 'User2',
            'email' => 'user2@dev.com',
            'password' => '123456'
        ]);

    }

}