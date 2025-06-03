<?php

namespace SOB\Doctrine\Entity;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: 'sales_report')]
class SalesReport
	{
	#[\Doctrine\ORM\Mapping\Column(type: 'integer', options: ['default' => '0'])]
	public int $default = 0;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 50, nullable: true)]
	public ?string $display = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'text', nullable: true)]
	public ?string $filter_row_source = null;

	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 50)]
	public string $group_by;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 50, nullable: true)]
	public ?string $title = null;
	}
