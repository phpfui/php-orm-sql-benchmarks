<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "purchase_order_status")]
class PurchaseOrderStatus
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $purchase_order_status_id;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $purchase_order_status_name = NULL;


	}
