<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="sales_report")
 */
class SalesReport
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string", length=50)
     */
    private $groupBy;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $display;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $filterRowSource;

    /**
     * @ORM\Column(type="integer")
     */
    private $default;

    // Getters and setters

    public function getGroupBy(): ?string
    {
        return $this->groupBy;
    }

    public function setGroupBy(string $groupBy): self
    {
        $this->groupBy = $groupBy;

        return $this;
    }

    public function getDisplay(): ?string
    {
        return $this->display;
    }

    public function setDisplay(?string $display): self
    {
        $this->display = $display;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getFilterRowSource(): ?string
    {
        return $this->filterRowSource;
    }

    public function setFilterRowSource(?string $filterRowSource): self
    {
        $this->filterRowSource = $filterRowSource;

        return $this;
    }

    public function getDefault(): ?int
    {
        return $this->default;
    }

    public function setDefault(int $default): self
    {
        $this->default = $default;

        return $this;
    }
}
