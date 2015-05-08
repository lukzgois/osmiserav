<?php namespace App\Http\Controllers;

use App\Expense;
use App\Http\Requests;
use App\Http\Requests\SplitExpenseRequest;
use App\Repositories\ExpenseRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Input;

/**
 * Class ExpenseController
 * @package App\Http\Controllers
 */
class ExpenseController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
        $expenses = Expense::where('user_id', \Auth::user()->id)->get()->all();
		return view('expense.index', compact('expenses'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(UserRepository $userRepository)
	{
        $user = $userRepository->lists('name', 'id');
		return view('expense.create', [
            'user' => $user
        ]);
	}


    /**
     * Show the form to split the expenses across the users
     *
     * @param SplitExpenseRequest $request
     * @param UserRepository $userRepository
     * @return \Illuminate\View\View
     */
    public function split(SplitExpenseRequest $request, UserRepository $userRepository)
    {
        $data = Input::only('owner', 'value', 'reference');
        $users = $userRepository->all();
		$otherUsers = $users->except($data['owner']);
        $value = str_replace(',','.', str_replace('.','.', $data['value']));
        $perUser = $value / $users->count();

        return view('expense.split', [
            'users' => $otherUsers,
            'value' => $value,
            'perUser' => number_format($perUser, 2, ',','.'),
            'owner_id' => $data['owner'],
            'description' => $data['reference']
        ]);
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(ExpenseRepository $repository)
	{
		$data = Input::except('_token');
        $repository->store($data);

        return redirect('expenses')->with('success', 'Despesa adicionada com sucesso.');

	}

}
