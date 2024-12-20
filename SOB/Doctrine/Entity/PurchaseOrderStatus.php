<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="purchase_order_status")
 */
class PurchaseOrderStatus
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $purchaseOrderStatusId;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $purchaseOrderStatusName;

    // Getters and setters

    public function getPurchaseOrderStatusId(): ?int
    {
        return $this->purchaseOrderStatusId;
    }

    public function setPurchaseOrderStatusId(int $purchaseOrderStatusId): self
    {
        $this->purchaseOrderStatusId = $purchaseOrderStatusId;

        return $this;
    }

    public function getPurchaseOrderStatusName(): ?string
    {
        return $this->purchaseOrderStatusName;
    }

    public function setPurchaseOrderStatusName(?string $purchaseOrderStatusName): self
    {
        $this->purchaseOrderStatusName = $purchaseOrderStatusName;

        return $this;
    }
}
