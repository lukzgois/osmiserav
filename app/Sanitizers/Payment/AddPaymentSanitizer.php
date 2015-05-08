<?php namespace App\Sanitizers\Payment;

class AddPaymentSanitizer
{

	public function sanitize(array $data)
	{
		$data['value'] = str_replace(',','.', str_replace('.','', $data['value']));

		return $data;
	}

}