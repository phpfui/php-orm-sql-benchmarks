<?php

namespace SOB\CakeCached\Table;

class Invoice extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('invoice');
		$this->setPrimaryKey('invoice_id');
		$this->setEntityClass('SOB\Cake\Record\Invoice');
		}
	}
