<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="purchase_order")
 */
class PurchaseOrder
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $purchaseOrderId;

    /** @ORM\ManyToOne(targetEntity="Supplier") */
    private $supplier;

    /** @ORM\ManyToOne(targetEntity="Employee") */
    private $createdBy;

    /** @ORM\Column(type="datetime", nullable=true) */
    private $submittedDate;

    /** @ORM\Column(type="datetime") */
    private $creationDate;

    /** @ORM\ManyToOne(targetEntity="PurchaseOrderStatus") */
    private $purchaseOrderStatus;

    /** @ORM\Column(type="datetime", nullable=true) */
    private $expectedDate;

    /** @ORM\Column(type="decimal", precision=19, scale=4) */
    private $shippingFee;

    /** @ORM\Column(type="decimal", precision=19, scale=4) */
    private $taxes;

    /** @ORM\Column(type="datetime", nullable=true) */
    private $paymentDate;

    /** @ORM\Column(type="decimal", precision=19, scale=4, nullable=true) */
    private $paymentAmount;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $paymentMethod;

    /** @ORM\Column(type="text", nullable=true) */
    private $notes;

    /** @ORM\ManyToOne(targetEntity="Employee") */
    private $approvedBy;

    /** @ORM\Column(type="datetime", nullable=true) */
    private $approvedDate;

    /** @ORM\ManyToOne(targetEntity="Employee") */
    private $submittedBy;

    // Getters and setters...
}
