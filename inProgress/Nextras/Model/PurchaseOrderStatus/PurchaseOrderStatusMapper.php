<?php

namespace SOB\Nextras\Model\PurchaseOrderStatus;

use SOB\Nextras\Model\AbstractMapper;

class PurchaseOrderStatusMapper extends AbstractMapper
{
	public function getTableName(): string
	{
		return 'purchase_order_status';
	}
}
