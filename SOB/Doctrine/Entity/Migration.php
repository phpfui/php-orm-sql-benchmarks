<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="migration")
 */
class Migration
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $migrationId;

    /**
     * @ORM\Column(type="datetime", options={"default": "CURRENT_TIMESTAMP"})
     */
    private $ran;

    // Getters and setters

    public function getMigrationId(): ?int
    {
        return $this->migrationId;
    }

    public function setMigrationId(int $migrationId): self
    {
        $this->migrationId = $migrationId;

        return $this;
    }

    public function getRan(): ?\DateTimeInterface
    {
        return $this->ran;
    }

    public function setRan(\DateTimeInterface $ran): self
    {
        $this->ran = $ran;

        return $this;
    }
}
