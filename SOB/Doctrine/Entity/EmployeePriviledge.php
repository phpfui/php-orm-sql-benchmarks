<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="employee_privilege")
 */
class EmployeePrivilege
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $employeeId;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $privilegeId;

    /**
     * @ORM\ManyToOne(targetEntity="Employee")
     * @ORM\JoinColumn(name="employee_id", referencedColumnName="employee_id")
     */
    private $employee;

    /**
     * @ORM\ManyToOne(targetEntity="Privilege")
     * @ORM\JoinColumn(name="privilege_id", referencedColumnName="privilege_id")
     */
    private $privilege;

    // Getters and setters...
}
