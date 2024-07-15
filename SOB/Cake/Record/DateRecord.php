<?php

namespace SOB\Cake\Record;

/**
 * @property int $dateRecordId MySQL type integer
 * @property string $dateRequired MySQL type date
 * @property ?string $dateDefaultNull MySQL type date
 * @property ?string $dateDefaultNullable MySQL type date
 * @property string $dateDefaultNotNull MySQL type date
 * @property ?string $timestampDefaultCurrentNullable MySQL type timestamp
 * @property string $timestampDefaultCurrentNotNull MySQL type timestamp

 */
class DateRecord extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'dateRecordId' => true,
		'dateRequired' => true,
		'dateDefaultNull' => true,
		'dateDefaultNullable' => true,
		'dateDefaultNotNull' => true,
		'timestampDefaultCurrentNullable' => true,
		'timestampDefaultCurrentNotNull' => true,
		];

	}