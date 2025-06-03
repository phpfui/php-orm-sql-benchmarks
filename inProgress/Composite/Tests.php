<?php

namespace SOB\Composite;

/**
 * This won't work because the attribute hard codes the DB connection to the table definition.  Unbelievable shit!
 */
class Tests extends \SOB\Test
	{
	private Doctrine\DBAL\Connection $connection;

	public function closeConnection() : void
		{
		$this->pdo = null;
		}

	/**
	 * class must delete one record with id=$id
	 */
	public function delete(int $id) : bool
		{
		$table = new \SOB\Composite\Record\EmployeeTable();
		$employee = $table->findOne($id);

		if (! $employee)
			{
			return false;
			}

		$table->delete($employee);

		return true;
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
		$connectionParams = [
				'dbname' => $config->getDatabase(),
				'user' => $config->getUser(),
				'password' => $config->getPassword(),
				'host' => $config->getHost(),
				'driver' => $config->getDriver(),
		];
		$this->connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

		if (\str_contains($config->getDriver(), 'sqlite'))
			{
			$lines = \file(__DIR__ . '/../../northwind/northwind-schema.sqlite');
			\fclose(\fopen($config->getNamespace() . '.sqlite', 'w'));
			}
		else
			{
			$lines = \file(__DIR__ . '/../../northwind/northwind-schema.sql');
			}

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
				$this->connection->executeStatement($sql);
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
		$employee = new \SOB\Composite\Record\Employee();
		$employee->id = $id;
		$employee->company = "Company {$id}";
		$employee->last_name = "Last {$id}";
		$employee->first_name = "First {$id}";

		$table = new \SOB\Composite\Record\EmployeeTable();
		$table->save($employee);

		return $id;
		}

	/**
	 * class must read and return one record with id=$id or null on no matching record
	 */
	public function read(int $id) : ?object
		{
		$table = new \SOB\Composite\Record\EmployeeTable();
		$employee = $table->findOne($id);

		if (! $employee)
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
		$table = new \SOB\Composite\Record\EmployeeTable();
		$employee = $table->findOne($id);

		if (! $employee)
			{
			return false;
			}

		$employee->last_name = "Updated {$to}";
    $table->save($employee);

		return true;
		}
	}
