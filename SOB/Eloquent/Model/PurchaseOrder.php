<?php

namespace SOB\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This code is automatically generated.  See SOB\Eloquent\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @property int $purchase_order_id MySQL type integer
 * @property ?int $supplier_id MySQL type integer
 * @property ?int $created_by MySQL type integer
 * @property ?string $submitted_date MySQL type datetime
 * @property string $creation_date MySQL type datetime
 * @property ?int $purchase_order_status_id MySQL type integer
 * @property ?string $expected_date MySQL type datetime
 * @property float $shipping_fee MySQL type decimal(19,4)
 * @property float $taxes MySQL type decimal(19,4)
 * @property ?string $payment_date MySQL type datetime
 * @property ?float $payment_amount MySQL type decimal(19,4)
 * @property ?string $payment_method MySQL type varchar(50)
 * @property ?string $notes MySQL type longtext
 * @property ?int $approved_by MySQL type integer
 * @property ?string $approved_date MySQL type datetime
 * @property ?int $submitted_by MySQL type integer
 */
class PurchaseOrder extends Model
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
	protected $primaryKey = 'purchase_order_id';

	/**
	 * The table associated with the model.
	 */
	protected $table = 'purchase_order';
	}
