<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="stringRecord")
 */
class StringRecord
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $stringRecordId;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $stringRequired;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $stringDefaultNull;

    /**
     * @ORM\Column(type="string", length=100, nullable=true, options={"default": "default"})
     */
    private $stringDefaultNullable;

    /**
     * @ORM\Column(type="string", length=100, options={"default": "default"})
     */
    private $stringDefaultNotNull;

    // Getters and setters

    public function getStringRecordId(): ?int
    {
        return $this->stringRecordId;
    }

    public function getStringRequired(): ?string
    {
        return $this->stringRequired;
    }

    public function setStringRequired(string $stringRequired): self
    {
        $this->stringRequired = $stringRequired;

        return $this;
    }

    public function getStringDefaultNull(): ?string
    {
        return $this->stringDefaultNull;
    }

    public function setStringDefaultNull(?string $stringDefaultNull): self
    {
        $this->stringDefaultNull = $stringDefaultNull;

        return $this;
    }

    public function getStringDefaultNullable(): ?string
    {
        return $this->stringDefaultNullable;
    }

    public function setStringDefaultNullable(?string $stringDefaultNullable): self
    {
        $this->stringDefaultNullable = $stringDefaultNullable;

        return $this;
    }

    public function getStringDefaultNotNull(): ?string
    {
        return $this->stringDefaultNotNull;
    }

    public function setStringDefaultNotNull(string $stringDefaultNotNull): self
    {
        $this->stringDefaultNotNull = $stringDefaultNotNull;

        return $this;
    }
}
