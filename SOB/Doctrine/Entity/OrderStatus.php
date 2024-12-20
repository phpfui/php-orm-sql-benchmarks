<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_status")
 */
class OrderStatus
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $orderStatusId;

    /** @ORM\Column(type="string", length=50) */
    private $orderStatusName;

    // Getters and setters...
}
