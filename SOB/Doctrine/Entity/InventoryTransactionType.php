<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="inventory_transaction_type")
 */
class InventoryTransactionType
	{
	/**
	 * @ORM\{Id}
	 * @ORM\Column(type="integer")
	 */
	public int inventory_transaction_type_id;

	/**
	 * @ORM\Column(type=string, length=50)
	 */
	public string inventory_transaction_type_name;


	}
