<?php

namespace SOB\PHPFUI\Record\Definition;

/**
 * Autogenerated. Do not modify. Modify SQL table, then generate with \PHPFUI\ORM\Tool\Generate\CRUD class.
 *
 * @property ?int $customer_id MySQL type integer
 * @property \SOB\PHPFUI\Record\Customer $customer related record
 * @property ?int $employee_id MySQL type integer
 * @property \SOB\PHPFUI\Record\Employee $employee related record
 * @property ?string $notes MySQL type longtext
 * @property string $order_date MySQL type datetime
 * @property int $order_id MySQL type integer
 * @property \SOB\PHPFUI\Record\Order $order related record
 * @property ?int $order_status_id MySQL type integer
 * @property \SOB\PHPFUI\Record\OrderStatus $order_status related record
 * @property ?int $order_tax_status_id MySQL type integer
 * @property \SOB\PHPFUI\Record\OrderTaxStatus $order_tax_status related record
 * @property ?string $paid_date MySQL type datetime
 * @property ?string $payment_type MySQL type varchar(50)
 * @property ?string $ship_address MySQL type longtext
 * @property ?string $ship_city MySQL type varchar(50)
 * @property ?string $ship_country_region MySQL type varchar(50)
 * @property ?string $ship_name MySQL type varchar(50)
 * @property ?string $ship_state_province MySQL type varchar(50)
 * @property ?string $ship_zip_postal_code MySQL type varchar(50)
 * @property ?string $shipped_date MySQL type datetime
 * @property ?int $shipper_id MySQL type integer
 * @property \SOB\PHPFUI\Record\Shipper $shipper related record
 * @property ?float $shipping_fee MySQL type decimal(19,4)
 * @property ?float $tax_rate MySQL type double
 * @property ?float $taxes MySQL type decimal(19,4)
 */
abstract class Order extends \PHPFUI\ORM\Record
	{
	protected static bool $autoIncrement = true;

	/** @var array<string, array<mixed>> */
	protected static array $fields = [
		// MYSQL_TYPE, PHP_TYPE, LENGTH, ALLOWS_NULL, DEFAULT
		'customer_id' => ['integer', 'int', 0, true, NULL, ],
		'employee_id' => ['integer', 'int', 0, true, NULL, ],
		'notes' => ['longtext', 'string', 4294967295, true, NULL, ],
		'order_date' => ['datetime', 'string', 20, false, NULL, ],
		'order_id' => ['integer', 'int', 0, false, ],
		'order_status_id' => ['integer', 'int', 0, true, 0, ],
		'order_tax_status_id' => ['integer', 'int', 0, true, NULL, ],
		'paid_date' => ['datetime', 'string', 20, true, NULL, ],
		'payment_type' => ['varchar(50)', 'string', 50, true, NULL, ],
		'ship_address' => ['longtext', 'string', 4294967295, true, NULL, ],
		'ship_city' => ['varchar(50)', 'string', 50, true, NULL, ],
		'ship_country_region' => ['varchar(50)', 'string', 50, true, NULL, ],
		'ship_name' => ['varchar(50)', 'string', 50, true, NULL, ],
		'ship_state_province' => ['varchar(50)', 'string', 50, true, NULL, ],
		'ship_zip_postal_code' => ['varchar(50)', 'string', 50, true, NULL, ],
		'shipped_date' => ['datetime', 'string', 20, true, NULL, ],
		'shipper_id' => ['integer', 'int', 0, true, NULL, ],
		'shipping_fee' => ['decimal(19,4)', 'float', 19, true, 0.0000, ],
		'tax_rate' => ['double', 'float', 0, true, 0, ],
		'taxes' => ['decimal(19,4)', 'float', 19, true, 0.0000, ],
	];

	/** @var array<string> */
	protected static array $primaryKeys = ['order_id', ];

	protected static string $table = 'order';
	}
