<?php

namespace SOB\Cake\Table;

class Order extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('order');
		$this->setPrimaryKey('order_id');
		$this->setEntityClass('SOB\Cake\Record\Order');
		}
	}
