<?php namespace App\Repositories;

use App\Balance;

/**
 * Class BalanceRepository
 * @package App\Repositories
 */
class BalanceRepository {

	/**
	 * @var Balance
	 */
	private $model;

	/**
	 *
	 */
	public function __construct()
    {
        $this->model = new Balance();
    }

	/**
	 * @param $user
	 * @return mixed
	 */
	public function mine($user)
	{
		return $this->model->where('user_id', (int)$user)->get();
	}

	/**
	 * @param $user
	 * @return mixed
	 */
	public function others($user)
	{
		return $this->model->where('person_id', (int)$user)->get();
	}

	/**
	 * @param $user
	 * @param $person
	 * @return mixed
	 */
	public function find($user, $person)
    {
        return $this->model->where('user_id', (int)$user)
            ->where('person_id', (int)$person)
            ->firstOrFail();
    }

	/**
	 * @param $user
	 * @param $person
	 * @param $amount
	 * @return mixed
	 */
	public function decrement($user, $person, $amount)
    {
        $balance = $this->find($user, $person);
        $balance->balance -= $amount;
        $balance->save();
        
        return $balance;
    }

}

