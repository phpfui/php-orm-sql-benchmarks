<?php

namespace SOB\Nextras\Model\Setting;

use SOB\Nextras\Model\AbstractRepository;

class SettingRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [Setting::class];
	}
}
