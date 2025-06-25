<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $dateRecordId MySQL type integer
 * @property string $dateRequired MySQL type date
 * @property ?string $dateDefaultNull MySQL type date
 * @property ?string $dateDefaultNullable MySQL type date
 * @property string $dateDefaultNotNull MySQL type date
 * @property ?string $timestampDefaultCurrentNullable MySQL type timestamp
 * @property string $timestampDefaultCurrentNotNull MySQL type timestamp
 */
class DateRecord extends \ActiveRecord\Model
{
	public static string $primary_key = 'dateRecordId';

	public static string $table_name = 'dateRecord';
}
