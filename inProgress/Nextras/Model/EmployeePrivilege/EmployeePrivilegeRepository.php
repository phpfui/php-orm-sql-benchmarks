<?php

namespace SOB\Nextras\Model\EmployeePrivilege;

use SOB\Nextras\Model\AbstractRepository;

class EmployeePrivilegeRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [EmployeePrivilege::class];
	}
}
