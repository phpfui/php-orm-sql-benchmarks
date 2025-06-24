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
use SOB\Propel2\InventoryTransaction;
use SOB\Propel2\InventoryTransactionQuery;

/**
 * This class defines the structure of the 'inventory_transaction' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class InventoryTransactionTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.InventoryTransaction';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.InventoryTransactionTableMap';

	/**
	 * the column name for the comments field
	 */
	public const COL_COMMENTS = 'inventory_transaction.comments';

	/**
	 * the column name for the inventory_transaction_id field
	 */
	public const COL_INVENTORY_TRANSACTION_ID = 'inventory_transaction.inventory_transaction_id';

	/**
	 * the column name for the inventory_transaction_type_id field
	 */
	public const COL_INVENTORY_TRANSACTION_TYPE_ID = 'inventory_transaction.inventory_transaction_type_id';

	/**
	 * the column name for the order_id field
	 */
	public const COL_ORDER_ID = 'inventory_transaction.order_id';

	/**
	 * the column name for the product_id field
	 */
	public const COL_PRODUCT_ID = 'inventory_transaction.product_id';

	/**
	 * the column name for the purchase_order_id field
	 */
	public const COL_PURCHASE_ORDER_ID = 'inventory_transaction.purchase_order_id';

	/**
	 * the column name for the quantity field
	 */
	public const COL_QUANTITY = 'inventory_transaction.quantity';

	/**
	 * the column name for the transaction_created_date field
	 */
	public const COL_TRANSACTION_CREATED_DATE = 'inventory_transaction.transaction_created_date';

	/**
	 * the column name for the transaction_modified_date field
	 */
	public const COL_TRANSACTION_MODIFIED_DATE = 'inventory_transaction.transaction_modified_date';

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
	public const NUM_COLUMNS = 9;

	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	public const NUM_HYDRATE_COLUMNS = 9;

	/**
	 * The number of lazy-loaded columns
	 */
	public const NUM_LAZY_LOAD_COLUMNS = 0;

	/**
	 * The related Propel class for this table
	 */
	public const OM_CLASS = '\\SOB\\Propel2\\InventoryTransaction';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'inventory_transaction';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'InventoryTransaction';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['InventoryTransactionId' => 0, 'InventoryTransactionTypeId' => 1, 'TransactionCreatedDate' => 2, 'TransactionModifiedDate' => 3, 'ProductId' => 4, 'Quantity' => 5, 'PurchaseOrderId' => 6, 'OrderId' => 7, 'Comments' => 8, ],
		self::TYPE_CAMELNAME => ['inventoryTransactionId' => 0, 'inventoryTransactionTypeId' => 1, 'transactionCreatedDate' => 2, 'transactionModifiedDate' => 3, 'productId' => 4, 'quantity' => 5, 'purchaseOrderId' => 6, 'orderId' => 7, 'comments' => 8, ],
		self::TYPE_COLNAME => [InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID => 0, InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID => 1, InventoryTransactionTableMap::COL_TRANSACTION_CREATED_DATE => 2, InventoryTransactionTableMap::COL_TRANSACTION_MODIFIED_DATE => 3, InventoryTransactionTableMap::COL_PRODUCT_ID => 4, InventoryTransactionTableMap::COL_QUANTITY => 5, InventoryTransactionTableMap::COL_PURCHASE_ORDER_ID => 6, InventoryTransactionTableMap::COL_ORDER_ID => 7, InventoryTransactionTableMap::COL_COMMENTS => 8, ],
		self::TYPE_FIELDNAME => ['inventory_transaction_id' => 0, 'inventory_transaction_type_id' => 1, 'transaction_created_date' => 2, 'transaction_modified_date' => 3, 'product_id' => 4, 'quantity' => 5, 'purchase_order_id' => 6, 'order_id' => 7, 'comments' => 8, ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, ]
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
		self::TYPE_PHPNAME => ['InventoryTransactionId', 'InventoryTransactionTypeId', 'TransactionCreatedDate', 'TransactionModifiedDate', 'ProductId', 'Quantity', 'PurchaseOrderId', 'OrderId', 'Comments', ],
		self::TYPE_CAMELNAME => ['inventoryTransactionId', 'inventoryTransactionTypeId', 'transactionCreatedDate', 'transactionModifiedDate', 'productId', 'quantity', 'purchaseOrderId', 'orderId', 'comments', ],
		self::TYPE_COLNAME => [InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID, InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID, InventoryTransactionTableMap::COL_TRANSACTION_CREATED_DATE, InventoryTransactionTableMap::COL_TRANSACTION_MODIFIED_DATE, InventoryTransactionTableMap::COL_PRODUCT_ID, InventoryTransactionTableMap::COL_QUANTITY, InventoryTransactionTableMap::COL_PURCHASE_ORDER_ID, InventoryTransactionTableMap::COL_ORDER_ID, InventoryTransactionTableMap::COL_COMMENTS, ],
		self::TYPE_FIELDNAME => ['inventory_transaction_id', 'inventory_transaction_type_id', 'transaction_created_date', 'transaction_modified_date', 'product_id', 'quantity', 'purchase_order_id', 'order_id', 'comments', ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'InventoryTransactionId' => 'INVENTORY_TRANSACTION_ID',
		'InventoryTransaction.InventoryTransactionId' => 'INVENTORY_TRANSACTION_ID',
		'inventoryTransactionId' => 'INVENTORY_TRANSACTION_ID',
		'inventoryTransaction.inventoryTransactionId' => 'INVENTORY_TRANSACTION_ID',
		'InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID' => 'INVENTORY_TRANSACTION_ID',
		'COL_INVENTORY_TRANSACTION_ID' => 'INVENTORY_TRANSACTION_ID',
		'inventory_transaction_id' => 'INVENTORY_TRANSACTION_ID',
		'inventory_transaction.inventory_transaction_id' => 'INVENTORY_TRANSACTION_ID',
		'InventoryTransactionTypeId' => 'INVENTORY_TRANSACTION_TYPE_ID',
		'InventoryTransaction.InventoryTransactionTypeId' => 'INVENTORY_TRANSACTION_TYPE_ID',
		'inventoryTransactionTypeId' => 'INVENTORY_TRANSACTION_TYPE_ID',
		'inventoryTransaction.inventoryTransactionTypeId' => 'INVENTORY_TRANSACTION_TYPE_ID',
		'InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID' => 'INVENTORY_TRANSACTION_TYPE_ID',
		'COL_INVENTORY_TRANSACTION_TYPE_ID' => 'INVENTORY_TRANSACTION_TYPE_ID',
		'inventory_transaction_type_id' => 'INVENTORY_TRANSACTION_TYPE_ID',
		'inventory_transaction.inventory_transaction_type_id' => 'INVENTORY_TRANSACTION_TYPE_ID',
		'TransactionCreatedDate' => 'TRANSACTION_CREATED_DATE',
		'InventoryTransaction.TransactionCreatedDate' => 'TRANSACTION_CREATED_DATE',
		'transactionCreatedDate' => 'TRANSACTION_CREATED_DATE',
		'inventoryTransaction.transactionCreatedDate' => 'TRANSACTION_CREATED_DATE',
		'InventoryTransactionTableMap::COL_TRANSACTION_CREATED_DATE' => 'TRANSACTION_CREATED_DATE',
		'COL_TRANSACTION_CREATED_DATE' => 'TRANSACTION_CREATED_DATE',
		'transaction_created_date' => 'TRANSACTION_CREATED_DATE',
		'inventory_transaction.transaction_created_date' => 'TRANSACTION_CREATED_DATE',
		'TransactionModifiedDate' => 'TRANSACTION_MODIFIED_DATE',
		'InventoryTransaction.TransactionModifiedDate' => 'TRANSACTION_MODIFIED_DATE',
		'transactionModifiedDate' => 'TRANSACTION_MODIFIED_DATE',
		'inventoryTransaction.transactionModifiedDate' => 'TRANSACTION_MODIFIED_DATE',
		'InventoryTransactionTableMap::COL_TRANSACTION_MODIFIED_DATE' => 'TRANSACTION_MODIFIED_DATE',
		'COL_TRANSACTION_MODIFIED_DATE' => 'TRANSACTION_MODIFIED_DATE',
		'transaction_modified_date' => 'TRANSACTION_MODIFIED_DATE',
		'inventory_transaction.transaction_modified_date' => 'TRANSACTION_MODIFIED_DATE',
		'ProductId' => 'PRODUCT_ID',
		'InventoryTransaction.ProductId' => 'PRODUCT_ID',
		'productId' => 'PRODUCT_ID',
		'inventoryTransaction.productId' => 'PRODUCT_ID',
		'InventoryTransactionTableMap::COL_PRODUCT_ID' => 'PRODUCT_ID',
		'COL_PRODUCT_ID' => 'PRODUCT_ID',
		'product_id' => 'PRODUCT_ID',
		'inventory_transaction.product_id' => 'PRODUCT_ID',
		'Quantity' => 'QUANTITY',
		'InventoryTransaction.Quantity' => 'QUANTITY',
		'quantity' => 'QUANTITY',
		'inventoryTransaction.quantity' => 'QUANTITY',
		'InventoryTransactionTableMap::COL_QUANTITY' => 'QUANTITY',
		'COL_QUANTITY' => 'QUANTITY',
		'inventory_transaction.quantity' => 'QUANTITY',
		'PurchaseOrderId' => 'PURCHASE_ORDER_ID',
		'InventoryTransaction.PurchaseOrderId' => 'PURCHASE_ORDER_ID',
		'purchaseOrderId' => 'PURCHASE_ORDER_ID',
		'inventoryTransaction.purchaseOrderId' => 'PURCHASE_ORDER_ID',
		'InventoryTransactionTableMap::COL_PURCHASE_ORDER_ID' => 'PURCHASE_ORDER_ID',
		'COL_PURCHASE_ORDER_ID' => 'PURCHASE_ORDER_ID',
		'purchase_order_id' => 'PURCHASE_ORDER_ID',
		'inventory_transaction.purchase_order_id' => 'PURCHASE_ORDER_ID',
		'OrderId' => 'ORDER_ID',
		'InventoryTransaction.OrderId' => 'ORDER_ID',
		'orderId' => 'ORDER_ID',
		'inventoryTransaction.orderId' => 'ORDER_ID',
		'InventoryTransactionTableMap::COL_ORDER_ID' => 'ORDER_ID',
		'COL_ORDER_ID' => 'ORDER_ID',
		'order_id' => 'ORDER_ID',
		'inventory_transaction.order_id' => 'ORDER_ID',
		'Comments' => 'COMMENTS',
		'InventoryTransaction.Comments' => 'COMMENTS',
		'comments' => 'COMMENTS',
		'inventoryTransaction.comments' => 'COMMENTS',
		'InventoryTransactionTableMap::COL_COMMENTS' => 'COMMENTS',
		'COL_COMMENTS' => 'COMMENTS',
		'inventory_transaction.comments' => 'COMMENTS',
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
			$criteria->addSelectColumn(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID);
			$criteria->addSelectColumn(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID);
			$criteria->addSelectColumn(InventoryTransactionTableMap::COL_TRANSACTION_CREATED_DATE);
			$criteria->addSelectColumn(InventoryTransactionTableMap::COL_TRANSACTION_MODIFIED_DATE);
			$criteria->addSelectColumn(InventoryTransactionTableMap::COL_PRODUCT_ID);
			$criteria->addSelectColumn(InventoryTransactionTableMap::COL_QUANTITY);
			$criteria->addSelectColumn(InventoryTransactionTableMap::COL_PURCHASE_ORDER_ID);
			$criteria->addSelectColumn(InventoryTransactionTableMap::COL_ORDER_ID);
			$criteria->addSelectColumn(InventoryTransactionTableMap::COL_COMMENTS);
		} else {
			$criteria->addSelectColumn($alias . '.inventory_transaction_id');
			$criteria->addSelectColumn($alias . '.inventory_transaction_type_id');
			$criteria->addSelectColumn($alias . '.transaction_created_date');
			$criteria->addSelectColumn($alias . '.transaction_modified_date');
			$criteria->addSelectColumn($alias . '.product_id');
			$criteria->addSelectColumn($alias . '.quantity');
			$criteria->addSelectColumn($alias . '.purchase_order_id');
			$criteria->addSelectColumn($alias . '.order_id');
			$criteria->addSelectColumn($alias . '.comments');
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
	 * Performs a DELETE on the database, given a InventoryTransaction or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or InventoryTransaction object or primary key or array of primary keys
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
			$con = Propel::getServiceContainer()->getWriteConnection(InventoryTransactionTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\InventoryTransaction) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(InventoryTransactionTableMap::DATABASE_NAME);
			$criteria->add(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID, (array)$values, Criteria::IN);
		}

		$query = InventoryTransactionQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			InventoryTransactionTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				InventoryTransactionTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the inventory_transaction table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return InventoryTransactionQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a InventoryTransaction or Criteria object.
	 *
	 * @param mixed $criteria Criteria or InventoryTransaction object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(InventoryTransactionTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from InventoryTransaction object
		}

		if ($criteria->containsKey(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID) && $criteria->keyContainsValue(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID . ')');
		}


		// Set the correct dbName
		$query = InventoryTransactionQuery::create()->mergeWith($criteria);

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
		return $withPrefix ? InventoryTransactionTableMap::CLASS_DEFAULT : InventoryTransactionTableMap::OM_CLASS;
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
				: self::translateFieldName('InventoryTransactionId', TableMap::TYPE_PHPNAME, $indexType)
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
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InventoryTransactionId', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InventoryTransactionId', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InventoryTransactionId', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InventoryTransactionId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InventoryTransactionId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InventoryTransactionId', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(InventoryTransactionTableMap::DATABASE_NAME)->getTable(InventoryTransactionTableMap::TABLE_NAME);
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
		$this->setName('inventory_transaction');
		$this->setPhpName('InventoryTransaction');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\InventoryTransaction');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('inventory_transaction_id', 'InventoryTransactionId', 'INTEGER', true, null, null);
		$this->addColumn('inventory_transaction_type_id', 'InventoryTransactionTypeId', 'INTEGER', true, null, null);
		$this->addColumn('transaction_created_date', 'TransactionCreatedDate', 'DATETIME', true, null, 'CURRENT_TIMESTAMP');
		$this->addColumn('transaction_modified_date', 'TransactionModifiedDate', 'DATETIME', true, null, 'CURRENT_TIMESTAMP');
		$this->addColumn('product_id', 'ProductId', 'INTEGER', true, null, null);
		$this->addColumn('quantity', 'Quantity', 'INTEGER', true, null, null);
		$this->addColumn('purchase_order_id', 'PurchaseOrderId', 'INTEGER', false, null, null);
		$this->addColumn('order_id', 'OrderId', 'INTEGER', false, null, null);
		$this->addColumn('comments', 'Comments', 'VARCHAR', false, 255, null);
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
	 * @return array (InventoryTransaction object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = InventoryTransactionTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = InventoryTransactionTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + InventoryTransactionTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = InventoryTransactionTableMap::OM_CLASS;
			/** @var InventoryTransaction $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			InventoryTransactionTableMap::addInstanceToPool($obj, $key);
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
			$key = InventoryTransactionTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = InventoryTransactionTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var InventoryTransaction $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				InventoryTransactionTableMap::addInstanceToPool($obj, $key);
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
			$criteria->removeSelectColumn(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID);
			$criteria->removeSelectColumn(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID);
			$criteria->removeSelectColumn(InventoryTransactionTableMap::COL_TRANSACTION_CREATED_DATE);
			$criteria->removeSelectColumn(InventoryTransactionTableMap::COL_TRANSACTION_MODIFIED_DATE);
			$criteria->removeSelectColumn(InventoryTransactionTableMap::COL_PRODUCT_ID);
			$criteria->removeSelectColumn(InventoryTransactionTableMap::COL_QUANTITY);
			$criteria->removeSelectColumn(InventoryTransactionTableMap::COL_PURCHASE_ORDER_ID);
			$criteria->removeSelectColumn(InventoryTransactionTableMap::COL_ORDER_ID);
			$criteria->removeSelectColumn(InventoryTransactionTableMap::COL_COMMENTS);
		} else {
			$criteria->removeSelectColumn($alias . '.inventory_transaction_id');
			$criteria->removeSelectColumn($alias . '.inventory_transaction_type_id');
			$criteria->removeSelectColumn($alias . '.transaction_created_date');
			$criteria->removeSelectColumn($alias . '.transaction_modified_date');
			$criteria->removeSelectColumn($alias . '.product_id');
			$criteria->removeSelectColumn($alias . '.quantity');
			$criteria->removeSelectColumn($alias . '.purchase_order_id');
			$criteria->removeSelectColumn($alias . '.order_id');
			$criteria->removeSelectColumn($alias . '.comments');
		}
	}
}
