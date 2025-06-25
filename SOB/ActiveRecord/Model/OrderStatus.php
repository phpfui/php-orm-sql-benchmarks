<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $order_status_id MySQL type integer
 * @property string $order_status_name MySQL type varchar(50)
 */
class OrderStatus extends \ActiveRecord\Model
{
	public static string $primary_key = 'order_status_id';

	public static string $table_name = 'order_status';
}
