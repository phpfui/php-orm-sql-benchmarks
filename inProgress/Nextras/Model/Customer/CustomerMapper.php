<?php

namespace SOB\Nextras\Model\Customer;

use SOB\Nextras\Model\AbstractMapper;

class CustomerMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'customer';
	}
}
