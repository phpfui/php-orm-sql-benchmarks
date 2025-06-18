<?php

namespace SOB\Nextras\Model\Image;

use SOB\Nextras\Model\AbstractMapper;

class ImageMapper extends AbstractMapper
{
	public function getTableName() : string
	{
		return 'image';
	}
}
