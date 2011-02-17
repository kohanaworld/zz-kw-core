<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Kohana-World Exception Handler
 *
 * @package   KW-Core
 * @author    Kohana-World Development Team
 * @license   MIT License
 * @copyright 2011 Kohana-World Development Team
 */
class Kw_Exception_Handler {

	/**
	 * Error handel method
	 * @static
	 * @param  Exception $e
	 * @return boolean|string
	 */
	public static function handle(Exception $e)
	{
		// Throws Kohana_Exception if not in PRODUCTION environment
		if(Kohana::$environment > Kohana::PRODUCTION)
			return Kohana_Exception::handler($e);

		$response = Request::factory('error/' . $e->getCode())->execute();

		// If Exception was thrown in HMVC Request, send error handled response to Request::$current
		if(Request::$current)
		{
			echo Request::$current->response($response);
		}
		// Else to Request::$initial
		else
		{
			echo Request::$initial->response($response);
		}
	}

} // End Kw_Exception_Handler