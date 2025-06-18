<?php

namespace SOB\Nextras\Model\Privilege;

use SOB\Nextras\Model\AbstractMapper;

class PrivilegeMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'privilege';
	}
}
