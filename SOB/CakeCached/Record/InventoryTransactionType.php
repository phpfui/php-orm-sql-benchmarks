<?php

namespace SOB\CakeCached\Record;

/**
 * @property int $inventory_transaction_type_id MySQL type integer
 * @property string $inventory_transaction_type_name MySQL type varchar(50)

 */
class InventoryTransactionType extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'inventory_transaction_type_id' => true,
		'inventory_transaction_type_name' => true,
		];

	}