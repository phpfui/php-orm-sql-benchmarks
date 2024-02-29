<?php

namespace SOB\PHPFUI\Record\Definition;

/**
 * Autogenerated. Do not modify. Modify SQL table, then generate with \PHPFUI\ORM\Tool\Generate\CRUD class.
 *
 * @property ?string $attachments MySQL type longblob
 * @property ?string $category MySQL type varchar(50)
 * @property ?string $description MySQL type longtext
 * @property int $discontinued MySQL type integer
 * @property float $list_price MySQL type decimal(19,4)
 * @property ?int $minimum_reorder_quantity MySQL type integer
 * @property ?string $product_code MySQL type varchar(25)
 * @property int $product_id MySQL type integer
 * @property ?string $product_name MySQL type varchar(50)
 * @property ?string $quantity_per_unit MySQL type varchar(50)
 * @property ?int $reorder_level MySQL type integer
 * @property ?float $standard_cost MySQL type decimal(19,4)
 * @property ?int $target_level MySQL type integer
 */
abstract class Product extends \PHPFUI\ORM\Record
	{
	protected static bool $autoIncrement = true;

	/** @var array<string, array<mixed>> */
	protected static array $fields = [
		// MYSQL_TYPE, PHP_TYPE, LENGTH, ALLOWS_NULL, DEFAULT
		'attachments' => ['longblob', 'string', 0, true, null, ],
		'category' => ['varchar(50)', 'string', 50, true, null, ],
		'description' => ['longtext', 'string', 4294967295, true, null, ],
		'discontinued' => ['integer', 'int', 0, false, 0, ],
		'list_price' => ['decimal(19,4)', 'float', 19, false, 0, ],
		'minimum_reorder_quantity' => ['integer', 'int', 0, true, null, ],
		'product_code' => ['varchar(25)', 'string', 25, true, null, ],
		'product_id' => ['integer', 'int', 0, false, ],
		'product_name' => ['varchar(50)', 'string', 50, true, null, ],
		'quantity_per_unit' => ['varchar(50)', 'string', 50, true, null, ],
		'reorder_level' => ['integer', 'int', 0, true, null, ],
		'standard_cost' => ['decimal(19,4)', 'float', 19, true, 0, ],
		'target_level' => ['integer', 'int', 0, true, null, ],
	];

	/** @var array<string> */
	protected static array $primaryKeys = ['product_id', ];

	protected static string $table = 'product';
	}
