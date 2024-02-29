<?php

namespace SOB\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This code is automatically generated.  See SOB\Eloquent\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @property int $invoice_id MySQL type integer
 * @property ?int $order_id MySQL type integer
 * @property string $invoice_date MySQL type datetime
 * @property ?string $due_date MySQL type datetime
 * @property ?float $tax MySQL type decimal(19,4)
 * @property ?float $shipping MySQL type decimal(19,4)
 * @property ?float $amount_due MySQL type decimal(19,4)
 */
class Invoice extends Model
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
	protected $primaryKey = 'invoice_id';

	/**
	 * The table associated with the model.
	 */
	protected $table = 'invoice';
	}
