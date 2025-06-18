<?php

namespace SOB\Nextras\Model\StringRecord;

use SOB\Nextras\Model\AbstractRepository;

class StringRecordRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [StringRecord::class];
	}
}
