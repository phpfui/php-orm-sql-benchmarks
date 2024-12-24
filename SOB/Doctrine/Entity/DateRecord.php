<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "dateRecord")]
class DateRecord
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: "AUTO")]
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $dateRecordId;

	#[\Doctrine\ORM\Mapping\Column(type: "date")]
	public string $dateRequired;

	#[\Doctrine\ORM\Mapping\Column(type: "date", nullable: true)]
	public ?string $dateDefaultNull = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "date", options: ["default" => "2000-01-02"], nullable: true)]
	public ?string $dateDefaultNullable = '2000-01-02';

	#[\Doctrine\ORM\Mapping\Column(type: "date", options: ["default" => "2000-01-02"])]
	public string $dateDefaultNotNull = '2000-01-02';

	#[\Doctrine\ORM\Mapping\Column(type: "timestamp", options: ["default" => "CURRENT_TIMESTAMP"], nullable: true)]
	public ?string $timestampDefaultCurrentNullable;

	#[\Doctrine\ORM\Mapping\Column(type: "timestamp", options: ["default" => "CURRENT_TIMESTAMP"])]
	public string $timestampDefaultCurrentNotNull;


	}
