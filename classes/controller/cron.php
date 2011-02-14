<?php defined('SYSPATH') OR die('No direct access allowed.');

abstract class Controller_Cron extends Controller {

	/**
	 * @TODO Make it possible to run cli controllers in dev environment via http
	 * @throws HTTP_Exception_403
	 * @return void
	 */
	public function before()
	{
		if ( ! Kohana::$is_cli)
		{
			throw new HTTP_Exception_403('Trying to access CLI controller from HTTP');
		}

		parent::before();
	}

}