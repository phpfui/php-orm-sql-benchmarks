<?php

namespace SOB\Doctrine\Entity;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: 'inventory_transaction')]
class InventoryTransaction
	{
	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 255, nullable: true)]
	public ?string $comments = null;

	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: 'AUTO')]
	#[\Doctrine\ORM\Mapping\Column(type: 'integer')]
	public int $inventory_transaction_id;

	#[\Doctrine\ORM\Mapping\Column(type: 'integer')]
	public int $inventory_transaction_type_id;

	#[\Doctrine\ORM\Mapping\Column(type: 'integer', nullable: true)]
	public ?int $order_id = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'integer')]
	public int $product_id;

	#[\Doctrine\ORM\Mapping\Column(type: 'integer', nullable: true)]
	public ?int $purchase_order_id = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'integer')]
	public int $quantity;

	#[\Doctrine\ORM\Mapping\Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
	public string $transaction_created_date;

	#[\Doctrine\ORM\Mapping\Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
	public string $transaction_modified_date;
	}
