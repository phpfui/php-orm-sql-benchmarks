<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "product_supplier")]
class ProductSupplier
	{
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $product_id;

	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $supplier_id;


	}
