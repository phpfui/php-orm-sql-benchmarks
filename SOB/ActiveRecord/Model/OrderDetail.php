<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $order_detail_id MySQL type integer
 * @property int $order_id MySQL type integer
 * @property ?int $product_id MySQL type integer
 * @property float $quantity MySQL type decimal(18,4)
 * @property ?float $unit_price MySQL type decimal(19,4)
 * @property float $discount MySQL type double
 * @property ?int $order_detail_status_id MySQL type integer
 * @property ?string $date_allocated MySQL type datetime
 * @property ?int $purchase_order_id MySQL type integer
 * @property ?int $inventory_transaction_id MySQL type integer
 */
class OrderDetail extends \ActiveRecord\Model
{
	public static string $primary_key = 'order_detail_id';

	public static string $table_name = 'order_detail';
}
