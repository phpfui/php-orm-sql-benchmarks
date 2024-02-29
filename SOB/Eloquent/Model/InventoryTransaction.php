<?php

namespace SOB\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This code is automatically generated.  See SOB\Eloquent\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @property int $inventory_transaction_id MySQL type integer
 * @property int $inventory_transaction_type_id MySQL type integer
 * @property string $transaction_created_date MySQL type datetime
 * @property string $transaction_modified_date MySQL type datetime
 * @property int $product_id MySQL type integer
 * @property int $quantity MySQL type integer
 * @property ?int $purchase_order_id MySQL type integer
 * @property ?int $order_id MySQL type integer
 * @property ?string $comments MySQL type varchar(255)
 */
class InventoryTransaction extends Model
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
	protected $primaryKey = 'inventory_transaction_id';

	/**
	 * The table associated with the model.
	 */
	protected $table = 'inventory_transaction';
	}
