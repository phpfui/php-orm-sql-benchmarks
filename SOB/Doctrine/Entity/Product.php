<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
 */
class Product
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $productId;

    /** @ORM\Column(type="string", length=25, nullable=true) */
    private $productCode;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $productName;

    /** @ORM\Column(type="text", nullable=true) */
    private $description;

    /** @ORM\Column(type="decimal", precision=19, scale=4, nullable=true) */
    private $standardCost;

    /** @ORM\Column(type="decimal", precision=19, scale=4) */
    private $listPrice;

    /** @ORM\Column(type="integer", nullable=true) */
    private $reorderLevel;

    /** @ORM\Column(type="integer", nullable=true) */
    private $targetLevel;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $quantityPerUnit;

    /** @ORM\Column(type="integer") */
    private $discontinued;

    /** @ORM\Column(type="integer", nullable=true) */
    private $minimumReorderQuantity;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $category;

    /** @ORM\Column(type="blob", nullable=true) */
    private $attachments;

    // Getters and setters...
}
