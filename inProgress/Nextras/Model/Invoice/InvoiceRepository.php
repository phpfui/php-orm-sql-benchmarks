<?php

namespace SOB\Nextras\Model\Invoice;

use SOB\Nextras\Model\AbstractRepository;

class InvoiceRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [Invoice::class];
	}
}
