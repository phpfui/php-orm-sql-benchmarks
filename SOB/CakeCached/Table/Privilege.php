<?php

namespace SOB\CakeCached\Table;

class Privilege extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('privilege');
		$this->setPrimaryKey('privilege_id');
		$this->setEntityClass('SOB\Cake\Record\Privilege');
		}
	}