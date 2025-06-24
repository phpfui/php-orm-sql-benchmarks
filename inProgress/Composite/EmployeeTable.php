<?php declare(strict_types=1);

namespace SOB\Composite;

use Composite\DB\AbstractTable;
use Composite\DB\TableConfig;

class EmployeeTable extends AbstractTable
{
    protected function getConfig(): TableConfig
    {
        return TableConfig::fromEntitySchema(Employee::schema());
    }

    public function findOne(int $id): ?Employee
    {
        return $this->_findByPk($id);
    }
}
