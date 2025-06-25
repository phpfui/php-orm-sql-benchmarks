<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $image_id MySQL type integer
 * @property ?int $imageable_id MySQL type integer
 * @property ?string $imageable_type MySQL type varchar(128)
 * @property string $path MySQL type varchar(128)
 */
class Image extends \ActiveRecord\Model
{
	public static string $primary_key = 'image_id';

	public static string $table_name = 'image';
}
