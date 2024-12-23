<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="inventory_transaction")
 */
class InventoryTransaction
	{
	/**
	 * @ORM\{Id}
	 * @ORM\{GeneratedValue(strategy="AUTO")}
	 * @ORM\Column(type="integer")
	 */
	public int inventory_transaction_id;

	/**
	 * @ORM\Column(type="integer")
	 */
	public int inventory_transaction_type_id;

	/**
	 * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
	 */
	public string transaction_created_date;

	/**
	 * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
	 */
	public string transaction_modified_date;

	/**
	 * @ORM\Column(type="integer")
	 */
	public int product_id;

	/**
	 * @ORM\Column(type="integer")
	 */
	public int quantity;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int purchase_order_id = NULL;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int order_id = NULL;

	/**
	 * @ORM\Column(type=string, length=255, nullable=true)
	 */
	public ?string comments = NULL;


	}
