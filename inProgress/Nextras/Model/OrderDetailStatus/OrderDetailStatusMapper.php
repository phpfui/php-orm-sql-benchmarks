<?php

namespace SOB\Nextras\Model\OrderDetailStatus;

use SOB\Nextras\Model\AbstractMapper;

class OrderDetailStatusMapper extends AbstractMapper
{
	public function getTableName(): string
	{
		return 'order_detail_status';
	}
}
