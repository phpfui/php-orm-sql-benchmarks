<?php

namespace SOB\Nextras\Model\ProductSupplier;

use SOB\Nextras\Model\AbstractMapper;

class ProductSupplierMapper extends AbstractMapper
{
	public function getTableName(): string
	{
		return 'product_supplier';
	}
}
