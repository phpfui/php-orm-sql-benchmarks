<?php

namespace SOB\Doctrine\Entity;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: 'order_detail')]
class OrderDetail
	{
	#[\Doctrine\ORM\Mapping\Column(type: 'datetime', nullable: true)]
	public ?string $date_allocated = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'double', options: ['default' => '0'])]
	public float $discount = 0;

	#[\Doctrine\ORM\Mapping\Column(type: 'integer', nullable: true)]
	public ?int $inventory_transaction_id = null;

	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: 'AUTO')]
	#[\Doctrine\ORM\Mapping\Column(type: 'integer')]
	public int $order_detail_id;

	#[\Doctrine\ORM\Mapping\Column(type: 'integer', nullable: true)]
	public ?int $order_detail_status_id = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'integer')]
	public int $order_id;

	#[\Doctrine\ORM\Mapping\Column(type: 'integer', nullable: true)]
	public ?int $product_id = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'integer', nullable: true)]
	public ?int $purchase_order_id = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'decimal', precision: 18, scale: 4, options: ['default' => '0.0000'])]
	public float $quantity = 0.0000;

	#[\Doctrine\ORM\Mapping\Column(type: 'decimal', precision: 19, scale: 4, options: ['default' => '0.0000'], nullable: true)]
	public ?float $unit_price = 0.0000;
	}
