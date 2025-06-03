<?php

namespace SOB\Nextras\Model\OrderStatus;

use SOB\Nextras\Model\AbstractMapper;

class OrderStatusMapper extends AbstractMapper
{
	public function getTableName(): string
	{
		return 'order_status';
	}
}
