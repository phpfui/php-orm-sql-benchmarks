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
use SOB\Propel2\PurchaseOrderDetail;
use SOB\Propel2\PurchaseOrderDetailQuery;

/**
 * This class defines the structure of the 'purchase_order_detail' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class PurchaseOrderDetailTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.PurchaseOrderDetail';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.PurchaseOrderDetailTableMap';

	/**
	 * the column name for the date_received field
	 */
	public const COL_DATE_RECEIVED = 'purchase_order_detail.date_received';

	/**
	 * the column name for the inventory_transaction_id field
	 */
	public const COL_INVENTORY_TRANSACTION_ID = 'purchase_order_detail.inventory_transaction_id';

	/**
	 * the column name for the posted_to_inventory field
	 */
	public const COL_POSTED_TO_INVENTORY = 'purchase_order_detail.posted_to_inventory';

	/**
	 * the column name for the product_id field
	 */
	public const COL_PRODUCT_ID = 'purchase_order_detail.product_id';

	/**
	 * the column name for the purchase_order_detail_id field
	 */
	public const COL_PURCHASE_ORDER_DETAIL_ID = 'purchase_order_detail.purchase_order_detail_id';

	/**
	 * the column name for the purchase_order_id field
	 */
	public const COL_PURCHASE_ORDER_ID = 'purchase_order_detail.purchase_order_id';

	/**
	 * the column name for the quantity field
	 */
	public const COL_QUANTITY = 'purchase_order_detail.quantity';

	/**
	 * the column name for the unit_cost field
	 */
	public const COL_UNIT_COST = 'purchase_order_detail.unit_cost';

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
	public const NUM_COLUMNS = 8;

	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	public const NUM_HYDRATE_COLUMNS = 8;

	/**
	 * The number of lazy-loaded columns
	 */
	public const NUM_LAZY_LOAD_COLUMNS = 0;

	/**
	 * The related Propel class for this table
	 */
	public const OM_CLASS = '\\SOB\\Propel2\\PurchaseOrderDetail';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'purchase_order_detail';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'PurchaseOrderDetail';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['PurchaseOrderDetailId' => 0, 'PurchaseOrderId' => 1, 'ProductId' => 2, 'Quantity' => 3, 'UnitCost' => 4, 'DateReceived' => 5, 'PostedToInventory' => 6, 'InventoryTransactionId' => 7, ],
		self::TYPE_CAMELNAME => ['purchaseOrderDetailId' => 0, 'purchaseOrderId' => 1, 'productId' => 2, 'quantity' => 3, 'unitCost' => 4, 'dateReceived' => 5, 'postedToInventory' => 6, 'inventoryTransactionId' => 7, ],
		self::TYPE_COLNAME => [PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID => 0, PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_ID => 1, PurchaseOrderDetailTableMap::COL_PRODUCT_ID => 2, PurchaseOrderDetailTableMap::COL_QUANTITY => 3, PurchaseOrderDetailTableMap::COL_UNIT_COST => 4, PurchaseOrderDetailTableMap::COL_DATE_RECEIVED => 5, PurchaseOrderDetailTableMap::COL_POSTED_TO_INVENTORY => 6, PurchaseOrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID => 7, ],
		self::TYPE_FIELDNAME => ['purchase_order_detail_id' => 0, 'purchase_order_id' => 1, 'product_id' => 2, 'quantity' => 3, 'unit_cost' => 4, 'date_received' => 5, 'posted_to_inventory' => 6, 'inventory_transaction_id' => 7, ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, ]
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
		self::TYPE_PHPNAME => ['PurchaseOrderDetailId', 'PurchaseOrderId', 'ProductId', 'Quantity', 'UnitCost', 'DateReceived', 'PostedToInventory', 'InventoryTransactionId', ],
		self::TYPE_CAMELNAME => ['purchaseOrderDetailId', 'purchaseOrderId', 'productId', 'quantity', 'unitCost', 'dateReceived', 'postedToInventory', 'inventoryTransactionId', ],
		self::TYPE_COLNAME => [PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID, PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_ID, PurchaseOrderDetailTableMap::COL_PRODUCT_ID, PurchaseOrderDetailTableMap::COL_QUANTITY, PurchaseOrderDetailTableMap::COL_UNIT_COST, PurchaseOrderDetailTableMap::COL_DATE_RECEIVED, PurchaseOrderDetailTableMap::COL_POSTED_TO_INVENTORY, PurchaseOrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID, ],
		self::TYPE_FIELDNAME => ['purchase_order_detail_id', 'purchase_order_id', 'product_id', 'quantity', 'unit_cost', 'date_received', 'posted_to_inventory', 'inventory_transaction_id', ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'PurchaseOrderDetailId' => 'PURCHASE_ORDER_DETAIL_ID',
		'PurchaseOrderDetail.PurchaseOrderDetailId' => 'PURCHASE_ORDER_DETAIL_ID',
		'purchaseOrderDetailId' => 'PURCHASE_ORDER_DETAIL_ID',
		'purchaseOrderDetail.purchaseOrderDetailId' => 'PURCHASE_ORDER_DETAIL_ID',
		'PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID' => 'PURCHASE_ORDER_DETAIL_ID',
		'COL_PURCHASE_ORDER_DETAIL_ID' => 'PURCHASE_ORDER_DETAIL_ID',
		'purchase_order_detail_id' => 'PURCHASE_ORDER_DETAIL_ID',
		'purchase_order_detail.purchase_order_detail_id' => 'PURCHASE_ORDER_DETAIL_ID',
		'PurchaseOrderId' => 'PURCHASE_ORDER_ID',
		'PurchaseOrderDetail.PurchaseOrderId' => 'PURCHASE_ORDER_ID',
		'purchaseOrderId' => 'PURCHASE_ORDER_ID',
		'purchaseOrderDetail.purchaseOrderId' => 'PURCHASE_ORDER_ID',
		'PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_ID' => 'PURCHASE_ORDER_ID',
		'COL_PURCHASE_ORDER_ID' => 'PURCHASE_ORDER_ID',
		'purchase_order_id' => 'PURCHASE_ORDER_ID',
		'purchase_order_detail.purchase_order_id' => 'PURCHASE_ORDER_ID',
		'ProductId' => 'PRODUCT_ID',
		'PurchaseOrderDetail.ProductId' => 'PRODUCT_ID',
		'productId' => 'PRODUCT_ID',
		'purchaseOrderDetail.productId' => 'PRODUCT_ID',
		'PurchaseOrderDetailTableMap::COL_PRODUCT_ID' => 'PRODUCT_ID',
		'COL_PRODUCT_ID' => 'PRODUCT_ID',
		'product_id' => 'PRODUCT_ID',
		'purchase_order_detail.product_id' => 'PRODUCT_ID',
		'Quantity' => 'QUANTITY',
		'PurchaseOrderDetail.Quantity' => 'QUANTITY',
		'quantity' => 'QUANTITY',
		'purchaseOrderDetail.quantity' => 'QUANTITY',
		'PurchaseOrderDetailTableMap::COL_QUANTITY' => 'QUANTITY',
		'COL_QUANTITY' => 'QUANTITY',
		'purchase_order_detail.quantity' => 'QUANTITY',
		'UnitCost' => 'UNIT_COST',
		'PurchaseOrderDetail.UnitCost' => 'UNIT_COST',
		'unitCost' => 'UNIT_COST',
		'purchaseOrderDetail.unitCost' => 'UNIT_COST',
		'PurchaseOrderDetailTableMap::COL_UNIT_COST' => 'UNIT_COST',
		'COL_UNIT_COST' => 'UNIT_COST',
		'unit_cost' => 'UNIT_COST',
		'purchase_order_detail.unit_cost' => 'UNIT_COST',
		'DateReceived' => 'DATE_RECEIVED',
		'PurchaseOrderDetail.DateReceived' => 'DATE_RECEIVED',
		'dateReceived' => 'DATE_RECEIVED',
		'purchaseOrderDetail.dateReceived' => 'DATE_RECEIVED',
		'PurchaseOrderDetailTableMap::COL_DATE_RECEIVED' => 'DATE_RECEIVED',
		'COL_DATE_RECEIVED' => 'DATE_RECEIVED',
		'date_received' => 'DATE_RECEIVED',
		'purchase_order_detail.date_received' => 'DATE_RECEIVED',
		'PostedToInventory' => 'POSTED_TO_INVENTORY',
		'PurchaseOrderDetail.PostedToInventory' => 'POSTED_TO_INVENTORY',
		'postedToInventory' => 'POSTED_TO_INVENTORY',
		'purchaseOrderDetail.postedToInventory' => 'POSTED_TO_INVENTORY',
		'PurchaseOrderDetailTableMap::COL_POSTED_TO_INVENTORY' => 'POSTED_TO_INVENTORY',
		'COL_POSTED_TO_INVENTORY' => 'POSTED_TO_INVENTORY',
		'posted_to_inventory' => 'POSTED_TO_INVENTORY',
		'purchase_order_detail.posted_to_inventory' => 'POSTED_TO_INVENTORY',
		'InventoryTransactionId' => 'INVENTORY_TRANSACTION_ID',
		'PurchaseOrderDetail.InventoryTransactionId' => 'INVENTORY_TRANSACTION_ID',
		'inventoryTransactionId' => 'INVENTORY_TRANSACTION_ID',
		'purchaseOrderDetail.inventoryTransactionId' => 'INVENTORY_TRANSACTION_ID',
		'PurchaseOrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID' => 'INVENTORY_TRANSACTION_ID',
		'COL_INVENTORY_TRANSACTION_ID' => 'INVENTORY_TRANSACTION_ID',
		'inventory_transaction_id' => 'INVENTORY_TRANSACTION_ID',
		'purchase_order_detail.inventory_transaction_id' => 'INVENTORY_TRANSACTION_ID',
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
			$criteria->addSelectColumn(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID);
			$criteria->addSelectColumn(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_ID);
			$criteria->addSelectColumn(PurchaseOrderDetailTableMap::COL_PRODUCT_ID);
			$criteria->addSelectColumn(PurchaseOrderDetailTableMap::COL_QUANTITY);
			$criteria->addSelectColumn(PurchaseOrderDetailTableMap::COL_UNIT_COST);
			$criteria->addSelectColumn(PurchaseOrderDetailTableMap::COL_DATE_RECEIVED);
			$criteria->addSelectColumn(PurchaseOrderDetailTableMap::COL_POSTED_TO_INVENTORY);
			$criteria->addSelectColumn(PurchaseOrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID);
		} else {
			$criteria->addSelectColumn($alias . '.purchase_order_detail_id');
			$criteria->addSelectColumn($alias . '.purchase_order_id');
			$criteria->addSelectColumn($alias . '.product_id');
			$criteria->addSelectColumn($alias . '.quantity');
			$criteria->addSelectColumn($alias . '.unit_cost');
			$criteria->addSelectColumn($alias . '.date_received');
			$criteria->addSelectColumn($alias . '.posted_to_inventory');
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
	 * Performs a DELETE on the database, given a PurchaseOrderDetail or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or PurchaseOrderDetail object or primary key or array of primary keys
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
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderDetailTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\PurchaseOrderDetail) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(PurchaseOrderDetailTableMap::DATABASE_NAME);
			$criteria->add(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID, (array)$values, Criteria::IN);
		}

		$query = PurchaseOrderDetailQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			PurchaseOrderDetailTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				PurchaseOrderDetailTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the purchase_order_detail table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return PurchaseOrderDetailQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a PurchaseOrderDetail or Criteria object.
	 *
	 * @param mixed $criteria Criteria or PurchaseOrderDetail object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderDetailTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from PurchaseOrderDetail object
		}

		if ($criteria->containsKey(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID) && $criteria->keyContainsValue(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID . ')');
		}


		// Set the correct dbName
		$query = PurchaseOrderDetailQuery::create()->mergeWith($criteria);

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
		return $withPrefix ? PurchaseOrderDetailTableMap::CLASS_DEFAULT : PurchaseOrderDetailTableMap::OM_CLASS;
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
				: self::translateFieldName('PurchaseOrderDetailId', TableMap::TYPE_PHPNAME, $indexType)
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
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PurchaseOrderDetailId', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PurchaseOrderDetailId', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PurchaseOrderDetailId', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PurchaseOrderDetailId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PurchaseOrderDetailId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PurchaseOrderDetailId', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(PurchaseOrderDetailTableMap::DATABASE_NAME)->getTable(PurchaseOrderDetailTableMap::TABLE_NAME);
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
		$this->setName('purchase_order_detail');
		$this->setPhpName('PurchaseOrderDetail');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\PurchaseOrderDetail');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('purchase_order_detail_id', 'PurchaseOrderDetailId', 'INTEGER', true, null, null);
		$this->addColumn('purchase_order_id', 'PurchaseOrderId', 'INTEGER', true, null, null);
		$this->addColumn('product_id', 'ProductId', 'INTEGER', false, null, null);
		$this->addColumn('quantity', 'Quantity', 'DECIMAL', true, 18, null);
		$this->addColumn('unit_cost', 'UnitCost', 'DECIMAL', true, 19, null);
		$this->addColumn('date_received', 'DateReceived', 'DATETIME', false, null, null);
		$this->addColumn('posted_to_inventory', 'PostedToInventory', 'INTEGER', true, null, 0);
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
	 * @return array (PurchaseOrderDetail object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = PurchaseOrderDetailTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = PurchaseOrderDetailTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + PurchaseOrderDetailTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = PurchaseOrderDetailTableMap::OM_CLASS;
			/** @var PurchaseOrderDetail $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			PurchaseOrderDetailTableMap::addInstanceToPool($obj, $key);
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
			$key = PurchaseOrderDetailTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = PurchaseOrderDetailTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var PurchaseOrderDetail $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				PurchaseOrderDetailTableMap::addInstanceToPool($obj, $key);
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
			$criteria->removeSelectColumn(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID);
			$criteria->removeSelectColumn(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_ID);
			$criteria->removeSelectColumn(PurchaseOrderDetailTableMap::COL_PRODUCT_ID);
			$criteria->removeSelectColumn(PurchaseOrderDetailTableMap::COL_QUANTITY);
			$criteria->removeSelectColumn(PurchaseOrderDetailTableMap::COL_UNIT_COST);
			$criteria->removeSelectColumn(PurchaseOrderDetailTableMap::COL_DATE_RECEIVED);
			$criteria->removeSelectColumn(PurchaseOrderDetailTableMap::COL_POSTED_TO_INVENTORY);
			$criteria->removeSelectColumn(PurchaseOrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID);
		} else {
			$criteria->removeSelectColumn($alias . '.purchase_order_detail_id');
			$criteria->removeSelectColumn($alias . '.purchase_order_id');
			$criteria->removeSelectColumn($alias . '.product_id');
			$criteria->removeSelectColumn($alias . '.quantity');
			$criteria->removeSelectColumn($alias . '.unit_cost');
			$criteria->removeSelectColumn($alias . '.date_received');
			$criteria->removeSelectColumn($alias . '.posted_to_inventory');
			$criteria->removeSelectColumn($alias . '.inventory_transaction_id');
		}
	}
}
