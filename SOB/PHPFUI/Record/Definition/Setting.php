<?php

namespace SOB\PHPFUI\Record\Definition;

/**
 * Autogenerated. Do not modify. Modify SQL table, then generate with \PHPFUI\ORM\Tool\Generate\CRUD class.
 *
 * @property ?string $setting_data MySQL type varchar(255)
 * @property int $setting_id MySQL type integer
 * @property \SOB\PHPFUI\Record\Setting $setting related record
 */
abstract class Setting extends \PHPFUI\ORM\Record
	{
	protected static bool $autoIncrement = true;

	/** @var array<string, array<mixed>> */
	protected static array $fields = [
		// MYSQL_TYPE, PHP_TYPE, LENGTH, ALLOWS_NULL, DEFAULT
		'setting_data' => ['varchar(255)', 'string', 255, true, NULL, ],
		'setting_id' => ['integer', 'int', 0, false, ],
	];

	/** @var array<string> */
	protected static array $primaryKeys = ['setting_id', ];

	protected static string $table = 'setting';
	}
