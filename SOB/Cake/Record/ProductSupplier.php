<?php

namespace SOB\Cake\Record;

/**
 * @property int $product_id MySQL type integer
 * @property int $supplier_id MySQL type integer
 *
 */
class ProductSupplier extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'product_id' => true,
		'supplier_id' => true,
	];
	}
