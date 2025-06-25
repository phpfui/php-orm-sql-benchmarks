<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $product_id MySQL type integer
 * @property int $supplier_id MySQL type integer
 */
class ProductSupplier extends \ActiveRecord\Model
{
	public static string $primary_key = '~PRIMARY_KEY~';

	public static string $table_name = 'product_supplier';
}
