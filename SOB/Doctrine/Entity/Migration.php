<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="migration")
 */
class Migration
	{
	/**
	 * @ORM\{Id}
	 * @ORM\Column(type="int")
	 */
	public int migrationId;

	/**
	 * @ORM\Column(type="timestamp", options={"default": "CURRENT_TIMESTAMP"}, nullable=true)
	 */
	public ?string ran;


	}
