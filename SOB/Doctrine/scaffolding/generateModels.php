<?php

include __DIR__ . '/../../../vendor/autoload.php';

$schema = new \SOB\Schema();

echo "Generate Record Models\n\n";

$tables = \PHPFUI\ORM::getTables();

if (! \count($tables))
	{
	echo "No tables found. Check your database configuration settings.\n";

	exit;
	}

foreach ($tables as $table)
	{
	echo "{$table}\n";
	\generate($table);
	}

function generate(string $table) : void
	{
	$template = \file_get_contents(__DIR__ . '/model.template');
	$parameters['~TABLE~'] = $table;
	$class = \PHPFUI\ORM::getBaseClassName($table);
	$parameters['~CLASS~'] = $class;
	$autoIncrement = false;
	$commentedFields = [];

	$docBlock = $fields = '';

	foreach (\PHPFUI\ORM::describeTable($table) as $field)
		{
		$fields .= getField($field);

		$comment = \getComment($field, $commentedFields);

		if ($comment)
			{
			$docBlock .= " * @property {$comment}\n";
			}
		}

	$parameters['~FIELDS~'] = $fields;
	$parameters['~DOC_BLOCK~'] = $docBlock;

	$fileName = __DIR__ . '/../Entity/' . $class . '.php';

	foreach ($parameters as $key => $value)
		{
		$template = \str_replace($key, $value, $template);
		}

	\file_put_contents($fileName, $template);
	}

function getField(\PHPFUI\ORM\Schema\Field $field) : string
	{
	$text = '';

	$orm = [];
	if ($field->primaryKey)
		{
		$orm[] = 'Id';
		}

	if ($field->autoIncrement)
		{
		$orm[] = 'GeneratedValue(strategy="AUTO")';
		}

	$descriptions = [];

	$type = $field->type;
	$parts = [];
	if ($pos = strpos($type, '('))
		{
		$parts = explode(',', substr($type, $pos + 1, strlen($type) - $pos - 2));
		}
	if (str_starts_with($type, 'decimal'))
		{
		$descriptions['type'] = 'decimal';
		$descriptions['precision'] = $parts[0];
		$descriptions['scale'] = $parts[1];
		}
	elseif (str_starts_with($type, 'varchar'))
		{
		$descriptions['type'] = 'string';
		$descriptions['length'] = $parts[0];
		}
	else
		{
		$descriptions['type'] = '"' . $type . '"';
		}

	if ($field->defaultValue && $field->defaultValue !== 'NULL')
		{
		$descriptions['options'] = '{"default": "' . str_replace(['"', "'"], '', $field->defaultValue) . '"}';
		}

	$nullable = '';
	if ($field->nullable)
		{
		$descriptions['nullable'] = 'true';
		$nullable = '?';
		}

	$text = "\t/**\n";
	foreach ($orm as $ormType)
		{
		$text .= "\t * @ORM\{$ormType}\n";
		}
	$text .= "\t * @ORM\Column(";
	$comma = '';
	foreach ($descriptions as $descriptionType => $value)
		{
		$text .= $comma . $descriptionType . '=' . $value;
		$comma = ', ';
		}
	$text .= ")\n";
	$text .= "\t */\n";
	$phptype = getPHPType($field->type);
	$phpDefault = '';
	if ($field->defaultValue && $field->defaultValue !== 'CURRENT_TIMESTAMP')
		{
		$phpDefault = ' = ' . $field->defaultValue;
		}
	$text .= "\tpublic {$nullable}{$phptype} {$field->name}{$phpDefault};\n\n";

	return $text;
	}

	/**
	 * @param array<string,true> &$commentedFields
	 */
function getComment(\PHPFUI\ORM\Schema\Field $field, array &$commentedFields) : ?string
	{
	$fieldName = $field->name;

	if (isset($commentedFields[$fieldName]))
		{
		return null;
		}
	$commentedFields[$fieldName] = true;
	$mySQLType = \str_replace("'", '', $field->type);
	$phpType = \getPHPType($mySQLType);
	$null = $field->nullable ? '?' : '';
	$block = $null . $phpType . ' $' . $fieldName . ' MySQL type ' . $mySQLType;
	$commentedFields[$fieldName] = true;

	return $block;
	}

function getPHPType(string $type) : string
	{
	$start = \strpos($type, '(');

	if (false !== $start)
		{
		$type = \substr($type, 0, $start);
		}

	static $types = [
		'integer' => 'int',
		'int' => 'int',
		'int unsigned' => 'int',
		'smallint' => 'int',
		'tinyint' => 'int',
		'mediumint' => 'int',
		'bigint' => 'int',
		'decimal' => 'float',
		'numeric' => 'float',
		'float' => 'float',
		'double' => 'float',
		'bit' => 'bool',
		'year' => 'int',
	];

	return $types[\strtolower($type)] ?? 'string';
	}
