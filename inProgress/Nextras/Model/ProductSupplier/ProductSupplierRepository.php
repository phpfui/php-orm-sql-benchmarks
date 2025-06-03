<?php

namespace SOB\Nextras\Model\ProductSupplier;

use SOB\Nextras\Model\AbstractRepository;

class ProductSupplierRepository extends AbstractRepository
{
	public static function getEntityClassNames(): array
	{
		return [ProductSupplier::class];
	}
}
