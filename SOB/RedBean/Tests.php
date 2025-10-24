<?php

namespace SOB\RedBean;

class Tests extends \SOB\Test
	{
	public function closeConnection() : void
		{
		\RedBeanPHP\R::close();
		\RedBeanPHP\R::removeToolBoxByKey('default');
		}

	/**
	 * class must delete one record with id=$id
	 */
	public function delete(int $id) : bool
		{
		$employee = $this->read($id);

		return 1 == \RedBeanPHP\R::trash($employee);
		}

	/**
	 * Initialize the orm
	 *
	 * @param array<string> $lines sql to import into schema
	 */
	public function init(\SOB\Configuration $config, array $lines, \SOB\BaseLine $runTimer) : static
		{
		\RedBeanPHP\R::setup($config->getPDOConnectionString(), $config->getUser(), $config->getPassword());

		$this->loadSchema($lines, [\RedBeanPHP\Facade::class, 'exec'], $runTimer);

		return $this;
		}

	/**
	 * class must insert one record with id=$id
	 *
	 * @return int $id inserted
	 */
	public function insert(int $id) : int
		{
		$employee = \RedBeanPHP\R::dispense('employee');
		$employee->employee_id = $id;
		$employee->company = "Company {$id}";
		$employee->last_name = "Last {$id}";
		$employee->first_name = "First {$id}";

		return \RedBeanPHP\R::store($employee);
		}

	/**
	 * class must read and return one record with id=$id or null on no matching record
	 */
	public function read(int $id) : ?object
		{
		$employee = \RedBeanPHP\R::load('employee', $id);

		if (! $employee->employee_id)
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
		$employee = $this->read($id);

		$employee->last_name = "Updated {$to}";

		return \RedBeanPHP\R::store($employee);
		}
	}
