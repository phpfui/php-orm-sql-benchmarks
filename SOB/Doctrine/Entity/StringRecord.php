<?php

namespace SOB\Doctrine\Entity;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: 'stringRecord')]
class StringRecord
	{
	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 100, options: ['default' => 'default'])]
	public string $stringDefaultNotNull = 'default';

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 100, nullable: true)]
	public ?string $stringDefaultNull = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 100, options: ['default' => 'default'], nullable: true)]
	public ?string $stringDefaultNullable = 'default';

	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: 'AUTO')]
	#[\Doctrine\ORM\Mapping\Column(type: 'integer')]
	public int $stringRecordId;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 100)]
	public string $stringRequired;
	}
