<?php

namespace SOB\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This code is automatically generated.  See SOB\Eloquent\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @property int $image_id MySQL type integer
 * @property ?int $imageable_id MySQL type integer
 * @property ?string $imageable_type MySQL type varchar(128)
 * @property string $path MySQL type varchar(128)
 */
class Image extends Model
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
	protected $primaryKey = 'image_id';

	/**
	 * The table associated with the model.
	 */
	protected $table = 'image';
	}
