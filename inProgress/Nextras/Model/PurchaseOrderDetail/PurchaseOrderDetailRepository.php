<?php

namespace SOB\Nextras\Model\PurchaseOrderDetail;

use SOB\Nextras\Model\AbstractRepository;

class PurchaseOrderDetailRepository extends AbstractRepository
{
	public static function getEntityClassNames(): array
	{
		return [PurchaseOrderDetail::class];
	}
}
