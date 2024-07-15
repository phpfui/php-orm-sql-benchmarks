<?php

namespace SOB\CakeCached\Table;

class Employee extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('employee');
		$this->setPrimaryKey('employee_id');
		$this->setEntityClass('SOB\Cake\Record\Employee');
		}
	}