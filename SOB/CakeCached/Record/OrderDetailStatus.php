<?php

namespace SOB\CakeCached\Record;

/**
 * @property int $order_detail_status_id MySQL type integer
 * @property string $order_detail_status_name MySQL type varchar(50)

 */
class OrderDetailStatus extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'order_detail_status_id' => true,
		'order_detail_status_name' => true,
		];

	}