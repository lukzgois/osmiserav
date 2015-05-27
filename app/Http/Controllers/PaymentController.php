<?php namespace App\Http\Controllers;

use App\AccountStatement;
use App\Balance;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\AddPaymentRequest;
use App\Repositories\AccountStatementRepository;
use App\Repositories\BalanceRepository;
use App\Repositories\UserRepository;
use App\Sanitizers\Payment\AddPaymentSanitizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(UserRepository $repository)
	{
		$users = [null => 'Selecione um usuário'] + $repository->all()
			->except(Auth::user()->id)
			->lists('name', 'id');

		return view('payment.create', compact('users'));

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param AddPaymentRequest $request
	 * @param AddPaymentSanitizer $sanitizer
	 * @param BalanceRepository $balanceRepository
	 * @param AccountStatementRepository $accountStatementRepository
	 * @return Response
	 */
	public function store(
		AddPaymentRequest $request,
		AddPaymentSanitizer $sanitizer,
		BalanceRepository $balanceRepository,
		AccountStatementRepository $accountStatementRepository
	)
	{
		$data = $request->input();
		$data = $sanitizer->sanitize($data);

		$balanceRepository->increment($data['user'], Auth::user()->id, $data['value']);
		$accountStatementRepository->store([
			'description' => 'Pagamento',
			'value' => $data['value'],
			'operation' => 'c',
			'user_id' => $data['user']
		]);

		return redirect()->back()->with('success', 'Pagamento adicionado com sucesso');

	}

}
