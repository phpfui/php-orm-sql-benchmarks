<?php

namespace SOB\PHPFUI\Record\Definition;

/**
 * Autogenerated. Do not modify. Modify SQL table, then generate with \PHPFUI\ORM\Tool\Generate\CRUD class.
 *
 * @property ?int $approved_by MySQL type integer
 * @property ?string $approved_date MySQL type datetime
 * @property ?int $created_by MySQL type integer
 * @property string $creation_date MySQL type datetime
 * @property ?string $expected_date MySQL type datetime
 * @property ?string $notes MySQL type longtext
 * @property ?float $payment_amount MySQL type decimal(19,4)
 * @property ?string $payment_date MySQL type datetime
 * @property ?string $payment_method MySQL type varchar(50)
 * @property int $purchase_order_id MySQL type integer
 * @property \SOB\PHPFUI\Record\PurchaseOrder $purchase_order related record
 * @property ?int $purchase_order_status_id MySQL type integer
 * @property \SOB\PHPFUI\Record\PurchaseOrderStatus $purchase_order_status related record
 * @property float $shipping_fee MySQL type decimal(19,4)
 * @property ?int $submitted_by MySQL type integer
 * @property ?string $submitted_date MySQL type datetime
 * @property ?int $supplier_id MySQL type integer
 * @property \SOB\PHPFUI\Record\Supplier $supplier related record
 * @property float $taxes MySQL type decimal(19,4)
 */
abstract class PurchaseOrder extends \PHPFUI\ORM\Record
	{
	protected static bool $autoIncrement = true;

	/** @var array<string, array<mixed>> */
	protected static array $fields = [
		// MYSQL_TYPE, PHP_TYPE, LENGTH, ALLOWS_NULL, DEFAULT
		'approved_by' => ['integer', 'int', 0, true, NULL, ],
		'approved_date' => ['datetime', 'string', 20, true, NULL, ],
		'created_by' => ['integer', 'int', 0, true, NULL, ],
		'creation_date' => ['datetime', 'string', 20, false, NULL, ],
		'expected_date' => ['datetime', 'string', 20, true, NULL, ],
		'notes' => ['longtext', 'string', 4294967295, true, NULL, ],
		'payment_amount' => ['decimal(19,4)', 'float', 19, true, 0.0000, ],
		'payment_date' => ['datetime', 'string', 20, true, NULL, ],
		'payment_method' => ['varchar(50)', 'string', 50, true, NULL, ],
		'purchase_order_id' => ['integer', 'int', 0, false, ],
		'purchase_order_status_id' => ['integer', 'int', 0, true, 0, ],
		'shipping_fee' => ['decimal(19,4)', 'float', 19, false, 0.0000, ],
		'submitted_by' => ['integer', 'int', 0, true, NULL, ],
		'submitted_date' => ['datetime', 'string', 20, true, NULL, ],
		'supplier_id' => ['integer', 'int', 0, true, NULL, ],
		'taxes' => ['decimal(19,4)', 'float', 19, false, 0.0000, ],
	];

	/** @var array<string> */
	protected static array $primaryKeys = ['purchase_order_id', ];

	protected static string $table = 'purchase_order';
	}
