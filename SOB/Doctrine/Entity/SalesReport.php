<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="sales_report")
 */
class SalesReport
	{
	/**
	 * @ORM\{Id}
	 * @ORM\Column(type=string, length=50)
	 */
	public string group_by;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string display = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string title = NULL;

	/**
	 * @ORM\Column(type="longtext", nullable=true)
	 */
	public ?string filter_row_source = NULL;

	/**
	 * @ORM\Column(type="integer", options={"default": "0"})
	 */
	public int default = '0';


	}
