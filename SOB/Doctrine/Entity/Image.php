<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="image")
 */
class Image
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $imageId;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $imageableId;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $imageableType;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $path;

    // Getters and setters

    public function getImageId(): ?int
    {
        return $this->imageId;
    }

    public function getImageableId(): ?int
    {
        return $this->imageableId;
    }

    public function setImageableId(?int $imageableId): self
    {
        $this->imageableId = $imageableId;

        return $this;
    }

    public function getImageableType(): ?string
    {
        return $this->imageableType;
    }

    public function setImageableType(string $imageableType): self
    {
        $this->imageableType = $imageableType;

        return $this;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }
}
