<?php

namespace SOB\Nextras\Model\Migration;

use SOB\Nextras\Model\AbstractMapper;

class MigrationMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'migration';
	}
}
