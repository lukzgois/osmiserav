<?php namespace App\Repositories;

use App\User;

class UserRepository {

    public function all()
    {
        return User::all();
    }

    public function lists($label, $key)
    {
        return User::lists($label, $key);
    }

}