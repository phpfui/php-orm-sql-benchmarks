<?php

namespace SOB\CakeCached\Table;

class DateRecord extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('dateRecord');
		$this->setPrimaryKey('dateRecordId');
		$this->setEntityClass('SOB\Cake\Record\DateRecord');
		}
	}
