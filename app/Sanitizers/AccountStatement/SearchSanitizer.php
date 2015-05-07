<?php namespace App\Sanitizers\AccountStatement;
use Carbon\Carbon;

/**
 * Class SearchSanitizer
 * @package App\Sanitizers\AccountStatement
 */
class SearchSanitizer {

	/**
	 * Sanitize the input
	 *
	 * @param array $input
	 * @return array
	 */
	public function sanitize(array $input)
	{
		$input['user'] = empty($input['user'])
			? null
			: $input['user'];

		$input['start'] = isset($input['start'])
			? Carbon::createFromFormat('d/m/Y',$input['start'])
			: Carbon::now()->subMonth();

		$input['end'] = isset($input['end'])
			? Carbon::createFromFormat('d/m/Y', $input['end'])
			: Carbon::now();

		return $input;
	}

}