<?php

namespace SOB\CakeCached\Record;

/**
 * @property int $order_id MySQL type integer
 * @property ?int $employee_id MySQL type integer
 * @property ?int $customer_id MySQL type integer
 * @property string $order_date MySQL type datetime
 * @property ?string $shipped_date MySQL type datetime
 * @property ?int $shipper_id MySQL type integer
 * @property ?string $ship_name MySQL type varchar(50)
 * @property ?string $ship_address MySQL type longtext
 * @property ?string $ship_city MySQL type varchar(50)
 * @property ?string $ship_state_province MySQL type varchar(50)
 * @property ?string $ship_zip_postal_code MySQL type varchar(50)
 * @property ?string $ship_country_region MySQL type varchar(50)
 * @property ?float $shipping_fee MySQL type decimal(19,4)
 * @property ?float $taxes MySQL type decimal(19,4)
 * @property ?string $payment_type MySQL type varchar(50)
 * @property ?string $paid_date MySQL type datetime
 * @property ?string $notes MySQL type longtext
 * @property ?float $tax_rate MySQL type double
 * @property ?int $order_tax_status_id MySQL type integer
 * @property ?int $order_status_id MySQL type integer
 *
 */
class Order extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'order_id' => true,
		'employee_id' => true,
		'customer_id' => true,
		'order_date' => true,
		'shipped_date' => true,
		'shipper_id' => true,
		'ship_name' => true,
		'ship_address' => true,
		'ship_city' => true,
		'ship_state_province' => true,
		'ship_zip_postal_code' => true,
		'ship_country_region' => true,
		'shipping_fee' => true,
		'taxes' => true,
		'payment_type' => true,
		'paid_date' => true,
		'notes' => true,
		'tax_rate' => true,
		'order_tax_status_id' => true,
		'order_status_id' => true,
	];
	}
