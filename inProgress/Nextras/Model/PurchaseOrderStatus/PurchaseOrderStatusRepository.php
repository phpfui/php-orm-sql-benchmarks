<?php

namespace SOB\Nextras\Model\PurchaseOrderStatus;

use SOB\Nextras\Model\AbstractRepository;

class PurchaseOrderStatusRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [PurchaseOrderStatus::class];
	}
}
