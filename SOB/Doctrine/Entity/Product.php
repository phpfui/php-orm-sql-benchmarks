<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "product")]
class Product
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: "AUTO")]
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $product_id;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 25, nullable: true)]
	public ?string $product_code = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $product_name = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "text", nullable: true)]
	public ?string $description = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "decimal", precision: 19, scale: 4, options: ["default" => "0.0000"], nullable: true)]
	public ?float $standard_cost = 0.0000;

	#[\Doctrine\ORM\Mapping\Column(type: "decimal", precision: 19, scale: 4, options: ["default" => "0.0000"])]
	public float $list_price = 0.0000;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $reorder_level = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $target_level = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $quantity_per_unit = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", options: ["default" => "0"])]
	public int $discontinued = 0;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $minimum_reorder_quantity = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $category = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "blob", nullable: true)]
	public ?string $attachments = NULL;


	}
