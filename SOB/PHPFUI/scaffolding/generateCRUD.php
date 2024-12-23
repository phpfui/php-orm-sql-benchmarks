<?php

include __DIR__ . '/../../../vendor/autoload.php';

$schema = new \SOB\SchemaLoader();

\PHPFUI\ORM::$namespaceRoot = __DIR__ . '/../../..';
\PHPFUI\ORM::$recordNamespace = 'SOB\PHPFUI\Record';
\PHPFUI\ORM::$tableNamespace = 'SOB\PHPFUI\Table';
\PHPFUI\ORM::$migrationNamespace = 'SOB\PHPFUI\Migration';
\PHPFUI\ORM::$idSuffix = '_id';

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
