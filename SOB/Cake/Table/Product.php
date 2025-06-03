<?php

namespace SOB\Cake\Table;

class Product extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('product');
		$this->setPrimaryKey('product_id');
		$this->setEntityClass('SOB\Cake\Record\Product');
		}
	}
