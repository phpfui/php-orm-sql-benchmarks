<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="invoice")
 */
class Invoice
	{
	/**
	 * @ORM\{Id}
	 * @ORM\{GeneratedValue(strategy="AUTO")}
	 * @ORM\Column(type="integer")
	 */
	public int invoice_id;

	/**
	 * @ORM\Column(type="integer", nullable=true)
	 */
	public ?int order_id = NULL;

	/**
	 * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
	 */
	public string invoice_date;

	/**
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	public ?string due_date = NULL;

	/**
	 * @ORM\Column(type=decimal, precision=19, scale=4, options={"default": "0.0000"}, nullable=true)
	 */
	public ?float tax = '0.0000';

	/**
	 * @ORM\Column(type=decimal, precision=19, scale=4, options={"default": "0.0000"}, nullable=true)
	 */
	public ?float shipping = '0.0000';

	/**
	 * @ORM\Column(type=decimal, precision=19, scale=4, options={"default": "0.0000"}, nullable=true)
	 */
	public ?float amount_due = '0.0000';


	}
