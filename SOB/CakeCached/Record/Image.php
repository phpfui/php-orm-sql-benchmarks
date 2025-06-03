<?php

namespace SOB\CakeCached\Record;

/**
 * @property int $image_id MySQL type integer
 * @property ?int $imageable_id MySQL type integer
 * @property ?string $imageable_type MySQL type varchar(128)
 * @property string $path MySQL type varchar(128)
 *
 */
class Image extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'image_id' => true,
		'imageable_id' => true,
		'imageable_type' => true,
		'path' => true,
	];
	}
