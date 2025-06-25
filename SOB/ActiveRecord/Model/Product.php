<?php

namespace SOB\ActiveRecord\Model;

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
 */
class Product extends \ActiveRecord\Model
{
	public static string $primary_key = 'product_id';

	public static string $table_name = 'product';
}
