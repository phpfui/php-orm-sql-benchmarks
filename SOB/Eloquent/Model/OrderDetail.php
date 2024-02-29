<?php

namespace SOB\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This code is automatically generated.  See SOB\Eloquent\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @property int $order_detail_id MySQL type integer
 * @property int $order_id MySQL type integer
 * @property ?int $product_id MySQL type integer
 * @property float $quantity MySQL type decimal(18,4)
 * @property ?float $unit_price MySQL type decimal(19,4)
 * @property float $discount MySQL type double
 * @property ?int $order_detail_status_id MySQL type integer
 * @property ?string $date_allocated MySQL type datetime
 * @property ?int $purchase_order_id MySQL type integer
 * @property ?int $inventory_transaction_id MySQL type integer
 */
class OrderDetail extends Model
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
	protected $primaryKey = 'order_detail_id';

	/**
	 * The table associated with the model.
	 */
	protected $table = 'order_detail';
	}
