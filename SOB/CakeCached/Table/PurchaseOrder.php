<?php

namespace SOB\CakeCached\Table;

class PurchaseOrder extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('purchase_order');
		$this->setPrimaryKey('purchase_order_id');
		$this->setEntityClass('SOB\Cake\Record\PurchaseOrder');
		}
	}