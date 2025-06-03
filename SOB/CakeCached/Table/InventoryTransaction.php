<?php

namespace SOB\CakeCached\Table;

class InventoryTransaction extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('inventory_transaction');
		$this->setPrimaryKey('inventory_transaction_id');
		$this->setEntityClass('SOB\Cake\Record\InventoryTransaction');
		}
	}
