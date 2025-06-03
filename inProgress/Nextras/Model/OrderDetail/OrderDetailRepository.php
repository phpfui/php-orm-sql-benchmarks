<?php

namespace SOB\Nextras\Model\OrderDetail;

use SOB\Nextras\Model\AbstractRepository;

class OrderDetailRepository extends AbstractRepository
{
	public static function getEntityClassNames(): array
	{
		return [OrderDetail::class];
	}
}
