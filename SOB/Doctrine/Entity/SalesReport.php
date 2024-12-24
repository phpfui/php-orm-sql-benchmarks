<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "sales_report")]
class SalesReport
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50)]
	public string $group_by;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $display = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $title = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "text", nullable: true)]
	public ?string $filter_row_source = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", options: ["default" => "0"])]
	public int $default = 0;


	}
