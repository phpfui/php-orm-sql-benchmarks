<?php

namespace SOB\Doctrine\Entity;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: 'invoice')]
class Invoice
	{
	#[\Doctrine\ORM\Mapping\Column(type: 'decimal', precision: 19, scale: 4, options: ['default' => '0.0000'], nullable: true)]
	public ?float $amount_due = 0.0000;

	#[\Doctrine\ORM\Mapping\Column(type: 'datetime', nullable: true)]
	public ?string $due_date = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
	public string $invoice_date;

	#[\Doctrine\ORM\Mapping\Id]
	#[\Doctrine\ORM\Mapping\GeneratedValue(strategy: 'AUTO')]
	#[\Doctrine\ORM\Mapping\Column(type: 'integer')]
	public int $invoice_id;

	#[\Doctrine\ORM\Mapping\Column(type: 'integer', nullable: true)]
	public ?int $order_id = null;

	#[\Doctrine\ORM\Mapping\Column(type: 'decimal', precision: 19, scale: 4, options: ['default' => '0.0000'], nullable: true)]
	public ?float $shipping = 0.0000;

	#[\Doctrine\ORM\Mapping\Column(type: 'decimal', precision: 19, scale: 4, options: ['default' => '0.0000'], nullable: true)]
	public ?float $tax = 0.0000;
	}
