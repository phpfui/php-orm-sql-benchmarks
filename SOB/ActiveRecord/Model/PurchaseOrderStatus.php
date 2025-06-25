<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $purchase_order_status_id MySQL type integer
 * @property ?string $purchase_order_status_name MySQL type varchar(50)
 */
class PurchaseOrderStatus extends \ActiveRecord\Model
{
	public static string $primary_key = 'purchase_order_status_id';

	public static string $table_name = 'purchase_order_status';
}
