<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $order_detail_status_id MySQL type integer
 * @property string $order_detail_status_name MySQL type varchar(50)
 */
class OrderDetailStatus extends \ActiveRecord\Model
{
	public static string $primary_key = 'order_detail_status_id';

	public static string $table_name = 'order_detail_status';
}
