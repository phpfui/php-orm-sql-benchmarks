<?php

include __DIR__ . '/../../../vendor/autoload.php';

$pdo = new \PHPFUI\ORM\PDOInstance('sqlite::memory:');
\PHPFUI\ORM::addConnection($pdo);
\PHPFUI\ORM::$namespaceRoot = __DIR__ . '/../../..';
\PHPFUI\ORM::$recordNamespace = 'SOB\PHPFUI\Record';
\PHPFUI\ORM::$tableNamespace = 'SOB\PHPFUI\Table';
\PHPFUI\ORM::$migrationNamespace = 'SOB\PHPFUI\Migration';
\PHPFUI\ORM::$idSuffix = '_id';

$lines = \file(__DIR__ . '/../../../northwind/northwind-schema.sqlite');

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

echo "Generate Record Models\n\n";

$generator = new \PHPFUI\ORM\Tool\Generate\CRUD();

$tables = \PHPFUI\ORM::getTables();

if (! \count($tables))
	{
	echo "No tables found. Check your database configuration settings.\n";

	exit;
	}

foreach ($tables as $table)
	{
	if ($generator->generate($table))
		{
		echo "{$table}\n";
		}
	}
