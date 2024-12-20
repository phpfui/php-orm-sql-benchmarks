<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order_detail_status")
 */
class OrderDetailStatus
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $orderDetailStatusId;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $orderDetailStatusName;

    // Getters and setters

    public function getOrderDetailStatusId(): ?int
    {
        return $this->orderDetailStatusId;
    }

    public function setOrderDetailStatusId(int $orderDetailStatusId): self
    {
        $this->orderDetailStatusId = $orderDetailStatusId;

        return $this;
    }

    public function getOrderDetailStatusName(): ?string
    {
        return $this->orderDetailStatusName;
    }

    public function setOrderDetailStatusName(string $orderDetailStatusName): self
    {
        $this->orderDetailStatusName = $orderDetailStatusName;

        return $this;
    }
}
