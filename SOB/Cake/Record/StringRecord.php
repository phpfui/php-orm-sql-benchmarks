<?php

namespace SOB\Cake\Record;

/**
 * @property int $stringRecordId MySQL type integer
 * @property string $stringRequired MySQL type varchar(100)
 * @property ?string $stringDefaultNull MySQL type varchar(100)
 * @property ?string $stringDefaultNullable MySQL type varchar(100)
 * @property string $stringDefaultNotNull MySQL type varchar(100)

 */
class StringRecord extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'stringRecordId' => true,
		'stringRequired' => true,
		'stringDefaultNull' => true,
		'stringDefaultNullable' => true,
		'stringDefaultNotNull' => true,
		];

	}