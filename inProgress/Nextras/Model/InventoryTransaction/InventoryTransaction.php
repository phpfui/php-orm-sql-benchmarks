<?php

namespace SOB\Nextras\Model\InventoryTransaction;

use SOB\Nextras\Model\AbstractEntity;
use SOB\Nextras\Model\InventoryTransactionType\InventoryTransactionType;
use SOB\Nextras\Model\Order\Order;
use SOB\Nextras\Model\Product\Product;
use SOB\Nextras\Model\PurchaseOrder\PurchaseOrder;

/**
 * @property string $inventoryTransactionId {default } {enum self::_*}
 * @property InventoryTransactionType $inventoryTransactionTypeId {default } {enum self::_*} {??? InventoryTransactionType::$???}
 * @property string $transactionCreatedDate {default CURRENT_TIMESTAMP} {enum self::_*}
 * @property string $transactionModifiedDate {default CURRENT_TIMESTAMP} {enum self::_*}
 * @property Product $productId {default } {enum self::_*} {??? Product::$???}
 * @property string $quantity {default } {enum self::_*}
 * @property PurchaseOrder $purchaseOrderId {default NULL} {enum self::_*} {??? PurchaseOrder::$???}
 * @property Order $orderId {default NULL} {enum self::_*} {??? Order::$???}
 * @property string|NULL $comments {default NULL} {enum self::_*}
 */
class InventoryTransaction extends AbstractEntity
{
}
