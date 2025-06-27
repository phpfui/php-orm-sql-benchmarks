<?php

namespace SOB\ActiveRecord;

class Tests extends \SOB\Test
	{
	public function closeConnection() : void
		{
//		$this->pdo = null;
		}

	/**
	 * class must delete one record with id=$id
	 */
	public function delete(int $id) : bool
		{
		$employee = \SOB\ActiveRecord\Model\Employee::find(1);

		return $employee->delete();	// @phpstan-ignore-line
		}

	/**
	 * Initialize the orm
	 *
	 * @param array<string> $lines sql to import into schema
	 */
	public function init(\SOB\Configuration $config, array $lines, \SOB\BaseLine $runTimer) : static
		{
		if ('sqlite' !== $config->getDriver())
			{
			$connectionString = $config->getDriver() . '://' . $config->getUser() . ':' . $config->getPassword() . '@' . $config->getHost() . ':' . $config->getPort() . '/' . $config->getDatabase();
			}
		else
			{
			$connectionString = $config->getDriver() . '://' . $config->getDatabase();
			}
		$cfg = \ActiveRecord\Config::instance();
		$cfg->set_connections([
			'test' => $connectionString,
		]);
		$cfg->set_default_connection('test');

		$callback = [\ActiveRecord\ConnectionManager::get_connection('test'), 'query'];

		$this->loadSchema($lines, $callback, $runTimer);

		return $this;
		}

	/**
	 * class must insert one record with id=$id
	 *
	 * @return int $id inserted
	 */
	public function insert(int $id) : int
		{
		$employee = new \SOB\ActiveRecord\Model\Employee();
		$employee->employee_id = $id;
		$employee->company = "Company {$id}";
		$employee->last_name = "Last {$id}";
		$employee->first_name = "First {$id}";

		return $employee->save();
		}

	/**
	 * class must read and return one record with id=$id or null on no matching record
	 */
	public function read(int $id) : ?object
		{
		try
			{
			$employee = \SOB\ActiveRecord\Model\Employee::find($id);
			}
		catch (\ActiveRecord\Exception\RecordNotFound $e)
			{
			return null;
			}

		return $employee;
		}

	/**
	 * class must update one record with id=$id to have $to in the data
	 */
	public function update(int $id, int $to) : bool
		{
		$employee = \SOB\ActiveRecord\Model\Employee::find($id);

		$employee->last_name = "Updated {$to}";

		return $employee->save();
		}
	}
