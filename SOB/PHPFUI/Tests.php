<?php

namespace SOB\PHPFUI;

class Tests extends \SOB\Test
	{
	private ?\PHPFUI\ORM\PDOInstance $pdo;

	public function closeConnection() : void
		{
		$this->pdo = null;
		}

	/**
	 * class must delete one record with id=$id
	 */
	public function delete(int $id) : bool
		{
		$employee = new \SOB\PHPFUI\Record\Employee();
		$employee->employee_id = $id;

		return $employee->delete();	// @phpstan-ignore-line
		}

	/**
	 * Initialize the orm
	 *
	 * @param array<string> $lines sql to import into schema
	 */
	public function init(\SOB\Configuration $config, array $lines, \SOB\BaseLine $runTimer) : static
		{
		$connection = $config->getPDOConnectionString();
		$this->pdo = new \PHPFUI\ORM\PDOInstance($connection, $config->getUser(), $config->getPassword());
		\PHPFUI\ORM::addConnection($this->pdo);
		\PHPFUI\ORM::$namespaceRoot = __DIR__ . '/../..';
		\PHPFUI\ORM::$recordNamespace = 'SOB\PHPFUI\Record';
		\PHPFUI\ORM::$tableNamespace = 'SOB\PHPFUI\Table';
		\PHPFUI\ORM::$migrationNamespace = 'SOB\PHPFUI\Migration';
		\PHPFUI\ORM::$idSuffix = '_id';

		$callback = [$this->pdo, 'exec'];

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
		$employee = new \SOB\PHPFUI\Record\Employee();
		$employee->employee_id = $id;
		$employee->company = "Company {$id}";
		$employee->last_name = "Last {$id}";
		$employee->first_name = "First {$id}";

		return $employee->insert();
		}

	/**
	 * class must read and return one record with id=$id or null on no matching record
	 */
	public function read(int $id) : ?object
		{
		$employee = new \SOB\PHPFUI\Record\Employee($id);

		if (! $employee->loaded())
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
		$employee = new \SOB\PHPFUI\Record\Employee($id);

		$employee->last_name = "Updated {$to}";

		return $employee->update();
		}
	}
