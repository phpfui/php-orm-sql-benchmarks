<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $employee_id MySQL type integer
 * @property int $privilege_id MySQL type integer
 */
class EmployeePrivilege extends \ActiveRecord\Model
{
	public static string $primary_key = '~PRIMARY_KEY~';

	public static string $table_name = 'employee_privilege';
}
