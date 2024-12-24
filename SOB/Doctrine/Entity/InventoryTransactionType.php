<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "inventory_transaction_type")]
class InventoryTransactionType
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $inventory_transaction_type_id;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50)]
	public string $inventory_transaction_type_name;


	}
