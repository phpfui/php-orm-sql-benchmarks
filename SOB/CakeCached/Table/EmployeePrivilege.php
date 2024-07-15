<?php

namespace SOB\CakeCached\Table;

class EmployeePrivilege extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('employee_privilege');
		$this->setPrimaryKey('~PRIMARY_KEY~');
		$this->setEntityClass('SOB\Cake\Record\EmployeePrivilege');
		}
	}