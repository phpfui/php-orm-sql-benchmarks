<?php

namespace SOB\CakeCached\Table;

class StringRecord extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('stringRecord');
		$this->setPrimaryKey('stringRecordId');
		$this->setEntityClass('SOB\Cake\Record\StringRecord');
		}
	}
