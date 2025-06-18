<?php

namespace SOB\Nextras\Model\InventoryTransaction;

use SOB\Nextras\Model\AbstractRepository;

class InventoryTransactionRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [InventoryTransaction::class];
	}
}
