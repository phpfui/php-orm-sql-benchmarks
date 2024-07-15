<?php

namespace SOB\CakeCached\Table;

class Supplier extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('supplier');
		$this->setPrimaryKey('supplier_id');
		$this->setEntityClass('SOB\Cake\Record\Supplier');
		}
	}