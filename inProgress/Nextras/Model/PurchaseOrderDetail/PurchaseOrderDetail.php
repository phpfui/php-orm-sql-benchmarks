<?php

namespace SOB\Nextras\Model\PurchaseOrderDetail;

use SOB\Nextras\Model\AbstractEntity;
use SOB\Nextras\Model\InventoryTransaction\InventoryTransaction;
use SOB\Nextras\Model\Product\Product;
use SOB\Nextras\Model\PurchaseOrder\PurchaseOrder;

/**
 * @property string $purchaseOrderDetailId {default } {enum self::_*}
 * @property PurchaseOrder $purchaseOrderId {default } {enum self::_*} {??? PurchaseOrder::$???}
 * @property Product $productId {default NULL} {enum self::_*} {??? Product::$???}
 * @property string $quantity {default } {enum self::_*}
 * @property string $unitCost {default } {enum self::_*}
 * @property string|NULL $dateReceived {default NULL} {enum self::_*}
 * @property string $postedToInventory {default '0'} {enum self::_*}
 * @property InventoryTransaction $inventoryTransactionId {default NULL} {enum self::_*} {??? InventoryTransaction::$???}
 */
class PurchaseOrderDetail extends AbstractEntity
{
}
