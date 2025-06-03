<?php

namespace SOB\CakeCached\Table;

class Image extends \Cake\ORM\Table
	{
	public function initialize(array $config) : void
		{
		parent::initialize($config);
		$this->setTable('image');
		$this->setPrimaryKey('image_id');
		$this->setEntityClass('SOB\Cake\Record\Image');
		}
	}
