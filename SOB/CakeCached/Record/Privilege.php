<?php

namespace SOB\CakeCached\Record;

/**
 * @property int $privilege_id MySQL type integer
 * @property ?string $privilege MySQL type varchar(50)
 *
 */
class Privilege extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'privilege_id' => true,
		'privilege' => true,
	];
	}
