<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $privilege_id MySQL type integer
 * @property ?string $privilege MySQL type varchar(50)
 */
class Privilege extends \ActiveRecord\Model
{
	public static string $primary_key = 'privilege_id';

	public static string $table_name = 'privilege';
}
