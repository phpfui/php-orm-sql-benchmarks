<?php

namespace SOB\Cake\Record;

/**
 * @property int $order_status_id MySQL type integer
 * @property string $order_status_name MySQL type varchar(50)
 *
 */
class OrderStatus extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'order_status_id' => true,
		'order_status_name' => true,
	];
	}
