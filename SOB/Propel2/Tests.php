<?php

namespace SOB\Propel2;

class Tests extends \SOB\Test
	{
	private $connection;

	private \Propel\Runtime\Connection\ConnectionManagerSingle $manager;

	public function closeConnection() : void
		{
		$this->manager->closeConnections();
		}

	/**
	 * class must delete one record with id=$id
	 */
	public function delete(int $id) : bool
		{
		$employee = EmployeeQuery::create()->findPK($id);

		if (! $employee)
			{
			return false;
			}

		$employee->delete();

		return true;
		}

	/**
	 * Initialize Responsibilities:
	 *
	 *  * Initialize the orm
	 *  * open the database
	 *  * initialize the database schema
	 */
	public function init(\SOB\Configuration $config, array $lines, \SOB\BaseLine $runTimer) : static
		{
		$serviceContainer = \Propel\Runtime\Propel::getServiceContainer();
		$serviceContainer->checkVersion(2);

		$serviceContainer->setAdapterClass('default', $config->getDriver());

		$this->manager = new \Propel\Runtime\Connection\ConnectionManagerSingle('default');

		$connection = $config->getPDOConnectionString();

		$this->manager->setConfiguration([
			'dsn' => $connection,
			'user' => $config->getUser(),
			'password' => $config->getPassword(),
			'settings' => ['charset' => 'utf8', 'queries' => [], ],
			'classname' => '\\Propel\\Runtime\\Connection\\ConnectionWrapper',
			'model_paths' => [0 => 'src', 1 => 'vendor', ],
		]);

		$serviceContainer->setConnectionManager($this->manager);

		$serviceContainer->setDefaultDatasource('default');
		$serviceContainer->initDatabaseMapFromDumps( [
			'default' => [
				'tablesByName' => [
					'customer' => '\\SOB\\Propel2\\Map\\CustomerTableMap',
					'daterecord' => '\\SOB\\Propel2\\Map\\DaterecordTableMap',
					'employee' => '\\SOB\\Propel2\\Map\\EmployeeTableMap',
					'employee_privilege' => '\\SOB\\Propel2\\Map\\EmployeePrivilegeTableMap',
					'image' => '\\SOB\\Propel2\\Map\\ImageTableMap',
					'inventory_transaction' => '\\SOB\\Propel2\\Map\\InventoryTransactionTableMap',
					'inventory_transaction_type' => '\\SOB\\Propel2\\Map\\InventoryTransactionTypeTableMap',
					'invoice' => '\\SOB\\Propel2\\Map\\InvoiceTableMap',
					'migration' => '\\SOB\\Propel2\\Map\\MigrationTableMap',
					'order' => '\\SOB\\Propel2\\Map\\OrderTableMap',
					'order_detail' => '\\SOB\\Propel2\\Map\\OrderDetailTableMap',
					'order_detail_status' => '\\SOB\\Propel2\\Map\\OrderDetailStatusTableMap',
					'order_status' => '\\SOB\\Propel2\\Map\\OrderStatusTableMap',
					'order_tax_status' => '\\SOB\\Propel2\\Map\\OrderTaxStatusTableMap',
					'privilege' => '\\SOB\\Propel2\\Map\\PrivilegeTableMap',
					'product' => '\\SOB\\Propel2\\Map\\ProductTableMap',
					'product_supplier' => '\\SOB\\Propel2\\Map\\ProductSupplierTableMap',
					'purchase_order' => '\\SOB\\Propel2\\Map\\PurchaseOrderTableMap',
					'purchase_order_detail' => '\\SOB\\Propel2\\Map\\PurchaseOrderDetailTableMap',
					'purchase_order_status' => '\\SOB\\Propel2\\Map\\PurchaseOrderStatusTableMap',
					'sales_report' => '\\SOB\\Propel2\\Map\\SalesReportTableMap',
					'setting' => '\\SOB\\Propel2\\Map\\SettingTableMap',
					'shipper' => '\\SOB\\Propel2\\Map\\ShipperTableMap',
					'stringrecord' => '\\SOB\\Propel2\\Map\\StringrecordTableMap',
					'supplier' => '\\SOB\\Propel2\\Map\\SupplierTableMap',
				],
				'tablesByPhpName' => [
					'\\Customer' => '\\SOB\\Propel2\\Map\\CustomerTableMap',
					'\\Daterecord' => '\\SOB\\Propel2\\Map\\DaterecordTableMap',
					'\\Employee' => '\\SOB\\Propel2\\Map\\EmployeeTableMap',
					'\\EmployeePrivilege' => '\\SOB\\Propel2\\Map\\EmployeePrivilegeTableMap',
					'\\Image' => '\\SOB\\Propel2\\Map\\ImageTableMap',
					'\\InventoryTransaction' => '\\SOB\\Propel2\\Map\\InventoryTransactionTableMap',
					'\\InventoryTransactionType' => '\\SOB\\Propel2\\Map\\InventoryTransactionTypeTableMap',
					'\\Invoice' => '\\SOB\\Propel2\\Map\\InvoiceTableMap',
					'\\Migration' => '\\SOB\\Propel2\\Map\\MigrationTableMap',
					'\\Order' => '\\SOB\\Propel2\\Map\\OrderTableMap',
					'\\OrderDetail' => '\\SOB\\Propel2\\Map\\OrderDetailTableMap',
					'\\OrderDetailStatus' => '\\SOB\\Propel2\\Map\\OrderDetailStatusTableMap',
					'\\OrderStatus' => '\\SOB\\Propel2\\Map\\OrderStatusTableMap',
					'\\OrderTaxStatus' => '\\SOB\\Propel2\\Map\\OrderTaxStatusTableMap',
					'\\Privilege' => '\\SOB\\Propel2\\Map\\PrivilegeTableMap',
					'\\Product' => '\\SOB\\Propel2\\Map\\ProductTableMap',
					'\\ProductSupplier' => '\\SOB\\Propel2\\Map\\ProductSupplierTableMap',
					'\\PurchaseOrder' => '\\SOB\\Propel2\\Map\\PurchaseOrderTableMap',
					'\\PurchaseOrderDetail' => '\\SOB\\Propel2\\Map\\PurchaseOrderDetailTableMap',
					'\\PurchaseOrderStatus' => '\\SOB\\Propel2\\Map\\PurchaseOrderStatusTableMap',
					'\\SalesReport' => '\\SOB\\Propel2\\Map\\SalesReportTableMap',
					'\\Setting' => '\\SOB\\Propel2\\Map\\SettingTableMap',
					'\\Shipper' => '\\SOB\\Propel2\\Map\\ShipperTableMap',
					'\\Stringrecord' => '\\SOB\\Propel2\\Map\\StringrecordTableMap',
					'\\Supplier' => '\\SOB\\Propel2\\Map\\SupplierTableMap',
				],
			],
		]);

		$this->connection = \Propel\Runtime\Propel::getServiceContainer()->getWriteConnection('default');

		$this->loadSchema($lines, [$this, 'runSQL'], $runTimer);

		return $this;
		}

	/**
	 * class must insert one record with id=$id
	 *
	 * @return int $id inserted
	 */
	public function insert(int $id) : int
		{
		$employee = new \SOB\Propel2\Employee();
		$employee->setCompany("Company {$id}");
		$employee->setLastName("Last {$id}");
		$employee->setFirstName("First {$id}");
		$employee->save();

		return $employee->getEmployeeId();
		}

	/**
	 * class must read and return one record with id=$id or null on no matching record
	 */
	public function read(int $id) : ?object
		{
		return EmployeeQuery::create()->findPK($id);
		}

	public function runSQL(string $sql) : void
		{
		if ($sql)
			{
			$stmt = $this->connection->prepare($sql);
			$res = $stmt->execute();
			}
		}

	/**
	 * class must test one record with id=$id
	 */
	public function testUpdate(object $employee, string $expected) : bool
		{
		if ($employee->getLastName() != $expected)
			{
			\print_r($employee);

			throw new \Exception("Employee update failed. Expected: {$expected}, Actual: {$employee->getLastName()}");
			}

		return true;
		}

	/**
	 * class must update one record with id=$id to have $to in the data
	 */
	public function update(int $id, int $to) : bool
		{
		$employee = EmployeeQuery::create()->findPK($id);

		$employee->setLastName("Updated {$to}");

		return $employee->save();
		}
	}
