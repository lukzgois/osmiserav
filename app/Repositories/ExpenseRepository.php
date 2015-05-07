<?php namespace App\Repositories;

use App\Expense;

/**
 * Class ExpenseRepository
 * @package App\Repositories
 */
class ExpenseRepository {


    /**
     * @var BalanceRepository
     */
    private $balanceRepo;
    /**
     * @var AccountStatementRepository
     */
    private $accountRepo;

    public function __construct(BalanceRepository $balanceRepo, AccountStatementRepository $accountRepo)
    {
        $this->balanceRepo = $balanceRepo;
        $this->accountRepo = $accountRepo;
    }
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
			$value = str_replace(',','.', str_replace('.','.', $value));

            $expense = new Expense;
            $expense->user_id = $user;
            $expense->value = $value;
            $expense->owner_id = $data['owner'];
            $expense->description = $data['description'];
            $expense->save();

            $this->balanceRepo->decrement($user, $data['owner'], $value);
            $this->accountRepo->store([
                'user_id' => $user,
                'operation' => 'd',
                'description' => $data['description'],
                'value' => $value
            ]);
        }

        return true;
    }

    public function debt($user_id)
    {
        return Expense::where('owner_id', (int)$user_id)->sum('value');
    }

}