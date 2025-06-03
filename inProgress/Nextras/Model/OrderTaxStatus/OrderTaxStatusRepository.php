<?php

namespace SOB\Nextras\Model\OrderTaxStatus;

use SOB\Nextras\Model\AbstractRepository;

class OrderTaxStatusRepository extends AbstractRepository
{
	public static function getEntityClassNames(): array
	{
		return [OrderTaxStatus::class];
	}
}
