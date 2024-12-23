<?php

namespace SOB\PHPFUI\Record\Definition;

/**
 * Autogenerated. Do not modify. Modify SQL table, then generate with \PHPFUI\ORM\Tool\Generate\CRUD class.
 *
 * @property int $image_id MySQL type integer
 * @property \SOB\PHPFUI\Record\Image $image related record
 * @property ?int $imageable_id MySQL type integer
 * @property ?string $imageable_type MySQL type varchar(128)
 * @property string $path MySQL type varchar(128)
 */
abstract class Image extends \PHPFUI\ORM\Record
	{
	protected static bool $autoIncrement = true;

	/** @var array<string, array<mixed>> */
	protected static array $fields = [
		// MYSQL_TYPE, PHP_TYPE, LENGTH, ALLOWS_NULL, DEFAULT
		'image_id' => ['integer', 'int', 0, false, ],
		'imageable_id' => ['integer', 'int', 0, true, ],
		'imageable_type' => ['varchar(128)', 'string', 128, true, ],
		'path' => ['varchar(128)', 'string', 128, false, ],
	];

	/** @var array<string> */
	protected static array $primaryKeys = ['image_id', ];

	protected static string $table = 'image';
	}
