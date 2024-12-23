<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
	{
	/**
	 * @ORM\{Id}
	 * @ORM\{GeneratedValue(strategy="AUTO")}
	 * @ORM\Column(type="integer")
	 */
	public int product_id;

	/**
	 * @ORM\Column(type=string, length=25, nullable=true)
	 */
	public ?string product_code = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string product_name = NULL;

	/**
	 * @ORM\Column(type="longtext", nullable=true)
	 */
	public ?string description = NULL;

	/**
	 * @ORM\Column(type=decimal, precision=19, scale=4, options={"default": "0.0000"}, nullable=true)
	 */
	public ?float standard_cost = '0.0000';

	/**
	 * @ORM\Column(type=decimal, precision=19, scale=4, options={"default": "0.0000"})
	 */
	public float list_price = '0.0000';

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int reorder_level = NULL;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int target_level = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string quantity_per_unit = NULL;

	/**
	 * @ORM\Column(type="integer", options={"default": "0"})
	 */
	public int discontinued = '0';

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int minimum_reorder_quantity = NULL;

	/**
	 * @ORM\Column(type=string, length=50, nullable=true)
	 */
	public ?string category = NULL;

	/**
	 * @ORM\Column(type="longblob", nullable=true)
	 */
	public ?string attachments = NULL;


	}
