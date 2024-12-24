<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "purchase_order")]
class PurchaseOrder
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: "AUTO")]
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $purchase_order_id;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $supplier_id = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $created_by = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "datetime", nullable: true)]
	public ?string $submitted_date = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
	public string $creation_date;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", options: ["default" => "0"], nullable: true)]
	public ?int $purchase_order_status_id = 0;

	#[\Doctrine\ORM\Mapping\Column(type: "datetime", nullable: true)]
	public ?string $expected_date = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "decimal", precision: 19, scale: 4, options: ["default" => "0.0000"])]
	public float $shipping_fee = 0.0000;

	#[\Doctrine\ORM\Mapping\Column(type: "decimal", precision: 19, scale: 4, options: ["default" => "0.0000"])]
	public float $taxes = 0.0000;

	#[\Doctrine\ORM\Mapping\Column(type: "datetime", nullable: true)]
	public ?string $payment_date = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "decimal", precision: 19, scale: 4, options: ["default" => "0.0000"], nullable: true)]
	public ?float $payment_amount = 0.0000;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $payment_method = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "text", nullable: true)]
	public ?string $notes = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $approved_by = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "datetime", nullable: true)]
	public ?string $approved_date = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $submitted_by = NULL;


	}
