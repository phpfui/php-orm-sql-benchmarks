<?php

namespace SOB\CakeCached;

class Tests extends \SOB\Test
	{

	private $connection;	// @phpstan-ignore-line
	private \SOB\Cake\Table\Employee $employeeTable;

	public function closeConnection() : void
		{
		$this->connection = null;
		}

	/**
	 * class must delete one record with id=$id
	 */
	public function delete(int $id) : bool
		{
		$employee = $this->employeeTable->get($id);
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

		$driver = '\\Cake\\Database\\Driver\\' . ucfirst(strtolower($config->getDriver()));

		$run = \SOB\Cake\RunManager::get();
		\Cake\Datasource\ConnectionManager::setConfig($run, [
				'className' => 'Cake\Database\Connection',
				'driver' => $driver,
				'persistent' => false,
				'host' => $config->getHost(),
				'username' => $config->getUser(),
				'password' => $config->getPassword(),
				'database' => $config->getDatabase(),
				'encoding' => 'utf8mb4',
				'timezone' => 'UTC',
				'cacheMetadata' => false,
		]);
		$this->connection = \Cake\Datasource\ConnectionManager::get($run);

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
				$this->connection->execute($sql);	// @phpstan-ignore-line
				$sql = '';
				}
			} // end foreach

		$this->employeeTable = new \SOB\Cake\Table\Employee();

		return $this;
		}

	/**
	 * class must insert one record with id=$id
	 *
	 * @return int $id inserted
	 */
	public function insert(int $id) : int
		{
		$employee = $this->employeeTable->newEmptyEntity();
		$employee->employee_id = $id; 	// @phpstan-ignore-line
		$employee->company = "Company {$id}";	// @phpstan-ignore-line
		$employee->last_name = "Last {$id}";	// @phpstan-ignore-line
		$employee->first_name = "First {$id}";	// @phpstan-ignore-line
		$this->employeeTable->save($employee);

		return $employee->employee_id;
		}

	/**
	 * class must read and return one record with id=$id or null on no matching record
	 */
	public function read(int $id) : ?object
		{
		try
			{
			$employee = $this->employeeTable->get($id);
			}
		catch (\Exception $e)
			{
			$employee = null;
			}

		return $employee;
		}

	/**
	 * class must update one record with id=$id to have $to in the data
	 */
	public function update(int $id, int $to) : bool
		{
		$employee = $this->employeeTable->get($id);
		$employee->last_name = "Updated {$to}";	// @phpstan-ignore-line
		$this->employeeTable->save($employee);

		return true;
		}
	}
