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

	public function dbSupported(\SOB\Configuration $config) : bool
		{
		return true;
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
	 * override to flush buffers between tests if needed
	 */
	public function flush() : void
		{
		}

	/**
	 * Get the lines in the schema to load into the database
	 *
	 * @return array<string> sql to insert into database
	 */
	public function getSchemaLines(\SOB\Configuration $config) : array
		{
		$connection = $config->getPDOConnectionString();

		if (\str_contains($connection, 'sqlite'))
			{
			$lines = \file(__DIR__ . '/../northwind/northwind-schema.sqlite');

			if (! \str_contains($connection, 'memory'))
				{
				\fclose(\fopen($config->getNamespace() . '.sqlite', 'w'));
				}
			}
		else
			{
			$lines = \file(__DIR__ . '/../northwind/northwind-schema.sql');
			}

		return $lines;
		}

	/**
	 * Initialize the orm
	 *
	 * @param array<string> $lines sql to import into schema
	 */
	abstract public function init(\SOB\Configuration $config, array $lines, \SOB\BaseLine $runTimer) : static;

	/**
	 * class must insert one record with id=$id
	 *
	 * @return int $id inserted
	 */
	abstract public function insert(int $id) : int;

	/**
	 * @param array<string> $lines of sql to import into schema
	 */
	public function loadSchema(array $lines, callable $callback, \SOB\BaseLine $runTimer) : static
		{
		$runTimer->pause();
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
				\call_user_func($callback, $sql);
				$sql = '';
				}
			} // end foreach

		$runTimer->resume();

		return $this;
		}

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
