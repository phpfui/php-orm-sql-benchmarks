<?php

namespace SOB\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This code is automatically generated.  See SOB\Eloquent\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @property string $group_by MySQL type varchar(50)
 * @property ?string $display MySQL type varchar(50)
 * @property ?string $title MySQL type varchar(50)
 * @property ?string $filter_row_source MySQL type longtext
 * @property int $default MySQL type integer
 */
class SalesReport extends Model
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
	protected $primaryKey = 'group_by';

	/**
	 * The table associated with the model.
	 */
	protected $table = 'sales_report';
	}
