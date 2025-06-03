<?php

namespace SOB\Cake\Record;

/**
 * @property string $group_by MySQL type varchar(50)
 * @property ?string $display MySQL type varchar(50)
 * @property ?string $title MySQL type varchar(50)
 * @property ?string $filter_row_source MySQL type longtext
 * @property int $default MySQL type integer
 *
 */
class SalesReport extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'group_by' => true,
		'display' => true,
		'title' => true,
		'filter_row_source' => true,
		'default' => true,
	];
	}
