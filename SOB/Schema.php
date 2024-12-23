<?php

namespace SOB;

class Schema
	{

	private static \PHPFUI\ORM\PDOInstance $pdo;

	public function __construct()
		{
		static::$pdo = new \PHPFUI\ORM\PDOInstance('sqlite::memory:');
		\PHPFUI\ORM::addConnection(static::$pdo);

		$lines = \file(__DIR__ . '/../northwind/northwind-schema.sqlite');

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
		}

	}
