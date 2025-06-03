<?php

namespace SOB\Nextras\Model\Order;

use SOB\Nextras\Model\AbstractEntity;
use SOB\Nextras\Model\Customer\Customer;
use SOB\Nextras\Model\Employee\Employee;
use SOB\Nextras\Model\OrderStatus\OrderStatus;
use SOB\Nextras\Model\OrderTaxStatus\OrderTaxStatus;
use SOB\Nextras\Model\Shipper\Shipper;

/**
 * @property string $orderId {default } {enum self::_*}
 * @property Employee $employeeId {default NULL} {enum self::_*} {??? Employee::$???}
 * @property Customer $customerId {default NULL} {enum self::_*} {??? Customer::$???}
 * @property string $orderDate {default CURRENT_TIMESTAMP} {enum self::_*}
 * @property string|NULL $shippedDate {default NULL} {enum self::_*}
 * @property Shipper $shipperId {default NULL} {enum self::_*} {??? Shipper::$???}
 * @property string|NULL $shipName {default NULL} {enum self::_*}
 * @property string|NULL $shipAddress {default NULL} {enum self::_*}
 * @property string|NULL $shipCity {default NULL} {enum self::_*}
 * @property string|NULL $shipStateProvince {default NULL} {enum self::_*}
 * @property string|NULL $shipZipPostalCode {default NULL} {enum self::_*}
 * @property string|NULL $shipCountryRegion {default NULL} {enum self::_*}
 * @property string|NULL $shippingFee {default '0.0000'} {enum self::_*}
 * @property string|NULL $taxes {default '0.0000'} {enum self::_*}
 * @property string|NULL $paymentType {default NULL} {enum self::_*}
 * @property string|NULL $paidDate {default NULL} {enum self::_*}
 * @property string|NULL $notes {default NULL} {enum self::_*}
 * @property string|NULL $taxRate {default '0'} {enum self::_*}
 * @property OrderTaxStatus $orderTaxStatusId {default NULL} {enum self::_*} {??? OrderTaxStatus::$???}
 * @property OrderStatus $orderStatusId {default '0'} {enum self::_*} {??? OrderStatus::$???}
 */
class Order extends AbstractEntity
{
}
