<?php

namespace SOB\Nextras\Model\OrderTaxStatus;

use SOB\Nextras\Model\AbstractMapper;

class OrderTaxStatusMapper extends AbstractMapper
{
	public function getTableName(): string
	{
		return 'order_tax_status';
	}
}
