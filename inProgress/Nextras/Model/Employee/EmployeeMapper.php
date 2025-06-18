<?php

namespace SOB\Nextras\Model\Employee;

use SOB\Nextras\Model\AbstractMapper;

class EmployeeMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'employee';
	}
}
