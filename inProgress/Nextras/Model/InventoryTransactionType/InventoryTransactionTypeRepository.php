<?php

namespace SOB\Nextras\Model\InventoryTransactionType;

use SOB\Nextras\Model\AbstractRepository;

class InventoryTransactionTypeRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [InventoryTransactionType::class];
	}
}
