<?php namespace App\Repositories;

use App\AccountStatement;

class AccountStatementRepository {

    /**
     * @var AccountStmt
     */
    private $model;

    public function __construct(AccountStatement $model)
    {
        $this->model = $model;
    }

    public function store($data)
    {
        return $this->model->create($data);
    }

}