<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $stringRecordId MySQL type integer
 * @property string $stringRequired MySQL type varchar(100)
 * @property ?string $stringDefaultNull MySQL type varchar(100)
 * @property ?string $stringDefaultNullable MySQL type varchar(100)
 * @property string $stringDefaultNotNull MySQL type varchar(100)
 */
class StringRecord extends \ActiveRecord\Model
{
	public static string $primary_key = 'stringRecordId';

	public static string $table_name = 'stringRecord';
}
