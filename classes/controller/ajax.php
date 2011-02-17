<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Ajax Controller
 *
 * @package   KW-Core
 * @author    Kohana-World Development Team
 * @license   MIT License
 * @copyright 2011 Kohana-World Development Team
 */
abstract class Controller_Ajax extends Controller {

    public function before()
	{
		parent::before();

		// Ajax Request check
		if( ! $this->request->is_ajax() AND Kohana::$environment == Kohana::PRODUCTION)
		{
			throw new HTTP_Exception_403('non-ajax request!');
		}

		$this->request->headers['Content-Type'] = 'application/json; charset=utf-8';
	}

} // End Controller_Ajax