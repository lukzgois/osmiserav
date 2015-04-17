<?php namespace App\Http\Controllers;

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
		return view('expense.index');
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
        $users = $userRepository->all()->except($data['owner']);
        $value = $data['value'];
        $perUser = $value / $users->count();

        return view('expense.split', [
            'users' => $users,
            'value' => $value,
            'perUser' => $perUser,
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

        return redirect('expense')->with('success', 'Despesa adicionada com sucesso.');

	}

}
