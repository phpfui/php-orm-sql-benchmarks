<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $purchase_order_id MySQL type integer
 * @property ?int $supplier_id MySQL type integer
 * @property ?int $created_by MySQL type integer
 * @property ?string $submitted_date MySQL type datetime
 * @property string $creation_date MySQL type datetime
 * @property ?int $purchase_order_status_id MySQL type integer
 * @property ?string $expected_date MySQL type datetime
 * @property float $shipping_fee MySQL type decimal(19,4)
 * @property float $taxes MySQL type decimal(19,4)
 * @property ?string $payment_date MySQL type datetime
 * @property ?float $payment_amount MySQL type decimal(19,4)
 * @property ?string $payment_method MySQL type varchar(50)
 * @property ?string $notes MySQL type longtext
 * @property ?int $approved_by MySQL type integer
 * @property ?string $approved_date MySQL type datetime
 * @property ?int $submitted_by MySQL type integer
 */
class PurchaseOrder extends \ActiveRecord\Model
{
	public static string $primary_key = 'purchase_order_id';

	public static string $table_name = 'purchase_order';
}
