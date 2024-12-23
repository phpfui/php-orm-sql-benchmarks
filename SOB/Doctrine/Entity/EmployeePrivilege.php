<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @ORM\Entity
 * @ORM\Table(name="employee_privilege")
 */
class EmployeePrivilege
	{
	/**
	 * @ORM\Column(type="integer")
	 */
	public int employee_id;

	/**
	 * @ORM\Column(type="integer")
	 */
	public int privilege_id;


	}
