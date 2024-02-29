<?php

namespace SOB\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This code is automatically generated.  See SOB\Eloquent\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @property int $migrationId MySQL type int
 * @property ?string $ran MySQL type timestamp
 */
class Migration extends Model
	{
	/**
	 * Indicates if the model's ID is auto-incrementing.
	 */
	public $incrementing = false;

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
	protected $primaryKey = 'migrationId';

	/**
	 * The table associated with the model.
	 */
	protected $table = 'migration';
	}
