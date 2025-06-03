<?php

namespace SOB\Cake\Table;

class Migration extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('migration');
		$this->setPrimaryKey('migrationId');
		$this->setEntityClass('SOB\Cake\Record\Migration');
		}
	}
