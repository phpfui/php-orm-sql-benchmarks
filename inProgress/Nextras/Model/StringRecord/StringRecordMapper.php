<?php

namespace SOB\Nextras\Model\StringRecord;

use SOB\Nextras\Model\AbstractMapper;

class StringRecordMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'stringRecord';
	}
}
