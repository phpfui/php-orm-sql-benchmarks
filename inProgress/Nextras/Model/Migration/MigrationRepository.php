<?php

namespace SOB\Nextras\Model\Migration;

use SOB\Nextras\Model\AbstractRepository;

class MigrationRepository extends AbstractRepository
{
	public static function getEntityClassNames(): array
	{
		return [Migration::class];
	}
}
