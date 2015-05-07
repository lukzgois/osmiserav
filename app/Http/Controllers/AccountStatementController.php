<?php namespace App\Http\Controllers;

use App\AccountStatement;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\AccountStatementRepository;
use App\Repositories\UserRepository;
use App\Sanitizers\AccountStatement\SearchSanitizer;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AccountStatementController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @param AccountStatementRepository $accountStatementRepo
	 * @param UserRepository $userRepo
	 * @return Response
	 */
	public function index(
		AccountStatementRepository $accountStatementRepo,
		UserRepository $userRepo,
		SearchSanitizer $sanitizer
	)
	{
		$input = Input::only('start', 'end', 'user');
		$users = [null => 'Filtrar por usuário'] + $userRepo->lists('name', 'id');
		$input = $sanitizer->sanitize($input);

		$statements = $accountStatementRepo->search(
			Auth::user()->id,
			$input['start'],
			$input['end'],
			$input['user']
		);

		return view('account-statement.index', [
			'statements' => $statements,
			'users' => $users,
			'user' => $input['user'],
			'start' => $input['start']->format('d/m/Y'),
			'end' => $input['end']->format('d/m/Y')
		]);
	}


}
