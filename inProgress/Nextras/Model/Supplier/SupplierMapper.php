<?php

namespace SOB\Nextras\Model\Supplier;

use SOB\Nextras\Model\AbstractMapper;

class SupplierMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'supplier';
	}
}
