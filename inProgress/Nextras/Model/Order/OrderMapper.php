<?php

namespace SOB\Nextras\Model\Order;

use SOB\Nextras\Model\AbstractMapper;

class OrderMapper extends AbstractMapper
{
	public function getTableName(): string
	{
		return 'order';
	}
}
