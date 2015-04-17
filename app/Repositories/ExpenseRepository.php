<?php namespace App\Repositories;

use App\Expense;

/**
 * Class ExpenseRepository
 * @package App\Repositories
 */
class ExpenseRepository {

    /**
     * Create expenses for the users
     *
     * @param $data
     * @return bool
     */
    public function store($data)
    {

        foreach ($data['user'] as $user => $value)
        {
            $expense = new Expense;
            $expense->user_id = $user;
            $expense->value = $value;
            $expense->owner_id = $data['owner'];
            $expense->description = $data['description'];
            $expense->save();
        }

        return true;
    }

}