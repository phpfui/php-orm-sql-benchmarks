<?php

namespace SOB\CakeCached\Record;

/**
 * @property int $migrationId MySQL type int
 * @property ?string $ran MySQL type timestamp

 */
class Migration extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'migrationId' => true,
		'ran' => true,
		];

	}