<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dateRecord")
 */
class DateRecord
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $dateRecordId;

    /**
     * @ORM\Column(type="date")
     */
    private $dateRequired;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDefaultNull;

    /**
     * @ORM\Column(type="date", nullable=true, options={"default": "2000-01-02"})
     */
    private $dateDefaultNullable;

    /**
     * @ORM\Column(type="date", options={"default": "2000-01-02"})
     */
    private $dateDefaultNotNull;

    /**
     * @ORM\Column(type="datetime", nullable=true, options={"default": "CURRENT_TIMESTAMP"})
     */
    private $timestampDefaultCurrentNullable;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $timestampDefaultCurrentNotNull;

    // Getters and setters

    public function getDateRecordId(): ?int
    {
        return $dateRecordId;
    }

    public function getDateRequired(): ?\DateTimeInterface
    {
        return $this->dateRequired;
    }

    public function setDateRequired(\DateTimeInterface $dateRequired): self
    {
        $this->dateRequired = $dateRequired;

        return $this;
    }

    public function getDateDefaultNull(): ?\DateTimeInterface
    {
        return $this->dateDefaultNull;
    }

    public function setDateDefaultNull(?\DateTimeInterface $dateDefaultNull): self
    {
        $this->dateDefaultNull = $dateDefaultNull;

        return $this;
    }

    public function getDateDefaultNullable(): ?\DateTimeInterface
    {
        return $this->dateDefaultNullable;
    }

    public function setDateDefaultNullable(?\DateTimeInterface $dateDefaultNullable): self
    {
        $this->dateDefaultNullable = $dateDefaultNullable;

        return $this;
    }

    public function getDateDefaultNotNull(): ?\DateTimeInterface
    {
        return $this->dateDefaultNotNull;
    }

    public function setDateDefaultNotNull(\DateTimeInterface $dateDefaultNotNull): self
    {
        $this->dateDefaultNotNull = $dateDefaultNotNull;

        return $this;
    }

    public function getTimestampDefaultCurrentNullable(): ?\DateTimeInterface
    {
        return $this->timestampDefaultCurrentNullable;
    }

    public function setTimestampDefaultCurrentNullable(?\DateTimeInterface $timestampDefaultCurrentNullable): self
    {
        $this->timestampDefaultCurrentNullable = $timestampDefaultCurrentNullable;

        return $this;
    }

    public function getTimestampDefaultCurrentNotNull(): ?\DateTimeInterface
    {
        return $this->timestampDefaultCurrentNotNull;
    }

    public function setTimestampDefaultCurrentNotNull(\DateTimeInterface $timestampDefaultCurrentNotNull): self
    {
        $this->timestampDefaultCurrentNotNull = $timestampDefaultCurrentNotNull;

        return $this;
    }
}
