<?php

namespace SOB\CakeCached\Record;

/**
 * @property int $employee_id MySQL type integer
 * @property int $privilege_id MySQL type integer
 *
 */
class EmployeePrivilege extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'employee_id' => true,
		'privilege_id' => true,
	];
	}
