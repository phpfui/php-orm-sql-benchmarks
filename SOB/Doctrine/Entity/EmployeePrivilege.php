<?php

namespace SOB\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * This code is automatically generated.  See SOB\Doctrine\scaffolding\generateModels.php.  Do not update by hand.
 */
#[\Doctrine\ORM\Mapping\Entity]
#[\Doctrine\ORM\Mapping\Table(name: "employee_privilege")]
class EmployeePrivilege
	{
	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $employee_id;

	#[\Doctrine\ORM\Mapping\Column(type: "integer")]
	public int $privilege_id;


	}
