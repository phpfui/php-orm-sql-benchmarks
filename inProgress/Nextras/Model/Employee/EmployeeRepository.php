<?php

namespace SOB\Nextras\Model\Employee;

use SOB\Nextras\Model\AbstractRepository;

class EmployeeRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [Employee::class];
	}
}
