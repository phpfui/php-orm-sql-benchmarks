<?php

namespace SOB\Cake\Record;

/**
 * @property int $setting_id MySQL type integer
 * @property ?string $setting_data MySQL type varchar(255)

 */
class Setting extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'setting_id' => true,
		'setting_data' => true,
		];

	}