<?php

namespace SOB\CakeCached\Table;

class OrderDetailStatus extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('order_detail_status');
		$this->setPrimaryKey('order_detail_status_id');
		$this->setEntityClass('SOB\Cake\Record\OrderDetailStatus');
		}
	}