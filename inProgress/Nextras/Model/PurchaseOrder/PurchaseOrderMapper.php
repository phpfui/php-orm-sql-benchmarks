<?php

namespace SOB\Nextras\Model\PurchaseOrder;

use SOB\Nextras\Model\AbstractMapper;

class PurchaseOrderMapper extends AbstractMapper
{
	public function getTableName(): string
	{
		return 'purchase_order';
	}
}
