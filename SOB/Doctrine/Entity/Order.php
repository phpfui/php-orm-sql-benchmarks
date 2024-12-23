<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="order")
 */
class Order
	{
	/**
	 * @ORM\{Id}
	 * @ORM\{GeneratedValue(strategy="AUTO")}
	 * @ORM\Column(type="integer")
	 */
	public int order_id;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int employee_id = NULL;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int customer_id = NULL;

	/**
	 * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
	 */
	public string order_date;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	public ?string shipped_date = NULL;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int shipper_id = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string ship_name = NULL;

	/**
	 * @ORM\Column(type="longtext", nullable=true)
	 */
	public ?string ship_address = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string ship_city = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string ship_state_province = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string ship_zip_postal_code = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string ship_country_region = NULL;

	/**
	 * @ORM\Column(type=decimal, precision=19, scale=4, options={"default": "0.0000"}, nullable=true)
	 */
	public ?float shipping_fee = '0.0000';

	/**
	 * @ORM\Column(type=decimal, precision=19, scale=4, options={"default": "0.0000"}, nullable=true)
	 */
	public ?float taxes = '0.0000';

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string payment_type = NULL;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	public ?string paid_date = NULL;

	/**
	 * @ORM\Column(type="longtext", nullable=true)
	 */
	public ?string notes = NULL;

	/**
	 * @ORM\Column(type="double", options={"default": "0"}, nullable=true)
	 */
	public ?float tax_rate = '0';

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int order_tax_status_id = NULL;

	/**
	 * @ORM\Column(type="integer", options={"default": "0"}, nullable=true)
	 */
	public ?int order_status_id = '0';


	}
