<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="shipper")
 */
class Shipper
	{
	/**
	 * @ORM\{Id}
	 * @ORM\{GeneratedValue(strategy="AUTO")}
	 * @ORM\Column(type="integer")
	 */
	public int shipper_id;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string company = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string last_name = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string first_name = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string email_address = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string job_title = NULL;

	/**
	 * @ORM\Column(type=string, length=25, nullable=true)
	 */
	public ?string business_phone = NULL;

	/**
	 * @ORM\Column(type=string, length=25, nullable=true)
	 */
	public ?string home_phone = NULL;

	/**
	 * @ORM\Column(type=string, length=25, nullable=true)
	 */
	public ?string mobile_phone = NULL;

	/**
	 * @ORM\Column(type=string, length=25, nullable=true)
	 */
	public ?string fax_number = NULL;

	/**
	 * @ORM\Column(type="longtext", nullable=true)
	 */
	public ?string address = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string city = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string state_province = NULL;

	/**
	 * @ORM\Column(type=string, length=15, nullable=true)
	 */
	public ?string zip_postal_code = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string country_region = NULL;

	/**
	 * @ORM\Column(type="longtext", nullable=true)
	 */
	public ?string web_page = NULL;

	/**
	 * @ORM\Column(type="longtext", nullable=true)
	 */
	public ?string notes = NULL;

	/**
	 * @ORM\Column(type="longblob", nullable=true)
	 */
	public ?string attachments = NULL;


	}
