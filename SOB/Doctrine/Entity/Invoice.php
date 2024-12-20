<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="invoice")
 */
class Invoice
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $invoiceId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $orderId;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $invoiceDate;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dueDate;

    /**
     * @ORM\Column(type="decimal", precision=19, scale=4, nullable=true, options={"default": "0.0000"})
     */
    private $tax;

    /**
     * @ORM\Column(type="decimal", precision=19, scale=4, nullable=true, options={"default": "0.0000"})
     */
    private $shipping;

    /**
     * @ORM\Column(type="decimal", precision=19, scale=4, nullable=true, options={"default": "0.0000"})
     */
    private $amountDue;

    // Getters and setters

    public function getInvoiceId(): ?int
    {
        return $this->invoiceId;
    }

    public function getOrderId(): ?int
    {
        return $this->orderId;
    }

    public function setOrderId(?int $orderId): self
    {
        $this->orderId = $orderId;

        return $this;
    }

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->invoiceDate;
    }

    public function setInvoiceDate(\DateTimeInterface $invoiceDate): self
    {
        $this->invoiceDate = $invoiceDate;

        return $this;
    }

    public function getDueDate(): ?\DateTimeInterface
    {
        return $this->dueDate;
    }

    public function setDueDate(?\DateTimeInterface $dueDate): self
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    public function getTax(): ?string
    {
        return $this->tax;
    }

    public function setTax(?string $tax): self
    {
        $this->tax = $tax;

        return $this;
    }

    public function getShipping(): ?string
    {
        return $this->shipping;
    }

    public function setShipping(?string $shipping): self
    {
        $this->shipping = $shipping;

        return $this;
    }

    public function getAmountDue(): ?string
    {
        return $this->amountDue;
    }

    public function setAmountDue(?string $amountDue): self
    {
        $this->amountDue = $amountDue;

        return $this;
    }
}
