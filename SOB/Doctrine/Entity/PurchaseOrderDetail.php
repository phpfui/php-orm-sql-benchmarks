<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="purchase_order_detail")
 */
class PurchaseOrderDetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $purchaseOrderDetailId;

    /**
     * @ORM\Column(type="integer")
     */
    private $purchaseOrderId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $productId;

    /**
     * @ORM\Column(type="decimal", precision=18, scale=4)
     */
    private $quantity;

    /**
     * @ORM\Column(type="decimal", precision=19, scale=4)
     */
    private $unitCost;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateReceived;

    /**
     * @ORM\Column(type="integer")
     */
    private $postedToInventory;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $inventoryTransactionId;

    // Getters and setters

    public function getPurchaseOrderDetailId(): ?int
    {
        return $this->purchaseOrderDetailId;
    }

    public function getPurchaseOrderId(): ?int
    {
        return $this->purchaseOrderId;
    }

    public function setPurchaseOrderId(int $purchaseOrderId): self
    {
        $this->purchaseOrderId = $purchaseOrderId;

        return $this;
    }

    public function getProductId(): ?int
    {
        return $this->productId;
    }

    public function setProductId(?int $productId): self
    {
        $this->productId = $productId;

        return $this;
    }

    public function getQuantity(): ?string
    {
        return $this->quantity;
    }

    public function setQuantity(string $quantity): self
    {
        $this->quantity = $quantity;

        return $this;
    }

    public function getUnitCost(): ?string
    {
        return $this->unitCost;
    }

    public function setUnitCost(string $unitCost): self
    {
        $this->unitCost = $unitCost;

        return $this;
    }

    public function getDateReceived(): ?\DateTimeInterface
    {
        return $this->dateReceived;
    }

    public function setDateReceived(?\DateTimeInterface $dateReceived): self
    {
        $this->dateReceived = $dateReceived;

        return $this;
    }

    public function getPostedToInventory(): ?int
    {
        return $this->postedToInventory;
    }

    public function setPostedToInventory(int $postedToInventory): self
    {
        $this->postedToInventory = $postedToInventory;

        return $this;
    }

    public function getInventoryTransactionId(): ?int
    {
        return $this->inventoryTransactionId;
    }

    public function setInventoryTransactionId(?int $inventoryTransactionId): self
    {
        $this->inventoryTransactionId = $inventoryTransactionId;

        return $this;
    }
}
