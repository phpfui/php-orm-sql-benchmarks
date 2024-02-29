<?php

namespace SOB\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This code is automatically generated.  See SOB\Eloquent\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @property int $purchase_order_detail_id MySQL type integer
 * @property int $purchase_order_id MySQL type integer
 * @property ?int $product_id MySQL type integer
 * @property float $quantity MySQL type decimal(18,4)
 * @property float $unit_cost MySQL type decimal(19,4)
 * @property ?string $date_received MySQL type datetime
 * @property int $posted_to_inventory MySQL type integer
 * @property ?int $inventory_transaction_id MySQL type integer
 */
class PurchaseOrderDetail extends Model
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
	protected $primaryKey = 'purchase_order_detail_id';

	/**
	 * The table associated with the model.
	 */
	protected $table = 'purchase_order_detail';
	}
