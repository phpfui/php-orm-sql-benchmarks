<?php

namespace SOB\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This code is automatically generated.  See SOB\Eloquent\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @property int $stringRecordId MySQL type integer
 * @property string $stringRequired MySQL type varchar(100)
 * @property ?string $stringDefaultNull MySQL type varchar(100)
 * @property ?string $stringDefaultNullable MySQL type varchar(100)
 * @property string $stringDefaultNotNull MySQL type varchar(100)
 */
class StringRecord extends Model
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
	protected $primaryKey = 'stringRecordId';

	/**
	 * The table associated with the model.
	 */
	protected $table = 'stringRecord';
	}
