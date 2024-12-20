<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product_supplier")
 */
class ProductSupplier
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $productId;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $supplierId;

    /**
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumn(name="product_id", referencedColumnName="product_id")
     */
    private $product;

    /**
     * @ORM\ManyToOne(targetEntity="Supplier")
     * @ORM\JoinColumn(name="supplier_id", referencedColumnName="supplier_id")
     */
    private $supplier;

    // Getters and setters...
}
