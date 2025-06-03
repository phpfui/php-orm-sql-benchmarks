<?php

namespace SOB\Nextras\Model\Product;

use SOB\Nextras\Model\AbstractRepository;

class ProductRepository extends AbstractRepository
{
	public static function getEntityClassNames(): array
	{
		return [Product::class];
	}
}
