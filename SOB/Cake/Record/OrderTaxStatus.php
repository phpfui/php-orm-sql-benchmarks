<?php

namespace SOB\Cake\Record;

/**
 * @property int $order_tax_status_id MySQL type integer
 * @property string $order_tax_status_name MySQL type varchar(50)

 */
class OrderTaxStatus extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'order_tax_status_id' => true,
		'order_tax_status_name' => true,
		];

	}