<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="order_detail_status")
 */
class OrderDetailStatus
	{
	/**
	 * @ORM\{Id}
	 * @ORM\Column(type="integer")
	 */
	public int order_detail_status_id;

	/**
	 * @ORM\Column(type=string, length=50)
	 */
	public string order_detail_status_name;


	}
