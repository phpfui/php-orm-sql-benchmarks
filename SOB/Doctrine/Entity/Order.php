<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="order")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $orderId;

    /** @ORM\ManyToOne(targetEntity="Employee") */
    private $employee;

    /** @ORM\ManyToOne(targetEntity="Customer") */
    private $customer;

    /** @ORM\Column(type="datetime") */
    private $orderDate;

    /** @ORM\Column(type="datetime", nullable=true) */
    private $shippedDate;

    /** @ORM\ManyToOne(targetEntity="Shipper") */
    private $shipper;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $shipName;

    /** @ORM\Column(type="text", nullable=true) */
    private $shipAddress;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $shipCity;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $shipStateProvince;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $shipZipPostalCode;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $shipCountryRegion;

    /** @ORM\Column(type="decimal", precision=19, scale=4, nullable=true) */
    private $shippingFee;

    /** @ORM\Column(type="decimal", precision=19, scale=4, nullable=true) */
    private $taxes;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $paymentType;

    /** @ORM\Column(type="datetime", nullable=true) */
    private $paidDate;

    /** @ORM\Column(type="text", nullable=true) */
    private $notes;

    /** @ORM\Column(type="float", nullable=true) */
    private $taxRate;

    /** @ORM\ManyToOne(targetEntity="OrderTaxStatus") */
    private $orderTaxStatus;

    /** @ORM\ManyToOne(targetEntity="OrderStatus") */
    private $orderStatus;

    // Getters and setters...
}
