<?php

namespace SOB\Cake\Table;

class Customer extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('customer');
		$this->setPrimaryKey('customer_id');
		$this->setEntityClass('SOB\Cake\Record\Customer');
		}
	}