<?php defined('SYSPATH') OR die('No direct access allowed.');

/**
 * Jelly Model Log
 *
 * @package   KW-Core
 * @author	  Kohana-World Development Team
 * @license	  MIT License
 * @copyright 2011 Kohana-World Development Team
 */
class Model_Log extends Jelly_Model {

	public static function initialize(Jelly_Meta $meta)
	{
		$meta->fields(array(
			'id'           => Jelly::field('primary'),
			'executant'    => Jelly::field('string', array(
				'allow_null'   => FALSE,
			)),
			'executant_id' => Jelly::field('integer'),
			'action'       => Jelly::field('string', array(
				'allow_null'   => FALSE,
			)),
			'text'         => Jelly::field('string'),
			'date'         => Jelly::field('timestamp', array(
				'auto_now_create' => TRUE,
			)),
			// @TODO enum field? Log levels must be defined as constants
			'level'        => Jelly::field('string'),
		));
	}


}
