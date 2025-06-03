<?php

namespace SOB\Nextras\Model\Product;

use SOB\Nextras\Model\AbstractMapper;

class ProductMapper extends AbstractMapper
{
	public function getTableName(): string
	{
		return 'product';
	}
}
