<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $purchase_order_detail_id MySQL type integer
 * @property int $purchase_order_id MySQL type integer
 * @property ?int $product_id MySQL type integer
 * @property float $quantity MySQL type decimal(18,4)
 * @property float $unit_cost MySQL type decimal(19,4)
 * @property ?string $date_received MySQL type datetime
 * @property int $posted_to_inventory MySQL type integer
 * @property ?int $inventory_transaction_id MySQL type integer
 */
class PurchaseOrderDetail extends \ActiveRecord\Model
{
	public static string $primary_key = 'purchase_order_detail_id';

	public static string $table_name = 'purchase_order_detail';
}
