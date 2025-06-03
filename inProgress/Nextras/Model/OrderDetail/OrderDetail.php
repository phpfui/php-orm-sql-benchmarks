<?php

namespace SOB\Nextras\Model\OrderDetail;

use SOB\Nextras\Model\AbstractEntity;
use SOB\Nextras\Model\Order\Order;
use SOB\Nextras\Model\OrderDetailStatus\OrderDetailStatus;
use SOB\Nextras\Model\Product\Product;

/**
 * @property string $orderDetailId {default } {enum self::_*}
 * @property Order $orderId {default } {enum self::_*} {??? Order::$???}
 * @property Product $productId {default NULL} {enum self::_*} {??? Product::$???}
 * @property string $quantity {default '0.0000'} {enum self::_*}
 * @property string|NULL $unitPrice {default '0.0000'} {enum self::_*}
 * @property string $discount {default '0'} {enum self::_*}
 * @property OrderDetailStatus $orderDetailStatusId {default NULL} {enum self::_*} {??? OrderDetailStatus::$???}
 * @property string|NULL $dateAllocated {default NULL} {enum self::_*}
 * @property string|NULL $purchaseOrderId {default NULL} {enum self::_*}
 * @property string|NULL $inventoryTransactionId {default NULL} {enum self::_*}
 */
class OrderDetail extends AbstractEntity
{
}
