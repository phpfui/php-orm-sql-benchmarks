<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="shipper")
 */
class Shipper
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $shipperId;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $company;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $lastName;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $firstName;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $emailAddress;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $jobTitle;

    /** @ORM\Column(type="string", length=25, nullable=true) */
    private $businessPhone;

    /** @ORM\Column(type="string", length=25, nullable=true) */
    private $homePhone;

    /** @ORM\Column(type="string", length=25, nullable=true) */
    private $mobilePhone;

    /** @ORM\Column(type="string", length=25, nullable=true) */
    private $faxNumber;

    /** @ORM\Column(type="text", nullable=true) */
    private $address;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $city;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $stateProvince;

    /** @ORM\Column(type="string", length=15, nullable=true) */
    private $zipPostalCode;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $countryRegion;

    /** @ORM\Column(type="text", nullable=true) */
    private $webPage;

    /** @ORM\Column(type="text", nullable=true) */
    private $notes;

    /** @ORM\Column(type="blob", nullable=true) */
    private $attachments;

    // Getters and setters...
}
