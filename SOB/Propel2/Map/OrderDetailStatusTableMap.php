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
use SOB\Propel2\OrderDetailStatus;
use SOB\Propel2\OrderDetailStatusQuery;

/**
 * This class defines the structure of the 'order_detail_status' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class OrderDetailStatusTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.OrderDetailStatus';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.OrderDetailStatusTableMap';

	/**
	 * the column name for the order_detail_status_id field
	 */
	public const COL_ORDER_DETAIL_STATUS_ID = 'order_detail_status.order_detail_status_id';

	/**
	 * the column name for the order_detail_status_name field
	 */
	public const COL_ORDER_DETAIL_STATUS_NAME = 'order_detail_status.order_detail_status_name';

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
	public const NUM_COLUMNS = 2;

	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	public const NUM_HYDRATE_COLUMNS = 2;

	/**
	 * The number of lazy-loaded columns
	 */
	public const NUM_LAZY_LOAD_COLUMNS = 0;

	/**
	 * The related Propel class for this table
	 */
	public const OM_CLASS = '\\SOB\\Propel2\\OrderDetailStatus';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'order_detail_status';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'OrderDetailStatus';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['OrderDetailStatusId' => 0, 'OrderDetailStatusName' => 1, ],
		self::TYPE_CAMELNAME => ['orderDetailStatusId' => 0, 'orderDetailStatusName' => 1, ],
		self::TYPE_COLNAME => [OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_ID => 0, OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_NAME => 1, ],
		self::TYPE_FIELDNAME => ['order_detail_status_id' => 0, 'order_detail_status_name' => 1, ],
		self::TYPE_NUM => [0, 1, ]
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
		self::TYPE_PHPNAME => ['OrderDetailStatusId', 'OrderDetailStatusName', ],
		self::TYPE_CAMELNAME => ['orderDetailStatusId', 'orderDetailStatusName', ],
		self::TYPE_COLNAME => [OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_ID, OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_NAME, ],
		self::TYPE_FIELDNAME => ['order_detail_status_id', 'order_detail_status_name', ],
		self::TYPE_NUM => [0, 1, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'OrderDetailStatusId' => 'ORDER_DETAIL_STATUS_ID',
		'OrderDetailStatus.OrderDetailStatusId' => 'ORDER_DETAIL_STATUS_ID',
		'orderDetailStatusId' => 'ORDER_DETAIL_STATUS_ID',
		'orderDetailStatus.orderDetailStatusId' => 'ORDER_DETAIL_STATUS_ID',
		'OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_ID' => 'ORDER_DETAIL_STATUS_ID',
		'COL_ORDER_DETAIL_STATUS_ID' => 'ORDER_DETAIL_STATUS_ID',
		'order_detail_status_id' => 'ORDER_DETAIL_STATUS_ID',
		'order_detail_status.order_detail_status_id' => 'ORDER_DETAIL_STATUS_ID',
		'OrderDetailStatusName' => 'ORDER_DETAIL_STATUS_NAME',
		'OrderDetailStatus.OrderDetailStatusName' => 'ORDER_DETAIL_STATUS_NAME',
		'orderDetailStatusName' => 'ORDER_DETAIL_STATUS_NAME',
		'orderDetailStatus.orderDetailStatusName' => 'ORDER_DETAIL_STATUS_NAME',
		'OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_NAME' => 'ORDER_DETAIL_STATUS_NAME',
		'COL_ORDER_DETAIL_STATUS_NAME' => 'ORDER_DETAIL_STATUS_NAME',
		'order_detail_status_name' => 'ORDER_DETAIL_STATUS_NAME',
		'order_detail_status.order_detail_status_name' => 'ORDER_DETAIL_STATUS_NAME',
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
			$criteria->addSelectColumn(OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_ID);
			$criteria->addSelectColumn(OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_NAME);
		} else {
			$criteria->addSelectColumn($alias . '.order_detail_status_id');
			$criteria->addSelectColumn($alias . '.order_detail_status_name');
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
	 * Performs a DELETE on the database, given a OrderDetailStatus or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or OrderDetailStatus object or primary key or array of primary keys
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
			$con = Propel::getServiceContainer()->getWriteConnection(OrderDetailStatusTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\OrderDetailStatus) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(OrderDetailStatusTableMap::DATABASE_NAME);
			$criteria->add(OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_ID, (array)$values, Criteria::IN);
		}

		$query = OrderDetailStatusQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			OrderDetailStatusTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				OrderDetailStatusTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the order_detail_status table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return OrderDetailStatusQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a OrderDetailStatus or Criteria object.
	 *
	 * @param mixed $criteria Criteria or OrderDetailStatus object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(OrderDetailStatusTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from OrderDetailStatus object
		}


		// Set the correct dbName
		$query = OrderDetailStatusQuery::create()->mergeWith($criteria);

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
		return $withPrefix ? OrderDetailStatusTableMap::CLASS_DEFAULT : OrderDetailStatusTableMap::OM_CLASS;
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
				: self::translateFieldName('OrderDetailStatusId', TableMap::TYPE_PHPNAME, $indexType)
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
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderDetailStatusId', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderDetailStatusId', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderDetailStatusId', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderDetailStatusId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderDetailStatusId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('OrderDetailStatusId', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(OrderDetailStatusTableMap::DATABASE_NAME)->getTable(OrderDetailStatusTableMap::TABLE_NAME);
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
		$this->setName('order_detail_status');
		$this->setPhpName('OrderDetailStatus');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\OrderDetailStatus');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('order_detail_status_id', 'OrderDetailStatusId', 'INTEGER', true, null, null);
		$this->addColumn('order_detail_status_name', 'OrderDetailStatusName', 'VARCHAR', true, 50, null);
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
	 * @return array (OrderDetailStatus object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = OrderDetailStatusTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = OrderDetailStatusTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + OrderDetailStatusTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = OrderDetailStatusTableMap::OM_CLASS;
			/** @var OrderDetailStatus $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			OrderDetailStatusTableMap::addInstanceToPool($obj, $key);
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
			$key = OrderDetailStatusTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = OrderDetailStatusTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var OrderDetailStatus $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				OrderDetailStatusTableMap::addInstanceToPool($obj, $key);
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
			$criteria->removeSelectColumn(OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_ID);
			$criteria->removeSelectColumn(OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_NAME);
		} else {
			$criteria->removeSelectColumn($alias . '.order_detail_status_id');
			$criteria->removeSelectColumn($alias . '.order_detail_status_name');
		}
	}
}
