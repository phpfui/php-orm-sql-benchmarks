<?php

namespace SOB\Eloquent;

use SOB\Eloquent\Model\Employee;

class Tests extends \SOB\Test
	{
	protected \Illuminate\Database\Capsule\Manager $capsule;

	protected ?\PDO $pdo;

	public function closeConnection() : void
		{
		$this->pdo = null;
		}

	/**
	 * class must delete one record with id=$id
	 */
	public function delete(int $id) : bool
		{
		Employee::destroy($id);

		return true;
		}

	/**
	 * Initialize the orm
	 *
	 * @param array<string> $lines sql to import into schema
	 */
	public function init(\SOB\Configuration $config, array $lines, \SOB\BaseLine $runTimer) : static
		{
		$this->capsule = new \Illuminate\Database\Capsule\Manager();

		$this->capsule->addConnection([
			'driver' => $config->getDriver(),
			'host' => $config->getHost(),
			'database' => $config->getDatabase(),
			'username' => $config->getUser(),
			'password' => $config->getPassword(),
			'charset' => 'utf8',
			'port' => $config->getPort(),
			'collation' => 'utf8_unicode_ci',
			'prefix' => '',
		]);

		$this->pdo = $this->capsule->getConnection()->getPdo();

		// Set the event dispatcher used by Eloquent models... (optional)
		$this->capsule->setEventDispatcher(new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container()));

		// Make this Capsule instance available globally via static methods... (optional)
		$this->capsule->setAsGlobal();

		// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
		$this->capsule->bootEloquent();

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
		$employee = new Employee();
		$employee->employee_id = $id;
		$employee->company = "Company {$id}";
		$employee->last_name = "Last {$id}";
		$employee->first_name = "First {$id}";
		$employee->save();

		return $employee->employee_id;
		}

	/**
	 * class must read and return one record with id=$id or null on no matching record
	 */
	public function read(int $id) : ?object
		{
		return Employee::find($id);	// @phpstan-ignore-line
		}

	/**
	 * class must update one record with id=$id to have $to in the data
	 */
	public function update(int $id, int $to) : bool
		{
		$employee = $this->read($id);

		$employee->last_name = "Updated {$to}";

		return $employee->update();
		}
	}
