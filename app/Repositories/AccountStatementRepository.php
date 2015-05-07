<?php namespace App\Repositories;

use App\AccountStatement;

/**
 * Class AccountStatementRepository
 * @package App\Repositories
 */
class AccountStatementRepository {

    /**
     * @var AccountStmt
     */
    private $model;

	/**
	 * @param AccountStatement $model
	 */
	public function __construct(AccountStatement $model)
    {
        $this->model = $model;
    }

	/**
	 * Create a new record
	 *
	 * @param $data
	 * @return static
	 */
	public function store($data)
    {
        return $this->model->create($data);
    }

	/**
	 * Search the table
	 *
	 * @param $user
	 * @param null $start_date
	 * @param null $end_date
	 * @param null $person
	 * @return Collection
	 */
	public function search($user, $start_date = null, $end_date = null, $person = null)
	{
		$data = $this->model->where('user_id', (int)$user);

		if (isset($start_date))
			$data = $data->where('created_at', '>=', "{$start_date->format('Y-m-d')} 00:00:00");

		if (isset($end_date))
			$data = $data->where('created_at', '<=', "{$end_date->format('Y-m-d')} 23:59:59");

		if (isset($person))
			$data = $data->where('person_id', (int)$person);

		return $data->get();
	}

}