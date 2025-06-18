<?php

namespace SOB\Nextras\Model\Customer;

use SOB\Nextras\Model\AbstractRepository;

class CustomerRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [Customer::class];
	}
}
