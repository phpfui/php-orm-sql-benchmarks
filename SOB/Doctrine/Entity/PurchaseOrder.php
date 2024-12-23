<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="purchase_order")
 */
class PurchaseOrder
	{
	/**
	 * @ORM\{Id}
	 * @ORM\{GeneratedValue(strategy="AUTO")}
	 * @ORM\Column(type="integer")
	 */
	public int purchase_order_id;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int supplier_id = NULL;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int created_by = NULL;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	public ?string submitted_date = NULL;

	/**
	 * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
	 */
	public string creation_date;

	/**
	 * @ORM\Column(type="integer", options={"default": "0"}, nullable=true)
	 */
	public ?int purchase_order_status_id = '0';

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	public ?string expected_date = NULL;

	/**
	 * @ORM\Column(type=decimal, precision=19, scale=4, options={"default": "0.0000"})
	 */
	public float shipping_fee = '0.0000';

	/**
	 * @ORM\Column(type=decimal, precision=19, scale=4, options={"default": "0.0000"})
	 */
	public float taxes = '0.0000';

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	public ?string payment_date = NULL;

	/**
	 * @ORM\Column(type=decimal, precision=19, scale=4, options={"default": "0.0000"}, nullable=true)
	 */
	public ?float payment_amount = '0.0000';

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string payment_method = NULL;

	/**
	 * @ORM\Column(type="longtext", nullable=true)
	 */
	public ?string notes = NULL;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int approved_by = NULL;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	public ?string approved_date = NULL;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int submitted_by = NULL;


	}
