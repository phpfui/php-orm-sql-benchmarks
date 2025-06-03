<?php

namespace SOB\Nextras\Model\Invoice;

use SOB\Nextras\Model\AbstractMapper;

class InvoiceMapper extends AbstractMapper
{
	public function getTableName(): string
	{
		return 'invoice';
	}
}
