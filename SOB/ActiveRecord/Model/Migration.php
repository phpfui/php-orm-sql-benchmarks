<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $migrationId MySQL type int
 * @property ?string $ran MySQL type timestamp
 */
class Migration extends \ActiveRecord\Model
{
	public static string $primary_key = 'migrationId';

	public static string $table_name = 'migration';
}
