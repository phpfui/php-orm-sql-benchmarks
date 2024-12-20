<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="inventory_transaction")
 */
class InventoryTransaction
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $inventoryTransactionId;

    /** @ORM\ManyToOne(targetEntity="InventoryTransactionType") */
    private $inventoryTransactionType;

    /** @ORM\Column(type="datetime") */
    private $transactionCreatedDate;

    /** @ORM\Column(type="datetime") */
    private $transactionModifiedDate;

    /** @ORM\ManyTo
