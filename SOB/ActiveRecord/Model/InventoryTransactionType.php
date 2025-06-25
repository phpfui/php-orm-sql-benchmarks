<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $inventory_transaction_type_id MySQL type integer
 * @property string $inventory_transaction_type_name MySQL type varchar(50)
 */
class InventoryTransactionType extends \ActiveRecord\Model
{
	public static string $primary_key = 'inventory_transaction_type_id';

	public static string $table_name = 'inventory_transaction_type';
}
