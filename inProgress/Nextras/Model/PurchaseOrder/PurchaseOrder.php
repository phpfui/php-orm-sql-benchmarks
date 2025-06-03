<?php

namespace SOB\Nextras\Model\PurchaseOrder;

use SOB\Nextras\Model\AbstractEntity;
use SOB\Nextras\Model\Employee\Employee;
use SOB\Nextras\Model\PurchaseOrderStatus\PurchaseOrderStatus;
use SOB\Nextras\Model\Supplier\Supplier;

/**
 * @property string $purchaseOrderId {default } {enum self::_*}
 * @property Supplier $supplierId {default NULL} {enum self::_*} {??? Supplier::$???}
 * @property Employee $createdBy {default NULL} {enum self::_*} {??? Employee::$???}
 * @property string|NULL $submittedDate {default NULL} {enum self::_*}
 * @property string $creationDate {default CURRENT_TIMESTAMP} {enum self::_*}
 * @property PurchaseOrderStatus $purchaseOrderStatusId {default '0'} {enum self::_*} {??? PurchaseOrderStatus::$???}
 * @property string|NULL $expectedDate {default NULL} {enum self::_*}
 * @property string $shippingFee {default '0.0000'} {enum self::_*}
 * @property string $taxes {default '0.0000'} {enum self::_*}
 * @property string|NULL $paymentDate {default NULL} {enum self::_*}
 * @property string|NULL $paymentAmount {default '0.0000'} {enum self::_*}
 * @property string|NULL $paymentMethod {default NULL} {enum self::_*}
 * @property string|NULL $notes {default NULL} {enum self::_*}
 * @property string|NULL $approvedBy {default NULL} {enum self::_*}
 * @property string|NULL $approvedDate {default NULL} {enum self::_*}
 * @property string|NULL $submittedBy {default NULL} {enum self::_*}
 */
class PurchaseOrder extends AbstractEntity
{
}
