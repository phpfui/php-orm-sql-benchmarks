<?php

namespace SOB\CakeCached\Table;

class SalesReport extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('sales_report');
		$this->setPrimaryKey('group_by');
		$this->setEntityClass('SOB\Cake\Record\SalesReport');
		}
	}
