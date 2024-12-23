<?php

namespace SOB\PHPFUI\Record\Definition;

/**
 * Autogenerated. Do not modify. Modify SQL table, then generate with \PHPFUI\ORM\Tool\Generate\CRUD class.
 *
 * @property int $employee_id MySQL type integer
 * @property \SOB\PHPFUI\Record\Employee $employee related record
 * @property int $privilege_id MySQL type integer
 * @property \SOB\PHPFUI\Record\Privilege $privilege related record
 */
abstract class EmployeePrivilege extends \PHPFUI\ORM\Record
	{
	protected static bool $autoIncrement = false;

	/** @var array<string, array<mixed>> */
	protected static array $fields = [
		// MYSQL_TYPE, PHP_TYPE, LENGTH, ALLOWS_NULL, DEFAULT
		'employee_id' => ['integer', 'int', 0, false, ],
		'privilege_id' => ['integer', 'int', 0, false, ],
	];

	/** @var array<string> */
	protected static array $primaryKeys = [];

	protected static string $table = 'employee_privilege';
	}
