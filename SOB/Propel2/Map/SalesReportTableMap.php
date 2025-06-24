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
use SOB\Propel2\SalesReport;
use SOB\Propel2\SalesReportQuery;

/**
 * This class defines the structure of the 'sales_report' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SalesReportTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.SalesReport';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.SalesReportTableMap';

	/**
	 * the column name for the default field
	 */
	public const COL_DEFAULT = 'sales_report.default';

	/**
	 * the column name for the display field
	 */
	public const COL_DISPLAY = 'sales_report.display';

	/**
	 * the column name for the filter_row_source field
	 */
	public const COL_FILTER_ROW_SOURCE = 'sales_report.filter_row_source';

	/**
	 * the column name for the group_by field
	 */
	public const COL_GROUP_BY = 'sales_report.group_by';

	/**
	 * the column name for the title field
	 */
	public const COL_TITLE = 'sales_report.title';

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
	public const NUM_COLUMNS = 5;

	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	public const NUM_HYDRATE_COLUMNS = 5;

	/**
	 * The number of lazy-loaded columns
	 */
	public const NUM_LAZY_LOAD_COLUMNS = 0;

	/**
	 * The related Propel class for this table
	 */
	public const OM_CLASS = '\\SOB\\Propel2\\SalesReport';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'sales_report';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'SalesReport';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['GroupBy' => 0, 'Display' => 1, 'Title' => 2, 'FilterRowSource' => 3, 'Default' => 4, ],
		self::TYPE_CAMELNAME => ['groupBy' => 0, 'display' => 1, 'title' => 2, 'filterRowSource' => 3, 'default' => 4, ],
		self::TYPE_COLNAME => [SalesReportTableMap::COL_GROUP_BY => 0, SalesReportTableMap::COL_DISPLAY => 1, SalesReportTableMap::COL_TITLE => 2, SalesReportTableMap::COL_FILTER_ROW_SOURCE => 3, SalesReportTableMap::COL_DEFAULT => 4, ],
		self::TYPE_FIELDNAME => ['group_by' => 0, 'display' => 1, 'title' => 2, 'filter_row_source' => 3, 'default' => 4, ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, ]
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
		self::TYPE_PHPNAME => ['GroupBy', 'Display', 'Title', 'FilterRowSource', 'Default', ],
		self::TYPE_CAMELNAME => ['groupBy', 'display', 'title', 'filterRowSource', 'default', ],
		self::TYPE_COLNAME => [SalesReportTableMap::COL_GROUP_BY, SalesReportTableMap::COL_DISPLAY, SalesReportTableMap::COL_TITLE, SalesReportTableMap::COL_FILTER_ROW_SOURCE, SalesReportTableMap::COL_DEFAULT, ],
		self::TYPE_FIELDNAME => ['group_by', 'display', 'title', 'filter_row_source', 'default', ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'GroupBy' => 'GROUP_BY',
		'SalesReport.GroupBy' => 'GROUP_BY',
		'groupBy' => 'GROUP_BY',
		'salesReport.groupBy' => 'GROUP_BY',
		'SalesReportTableMap::COL_GROUP_BY' => 'GROUP_BY',
		'COL_GROUP_BY' => 'GROUP_BY',
		'group_by' => 'GROUP_BY',
		'sales_report.group_by' => 'GROUP_BY',
		'Display' => 'DISPLAY',
		'SalesReport.Display' => 'DISPLAY',
		'display' => 'DISPLAY',
		'salesReport.display' => 'DISPLAY',
		'SalesReportTableMap::COL_DISPLAY' => 'DISPLAY',
		'COL_DISPLAY' => 'DISPLAY',
		'sales_report.display' => 'DISPLAY',
		'Title' => 'TITLE',
		'SalesReport.Title' => 'TITLE',
		'title' => 'TITLE',
		'salesReport.title' => 'TITLE',
		'SalesReportTableMap::COL_TITLE' => 'TITLE',
		'COL_TITLE' => 'TITLE',
		'sales_report.title' => 'TITLE',
		'FilterRowSource' => 'FILTER_ROW_SOURCE',
		'SalesReport.FilterRowSource' => 'FILTER_ROW_SOURCE',
		'filterRowSource' => 'FILTER_ROW_SOURCE',
		'salesReport.filterRowSource' => 'FILTER_ROW_SOURCE',
		'SalesReportTableMap::COL_FILTER_ROW_SOURCE' => 'FILTER_ROW_SOURCE',
		'COL_FILTER_ROW_SOURCE' => 'FILTER_ROW_SOURCE',
		'filter_row_source' => 'FILTER_ROW_SOURCE',
		'sales_report.filter_row_source' => 'FILTER_ROW_SOURCE',
		'Default' => 'DEFAULT',
		'SalesReport.Default' => 'DEFAULT',
		'default' => 'DEFAULT',
		'salesReport.default' => 'DEFAULT',
		'SalesReportTableMap::COL_DEFAULT' => 'DEFAULT',
		'COL_DEFAULT' => 'DEFAULT',
		'sales_report.default' => 'DEFAULT',
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
			$criteria->addSelectColumn(SalesReportTableMap::COL_GROUP_BY);
			$criteria->addSelectColumn(SalesReportTableMap::COL_DISPLAY);
			$criteria->addSelectColumn(SalesReportTableMap::COL_TITLE);
			$criteria->addSelectColumn(SalesReportTableMap::COL_FILTER_ROW_SOURCE);
			$criteria->addSelectColumn(SalesReportTableMap::COL_DEFAULT);
		} else {
			$criteria->addSelectColumn($alias . '.group_by');
			$criteria->addSelectColumn($alias . '.display');
			$criteria->addSelectColumn($alias . '.title');
			$criteria->addSelectColumn($alias . '.filter_row_source');
			$criteria->addSelectColumn($alias . '.default');
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
	 * Performs a DELETE on the database, given a SalesReport or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or SalesReport object or primary key or array of primary keys
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
			$con = Propel::getServiceContainer()->getWriteConnection(SalesReportTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\SalesReport) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(SalesReportTableMap::DATABASE_NAME);
			$criteria->add(SalesReportTableMap::COL_GROUP_BY, (array)$values, Criteria::IN);
		}

		$query = SalesReportQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			SalesReportTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				SalesReportTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the sales_report table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return SalesReportQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a SalesReport or Criteria object.
	 *
	 * @param mixed $criteria Criteria or SalesReport object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(SalesReportTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from SalesReport object
		}


		// Set the correct dbName
		$query = SalesReportQuery::create()->mergeWith($criteria);

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
		return $withPrefix ? SalesReportTableMap::CLASS_DEFAULT : SalesReportTableMap::OM_CLASS;
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
		return (string)$row[
			TableMap::TYPE_NUM == $indexType
				? 0 + $offset
				: self::translateFieldName('GroupBy', TableMap::TYPE_PHPNAME, $indexType)
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
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GroupBy', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GroupBy', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GroupBy', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GroupBy', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GroupBy', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('GroupBy', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(SalesReportTableMap::DATABASE_NAME)->getTable(SalesReportTableMap::TABLE_NAME);
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
		$this->setName('sales_report');
		$this->setPhpName('SalesReport');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\SalesReport');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(false);
		// columns
		$this->addPrimaryKey('group_by', 'GroupBy', 'VARCHAR', true, 50, null);
		$this->addColumn('display', 'Display', 'VARCHAR', false, 50, null);
		$this->addColumn('title', 'Title', 'VARCHAR', false, 50, null);
		$this->addColumn('filter_row_source', 'FilterRowSource', 'CLOB', false, null, null);
		$this->addColumn('default', 'Default', 'INTEGER', true, null, 0);
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
	 * @return array (SalesReport object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = SalesReportTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = SalesReportTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + SalesReportTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = SalesReportTableMap::OM_CLASS;
			/** @var SalesReport $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			SalesReportTableMap::addInstanceToPool($obj, $key);
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
			$key = SalesReportTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = SalesReportTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var SalesReport $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				SalesReportTableMap::addInstanceToPool($obj, $key);
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
			$criteria->removeSelectColumn(SalesReportTableMap::COL_GROUP_BY);
			$criteria->removeSelectColumn(SalesReportTableMap::COL_DISPLAY);
			$criteria->removeSelectColumn(SalesReportTableMap::COL_TITLE);
			$criteria->removeSelectColumn(SalesReportTableMap::COL_FILTER_ROW_SOURCE);
			$criteria->removeSelectColumn(SalesReportTableMap::COL_DEFAULT);
		} else {
			$criteria->removeSelectColumn($alias . '.group_by');
			$criteria->removeSelectColumn($alias . '.display');
			$criteria->removeSelectColumn($alias . '.title');
			$criteria->removeSelectColumn($alias . '.filter_row_source');
			$criteria->removeSelectColumn($alias . '.default');
		}
	}
}
