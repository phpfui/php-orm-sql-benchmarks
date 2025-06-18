<?php

namespace SOB\Nextras\Model\PurchaseOrder;

use SOB\Nextras\Model\AbstractRepository;

class PurchaseOrderRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [PurchaseOrder::class];
	}
}
