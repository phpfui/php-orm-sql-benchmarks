<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_detail")
 */
class OrderDetail
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $orderDetailId;

    /**
     * @ORM\Column(type="integer")
     */
    private $orderId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $productId;

    /**
     * @ORM\Column(type="decimal", precision=18, scale=4, options={"default": "0.0000"})
     */
    private $quantity;

    /**
     * @ORM\Column(type="decimal", precision=19, scale=4, nullable=true, options={"default": "0.0000"})
     */
    private $unitPrice;

    /**
     * @ORM\Column(type="float", options={"default": "0"})
     */
    private $discount;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $orderDetailStatusId;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateAllocated;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $purchaseOrderId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $inventoryTransactionId;

    // Getters and setters

    public function getOrderDetailId(): ?int
    {
        return $this->orderDetailId;
    }

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(int $orderId): self
    {
        $this->orderId = $orderId;

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

    public function getUnitPrice(): ?string
    {
        return $this->unitPrice;
    }

    public function setUnitPrice(?string $unitPrice): self
    {
        $this->unitPrice = $unitPrice;

        return $this;
    }

    public function getDiscount(): ?float
    {
        return $this->discount;
    }

    public function setDiscount(float $discount): self
    {
        $this->discount = $discount;

        return $this;
    }

    public function getOrderDetailStatusId(): ?int
    {
        return $this->orderDetailStatusId;
    }

    public function setOrderDetailStatusId(?int $orderDetailStatusId): self
    {
        $this->orderDetailStatusId = $orderDetailStatusId;

        return $this;
    }

    public function getDateAllocated(): ?\DateTimeInterface
    {
        return $this->dateAllocated;
    }

    public function setDateAllocated(?\DateTimeInterface $dateAllocated): self
    {
        $this->dateAllocated = $dateAllocated;

        return $this;
    }

    public function getPurchaseOrderId(): ?int
    {
        return $this->purchaseOrderId;
    }

    public function setPurchaseOrderId(?int $purchaseOrderId): self
    {
        $this->purchaseOrderId = $purchaseOrderId;

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
