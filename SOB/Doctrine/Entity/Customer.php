<?php

namespace SOB\Doctrine\Entity;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: 'customer')]
class Customer
	{
	#[\Doctrine\ORM\Mapping\Column(type: 'text', nullable: true)]
	public ?string $address = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'blob', nullable: true)]
	public ?string $attachments = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 25, nullable: true)]
	public ?string $business_phone = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 50, nullable: true)]
	public ?string $city = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 50, nullable: true)]
	public ?string $company = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 50, nullable: true)]
	public ?string $country_region = null;

	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: 'AUTO')]
	#[\Doctrine\ORM\Mapping\Column(type: 'integer')]
	public int $customer_id;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 50, nullable: true)]
	public ?string $email_address = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 25, nullable: true)]
	public ?string $fax_number = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 50, nullable: true)]
	public ?string $first_name = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 25, nullable: true)]
	public ?string $home_phone = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 50, nullable: true)]
	public ?string $job_title = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 50, nullable: true)]
	public ?string $last_name = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 25, nullable: true)]
	public ?string $mobile_phone = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'text', nullable: true)]
	public ?string $notes = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 50, nullable: true)]
	public ?string $state_province = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'text', nullable: true)]
	public ?string $web_page = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 15, nullable: true)]
	public ?string $zip_postal_code = null;
	}
