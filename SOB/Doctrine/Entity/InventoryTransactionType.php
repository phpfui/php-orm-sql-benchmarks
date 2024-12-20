<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="inventory_transaction_type")
 */
class InventoryTransactionType
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $inventoryTransactionTypeId;

    /** @ORM\Column(type="string", length=50) */
    private $inventoryTransactionTypeName;

    // Getters and setters...
}
