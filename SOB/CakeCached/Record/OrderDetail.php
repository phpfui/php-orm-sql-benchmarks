<?php

namespace SOB\CakeCached\Record;

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
 *
 */
class OrderDetail extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'order_detail_id' => true,
		'order_id' => true,
		'product_id' => true,
		'quantity' => true,
		'unit_price' => true,
		'discount' => true,
		'order_detail_status_id' => true,
		'date_allocated' => true,
		'purchase_order_id' => true,
		'inventory_transaction_id' => true,
	];
	}
