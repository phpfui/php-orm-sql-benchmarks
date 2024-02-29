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
	 * Initialize Responsibilities:
	 *
	 *  * Initialize the orm
	 *  * open the database
	 *  * initialize the database schema
	 */
	public function init(\SOB\Configuration $config) : static
		{
		$connection = $config->getPDOConnectionString();

		if (\str_contains($connection, 'sqlite'))
			{
			$lines = \file(__DIR__ . '/../../northwind/northwind-schema.sqlite');
			\fclose(\fopen($config->getNamespace() . '.sqlite', 'w'));
			}
		else
			{
			$lines = \file(__DIR__ . '/../../northwind/northwind-schema.sql');
			}

		$this->pdo = new \PHPFUI\ORM\PDOInstance($connection, $config->getUser(), $config->getPassword());
		\PHPFUI\ORM::addConnection($this->pdo);
		\PHPFUI\ORM::$namespaceRoot = __DIR__ . '/../..';
		\PHPFUI\ORM::$recordNamespace = 'SOB\PHPFUI\Record';
		\PHPFUI\ORM::$tableNamespace = 'SOB\PHPFUI\Table';
		\PHPFUI\ORM::$migrationNamespace = 'SOB\PHPFUI\Migration';
		\PHPFUI\ORM::$idSuffix = '_id';

		$sql = '';

		foreach ($lines as $line)
			{
			// Ignoring comments from the SQL script
			if (\str_starts_with((string)$line, '--') || '' == $line)
				{
				continue;
				}

			$sql .= $line;

			if (\str_ends_with(\trim((string)$line), ';'))
				{
				\PHPFUI\ORM::execute($sql);
				$lastError = \PHPFUI\ORM::getLastError();

				if ($lastError)
					{
					throw new \Exception($lastError . ' SQL: ' . $sql);
					}
				$sql = '';
				}
			} // end foreach

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
