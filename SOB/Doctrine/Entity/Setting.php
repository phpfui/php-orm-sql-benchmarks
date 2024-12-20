<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="setting")
 */
class Setting
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $settingId;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $settingData;

    // Getters and setters

    public function getSettingId(): ?int
    {
        return $this->settingId;
    }

    public function getSettingData(): ?string
    {
        return $this->settingData;
    }

    public function setSettingData(?string $settingData): self
    {
        $this->settingData = $settingData;

        return $this;
    }
}
