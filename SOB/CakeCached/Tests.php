<?php

namespace SOB\CakeCached;

class Tests extends \SOB\Cake\Tests
	{
	private \SOB\Cake\Table\Employee $employeeTable;

	/**
	 * Initialize the orm
	 *
	 * @param array<string> $lines sql to import into schema
	 */
	public function init(\SOB\Configuration $config, array $lines, \SOB\BaseLine $runTimer) : static
		{
		parent::init($config, $lines, $runTimer);
		$this->employeeTable = new \SOB\Cake\Table\Employee();

		return $this;
		}
	}
