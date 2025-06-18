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
use SOB\Propel2\OrderDetail;
use SOB\Propel2\OrderDetailQuery;

/**
 * This class defines the structure of the 'order_detail' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class OrderDetailTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.OrderDetail';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.OrderDetailTableMap';

	/**
	 * the column name for the date_allocated field
	 */
	public const COL_DATE_ALLOCATED = 'order_detail.date_allocated';

	/**
	 * the column name for the discount field
	 */
	public const COL_DISCOUNT = 'order_detail.discount';

	/**
	 * the column name for the inventory_transaction_id field
	 */
	public const COL_INVENTORY_TRANSACTION_ID = 'order_detail.inventory_transaction_id';

	/**
	 * the column name for the order_detail_id field
	 */
	public const COL_ORDER_DETAIL_ID = 'order_detail.order_detail_id';

	/**
	 * the column name for the order_detail_status_id field
	 */
	public const COL_ORDER_DETAIL_STATUS_ID = 'order_detail.order_detail_status_id';

	/**
	 * the column name for the order_id field
	 */
	public const COL_ORDER_ID = 'order_detail.order_id';

	/**
	 * the column name for the product_id field
	 */
	public const COL_PRODUCT_ID = 'order_detail.product_id';

	/**
	 * the column name for the purchase_order_id field
	 */
	public const COL_PURCHASE_ORDER_ID = 'order_detail.purchase_order_id';

	/**
	 * the column name for the quantity field
	 */
	public const COL_QUANTITY = 'order_detail.quantity';

	/**
	 * the column name for the unit_price field
	 */
	public const COL_UNIT_PRICE = 'order_detail.unit_price';

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
	public const NUM_COLUMNS = 10;

	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	public const NUM_HYDRATE_COLUMNS = 10;

	/**
	 * The number of lazy-loaded columns
	 */
	public const NUM_LAZY_LOAD_COLUMNS = 0;

	/**
	 * The related Propel class for this table
	 */
	public const OM_CLASS = '\\SOB\\Propel2\\OrderDetail';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'order_detail';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'OrderDetail';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['OrderDetailId' => 0, 'OrderId' => 1, 'ProductId' => 2, 'Quantity' => 3, 'UnitPrice' => 4, 'Discount' => 5, 'OrderDetailStatusId' => 6, 'DateAllocated' => 7, 'PurchaseOrderId' => 8, 'InventoryTransactionId' => 9, ],
		self::TYPE_CAMELNAME => ['orderDetailId' => 0, 'orderId' => 1, 'productId' => 2, 'quantity' => 3, 'unitPrice' => 4, 'discount' => 5, 'orderDetailStatusId' => 6, 'dateAllocated' => 7, 'purchaseOrderId' => 8, 'inventoryTransactionId' => 9, ],
		self::TYPE_COLNAME => [OrderDetailTableMap::COL_ORDER_DETAIL_ID => 0, OrderDetailTableMap::COL_ORDER_ID => 1, OrderDetailTableMap::COL_PRODUCT_ID => 2, OrderDetailTableMap::COL_QUANTITY => 3, OrderDetailTableMap::COL_UNIT_PRICE => 4, OrderDetailTableMap::COL_DISCOUNT => 5, OrderDetailTableMap::COL_ORDER_DETAIL_STATUS_ID => 6, OrderDetailTableMap::COL_DATE_ALLOCATED => 7, OrderDetailTableMap::COL_PURCHASE_ORDER_ID => 8, OrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID => 9, ],
		self::TYPE_FIELDNAME => ['order_detail_id' => 0, 'order_id' => 1, 'product_id' => 2, 'quantity' => 3, 'unit_price' => 4, 'discount' => 5, 'order_detail_status_id' => 6, 'date_allocated' => 7, 'purchase_order_id' => 8, 'inventory_transaction_id' => 9, ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, ]
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
		self::TYPE_PHPNAME => ['OrderDetailId', 'OrderId', 'ProductId', 'Quantity', 'UnitPrice', 'Discount', 'OrderDetailStatusId', 'DateAllocated', 'PurchaseOrderId', 'InventoryTransactionId', ],
		self::TYPE_CAMELNAME => ['orderDetailId', 'orderId', 'productId', 'quantity', 'unitPrice', 'discount', 'orderDetailStatusId', 'dateAllocated', 'purchaseOrderId', 'inventoryTransactionId', ],
		self::TYPE_COLNAME => [OrderDetailTableMap::COL_ORDER_DETAIL_ID, OrderDetailTableMap::COL_ORDER_ID, OrderDetailTableMap::COL_PRODUCT_ID, OrderDetailTableMap::COL_QUANTITY, OrderDetailTableMap::COL_UNIT_PRICE, OrderDetailTableMap::COL_DISCOUNT, OrderDetailTableMap::COL_ORDER_DETAIL_STATUS_ID, OrderDetailTableMap::COL_DATE_ALLOCATED, OrderDetailTableMap::COL_PURCHASE_ORDER_ID, OrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID, ],
		self::TYPE_FIELDNAME => ['order_detail_id', 'order_id', 'product_id', 'quantity', 'unit_price', 'discount', 'order_detail_status_id', 'date_allocated', 'purchase_order_id', 'inventory_transaction_id', ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'OrderDetailId' => 'ORDER_DETAIL_ID',
		'OrderDetail.OrderDetailId' => 'ORDER_DETAIL_ID',
		'orderDetailId' => 'ORDER_DETAIL_ID',
		'orderDetail.orderDetailId' => 'ORDER_DETAIL_ID',
		'OrderDetailTableMap::COL_ORDER_DETAIL_ID' => 'ORDER_DETAIL_ID',
		'COL_ORDER_DETAIL_ID' => 'ORDER_DETAIL_ID',
		'order_detail_id' => 'ORDER_DETAIL_ID',
		'order_detail.order_detail_id' => 'ORDER_DETAIL_ID',
		'OrderId' => 'ORDER_ID',
		'OrderDetail.OrderId' => 'ORDER_ID',
		'orderId' => 'ORDER_ID',
		'orderDetail.orderId' => 'ORDER_ID',
		'OrderDetailTableMap::COL_ORDER_ID' => 'ORDER_ID',
		'COL_ORDER_ID' => 'ORDER_ID',
		'order_id' => 'ORDER_ID',
		'order_detail.order_id' => 'ORDER_ID',
		'ProductId' => 'PRODUCT_ID',
		'OrderDetail.ProductId' => 'PRODUCT_ID',
		'productId' => 'PRODUCT_ID',
		'orderDetail.productId' => 'PRODUCT_ID',
		'OrderDetailTableMap::COL_PRODUCT_ID' => 'PRODUCT_ID',
		'COL_PRODUCT_ID' => 'PRODUCT_ID',
		'product_id' => 'PRODUCT_ID',
		'order_detail.product_id' => 'PRODUCT_ID',
		'Quantity' => 'QUANTITY',
		'OrderDetail.Quantity' => 'QUANTITY',
		'quantity' => 'QUANTITY',
		'orderDetail.quantity' => 'QUANTITY',
		'OrderDetailTableMap::COL_QUANTITY' => 'QUANTITY',
		'COL_QUANTITY' => 'QUANTITY',
		'order_detail.quantity' => 'QUANTITY',
		'UnitPrice' => 'UNIT_PRICE',
		'OrderDetail.UnitPrice' => 'UNIT_PRICE',
		'unitPrice' => 'UNIT_PRICE',
		'orderDetail.unitPrice' => 'UNIT_PRICE',
		'OrderDetailTableMap::COL_UNIT_PRICE' => 'UNIT_PRICE',
		'COL_UNIT_PRICE' => 'UNIT_PRICE',
		'unit_price' => 'UNIT_PRICE',
		'order_detail.unit_price' => 'UNIT_PRICE',
		'Discount' => 'DISCOUNT',
		'OrderDetail.Discount' => 'DISCOUNT',
		'discount' => 'DISCOUNT',
		'orderDetail.discount' => 'DISCOUNT',
		'OrderDetailTableMap::COL_DISCOUNT' => 'DISCOUNT',
		'COL_DISCOUNT' => 'DISCOUNT',
		'order_detail.discount' => 'DISCOUNT',
		'OrderDetailStatusId' => 'ORDER_DETAIL_STATUS_ID',
		'OrderDetail.OrderDetailStatusId' => 'ORDER_DETAIL_STATUS_ID',
		'orderDetailStatusId' => 'ORDER_DETAIL_STATUS_ID',
		'orderDetail.orderDetailStatusId' => 'ORDER_DETAIL_STATUS_ID',
		'OrderDetailTableMap::COL_ORDER_DETAIL_STATUS_ID' => 'ORDER_DETAIL_STATUS_ID',
		'COL_ORDER_DETAIL_STATUS_ID' => 'ORDER_DETAIL_STATUS_ID',
		'order_detail_status_id' => 'ORDER_DETAIL_STATUS_ID',
		'order_detail.order_detail_status_id' => 'ORDER_DETAIL_STATUS_ID',
		'DateAllocated' => 'DATE_ALLOCATED',
		'OrderDetail.DateAllocated' => 'DATE_ALLOCATED',
		'dateAllocated' => 'DATE_ALLOCATED',
		'orderDetail.dateAllocated' => 'DATE_ALLOCATED',
		'OrderDetailTableMap::COL_DATE_ALLOCATED' => 'DATE_ALLOCATED',
		'COL_DATE_ALLOCATED' => 'DATE_ALLOCATED',
		'date_allocated' => 'DATE_ALLOCATED',
		'order_detail.date_allocated' => 'DATE_ALLOCATED',
		'PurchaseOrderId' => 'PURCHASE_ORDER_ID',
		'OrderDetail.PurchaseOrderId' => 'PURCHASE_ORDER_ID',
		'purchaseOrderId' => 'PURCHASE_ORDER_ID',
		'orderDetail.purchaseOrderId' => 'PURCHASE_ORDER_ID',
		'OrderDetailTableMap::COL_PURCHASE_ORDER_ID' => 'PURCHASE_ORDER_ID',
		'COL_PURCHASE_ORDER_ID' => 'PURCHASE_ORDER_ID',
		'purchase_order_id' => 'PURCHASE_ORDER_ID',
		'order_detail.purchase_order_id' => 'PURCHASE_ORDER_ID',
		'InventoryTransactionId' => 'INVENTORY_TRANSACTION_ID',
		'OrderDetail.InventoryTransactionId' => 'INVENTORY_TRANSACTION_ID',
		'inventoryTransactionId' => 'INVENTORY_TRANSACTION_ID',
		'orderDetail.inventoryTransactionId' => 'INVENTORY_TRANSACTION_ID',
		'OrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID' => 'INVENTORY_TRANSACTION_ID',
		'COL_INVENTORY_TRANSACTION_ID' => 'INVENTORY_TRANSACTION_ID',
		'inventory_transaction_id' => 'INVENTORY_TRANSACTION_ID',
		'order_detail.inventory_transaction_id' => 'INVENTORY_TRANSACTION_ID',
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
			$criteria->addSelectColumn(OrderDetailTableMap::COL_ORDER_DETAIL_ID);
			$criteria->addSelectColumn(OrderDetailTableMap::COL_ORDER_ID);
			$criteria->addSelectColumn(OrderDetailTableMap::COL_PRODUCT_ID);
			$criteria->addSelectColumn(OrderDetailTableMap::COL_QUANTITY);
			$criteria->addSelectColumn(OrderDetailTableMap::COL_UNIT_PRICE);
			$criteria->addSelectColumn(OrderDetailTableMap::COL_DISCOUNT);
			$criteria->addSelectColumn(OrderDetailTableMap::COL_ORDER_DETAIL_STATUS_ID);
			$criteria->addSelectColumn(OrderDetailTableMap::COL_DATE_ALLOCATED);
			$criteria->addSelectColumn(OrderDetailTableMap::COL_PURCHASE_ORDER_ID);
			$criteria->addSelectColumn(OrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID);
		} else {
			$criteria->addSelectColumn($alias . '.order_detail_id');
			$criteria->addSelectColumn($alias . '.order_id');
			$criteria->addSelectColumn($alias . '.product_id');
			$criteria->addSelectColumn($alias . '.quantity');
			$criteria->addSelectColumn($alias . '.unit_price');
			$criteria->addSelectColumn($alias . '.discount');
			$criteria->addSelectColumn($alias . '.order_detail_status_id');
			$criteria->addSelectColumn($alias . '.date_allocated');
			$criteria->addSelectColumn($alias . '.purchase_order_id');
			$criteria->addSelectColumn($alias . '.inventory_transaction_id');
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
	 * Performs a DELETE on the database, given a OrderDetail or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or OrderDetail object or primary key or array of primary keys
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
			$con = Propel::getServiceContainer()->getWriteConnection(OrderDetailTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\OrderDetail) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(OrderDetailTableMap::DATABASE_NAME);
			$criteria->add(OrderDetailTableMap::COL_ORDER_DETAIL_ID, (array)$values, Criteria::IN);
		}

		$query = OrderDetailQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			OrderDetailTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				OrderDetailTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the order_detail table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return OrderDetailQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a OrderDetail or Criteria object.
	 *
	 * @param mixed $criteria Criteria or OrderDetail object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(OrderDetailTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from OrderDetail object
		}

		if ($criteria->containsKey(OrderDetailTableMap::COL_ORDER_DETAIL_ID) && $criteria->keyContainsValue(OrderDetailTableMap::COL_ORDER_DETAIL_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . OrderDetailTableMap::COL_ORDER_DETAIL_ID . ')');
		}


		// Set the correct dbName
		$query = OrderDetailQuery::create()->mergeWith($criteria);

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
		return $withPrefix ? OrderDetailTableMap::CLASS_DEFAULT : OrderDetailTableMap::OM_CLASS;
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
				: self::translateFieldName('OrderDetailId', TableMap::TYPE_PHPNAME, $indexType)
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
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderDetailId', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderDetailId', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderDetailId', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderDetailId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderDetailId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderDetailId', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(OrderDetailTableMap::DATABASE_NAME)->getTable(OrderDetailTableMap::TABLE_NAME);
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
		$this->setName('order_detail');
		$this->setPhpName('OrderDetail');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\OrderDetail');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('order_detail_id', 'OrderDetailId', 'INTEGER', true, null, null);
		$this->addColumn('order_id', 'OrderId', 'INTEGER', true, null, null);
		$this->addColumn('product_id', 'ProductId', 'INTEGER', false, null, null);
		$this->addColumn('quantity', 'Quantity', 'DECIMAL', true, 18, 0.0000);
		$this->addColumn('unit_price', 'UnitPrice', 'DECIMAL', false, 19, 0.0000);
		$this->addColumn('discount', 'Discount', 'DOUBLE', true, null, 0);
		$this->addColumn('order_detail_status_id', 'OrderDetailStatusId', 'INTEGER', false, null, null);
		$this->addColumn('date_allocated', 'DateAllocated', 'DATETIME', false, null, null);
		$this->addColumn('purchase_order_id', 'PurchaseOrderId', 'INTEGER', false, null, null);
		$this->addColumn('inventory_transaction_id', 'InventoryTransactionId', 'INTEGER', false, null, null);
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
	 * @return array (OrderDetail object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = OrderDetailTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = OrderDetailTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + OrderDetailTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = OrderDetailTableMap::OM_CLASS;
			/** @var OrderDetail $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			OrderDetailTableMap::addInstanceToPool($obj, $key);
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
			$key = OrderDetailTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = OrderDetailTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var OrderDetail $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				OrderDetailTableMap::addInstanceToPool($obj, $key);
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
			$criteria->removeSelectColumn(OrderDetailTableMap::COL_ORDER_DETAIL_ID);
			$criteria->removeSelectColumn(OrderDetailTableMap::COL_ORDER_ID);
			$criteria->removeSelectColumn(OrderDetailTableMap::COL_PRODUCT_ID);
			$criteria->removeSelectColumn(OrderDetailTableMap::COL_QUANTITY);
			$criteria->removeSelectColumn(OrderDetailTableMap::COL_UNIT_PRICE);
			$criteria->removeSelectColumn(OrderDetailTableMap::COL_DISCOUNT);
			$criteria->removeSelectColumn(OrderDetailTableMap::COL_ORDER_DETAIL_STATUS_ID);
			$criteria->removeSelectColumn(OrderDetailTableMap::COL_DATE_ALLOCATED);
			$criteria->removeSelectColumn(OrderDetailTableMap::COL_PURCHASE_ORDER_ID);
			$criteria->removeSelectColumn(OrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID);
		} else {
			$criteria->removeSelectColumn($alias . '.order_detail_id');
			$criteria->removeSelectColumn($alias . '.order_id');
			$criteria->removeSelectColumn($alias . '.product_id');
			$criteria->removeSelectColumn($alias . '.quantity');
			$criteria->removeSelectColumn($alias . '.unit_price');
			$criteria->removeSelectColumn($alias . '.discount');
			$criteria->removeSelectColumn($alias . '.order_detail_status_id');
			$criteria->removeSelectColumn($alias . '.date_allocated');
			$criteria->removeSelectColumn($alias . '.purchase_order_id');
			$criteria->removeSelectColumn($alias . '.inventory_transaction_id');
		}
	}
}
