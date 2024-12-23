<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="purchase_order_detail")
 */
class PurchaseOrderDetail
	{
	/**
	 * @ORM\{Id}
	 * @ORM\{GeneratedValue(strategy="AUTO")}
	 * @ORM\Column(type="integer")
	 */
	public int purchase_order_detail_id;

	/**
	 * @ORM\Column(type="integer")
	 */
	public int purchase_order_id;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int product_id = NULL;

	/**
	 * @ORM\Column(type=decimal, precision=18, scale=4)
	 */
	public float quantity;

	/**
	 * @ORM\Column(type=decimal, precision=19, scale=4)
	 */
	public float unit_cost;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	public ?string date_received = NULL;

	/**
	 * @ORM\Column(type="integer", options={"default": "0"})
	 */
	public int posted_to_inventory = '0';

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int inventory_transaction_id = NULL;


	}
