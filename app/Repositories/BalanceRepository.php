<?php namespace App\Repositories;

use App\Balance;

class BalanceRepository {

    private $model;

    public function __construct()
    {
        $this->model = new Balance();
    }

    public function find($user, $person)
    {
        return $this->model->where('user_id', (int)$user)
            ->where('person_id', (int)$person)
            ->firstOrFail();
    }

    public function decrement($user, $person, $amount)
    {
        $balance = $this->find($user, $person);
        $balance->balance -= $amount;
        $balance->save();
        
        return $balance;
    }

}

