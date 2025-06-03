<?php

namespace SOB\Nextras\Model\Invoice;

use SOB\Nextras\Model\AbstractEntity;
use SOB\Nextras\Model\Order\Order;

/**
 * @property string $invoiceId {default } {enum self::_*}
 * @property Order $orderId {default NULL} {enum self::_*} {??? Order::$???}
 * @property string $invoiceDate {default CURRENT_TIMESTAMP} {enum self::_*}
 * @property string|NULL $dueDate {default NULL} {enum self::_*}
 * @property string|NULL $tax {default '0.0000'} {enum self::_*}
 * @property string|NULL $shipping {default '0.0000'} {enum self::_*}
 * @property string|NULL $amountDue {default '0.0000'} {enum self::_*}
 */
class Invoice extends AbstractEntity
{
}
