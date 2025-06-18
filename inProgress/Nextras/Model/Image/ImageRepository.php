<?php

namespace SOB\Nextras\Model\Image;

use SOB\Nextras\Model\AbstractRepository;

class ImageRepository extends AbstractRepository
{
	public static function getEntityClassNames() : array
	{
		return [Image::class];
	}
}
