<?php

namespace SOB\PHPFUI\Record\Definition;

/**
 * Autogenerated. Do not modify. Modify SQL table, then generate with \PHPFUI\ORM\Tool\Generate\CRUD class.
 *
 * @property int $inventory_transaction_type_id MySQL type integer
 * @property string $inventory_transaction_type_name MySQL type varchar(50)
 */
abstract class InventoryTransactionType extends \PHPFUI\ORM\Record
	{
	protected static bool $autoIncrement = false;

	/** @var array<string, array<mixed>> */
	protected static array $fields = [
		// MYSQL_TYPE, PHP_TYPE, LENGTH, ALLOWS_NULL, DEFAULT
		'inventory_transaction_type_id' => ['integer', 'int', 0, false, ],
		'inventory_transaction_type_name' => ['varchar(50)', 'string', 50, false, ],
	];

	/** @var array<string> */
	protected static array $primaryKeys = ['inventory_transaction_type_id', ];

	protected static string $table = 'inventory_transaction_type';
	}