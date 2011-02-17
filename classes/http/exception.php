<?php defined('SYSPATH') or die('No direct script access.');

class Http_Exception extends Kohana_Http_Exception {

	public function __construct($message = NULL, array $variables = NULL, $code = 0)
	{
		if ($code == 0)
		{
			$code = $this->_code;
		}

		if (Kohana::$environment < Kohana::PRODUCTION)
		{
			parent::__construct($message, $variables, $code);
		}
		else
		{
			exit(Request::factory('error/' . $code)->execute());
		}

	}
}