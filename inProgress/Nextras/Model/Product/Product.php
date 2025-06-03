<?php

namespace SOB\Nextras\Model\Product;

use SOB\Nextras\Model\AbstractEntity;

/**
 * @property string $productId {default } {enum self::_*}
 * @property string|NULL $productCode {default NULL} {enum self::_*}
 * @property string|NULL $productName {default NULL} {enum self::_*}
 * @property string|NULL $description {default NULL} {enum self::_*}
 * @property string|NULL $standardCost {default '0.0000'} {enum self::_*}
 * @property string $listPrice {default '0.0000'} {enum self::_*}
 * @property string|NULL $reorderLevel {default NULL} {enum self::_*}
 * @property string|NULL $targetLevel {default NULL} {enum self::_*}
 * @property string|NULL $quantityPerUnit {default NULL} {enum self::_*}
 * @property string $discontinued {default '0'} {enum self::_*}
 * @property string|NULL $minimumReorderQuantity {default NULL} {enum self::_*}
 * @property string|NULL $category {default NULL} {enum self::_*}
 * @property string|NULL $attachments {default NULL} {enum self::_*}
 */
class Product extends AbstractEntity
{
}
