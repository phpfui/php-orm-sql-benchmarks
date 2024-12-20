<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_tax_status")
 */
class OrderTaxStatus
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $orderTaxStatusId;

    /** @ORM\Column(type="string", length=50) */
    private $orderTaxStatusName;

    // Getters and setters...
}
