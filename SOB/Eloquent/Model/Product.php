<?php

namespace SOB\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This code is automatically generated.  See SOB\Eloquent\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @property int $product_id MySQL type integer
 * @property ?string $product_code MySQL type varchar(25)
 * @property ?string $product_name MySQL type varchar(50)
 * @property ?string $description MySQL type longtext
 * @property ?float $standard_cost MySQL type decimal(19,4)
 * @property float $list_price MySQL type decimal(19,4)
 * @property ?int $reorder_level MySQL type integer
 * @property ?int $target_level MySQL type integer
 * @property ?string $quantity_per_unit MySQL type varchar(50)
 * @property int $discontinued MySQL type integer
 * @property ?int $minimum_reorder_quantity MySQL type integer
 * @property ?string $category MySQL type varchar(50)
 * @property ?string $attachments MySQL type longblob
 */
class Product extends Model
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
	protected $primaryKey = 'product_id';

	/**
	 * The table associated with the model.
	 */
	protected $table = 'product';
	}
