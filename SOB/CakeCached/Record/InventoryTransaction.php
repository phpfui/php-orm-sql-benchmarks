<?php

namespace SOB\CakeCached\Record;

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
 *
 */
class InventoryTransaction extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'inventory_transaction_id' => true,
		'inventory_transaction_type_id' => true,
		'transaction_created_date' => true,
		'transaction_modified_date' => true,
		'product_id' => true,
		'quantity' => true,
		'purchase_order_id' => true,
		'order_id' => true,
		'comments' => true,
	];
	}
