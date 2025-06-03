<?php

namespace SOB\Cake\Record;

/**
 * @property int $invoice_id MySQL type integer
 * @property ?int $order_id MySQL type integer
 * @property string $invoice_date MySQL type datetime
 * @property ?string $due_date MySQL type datetime
 * @property ?float $tax MySQL type decimal(19,4)
 * @property ?float $shipping MySQL type decimal(19,4)
 * @property ?float $amount_due MySQL type decimal(19,4)
 *
 */
class Invoice extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'invoice_id' => true,
		'order_id' => true,
		'invoice_date' => true,
		'due_date' => true,
		'tax' => true,
		'shipping' => true,
		'amount_due' => true,
	];
	}
