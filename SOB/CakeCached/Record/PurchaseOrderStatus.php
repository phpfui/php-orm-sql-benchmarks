<?php

namespace SOB\CakeCached\Record;

/**
 * @property int $purchase_order_status_id MySQL type integer
 * @property ?string $purchase_order_status_name MySQL type varchar(50)
 *
 */
class PurchaseOrderStatus extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'purchase_order_status_id' => true,
		'purchase_order_status_name' => true,
	];
	}
