<?php

namespace SOB\Nextras\Model\SalesReport;

use SOB\Nextras\Model\AbstractRepository;

class SalesReportRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [SalesReport::class];
	}
}
