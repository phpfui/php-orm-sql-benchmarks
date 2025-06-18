<?php

namespace SOB\Nextras\Model\PurchaseOrderDetail;

use SOB\Nextras\Model\AbstractMapper;

class PurchaseOrderDetailMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'purchase_order_detail';
	}
}
