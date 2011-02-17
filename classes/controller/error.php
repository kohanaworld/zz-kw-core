<?php defined('SYSPATH') or die('No direct access allowed.');

/**
 * Controller Error
 *
 * @package   KW-Core
 * @author	  Kohana-World Development Team
 * @license	  MIT License
 * @copyright 2011 Kohana-World Development Team
 *
 * @TODO Make it work with future Template Controller
 */
class Controller_Error extends Controller {

	public function before()
	{
		parent::before();
		if( ! method_exists(__CLASS__, 'action_' . $this->request->action()))
		{
			$this->response->status(404);
			$this->request->action(404);
		}
		else
		{
			$this->response->status($this->request->action());
		}

		$this->response->send_headers();
	}

	public function action_404()
	{
		$this->response->body(__('page not found'));
	}

	public function action_403()
	{
		$this->response->body(__('access denied'));
	}

	public function action_500()
	{
		$this->response->body(__('server error'));
	}

} // End Controller_Error