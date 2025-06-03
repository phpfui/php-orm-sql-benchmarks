<?php

namespace SOB\Doctrine\Entity;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: 'order_status')]
class OrderStatus
	{
	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\Column(type: 'integer')]
	public int $order_status_id;

	#[\Doctrine\ORM\Mapping\Column(type: 'string', length: 50)]
	public string $order_status_name;
	}
