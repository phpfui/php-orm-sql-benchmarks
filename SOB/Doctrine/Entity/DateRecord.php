<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="dateRecord")
 */
class DateRecord
	{
	/**
	 * @ORM\{Id}
	 * @ORM\{GeneratedValue(strategy="AUTO")}
	 * @ORM\Column(type="integer")
	 */
	public int dateRecordId;

	/**
	 * @ORM\Column(type="date")
	 */
	public string dateRequired;

	/**
	 * @ORM\Column(type="date", nullable=true)
	 */
	public ?string dateDefaultNull = NULL;

	/**
	 * @ORM\Column(type="date", options={"default": "2000-01-02"}, nullable=true)
	 */
	public ?string dateDefaultNullable = '2000-01-02';

	/**
	 * @ORM\Column(type="date", options={"default": "2000-01-02"})
	 */
	public string dateDefaultNotNull = '2000-01-02';

	/**
	 * @ORM\Column(type="timestamp", options={"default": "CURRENT_TIMESTAMP"}, nullable=true)
	 */
	public ?string timestampDefaultCurrentNullable;

	/**
	 * @ORM\Column(type="timestamp", options={"default": "CURRENT_TIMESTAMP"})
	 */
	public string timestampDefaultCurrentNotNull;


	}
