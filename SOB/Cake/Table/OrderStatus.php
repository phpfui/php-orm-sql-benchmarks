<?php

namespace SOB\Cake\Table;

class OrderStatus extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('order_status');
		$this->setPrimaryKey('order_status_id');
		$this->setEntityClass('SOB\Cake\Record\OrderStatus');
		}
	}
