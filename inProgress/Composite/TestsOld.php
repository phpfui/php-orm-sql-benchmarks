<?php

namespace SOB\Composite;

class Tests extends \SOB\Test
	{

	protected EmployeeTable $employeeTable;

	public function closeConnection() : void
		{
		}

	/**
	 * class must delete one record with id=$id
	 */
	public function delete(int $id) : bool
		{
		$employee = new Employee();
		$employee->fromArray(['employee_id' => $id]);
		$this->employeeTable->delete($employee);

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
		$dir = __DIR__ . '/scaffolding/config.php';
		putenv('CONNECTIONS_CONFIG_FILE=' . $dir);
		$connection = $config->getDriver();

		if (\str_contains($connection, 'sqlite'))
			{
			$connection = 'sqlite';
			$lines = \file(__DIR__ . '/../../northwind/northwind-schema.sqlite');
			\fclose(\fopen($config->getNamespace() . '.sqlite', 'w'));
			}
		else
			{
			$lines = \file(__DIR__ . '/../../northwind/northwind-schema.sql');
			}
		$connectionParams = [
			'dbname' => $config->getDatabase(),
			'user' => $config->getUser(),
			'password' => $config->getPassword(),
			'host' => $config->getHost(),
			'driver' => $config->getDriver(),
			'port' => $config->getPort(),
		];
		$connection = \Doctrine\DBAL\DriverManager::getConnection($connectionParams);

		$this->employeeTable = new EmployeeTable();

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
				$connection->executeStatement($sql);
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
		$employee = new Employee();
		$employee->company = "Company {$id}";
		$employee->last_name = "Last {$id}";
		$employee->first_name = "First {$id}";

		$this->employeeTable->save($employee);

		return $employee->employee_id;
		}

	/**
	 * class must read and return one record with id=$id or null on no matching record
	 */
	public function read(int $id) : ?object
		{
		return $this->employeeTable->findOne($id);
		}

	/**
	 * class must update one record with id=$id to have $to in the data
	 */
	public function update(int $id, int $to) : bool
		{
		$employee = $this->read($id);
		$employee->last_name = "Updated {$to}";
		$this->employeeTable->save($employee);

		return true;
		}
	}
