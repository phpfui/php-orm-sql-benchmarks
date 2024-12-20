<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="privilege")
 */
class Privilege
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $privilegeId;

    /** @ORM\Column(type="string", length=50, nullable=true) */
    private $privilege;

    // Getters and setters...
}
