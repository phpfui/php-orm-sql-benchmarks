<?php

namespace SOB\Nextras\Model\InventoryTransactionType;

use SOB\Nextras\Model\AbstractMapper;

class InventoryTransactionTypeMapper extends AbstractMapper
{
	public function getTableName(): string
	{
		return 'inventory_transaction_type';
	}
}
