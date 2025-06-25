<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $setting_id MySQL type integer
 * @property ?string $setting_data MySQL type varchar(255)
 */
class Setting extends \ActiveRecord\Model
{
	public static string $primary_key = 'setting_id';

	public static string $table_name = 'setting';
}
