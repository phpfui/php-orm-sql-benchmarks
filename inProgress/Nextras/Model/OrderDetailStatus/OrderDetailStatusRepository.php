<?php

namespace SOB\Nextras\Model\OrderDetailStatus;

use SOB\Nextras\Model\AbstractRepository;

class OrderDetailStatusRepository extends AbstractRepository
{
	public static function getEntityClassNames(): array
	{
		return [OrderDetailStatus::class];
	}
}
