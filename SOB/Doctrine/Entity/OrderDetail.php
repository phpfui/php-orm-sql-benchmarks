<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="order_detail")
 */
class OrderDetail
	{
	/**
	 * @ORM\{Id}
	 * @ORM\{GeneratedValue(strategy="AUTO")}
	 * @ORM\Column(type="integer")
	 */
	public int order_detail_id;

	/**
	 * @ORM\Column(type="integer")
	 */
	public int order_id;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int product_id = NULL;

	/**
	 * @ORM\Column(type=decimal, precision=18, scale=4, options={"default": "0.0000"})
	 */
	public float quantity = '0.0000';

	/**
	 * @ORM\Column(type=decimal, precision=19, scale=4, options={"default": "0.0000"}, nullable=true)
	 */
	public ?float unit_price = '0.0000';

	/**
	 * @ORM\Column(type="double", options={"default": "0"})
	 */
	public float discount = '0';

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int order_detail_status_id = NULL;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	public ?string date_allocated = NULL;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int purchase_order_id = NULL;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int inventory_transaction_id = NULL;


	}
