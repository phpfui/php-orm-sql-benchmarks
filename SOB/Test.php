<?php

namespace SOB;

/**
 * Abstract interface class for tests to implement
 */
abstract class Test
	{
	/**
	 * Don't do work in the constructor
	 */
	final public function __construct()
		{
		}

	/**
	 * Close the database connection
	 */
	abstract public function closeConnection() : void;

	/**
	 * class must delete one record with id=$id
	 *
	 * @return true if deleted
	 */
	abstract public function delete(int $id) : bool;

	/**
	 * Initialize Responsibilities:
	 *
	 *  * Initialize the orm
	 *  * open the database
	 *  * initialize the database schema
	 */
	abstract public function init(\SOB\Configuration $config) : static;

	/**
	 * class must insert one record with id=$id
	 *
	 * @return int $id inserted
	 */
	abstract public function insert(int $id) : int;

	/**
	 * class must read and return one record with id=$id or null on no matching record
	 */
	abstract public function read(int $id) : ?object;

	/**
	 * class must test one record with id=$id
	 */
	public function testUpdate(object $employee, string $expected) : bool
		{
		if ($employee->last_name != $expected)
			{
			\print_r($employee);

			throw new \Exception("Employee update failed. Expected: {$expected}, Actual: {$employee->last_name}");
			}

		return true;
		}

	/**
	 * class must update one record with id=$id to have $to in the data
	 */
	abstract public function update(int $id, int $to) : bool;
	}
