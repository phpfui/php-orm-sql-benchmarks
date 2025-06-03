<?php

namespace SOB\Nextras\Model\Shipper;

use SOB\Nextras\Model\AbstractRepository;

class ShipperRepository extends AbstractRepository
{
	public static function getEntityClassNames(): array
	{
		return [Shipper::class];
	}
}
