<?php

namespace SOB\Nextras\Model\Privilege;

use SOB\Nextras\Model\AbstractRepository;

class PrivilegeRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [Privilege::class];
	}
}
