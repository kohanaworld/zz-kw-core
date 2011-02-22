<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Template Controller
 *
 * @package   KW-Core
 * @author    Kohana-World Development Team
 * @license   MIT License
 * @copyright 2011 Kohana-World Development Team
 */
abstract class Controller_Template extends Kohana_Controller_Template {

	/**
	 * Page template
	 *
	 * @var string
	 */
	public $template = 'frontend/template/main';

	/**
	 * The need of authorization
	 *
	 * @var bool
	 */
	protected $_auth_required = FALSE;

	/**
	 * Is the request is Ajax-like
	 *
	 * @var boolean
	 */
	protected $_ajax = FALSE;

    public function before()
	{
		parent::before();

		// Ajax-like request check
		if ($this->request->is_ajax() OR Request::$initial->is_initial() !== Request::$current )
		{
			$this->_ajax = TRUE;
		}

		// Auth require check
		/*if ($this->_auth_required AND ! Auth::instance()->logged_in())
		{
			Session::instance()->set('url', $_SERVER['REQUEST_URI']);
			$this->request->redirect('auth/login');
		}*/

		if ($this->auto_render)
		{
			// default template variables  initialization
			$this->template->title    = ''; // page title
			$this->template->content  = ''; // page content
			// Profiler
			$this->template->debug    = (Kohana::$environment > Kohana::PRODUCTION)
			                                ? View::factory('profiler/stats')
			                                : '';
		}
	}

	public function after()
	{
		// Using template content on Ajax-like requests
		if ($this->_ajax === TRUE)
		{
			$this->request->response = $this->template->content;
		}
		else
		{
			parent::after();
		}
	}

} // End Controller_Template