<?php

namespace SOB\Nextras\Model\EmployeePrivilege;

use SOB\Nextras\Model\AbstractMapper;

class EmployeePrivilegeMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'employee_privilege';
	}
}
