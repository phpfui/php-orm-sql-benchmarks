<?php

namespace SOB\PHPFUIBatch;

class Tests extends \SOB\PHPFUI\Tests
	{
	/** @var array<int> $deletes */
	private array $deletes = [];

	/** @var array<\SOB\PHPFUI\Record\Employee> $inserts */
	private array $inserts = [];

	/**
	 * class must delete one record with id=$id
	 */
	public function delete(int $id) : bool
		{
		$this->deletes[] = $id;

		return true;
		}

	/**
	 * override to flush buffers between tests if needed
	 */
	public function flush() : void
		{
		if ($this->deletes)
			{
			$table = new \SOB\PHPFUI\Table\Employee();
			$table->setWhere(new \PHPFUI\ORM\Condition('employee_id', $this->deletes, new \PHPFUI\ORM\Operator\In()));
			$table->delete();
//			echo $table->getLastSQL();
//			echo "\n";
			$this->deletes = [];
			}

		if ($this->inserts)
			{
			$table = new \SOB\PHPFUI\Table\Employee();
			$table->insert($this->inserts);
			$this->inserts = [];
			}
		}

	/**
	 * class must insert one record with id=$id
	 *
	 * @return int $id inserted
	 */
	public function insert(int $id) : int
		{
		$employee = new \SOB\PHPFUI\Record\Employee();
		$employee->company = "Company {$id}";
		$employee->last_name = "Last {$id}";
		$employee->first_name = "First {$id}";
		$this->inserts[] = $employee;

		return \count($this->inserts) + 1;
		}
	}
