<?php

namespace SOB\CakeCached\Record;

/**
 * @property int $purchase_order_detail_id MySQL type integer
 * @property int $purchase_order_id MySQL type integer
 * @property ?int $product_id MySQL type integer
 * @property float $quantity MySQL type decimal(18,4)
 * @property float $unit_cost MySQL type decimal(19,4)
 * @property ?string $date_received MySQL type datetime
 * @property int $posted_to_inventory MySQL type integer
 * @property ?int $inventory_transaction_id MySQL type integer
 *
 */
class PurchaseOrderDetail extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'purchase_order_detail_id' => true,
		'purchase_order_id' => true,
		'product_id' => true,
		'quantity' => true,
		'unit_cost' => true,
		'date_received' => true,
		'posted_to_inventory' => true,
		'inventory_transaction_id' => true,
	];
	}
