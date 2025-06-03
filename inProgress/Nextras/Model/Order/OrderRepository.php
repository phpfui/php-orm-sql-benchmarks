<?php

namespace SOB\Nextras\Model\Order;

use SOB\Nextras\Model\AbstractRepository;

class OrderRepository extends AbstractRepository
{
	public static function getEntityClassNames(): array
	{
		return [Order::class];
	}
}
