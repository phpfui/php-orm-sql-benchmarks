<?php

namespace SOB\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This code is automatically generated.  See SOB\Eloquent\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @property int $dateRecordId MySQL type integer
 * @property string $dateRequired MySQL type date
 * @property ?string $dateDefaultNull MySQL type date
 * @property ?string $dateDefaultNullable MySQL type date
 * @property string $dateDefaultNotNull MySQL type date
 * @property ?string $timestampDefaultCurrentNullable MySQL type timestamp
 * @property string $timestampDefaultCurrentNotNull MySQL type timestamp
 */
class DateRecord extends Model
	{
	/**
	 * Indicates if the model's ID is auto-incrementing.
	 */
	public $incrementing = true;

	/**
	 * Indicates if the model should be timestamped.
	 */
	public $timestamps = false;

	/**
	 * The storage format of the model's date columns.
	 */
	protected $dateFormat = 'U';

	/**
	 * The primary key associated with the table.
	 */
	protected $primaryKey = 'dateRecordId';

	/**
	 * The table associated with the model.
	 */
	protected $table = 'dateRecord';
	}
