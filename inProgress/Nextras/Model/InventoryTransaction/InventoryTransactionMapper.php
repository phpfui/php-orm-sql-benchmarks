<?php

namespace SOB\Nextras\Model\InventoryTransaction;

use SOB\Nextras\Model\AbstractMapper;

class InventoryTransactionMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'inventory_transaction';
	}
}
