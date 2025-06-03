<?php

namespace SOB\Nextras\Model\ProductSupplier;

use SOB\Nextras\Model\AbstractEntity;
use SOB\Nextras\Model\Product\Product;
use SOB\Nextras\Model\Supplier\Supplier;

/**
 * @property Product $productId {default } {enum self::_*} {??? Product::$???}
 * @property Supplier $supplierId {default } {enum self::_*} {??? Supplier::$???}
 */
class ProductSupplier extends AbstractEntity
{
}
