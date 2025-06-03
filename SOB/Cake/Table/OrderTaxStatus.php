<?php

namespace SOB\Cake\Table;

class OrderTaxStatus extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('order_tax_status');
		$this->setPrimaryKey('order_tax_status_id');
		$this->setEntityClass('SOB\Cake\Record\OrderTaxStatus');
		}
	}
