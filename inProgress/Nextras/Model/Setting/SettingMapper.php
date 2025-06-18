<?php

namespace SOB\Nextras\Model\Setting;

use SOB\Nextras\Model\AbstractMapper;

class SettingMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'setting';
	}
}
