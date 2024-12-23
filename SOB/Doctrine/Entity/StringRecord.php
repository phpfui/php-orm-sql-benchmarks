<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="stringRecord")
 */
class StringRecord
	{
	/**
	 * @ORM\{Id}
	 * @ORM\{GeneratedValue(strategy="AUTO")}
	 * @ORM\Column(type="integer")
	 */
	public int stringRecordId;

	/**
	 * @ORM\Column(type=string, length=100)
	 */
	public string stringRequired;

	/**
	 * @ORM\Column(type=string, length=100, nullable=true)
	 */
	public ?string stringDefaultNull = NULL;

	/**
	 * @ORM\Column(type=string, length=100, options={"default": "default"}, nullable=true)
	 */
	public ?string stringDefaultNullable = 'default';

	/**
	 * @ORM\Column(type=string, length=100, options={"default": "default"})
	 */
	public string stringDefaultNotNull = 'default';


	}
