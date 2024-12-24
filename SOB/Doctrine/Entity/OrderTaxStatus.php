<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "order_tax_status")]
class OrderTaxStatus
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $order_tax_status_id;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50)]
	public string $order_tax_status_name;


	}
