<?php

namespace SOB\Nextras\Model\OrderDetail;

use SOB\Nextras\Model\AbstractMapper;

class OrderDetailMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'order_detail';
	}
}
