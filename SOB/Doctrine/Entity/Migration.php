<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "migration")]
class Migration
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\Column(type: "int")]
	public int $migrationId;

	#[\Doctrine\ORM\Mapping\Column(type: "timestamp", options: ["default" => "CURRENT_TIMESTAMP"], nullable: true)]
	public ?string $ran;


	}
