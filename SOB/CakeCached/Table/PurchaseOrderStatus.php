<?php

namespace SOB\CakeCached\Table;

class PurchaseOrderStatus extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('purchase_order_status');
		$this->setPrimaryKey('purchase_order_status_id');
		$this->setEntityClass('SOB\Cake\Record\PurchaseOrderStatus');
		}
	}