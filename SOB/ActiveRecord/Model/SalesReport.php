<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property string $group_by MySQL type varchar(50)
 * @property ?string $display MySQL type varchar(50)
 * @property ?string $title MySQL type varchar(50)
 * @property ?string $filter_row_source MySQL type longtext
 * @property int $default MySQL type integer
 */
class SalesReport extends \ActiveRecord\Model
{
	public static string $primary_key = 'group_by';

	public static string $table_name = 'sales_report';
}
