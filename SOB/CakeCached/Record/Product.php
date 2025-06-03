<?php

namespace SOB\CakeCached\Record;

/**
 * @property int $product_id MySQL type integer
 * @property ?string $product_code MySQL type varchar(25)
 * @property ?string $product_name MySQL type varchar(50)
 * @property ?string $description MySQL type longtext
 * @property ?float $standard_cost MySQL type decimal(19,4)
 * @property float $list_price MySQL type decimal(19,4)
 * @property ?int $reorder_level MySQL type integer
 * @property ?int $target_level MySQL type integer
 * @property ?string $quantity_per_unit MySQL type varchar(50)
 * @property int $discontinued MySQL type integer
 * @property ?int $minimum_reorder_quantity MySQL type integer
 * @property ?string $category MySQL type varchar(50)
 * @property ?string $attachments MySQL type longblob
 *
 */
class Product extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'product_id' => true,
		'product_code' => true,
		'product_name' => true,
		'description' => true,
		'standard_cost' => true,
		'list_price' => true,
		'reorder_level' => true,
		'target_level' => true,
		'quantity_per_unit' => true,
		'discontinued' => true,
		'minimum_reorder_quantity' => true,
		'category' => true,
		'attachments' => true,
	];
	}
