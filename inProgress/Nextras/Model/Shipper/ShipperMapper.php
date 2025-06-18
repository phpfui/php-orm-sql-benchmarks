<?php

namespace SOB\Nextras\Model\Shipper;

use SOB\Nextras\Model\AbstractMapper;

class ShipperMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'shipper';
	}
}
