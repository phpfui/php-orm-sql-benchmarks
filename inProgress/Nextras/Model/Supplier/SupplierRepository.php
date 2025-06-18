<?php

namespace SOB\Nextras\Model\Supplier;

use SOB\Nextras\Model\AbstractRepository;

class SupplierRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [Supplier::class];
	}
}
