<?php

namespace SOB\CakeCached\Table;

class PurchaseOrderDetail extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('purchase_order_detail');
		$this->setPrimaryKey('purchase_order_detail_id');
		$this->setEntityClass('SOB\Cake\Record\PurchaseOrderDetail');
		}
	}
