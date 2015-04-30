<?php namespace App\Sanitizers\AccountStatement;

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
			? $input['start']
			: Carbon::now()->subMonth()->format('Y-m-d');

		$input['end'] = isset($input['end'])
			? $input['end']
			: Carbon::now()->format('Y-m-d');

		return $input;
	}

}