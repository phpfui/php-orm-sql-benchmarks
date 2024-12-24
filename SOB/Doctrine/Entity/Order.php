<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "order")]
class Order
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: "AUTO")]
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $order_id;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $employee_id = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $customer_id = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "datetime", options: ["default" => "CURRENT_TIMESTAMP"])]
	public string $order_date;

	#[\Doctrine\ORM\Mapping\Column(type: "datetime", nullable: true)]
	public ?string $shipped_date = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $shipper_id = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $ship_name = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "text", nullable: true)]
	public ?string $ship_address = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $ship_city = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $ship_state_province = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $ship_zip_postal_code = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $ship_country_region = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "decimal", precision: 19, scale: 4, options: ["default" => "0.0000"], nullable: true)]
	public ?float $shipping_fee = 0.0000;

	#[\Doctrine\ORM\Mapping\Column(type: "decimal", precision: 19, scale: 4, options: ["default" => "0.0000"], nullable: true)]
	public ?float $taxes = 0.0000;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $payment_type = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "datetime", nullable: true)]
	public ?string $paid_date = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "text", nullable: true)]
	public ?string $notes = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "double", options: ["default" => "0"], nullable: true)]
	public ?float $tax_rate = 0;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", nullable: true)]
	public ?int $order_tax_status_id = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "integer", options: ["default" => "0"], nullable: true)]
	public ?int $order_status_id = 0;


	}
