<?php

namespace SOB\CakeCached\Table;

class ProductSupplier extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('product_supplier');
		$this->setPrimaryKey('~PRIMARY_KEY~');
		$this->setEntityClass('SOB\Cake\Record\ProductSupplier');
		}
	}