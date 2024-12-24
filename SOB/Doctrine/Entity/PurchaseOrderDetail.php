<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "purchase_order_detail")]
class PurchaseOrderDetail
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: "AUTO")]
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $purchase_order_detail_id;

	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $purchase_order_id;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $product_id = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "decimal", precision: 18, scale: 4)]
	public float $quantity;

	#[\Doctrine\ORM\Mapping\Column(type: "decimal", precision: 19, scale: 4)]
	public float $unit_cost;

	#[\Doctrine\ORM\Mapping\Column(type: "datetime", nullable: true)]
	public ?string $date_received = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", options: ["default" => "0"])]
	public int $posted_to_inventory = 0;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $inventory_transaction_id = NULL;


	}
