<?php

namespace SOB\Nextras\Model\DateRecord;

use SOB\Nextras\Model\AbstractRepository;

class DateRecordRepository extends AbstractRepository
{
	public static function getEntityClassNames(): array
	{
		return [DateRecord::class];
	}
}
