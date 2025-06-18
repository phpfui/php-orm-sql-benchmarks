<?php

namespace SOB\Nextras;

class Tests extends \SOB\Test
	{
	private \Nextras\Dbal\Connection $orm;

	public function closeConnection() : void
		{
		$this->orm->disconnect();
		}

	public function dbSupported(\SOB\Configuration $config) : bool
		{
		return ! str_contains($config->getDriver(), 'sqlite');
		}

	/**
	 * class must delete one record with id=$id
	 */
	public function delete(int $id) : bool
		{
		$employee = new \SOB\Nextras\Model\Employee\Employee();
		$employee->employee_id = $id;

		return $employee->delete();
		}

	public function init(\SOB\Configuration $config, array $lines, \SOB\BaseLine $runTimer) : static
		{
		// Create and register the connection
		$connection['driver'] = $config->getDriver();
		$connection['host'] = $config->getHost();
		$connection['username'] = $config->getUser();
		$connection['password'] = $config->getPassword();
		$connection['database'] = $config->getDatabase();
		$connection['port'] = $config->getPort();
		$connection['connectionTz'] = 'auto-offset';

		$this->orm = new \Nextras\Dbal\Connection($connection);

		$this->loadSchema($lines, [$this->orm, 'query'], $runTimer);

		return $this;
		}

	/**
	 * class must insert one record with id=$id
	 *
	 * @return int $id inserted
	 */
	public function insert(int $id) : int
		{
		$employee = new \SOB\Nextras\Model\Employee\Employee();
		$employee->employee_id = $id;
		$employee->company = "Company {$id}";
		$employee->last_name = "Last {$id}";
		$employee->first_name = "First {$id}";

		return $this->orm->persistAndFlush($employee);
		}

	/**
	 * class must read and return one record with id=$id or null on no matching record
	 */
	public function read(int $id) : ?object
		{
		return new \SOB\Nextras\Model\Employee\Employee($id);
		}

	/**
	 * class must update one record with id=$id to have $to in the data
	 */
	public function update(int $id, int $to) : bool
		{
		$employee = new \SOB\Nextras\Model\Employee\Employee($id);

		$employee->last_name = "Updated {$to}";

		return $employee->update();
		}
	}
