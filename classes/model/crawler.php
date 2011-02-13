<?php defined('SYSPATH') OR die('No direct access allowed.');

class Model_Crawler extends Model {

	protected $_db;
	protected $_table_name   = 'crawlers';
	protected $_index_column = 'type';
	protected $_index_value;

	public function type($type = NULL)
	{
		if (func_num_args() > 0)
		{
			$this->_index_value = $type;
			return $this;
		}

		if ( ! $this->_index_value)
		{
			throw new Kohana_Exception('crawler type not set!');
		}

		return $this->_index_value;

	}

	/**
	 * @param bool   create new record if not exists
	 * @return FALSE|array
	 */
	public function get_status($new = FALSE)
	{
		$result = DB::select()
			->from($this->_table_name)
			->where($this->_index_column, '=', $this->type())
			->limit(1)
			->execute($this->_db);

		if ( ! empty($result))
		{
			return $result->as_array();
		}

		// row doesnt exists, create it!
		if ($new === TRUE)
		{
			return $this->create_status(1);
		}

		return FALSE;
	}

	public function update_status($page, $stop)
	{
		$data = array(
			'updated'            => time(),
			'page'               => $page,
			'stopped'            => $stop,
		);

		try {
			DB::update($this->_table_name)
				->set($data)
				->where($this->_index_column, '=', $this->type())
				->execute($this->_db);
		}
		catch (Database_Exception $e)
		{
			// @TODO do something
			return FALSE;
		}

		return $data;
	}

	/**
	 * Create crawler status
	 *
	 * @param  int   current page number
	 * @param  bool  TRUE when you need to stop crawler (end of data for example)
	 * @return array|FALSE
	 */
	public function create_status($page=1, $stop = FALSE)
	{
		$data = array(
			$this->_index_column => $this->type(),
			'updated'            => time(),
			'page'               => $page,
			'stopped'            => $stop,
		);

		try {
			DB::insert($this->_table_name)
				->columns(array_keys($data))
				->values($data)
				->execute($this->_db);
		}
		catch (Database_Exception $e)
		{
			// @TODO do something
			return FALSE;
		}

		return $data;
	}
}
