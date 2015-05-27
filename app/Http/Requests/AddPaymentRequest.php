<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddPaymentRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'user' => 'required',
			'value' => 'required|value'
		];
	}

	/**
	 * @param $attribute
	 * @param $value
	 * @param $parameters
	 * @return bool
	 */
	public function validateValue($attribute, $value, $parameters)
	{
		if ($value == '0,00')
			return false;

		return true;
	}

	/**
	 * @return array
	 */
	public function messages()
	{
		return [
			'value' => 'É obrigatória a indicação de um campo valor para o campo valor'
		];
	}

}
