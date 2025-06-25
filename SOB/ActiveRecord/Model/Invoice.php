<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $invoice_id MySQL type integer
 * @property ?int $order_id MySQL type integer
 * @property string $invoice_date MySQL type datetime
 * @property ?string $due_date MySQL type datetime
 * @property ?float $tax MySQL type decimal(19,4)
 * @property ?float $shipping MySQL type decimal(19,4)
 * @property ?float $amount_due MySQL type decimal(19,4)
 */
class Invoice extends \ActiveRecord\Model
{
	public static string $primary_key = 'invoice_id';

	public static string $table_name = 'invoice';
}
