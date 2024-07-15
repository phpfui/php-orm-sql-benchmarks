<?php

namespace SOB\CakeCached\Table;

class Setting extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('setting');
		$this->setPrimaryKey('setting_id');
		$this->setEntityClass('SOB\Cake\Record\Setting');
		}
	}