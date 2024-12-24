<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "supplier")]
class Supplier
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: "AUTO")]
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $supplier_id;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $company = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $last_name = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $first_name = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $email_address = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $job_title = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 25, nullable: true)]
	public ?string $business_phone = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 25, nullable: true)]
	public ?string $home_phone = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 25, nullable: true)]
	public ?string $mobile_phone = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 25, nullable: true)]
	public ?string $fax_number = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "text", nullable: true)]
	public ?string $address = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $city = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $state_province = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 15, nullable: true)]
	public ?string $zip_postal_code = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "string", length: 50, nullable: true)]
	public ?string $country_region = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "text", nullable: true)]
	public ?string $web_page = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "text", nullable: true)]
	public ?string $notes = NULL;

	#[\Doctrine\ORM\Mapping\Column(type: "blob", nullable: true)]
	public ?string $attachments = NULL;


	}
