<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="product_supplier")
 */
class ProductSupplier
	{
	/**
	 * @ORM\Column(type="integer")
	 */
	public int product_id;

	/**
	 * @ORM\Column(type="integer")
	 */
	public int supplier_id;


	}
