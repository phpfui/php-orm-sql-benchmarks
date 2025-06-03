<?php

namespace SOB\CakeCached\Table;

class OrderDetail extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('order_detail');
		$this->setPrimaryKey('order_detail_id');
		$this->setEntityClass('SOB\Cake\Record\OrderDetail');
		}
	}
