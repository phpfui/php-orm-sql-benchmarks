<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "privilege")]
class Privilege
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: "AUTO")]
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $privilege_id;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $privilege = NULL;


	}
