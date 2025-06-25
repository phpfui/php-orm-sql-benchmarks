<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $inventory_transaction_id MySQL type integer
 * @property int $inventory_transaction_type_id MySQL type integer
 * @property string $transaction_created_date MySQL type datetime
 * @property string $transaction_modified_date MySQL type datetime
 * @property int $product_id MySQL type integer
 * @property int $quantity MySQL type integer
 * @property ?int $purchase_order_id MySQL type integer
 * @property ?int $order_id MySQL type integer
 * @property ?string $comments MySQL type varchar(255)
 */
class InventoryTransaction extends \ActiveRecord\Model
{
	public static string $primary_key = 'inventory_transaction_id';

	public static string $table_name = 'inventory_transaction';
}
