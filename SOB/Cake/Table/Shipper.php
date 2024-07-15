<?php

namespace SOB\Cake\Table;

class Shipper extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('shipper');
		$this->setPrimaryKey('shipper_id');
		$this->setEntityClass('SOB\Cake\Record\Shipper');
		}
	}