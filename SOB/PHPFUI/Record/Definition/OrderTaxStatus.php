<?php

namespace SOB\PHPFUI\Record\Definition;

/**
 * Autogenerated. Do not modify. Modify SQL table, then generate with \PHPFUI\ORM\Tool\Generate\CRUD class.
 *
 * @property int $order_tax_status_id MySQL type integer
 * @property \SOB\PHPFUI\Record\OrderTaxStatus $order_tax_status related record
 * @property string $order_tax_status_name MySQL type varchar(50)
 */
abstract class OrderTaxStatus extends \PHPFUI\ORM\Record
	{
	protected static bool $autoIncrement = false;

	/** @var array<string, array<mixed>> */
	protected static array $fields = [
		// MYSQL_TYPE, PHP_TYPE, LENGTH, ALLOWS_NULL, DEFAULT
		'order_tax_status_id' => ['integer', 'int', 0, false, ],
		'order_tax_status_name' => ['varchar(50)', 'string', 50, false, ],
	];

	/** @var array<string> */
	protected static array $primaryKeys = ['order_tax_status_id', ];

	protected static string $table = 'order_tax_status';
	}
