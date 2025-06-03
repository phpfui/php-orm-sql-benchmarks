<?php

namespace SOB\Nextras\Model\OrderStatus;

use SOB\Nextras\Model\AbstractRepository;

class OrderStatusRepository extends AbstractRepository
{
	public static function getEntityClassNames(): array
	{
		return [OrderStatus::class];
	}
}
