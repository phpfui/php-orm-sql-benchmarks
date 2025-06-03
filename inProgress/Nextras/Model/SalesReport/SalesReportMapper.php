<?php

namespace SOB\Nextras\Model\SalesReport;

use SOB\Nextras\Model\AbstractMapper;

class SalesReportMapper extends AbstractMapper
{
	public function getTableName(): string
	{
		return 'sales_report';
	}
}
