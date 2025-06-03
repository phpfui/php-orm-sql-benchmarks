<?php

namespace SOB\Cake\Table;

class InventoryTransactionType extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('inventory_transaction_type');
		$this->setPrimaryKey('inventory_transaction_type_id');
		$this->setEntityClass('SOB\Cake\Record\InventoryTransactionType');
		}
	}
