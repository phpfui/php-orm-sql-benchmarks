<?php

namespace SOB\Propel2\Map;

use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use Propel\Runtime\Propel;
use SOB\Propel2\Order;
use SOB\Propel2\OrderQuery;

/**
 * This class defines the structure of the 'order' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class OrderTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.Order';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.OrderTableMap';

	/**
	 * the column name for the customer_id field
	 */
	public const COL_CUSTOMER_ID = 'order.customer_id';

	/**
	 * the column name for the employee_id field
	 */
	public const COL_EMPLOYEE_ID = 'order.employee_id';

	/**
	 * the column name for the notes field
	 */
	public const COL_NOTES = 'order.notes';

	/**
	 * the column name for the order_date field
	 */
	public const COL_ORDER_DATE = 'order.order_date';

	/**
	 * the column name for the order_id field
	 */
	public const COL_ORDER_ID = 'order.order_id';

	/**
	 * the column name for the order_status_id field
	 */
	public const COL_ORDER_STATUS_ID = 'order.order_status_id';

	/**
	 * the column name for the order_tax_status_id field
	 */
	public const COL_ORDER_TAX_STATUS_ID = 'order.order_tax_status_id';

	/**
	 * the column name for the paid_date field
	 */
	public const COL_PAID_DATE = 'order.paid_date';

	/**
	 * the column name for the payment_type field
	 */
	public const COL_PAYMENT_TYPE = 'order.payment_type';

	/**
	 * the column name for the ship_address field
	 */
	public const COL_SHIP_ADDRESS = 'order.ship_address';

	/**
	 * the column name for the ship_city field
	 */
	public const COL_SHIP_CITY = 'order.ship_city';

	/**
	 * the column name for the ship_country_region field
	 */
	public const COL_SHIP_COUNTRY_REGION = 'order.ship_country_region';

	/**
	 * the column name for the ship_name field
	 */
	public const COL_SHIP_NAME = 'order.ship_name';

	/**
	 * the column name for the ship_state_province field
	 */
	public const COL_SHIP_STATE_PROVINCE = 'order.ship_state_province';

	/**
	 * the column name for the ship_zip_postal_code field
	 */
	public const COL_SHIP_ZIP_POSTAL_CODE = 'order.ship_zip_postal_code';

	/**
	 * the column name for the shipped_date field
	 */
	public const COL_SHIPPED_DATE = 'order.shipped_date';

	/**
	 * the column name for the shipper_id field
	 */
	public const COL_SHIPPER_ID = 'order.shipper_id';

	/**
	 * the column name for the shipping_fee field
	 */
	public const COL_SHIPPING_FEE = 'order.shipping_fee';

	/**
	 * the column name for the tax_rate field
	 */
	public const COL_TAX_RATE = 'order.tax_rate';

	/**
	 * the column name for the taxes field
	 */
	public const COL_TAXES = 'order.taxes';

	/**
	 * The default database name for this class
	 */
	public const DATABASE_NAME = 'default';

	/**
	 * The default string format for model objects of the related table
	 */
	public const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * The total number of columns
	 */
	public const NUM_COLUMNS = 20;

	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	public const NUM_HYDRATE_COLUMNS = 20;

	/**
	 * The number of lazy-loaded columns
	 */
	public const NUM_LAZY_LOAD_COLUMNS = 0;

	/**
	 * The related Propel class for this table
	 */
	public const OM_CLASS = '\\SOB\\Propel2\\Order';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'order';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'Order';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['OrderId' => 0, 'EmployeeId' => 1, 'CustomerId' => 2, 'OrderDate' => 3, 'ShippedDate' => 4, 'ShipperId' => 5, 'ShipName' => 6, 'ShipAddress' => 7, 'ShipCity' => 8, 'ShipStateProvince' => 9, 'ShipZipPostalCode' => 10, 'ShipCountryRegion' => 11, 'ShippingFee' => 12, 'Taxes' => 13, 'PaymentType' => 14, 'PaidDate' => 15, 'Notes' => 16, 'TaxRate' => 17, 'OrderTaxStatusId' => 18, 'OrderStatusId' => 19, ],
		self::TYPE_CAMELNAME => ['orderId' => 0, 'employeeId' => 1, 'customerId' => 2, 'orderDate' => 3, 'shippedDate' => 4, 'shipperId' => 5, 'shipName' => 6, 'shipAddress' => 7, 'shipCity' => 8, 'shipStateProvince' => 9, 'shipZipPostalCode' => 10, 'shipCountryRegion' => 11, 'shippingFee' => 12, 'taxes' => 13, 'paymentType' => 14, 'paidDate' => 15, 'notes' => 16, 'taxRate' => 17, 'orderTaxStatusId' => 18, 'orderStatusId' => 19, ],
		self::TYPE_COLNAME => [OrderTableMap::COL_ORDER_ID => 0, OrderTableMap::COL_EMPLOYEE_ID => 1, OrderTableMap::COL_CUSTOMER_ID => 2, OrderTableMap::COL_ORDER_DATE => 3, OrderTableMap::COL_SHIPPED_DATE => 4, OrderTableMap::COL_SHIPPER_ID => 5, OrderTableMap::COL_SHIP_NAME => 6, OrderTableMap::COL_SHIP_ADDRESS => 7, OrderTableMap::COL_SHIP_CITY => 8, OrderTableMap::COL_SHIP_STATE_PROVINCE => 9, OrderTableMap::COL_SHIP_ZIP_POSTAL_CODE => 10, OrderTableMap::COL_SHIP_COUNTRY_REGION => 11, OrderTableMap::COL_SHIPPING_FEE => 12, OrderTableMap::COL_TAXES => 13, OrderTableMap::COL_PAYMENT_TYPE => 14, OrderTableMap::COL_PAID_DATE => 15, OrderTableMap::COL_NOTES => 16, OrderTableMap::COL_TAX_RATE => 17, OrderTableMap::COL_ORDER_TAX_STATUS_ID => 18, OrderTableMap::COL_ORDER_STATUS_ID => 19, ],
		self::TYPE_FIELDNAME => ['order_id' => 0, 'employee_id' => 1, 'customer_id' => 2, 'order_date' => 3, 'shipped_date' => 4, 'shipper_id' => 5, 'ship_name' => 6, 'ship_address' => 7, 'ship_city' => 8, 'ship_state_province' => 9, 'ship_zip_postal_code' => 10, 'ship_country_region' => 11, 'shipping_fee' => 12, 'taxes' => 13, 'payment_type' => 14, 'paid_date' => 15, 'notes' => 16, 'tax_rate' => 17, 'order_tax_status_id' => 18, 'order_status_id' => 19, ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, ]
	];

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldNames = [
		self::TYPE_PHPNAME => ['OrderId', 'EmployeeId', 'CustomerId', 'OrderDate', 'ShippedDate', 'ShipperId', 'ShipName', 'ShipAddress', 'ShipCity', 'ShipStateProvince', 'ShipZipPostalCode', 'ShipCountryRegion', 'ShippingFee', 'Taxes', 'PaymentType', 'PaidDate', 'Notes', 'TaxRate', 'OrderTaxStatusId', 'OrderStatusId', ],
		self::TYPE_CAMELNAME => ['orderId', 'employeeId', 'customerId', 'orderDate', 'shippedDate', 'shipperId', 'shipName', 'shipAddress', 'shipCity', 'shipStateProvince', 'shipZipPostalCode', 'shipCountryRegion', 'shippingFee', 'taxes', 'paymentType', 'paidDate', 'notes', 'taxRate', 'orderTaxStatusId', 'orderStatusId', ],
		self::TYPE_COLNAME => [OrderTableMap::COL_ORDER_ID, OrderTableMap::COL_EMPLOYEE_ID, OrderTableMap::COL_CUSTOMER_ID, OrderTableMap::COL_ORDER_DATE, OrderTableMap::COL_SHIPPED_DATE, OrderTableMap::COL_SHIPPER_ID, OrderTableMap::COL_SHIP_NAME, OrderTableMap::COL_SHIP_ADDRESS, OrderTableMap::COL_SHIP_CITY, OrderTableMap::COL_SHIP_STATE_PROVINCE, OrderTableMap::COL_SHIP_ZIP_POSTAL_CODE, OrderTableMap::COL_SHIP_COUNTRY_REGION, OrderTableMap::COL_SHIPPING_FEE, OrderTableMap::COL_TAXES, OrderTableMap::COL_PAYMENT_TYPE, OrderTableMap::COL_PAID_DATE, OrderTableMap::COL_NOTES, OrderTableMap::COL_TAX_RATE, OrderTableMap::COL_ORDER_TAX_STATUS_ID, OrderTableMap::COL_ORDER_STATUS_ID, ],
		self::TYPE_FIELDNAME => ['order_id', 'employee_id', 'customer_id', 'order_date', 'shipped_date', 'shipper_id', 'ship_name', 'ship_address', 'ship_city', 'ship_state_province', 'ship_zip_postal_code', 'ship_country_region', 'shipping_fee', 'taxes', 'payment_type', 'paid_date', 'notes', 'tax_rate', 'order_tax_status_id', 'order_status_id', ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'OrderId' => 'ORDER_ID',
		'Order.OrderId' => 'ORDER_ID',
		'orderId' => 'ORDER_ID',
		'order.orderId' => 'ORDER_ID',
		'OrderTableMap::COL_ORDER_ID' => 'ORDER_ID',
		'COL_ORDER_ID' => 'ORDER_ID',
		'order_id' => 'ORDER_ID',
		'order.order_id' => 'ORDER_ID',
		'EmployeeId' => 'EMPLOYEE_ID',
		'Order.EmployeeId' => 'EMPLOYEE_ID',
		'employeeId' => 'EMPLOYEE_ID',
		'order.employeeId' => 'EMPLOYEE_ID',
		'OrderTableMap::COL_EMPLOYEE_ID' => 'EMPLOYEE_ID',
		'COL_EMPLOYEE_ID' => 'EMPLOYEE_ID',
		'employee_id' => 'EMPLOYEE_ID',
		'order.employee_id' => 'EMPLOYEE_ID',
		'CustomerId' => 'CUSTOMER_ID',
		'Order.CustomerId' => 'CUSTOMER_ID',
		'customerId' => 'CUSTOMER_ID',
		'order.customerId' => 'CUSTOMER_ID',
		'OrderTableMap::COL_CUSTOMER_ID' => 'CUSTOMER_ID',
		'COL_CUSTOMER_ID' => 'CUSTOMER_ID',
		'customer_id' => 'CUSTOMER_ID',
		'order.customer_id' => 'CUSTOMER_ID',
		'OrderDate' => 'ORDER_DATE',
		'Order.OrderDate' => 'ORDER_DATE',
		'orderDate' => 'ORDER_DATE',
		'order.orderDate' => 'ORDER_DATE',
		'OrderTableMap::COL_ORDER_DATE' => 'ORDER_DATE',
		'COL_ORDER_DATE' => 'ORDER_DATE',
		'order_date' => 'ORDER_DATE',
		'order.order_date' => 'ORDER_DATE',
		'ShippedDate' => 'SHIPPED_DATE',
		'Order.ShippedDate' => 'SHIPPED_DATE',
		'shippedDate' => 'SHIPPED_DATE',
		'order.shippedDate' => 'SHIPPED_DATE',
		'OrderTableMap::COL_SHIPPED_DATE' => 'SHIPPED_DATE',
		'COL_SHIPPED_DATE' => 'SHIPPED_DATE',
		'shipped_date' => 'SHIPPED_DATE',
		'order.shipped_date' => 'SHIPPED_DATE',
		'ShipperId' => 'SHIPPER_ID',
		'Order.ShipperId' => 'SHIPPER_ID',
		'shipperId' => 'SHIPPER_ID',
		'order.shipperId' => 'SHIPPER_ID',
		'OrderTableMap::COL_SHIPPER_ID' => 'SHIPPER_ID',
		'COL_SHIPPER_ID' => 'SHIPPER_ID',
		'shipper_id' => 'SHIPPER_ID',
		'order.shipper_id' => 'SHIPPER_ID',
		'ShipName' => 'SHIP_NAME',
		'Order.ShipName' => 'SHIP_NAME',
		'shipName' => 'SHIP_NAME',
		'order.shipName' => 'SHIP_NAME',
		'OrderTableMap::COL_SHIP_NAME' => 'SHIP_NAME',
		'COL_SHIP_NAME' => 'SHIP_NAME',
		'ship_name' => 'SHIP_NAME',
		'order.ship_name' => 'SHIP_NAME',
		'ShipAddress' => 'SHIP_ADDRESS',
		'Order.ShipAddress' => 'SHIP_ADDRESS',
		'shipAddress' => 'SHIP_ADDRESS',
		'order.shipAddress' => 'SHIP_ADDRESS',
		'OrderTableMap::COL_SHIP_ADDRESS' => 'SHIP_ADDRESS',
		'COL_SHIP_ADDRESS' => 'SHIP_ADDRESS',
		'ship_address' => 'SHIP_ADDRESS',
		'order.ship_address' => 'SHIP_ADDRESS',
		'ShipCity' => 'SHIP_CITY',
		'Order.ShipCity' => 'SHIP_CITY',
		'shipCity' => 'SHIP_CITY',
		'order.shipCity' => 'SHIP_CITY',
		'OrderTableMap::COL_SHIP_CITY' => 'SHIP_CITY',
		'COL_SHIP_CITY' => 'SHIP_CITY',
		'ship_city' => 'SHIP_CITY',
		'order.ship_city' => 'SHIP_CITY',
		'ShipStateProvince' => 'SHIP_STATE_PROVINCE',
		'Order.ShipStateProvince' => 'SHIP_STATE_PROVINCE',
		'shipStateProvince' => 'SHIP_STATE_PROVINCE',
		'order.shipStateProvince' => 'SHIP_STATE_PROVINCE',
		'OrderTableMap::COL_SHIP_STATE_PROVINCE' => 'SHIP_STATE_PROVINCE',
		'COL_SHIP_STATE_PROVINCE' => 'SHIP_STATE_PROVINCE',
		'ship_state_province' => 'SHIP_STATE_PROVINCE',
		'order.ship_state_province' => 'SHIP_STATE_PROVINCE',
		'ShipZipPostalCode' => 'SHIP_ZIP_POSTAL_CODE',
		'Order.ShipZipPostalCode' => 'SHIP_ZIP_POSTAL_CODE',
		'shipZipPostalCode' => 'SHIP_ZIP_POSTAL_CODE',
		'order.shipZipPostalCode' => 'SHIP_ZIP_POSTAL_CODE',
		'OrderTableMap::COL_SHIP_ZIP_POSTAL_CODE' => 'SHIP_ZIP_POSTAL_CODE',
		'COL_SHIP_ZIP_POSTAL_CODE' => 'SHIP_ZIP_POSTAL_CODE',
		'ship_zip_postal_code' => 'SHIP_ZIP_POSTAL_CODE',
		'order.ship_zip_postal_code' => 'SHIP_ZIP_POSTAL_CODE',
		'ShipCountryRegion' => 'SHIP_COUNTRY_REGION',
		'Order.ShipCountryRegion' => 'SHIP_COUNTRY_REGION',
		'shipCountryRegion' => 'SHIP_COUNTRY_REGION',
		'order.shipCountryRegion' => 'SHIP_COUNTRY_REGION',
		'OrderTableMap::COL_SHIP_COUNTRY_REGION' => 'SHIP_COUNTRY_REGION',
		'COL_SHIP_COUNTRY_REGION' => 'SHIP_COUNTRY_REGION',
		'ship_country_region' => 'SHIP_COUNTRY_REGION',
		'order.ship_country_region' => 'SHIP_COUNTRY_REGION',
		'ShippingFee' => 'SHIPPING_FEE',
		'Order.ShippingFee' => 'SHIPPING_FEE',
		'shippingFee' => 'SHIPPING_FEE',
		'order.shippingFee' => 'SHIPPING_FEE',
		'OrderTableMap::COL_SHIPPING_FEE' => 'SHIPPING_FEE',
		'COL_SHIPPING_FEE' => 'SHIPPING_FEE',
		'shipping_fee' => 'SHIPPING_FEE',
		'order.shipping_fee' => 'SHIPPING_FEE',
		'Taxes' => 'TAXES',
		'Order.Taxes' => 'TAXES',
		'taxes' => 'TAXES',
		'order.taxes' => 'TAXES',
		'OrderTableMap::COL_TAXES' => 'TAXES',
		'COL_TAXES' => 'TAXES',
		'PaymentType' => 'PAYMENT_TYPE',
		'Order.PaymentType' => 'PAYMENT_TYPE',
		'paymentType' => 'PAYMENT_TYPE',
		'order.paymentType' => 'PAYMENT_TYPE',
		'OrderTableMap::COL_PAYMENT_TYPE' => 'PAYMENT_TYPE',
		'COL_PAYMENT_TYPE' => 'PAYMENT_TYPE',
		'payment_type' => 'PAYMENT_TYPE',
		'order.payment_type' => 'PAYMENT_TYPE',
		'PaidDate' => 'PAID_DATE',
		'Order.PaidDate' => 'PAID_DATE',
		'paidDate' => 'PAID_DATE',
		'order.paidDate' => 'PAID_DATE',
		'OrderTableMap::COL_PAID_DATE' => 'PAID_DATE',
		'COL_PAID_DATE' => 'PAID_DATE',
		'paid_date' => 'PAID_DATE',
		'order.paid_date' => 'PAID_DATE',
		'Notes' => 'NOTES',
		'Order.Notes' => 'NOTES',
		'notes' => 'NOTES',
		'order.notes' => 'NOTES',
		'OrderTableMap::COL_NOTES' => 'NOTES',
		'COL_NOTES' => 'NOTES',
		'TaxRate' => 'TAX_RATE',
		'Order.TaxRate' => 'TAX_RATE',
		'taxRate' => 'TAX_RATE',
		'order.taxRate' => 'TAX_RATE',
		'OrderTableMap::COL_TAX_RATE' => 'TAX_RATE',
		'COL_TAX_RATE' => 'TAX_RATE',
		'tax_rate' => 'TAX_RATE',
		'order.tax_rate' => 'TAX_RATE',
		'OrderTaxStatusId' => 'ORDER_TAX_STATUS_ID',
		'Order.OrderTaxStatusId' => 'ORDER_TAX_STATUS_ID',
		'orderTaxStatusId' => 'ORDER_TAX_STATUS_ID',
		'order.orderTaxStatusId' => 'ORDER_TAX_STATUS_ID',
		'OrderTableMap::COL_ORDER_TAX_STATUS_ID' => 'ORDER_TAX_STATUS_ID',
		'COL_ORDER_TAX_STATUS_ID' => 'ORDER_TAX_STATUS_ID',
		'order_tax_status_id' => 'ORDER_TAX_STATUS_ID',
		'order.order_tax_status_id' => 'ORDER_TAX_STATUS_ID',
		'OrderStatusId' => 'ORDER_STATUS_ID',
		'Order.OrderStatusId' => 'ORDER_STATUS_ID',
		'orderStatusId' => 'ORDER_STATUS_ID',
		'order.orderStatusId' => 'ORDER_STATUS_ID',
		'OrderTableMap::COL_ORDER_STATUS_ID' => 'ORDER_STATUS_ID',
		'COL_ORDER_STATUS_ID' => 'ORDER_STATUS_ID',
		'order_status_id' => 'ORDER_STATUS_ID',
		'order.order_status_id' => 'ORDER_STATUS_ID',
	];

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param Criteria $criteria Object containing the columns to add.
	 * @param string|null $alias Optional table alias
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, ?string $alias = null) : void
	{
		if (null === $alias) {
			$criteria->addSelectColumn(OrderTableMap::COL_ORDER_ID);
			$criteria->addSelectColumn(OrderTableMap::COL_EMPLOYEE_ID);
			$criteria->addSelectColumn(OrderTableMap::COL_CUSTOMER_ID);
			$criteria->addSelectColumn(OrderTableMap::COL_ORDER_DATE);
			$criteria->addSelectColumn(OrderTableMap::COL_SHIPPED_DATE);
			$criteria->addSelectColumn(OrderTableMap::COL_SHIPPER_ID);
			$criteria->addSelectColumn(OrderTableMap::COL_SHIP_NAME);
			$criteria->addSelectColumn(OrderTableMap::COL_SHIP_ADDRESS);
			$criteria->addSelectColumn(OrderTableMap::COL_SHIP_CITY);
			$criteria->addSelectColumn(OrderTableMap::COL_SHIP_STATE_PROVINCE);
			$criteria->addSelectColumn(OrderTableMap::COL_SHIP_ZIP_POSTAL_CODE);
			$criteria->addSelectColumn(OrderTableMap::COL_SHIP_COUNTRY_REGION);
			$criteria->addSelectColumn(OrderTableMap::COL_SHIPPING_FEE);
			$criteria->addSelectColumn(OrderTableMap::COL_TAXES);
			$criteria->addSelectColumn(OrderTableMap::COL_PAYMENT_TYPE);
			$criteria->addSelectColumn(OrderTableMap::COL_PAID_DATE);
			$criteria->addSelectColumn(OrderTableMap::COL_NOTES);
			$criteria->addSelectColumn(OrderTableMap::COL_TAX_RATE);
			$criteria->addSelectColumn(OrderTableMap::COL_ORDER_TAX_STATUS_ID);
			$criteria->addSelectColumn(OrderTableMap::COL_ORDER_STATUS_ID);
		} else {
			$criteria->addSelectColumn($alias . '.order_id');
			$criteria->addSelectColumn($alias . '.employee_id');
			$criteria->addSelectColumn($alias . '.customer_id');
			$criteria->addSelectColumn($alias . '.order_date');
			$criteria->addSelectColumn($alias . '.shipped_date');
			$criteria->addSelectColumn($alias . '.shipper_id');
			$criteria->addSelectColumn($alias . '.ship_name');
			$criteria->addSelectColumn($alias . '.ship_address');
			$criteria->addSelectColumn($alias . '.ship_city');
			$criteria->addSelectColumn($alias . '.ship_state_province');
			$criteria->addSelectColumn($alias . '.ship_zip_postal_code');
			$criteria->addSelectColumn($alias . '.ship_country_region');
			$criteria->addSelectColumn($alias . '.shipping_fee');
			$criteria->addSelectColumn($alias . '.taxes');
			$criteria->addSelectColumn($alias . '.payment_type');
			$criteria->addSelectColumn($alias . '.paid_date');
			$criteria->addSelectColumn($alias . '.notes');
			$criteria->addSelectColumn($alias . '.tax_rate');
			$criteria->addSelectColumn($alias . '.order_tax_status_id');
			$criteria->addSelectColumn($alias . '.order_status_id');
		}
	}

	/**
	 * Build the RelationMap objects for this table relationships
	 *
	 */
	public function buildRelations() : void
	{
	}

	/**
	 * Performs a DELETE on the database, given a Order or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or Order object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param ConnectionInterface $con the connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *                         if supported by native driver or if emulated using Propel.
	 */
	 public static function doDelete($values, ?ConnectionInterface $con = null) : int
	 {
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(OrderTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\Order) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(OrderTableMap::DATABASE_NAME);
			$criteria->add(OrderTableMap::COL_ORDER_ID, (array)$values, Criteria::IN);
		}

		$query = OrderQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			OrderTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				OrderTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the order table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return OrderQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a Order or Criteria object.
	 *
	 * @param mixed $criteria Criteria or Order object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(OrderTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from Order object
		}

		if ($criteria->containsKey(OrderTableMap::COL_ORDER_ID) && $criteria->keyContainsValue(OrderTableMap::COL_ORDER_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . OrderTableMap::COL_ORDER_ID . ')');
		}


		// Set the correct dbName
		$query = OrderQuery::create()->mergeWith($criteria);

		// use transaction because $criteria could contain info
		// for more than one table (I guess, conceivably)
		return $con->transaction(static function() use ($con, $query) {
			return $query->doInsert($con);
		});
	}

	/**
	 * The class that the tableMap will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is translated into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param bool $withPrefix Whether to return the path with the class name
	 * @return string path.to.ClassName
	 */
	public static function getOMClass(bool $withPrefix = true) : string
	{
		return $withPrefix ? OrderTableMap::CLASS_DEFAULT : OrderTableMap::OM_CLASS;
	}

	/**
	 * Retrieves the primary key from the DB resultset row
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param array $row Resultset row.
	 * @param int $offset The 0-based offset for reading from the resultset row.
	 * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
	 *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
	 *
	 * @return mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
	{
		return (int)$row[
			TableMap::TYPE_NUM == $indexType
				? 0 + $offset
				: self::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)
		];
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param array $row Resultset row.
	 * @param int $offset The 0-based offset for reading from the resultset row.
	 * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
	 *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
	 *
	 * @return string|null The primary key hash of the row
	 */
	public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : ?string
	{
		// If the PK cannot be derived from the row, return NULL.
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(OrderTableMap::DATABASE_NAME)->getTable(OrderTableMap::TABLE_NAME);
	}

	/**
	 * Initialize the table attributes and columns
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function initialize() : void
	{
		// attributes
		$this->setName('order');
		$this->setPhpName('Order');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\Order');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('order_id', 'OrderId', 'INTEGER', true, null, null);
		$this->addColumn('employee_id', 'EmployeeId', 'INTEGER', false, null, null);
		$this->addColumn('customer_id', 'CustomerId', 'INTEGER', false, null, null);
		$this->addColumn('order_date', 'OrderDate', 'DATETIME', true, null, 'CURRENT_TIMESTAMP');
		$this->addColumn('shipped_date', 'ShippedDate', 'DATETIME', false, null, null);
		$this->addColumn('shipper_id', 'ShipperId', 'INTEGER', false, null, null);
		$this->addColumn('ship_name', 'ShipName', 'VARCHAR', false, 50, null);
		$this->addColumn('ship_address', 'ShipAddress', 'CLOB', false, null, null);
		$this->addColumn('ship_city', 'ShipCity', 'VARCHAR', false, 50, null);
		$this->addColumn('ship_state_province', 'ShipStateProvince', 'VARCHAR', false, 50, null);
		$this->addColumn('ship_zip_postal_code', 'ShipZipPostalCode', 'VARCHAR', false, 50, null);
		$this->addColumn('ship_country_region', 'ShipCountryRegion', 'VARCHAR', false, 50, null);
		$this->addColumn('shipping_fee', 'ShippingFee', 'DECIMAL', false, 19, 0.0000);
		$this->addColumn('taxes', 'Taxes', 'DECIMAL', false, 19, 0.0000);
		$this->addColumn('payment_type', 'PaymentType', 'VARCHAR', false, 50, null);
		$this->addColumn('paid_date', 'PaidDate', 'DATETIME', false, null, null);
		$this->addColumn('notes', 'Notes', 'CLOB', false, null, null);
		$this->addColumn('tax_rate', 'TaxRate', 'DOUBLE', false, null, 0);
		$this->addColumn('order_tax_status_id', 'OrderTaxStatusId', 'INTEGER', false, null, null);
		$this->addColumn('order_status_id', 'OrderStatusId', 'INTEGER', false, null, 0);
	}

	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param array $row Row returned by DataFetcher->fetch().
	 * @param int $offset The 0-based offset for reading from the resultset row.
	 * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
	 * One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
	 *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return array (Order object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = OrderTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = OrderTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + OrderTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = OrderTableMap::OM_CLASS;
			/** @var Order $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			OrderTableMap::addInstanceToPool($obj, $key);
		}

		return [$obj, $col];
	}

	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return array<object>
	 */
	public static function populateObjects(DataFetcherInterface $dataFetcher) : array
	{
		$results = [];

		// set the class once to avoid overhead in the loop
		$cls = static::getOMClass(false);

		// populate the object(s)
		while ($row = $dataFetcher->fetch()) {
			$key = OrderTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = OrderTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var Order $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				OrderTableMap::addInstanceToPool($obj, $key);
			} // if key exists
		}

		return $results;
	}

	/**
	 * Remove all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be removed as they are only loaded on demand.
	 *
	 * @param Criteria $criteria Object containing the columns to remove.
	 * @param string|null $alias Optional table alias
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function removeSelectColumns(Criteria $criteria, ?string $alias = null) : void
	{
		if (null === $alias) {
			$criteria->removeSelectColumn(OrderTableMap::COL_ORDER_ID);
			$criteria->removeSelectColumn(OrderTableMap::COL_EMPLOYEE_ID);
			$criteria->removeSelectColumn(OrderTableMap::COL_CUSTOMER_ID);
			$criteria->removeSelectColumn(OrderTableMap::COL_ORDER_DATE);
			$criteria->removeSelectColumn(OrderTableMap::COL_SHIPPED_DATE);
			$criteria->removeSelectColumn(OrderTableMap::COL_SHIPPER_ID);
			$criteria->removeSelectColumn(OrderTableMap::COL_SHIP_NAME);
			$criteria->removeSelectColumn(OrderTableMap::COL_SHIP_ADDRESS);
			$criteria->removeSelectColumn(OrderTableMap::COL_SHIP_CITY);
			$criteria->removeSelectColumn(OrderTableMap::COL_SHIP_STATE_PROVINCE);
			$criteria->removeSelectColumn(OrderTableMap::COL_SHIP_ZIP_POSTAL_CODE);
			$criteria->removeSelectColumn(OrderTableMap::COL_SHIP_COUNTRY_REGION);
			$criteria->removeSelectColumn(OrderTableMap::COL_SHIPPING_FEE);
			$criteria->removeSelectColumn(OrderTableMap::COL_TAXES);
			$criteria->removeSelectColumn(OrderTableMap::COL_PAYMENT_TYPE);
			$criteria->removeSelectColumn(OrderTableMap::COL_PAID_DATE);
			$criteria->removeSelectColumn(OrderTableMap::COL_NOTES);
			$criteria->removeSelectColumn(OrderTableMap::COL_TAX_RATE);
			$criteria->removeSelectColumn(OrderTableMap::COL_ORDER_TAX_STATUS_ID);
			$criteria->removeSelectColumn(OrderTableMap::COL_ORDER_STATUS_ID);
		} else {
			$criteria->removeSelectColumn($alias . '.order_id');
			$criteria->removeSelectColumn($alias . '.employee_id');
			$criteria->removeSelectColumn($alias . '.customer_id');
			$criteria->removeSelectColumn($alias . '.order_date');
			$criteria->removeSelectColumn($alias . '.shipped_date');
			$criteria->removeSelectColumn($alias . '.shipper_id');
			$criteria->removeSelectColumn($alias . '.ship_name');
			$criteria->removeSelectColumn($alias . '.ship_address');
			$criteria->removeSelectColumn($alias . '.ship_city');
			$criteria->removeSelectColumn($alias . '.ship_state_province');
			$criteria->removeSelectColumn($alias . '.ship_zip_postal_code');
			$criteria->removeSelectColumn($alias . '.ship_country_region');
			$criteria->removeSelectColumn($alias . '.shipping_fee');
			$criteria->removeSelectColumn($alias . '.taxes');
			$criteria->removeSelectColumn($alias . '.payment_type');
			$criteria->removeSelectColumn($alias . '.paid_date');
			$criteria->removeSelectColumn($alias . '.notes');
			$criteria->removeSelectColumn($alias . '.tax_rate');
			$criteria->removeSelectColumn($alias . '.order_tax_status_id');
			$criteria->removeSelectColumn($alias . '.order_status_id');
		}
	}
}
