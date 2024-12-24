<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "image")]
class Image
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: "AUTO")]
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $image_id;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $imageable_id;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 128, nullable: true)]
	public ?string $imageable_type;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 128)]
	public string $path;


	}
