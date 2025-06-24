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
use SOB\Propel2\Daterecord;
use SOB\Propel2\DaterecordQuery;

/**
 * This class defines the structure of the 'daterecord' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class DaterecordTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.Daterecord';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.DaterecordTableMap';

	/**
	 * the column name for the dateDefaultNotNull field
	 */
	public const COL_DATEDEFAULTNOTNULL = 'daterecord.dateDefaultNotNull';

	/**
	 * the column name for the dateDefaultNull field
	 */
	public const COL_DATEDEFAULTNULL = 'daterecord.dateDefaultNull';

	/**
	 * the column name for the dateDefaultNullable field
	 */
	public const COL_DATEDEFAULTNULLABLE = 'daterecord.dateDefaultNullable';

	/**
	 * the column name for the dateRecordId field
	 */
	public const COL_DATERECORDID = 'daterecord.dateRecordId';

	/**
	 * the column name for the dateRequired field
	 */
	public const COL_DATEREQUIRED = 'daterecord.dateRequired';

	/**
	 * the column name for the timestampDefaultCurrentNotNull field
	 */
	public const COL_TIMESTAMPDEFAULTCURRENTNOTNULL = 'daterecord.timestampDefaultCurrentNotNull';

	/**
	 * the column name for the timestampDefaultCurrentNullable field
	 */
	public const COL_TIMESTAMPDEFAULTCURRENTNULLABLE = 'daterecord.timestampDefaultCurrentNullable';

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
	public const NUM_COLUMNS = 7;

	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	public const NUM_HYDRATE_COLUMNS = 7;

	/**
	 * The number of lazy-loaded columns
	 */
	public const NUM_LAZY_LOAD_COLUMNS = 0;

	/**
	 * The related Propel class for this table
	 */
	public const OM_CLASS = '\\SOB\\Propel2\\Daterecord';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'daterecord';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'Daterecord';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['Daterecordid' => 0, 'Daterequired' => 1, 'Datedefaultnull' => 2, 'Datedefaultnullable' => 3, 'Datedefaultnotnull' => 4, 'Timestampdefaultcurrentnullable' => 5, 'Timestampdefaultcurrentnotnull' => 6, ],
		self::TYPE_CAMELNAME => ['daterecordid' => 0, 'daterequired' => 1, 'datedefaultnull' => 2, 'datedefaultnullable' => 3, 'datedefaultnotnull' => 4, 'timestampdefaultcurrentnullable' => 5, 'timestampdefaultcurrentnotnull' => 6, ],
		self::TYPE_COLNAME => [DaterecordTableMap::COL_DATERECORDID => 0, DaterecordTableMap::COL_DATEREQUIRED => 1, DaterecordTableMap::COL_DATEDEFAULTNULL => 2, DaterecordTableMap::COL_DATEDEFAULTNULLABLE => 3, DaterecordTableMap::COL_DATEDEFAULTNOTNULL => 4, DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNULLABLE => 5, DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNOTNULL => 6, ],
		self::TYPE_FIELDNAME => ['dateRecordId' => 0, 'dateRequired' => 1, 'dateDefaultNull' => 2, 'dateDefaultNullable' => 3, 'dateDefaultNotNull' => 4, 'timestampDefaultCurrentNullable' => 5, 'timestampDefaultCurrentNotNull' => 6, ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, ]
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
		self::TYPE_PHPNAME => ['Daterecordid', 'Daterequired', 'Datedefaultnull', 'Datedefaultnullable', 'Datedefaultnotnull', 'Timestampdefaultcurrentnullable', 'Timestampdefaultcurrentnotnull', ],
		self::TYPE_CAMELNAME => ['daterecordid', 'daterequired', 'datedefaultnull', 'datedefaultnullable', 'datedefaultnotnull', 'timestampdefaultcurrentnullable', 'timestampdefaultcurrentnotnull', ],
		self::TYPE_COLNAME => [DaterecordTableMap::COL_DATERECORDID, DaterecordTableMap::COL_DATEREQUIRED, DaterecordTableMap::COL_DATEDEFAULTNULL, DaterecordTableMap::COL_DATEDEFAULTNULLABLE, DaterecordTableMap::COL_DATEDEFAULTNOTNULL, DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNULLABLE, DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNOTNULL, ],
		self::TYPE_FIELDNAME => ['dateRecordId', 'dateRequired', 'dateDefaultNull', 'dateDefaultNullable', 'dateDefaultNotNull', 'timestampDefaultCurrentNullable', 'timestampDefaultCurrentNotNull', ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'Daterecordid' => 'DATERECORDID',
		'Daterecord.Daterecordid' => 'DATERECORDID',
		'daterecordid' => 'DATERECORDID',
		'daterecord.daterecordid' => 'DATERECORDID',
		'DaterecordTableMap::COL_DATERECORDID' => 'DATERECORDID',
		'COL_DATERECORDID' => 'DATERECORDID',
		'dateRecordId' => 'DATERECORDID',
		'daterecord.dateRecordId' => 'DATERECORDID',
		'Daterequired' => 'DATEREQUIRED',
		'Daterecord.Daterequired' => 'DATEREQUIRED',
		'daterequired' => 'DATEREQUIRED',
		'daterecord.daterequired' => 'DATEREQUIRED',
		'DaterecordTableMap::COL_DATEREQUIRED' => 'DATEREQUIRED',
		'COL_DATEREQUIRED' => 'DATEREQUIRED',
		'dateRequired' => 'DATEREQUIRED',
		'daterecord.dateRequired' => 'DATEREQUIRED',
		'Datedefaultnull' => 'DATEDEFAULTNULL',
		'Daterecord.Datedefaultnull' => 'DATEDEFAULTNULL',
		'datedefaultnull' => 'DATEDEFAULTNULL',
		'daterecord.datedefaultnull' => 'DATEDEFAULTNULL',
		'DaterecordTableMap::COL_DATEDEFAULTNULL' => 'DATEDEFAULTNULL',
		'COL_DATEDEFAULTNULL' => 'DATEDEFAULTNULL',
		'dateDefaultNull' => 'DATEDEFAULTNULL',
		'daterecord.dateDefaultNull' => 'DATEDEFAULTNULL',
		'Datedefaultnullable' => 'DATEDEFAULTNULLABLE',
		'Daterecord.Datedefaultnullable' => 'DATEDEFAULTNULLABLE',
		'datedefaultnullable' => 'DATEDEFAULTNULLABLE',
		'daterecord.datedefaultnullable' => 'DATEDEFAULTNULLABLE',
		'DaterecordTableMap::COL_DATEDEFAULTNULLABLE' => 'DATEDEFAULTNULLABLE',
		'COL_DATEDEFAULTNULLABLE' => 'DATEDEFAULTNULLABLE',
		'dateDefaultNullable' => 'DATEDEFAULTNULLABLE',
		'daterecord.dateDefaultNullable' => 'DATEDEFAULTNULLABLE',
		'Datedefaultnotnull' => 'DATEDEFAULTNOTNULL',
		'Daterecord.Datedefaultnotnull' => 'DATEDEFAULTNOTNULL',
		'datedefaultnotnull' => 'DATEDEFAULTNOTNULL',
		'daterecord.datedefaultnotnull' => 'DATEDEFAULTNOTNULL',
		'DaterecordTableMap::COL_DATEDEFAULTNOTNULL' => 'DATEDEFAULTNOTNULL',
		'COL_DATEDEFAULTNOTNULL' => 'DATEDEFAULTNOTNULL',
		'dateDefaultNotNull' => 'DATEDEFAULTNOTNULL',
		'daterecord.dateDefaultNotNull' => 'DATEDEFAULTNOTNULL',
		'Timestampdefaultcurrentnullable' => 'TIMESTAMPDEFAULTCURRENTNULLABLE',
		'Daterecord.Timestampdefaultcurrentnullable' => 'TIMESTAMPDEFAULTCURRENTNULLABLE',
		'timestampdefaultcurrentnullable' => 'TIMESTAMPDEFAULTCURRENTNULLABLE',
		'daterecord.timestampdefaultcurrentnullable' => 'TIMESTAMPDEFAULTCURRENTNULLABLE',
		'DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNULLABLE' => 'TIMESTAMPDEFAULTCURRENTNULLABLE',
		'COL_TIMESTAMPDEFAULTCURRENTNULLABLE' => 'TIMESTAMPDEFAULTCURRENTNULLABLE',
		'timestampDefaultCurrentNullable' => 'TIMESTAMPDEFAULTCURRENTNULLABLE',
		'daterecord.timestampDefaultCurrentNullable' => 'TIMESTAMPDEFAULTCURRENTNULLABLE',
		'Timestampdefaultcurrentnotnull' => 'TIMESTAMPDEFAULTCURRENTNOTNULL',
		'Daterecord.Timestampdefaultcurrentnotnull' => 'TIMESTAMPDEFAULTCURRENTNOTNULL',
		'timestampdefaultcurrentnotnull' => 'TIMESTAMPDEFAULTCURRENTNOTNULL',
		'daterecord.timestampdefaultcurrentnotnull' => 'TIMESTAMPDEFAULTCURRENTNOTNULL',
		'DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNOTNULL' => 'TIMESTAMPDEFAULTCURRENTNOTNULL',
		'COL_TIMESTAMPDEFAULTCURRENTNOTNULL' => 'TIMESTAMPDEFAULTCURRENTNOTNULL',
		'timestampDefaultCurrentNotNull' => 'TIMESTAMPDEFAULTCURRENTNOTNULL',
		'daterecord.timestampDefaultCurrentNotNull' => 'TIMESTAMPDEFAULTCURRENTNOTNULL',
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
			$criteria->addSelectColumn(DaterecordTableMap::COL_DATERECORDID);
			$criteria->addSelectColumn(DaterecordTableMap::COL_DATEREQUIRED);
			$criteria->addSelectColumn(DaterecordTableMap::COL_DATEDEFAULTNULL);
			$criteria->addSelectColumn(DaterecordTableMap::COL_DATEDEFAULTNULLABLE);
			$criteria->addSelectColumn(DaterecordTableMap::COL_DATEDEFAULTNOTNULL);
			$criteria->addSelectColumn(DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNULLABLE);
			$criteria->addSelectColumn(DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNOTNULL);
		} else {
			$criteria->addSelectColumn($alias . '.dateRecordId');
			$criteria->addSelectColumn($alias . '.dateRequired');
			$criteria->addSelectColumn($alias . '.dateDefaultNull');
			$criteria->addSelectColumn($alias . '.dateDefaultNullable');
			$criteria->addSelectColumn($alias . '.dateDefaultNotNull');
			$criteria->addSelectColumn($alias . '.timestampDefaultCurrentNullable');
			$criteria->addSelectColumn($alias . '.timestampDefaultCurrentNotNull');
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
	 * Performs a DELETE on the database, given a Daterecord or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or Daterecord object or primary key or array of primary keys
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
			$con = Propel::getServiceContainer()->getWriteConnection(DaterecordTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\Daterecord) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(DaterecordTableMap::DATABASE_NAME);
			$criteria->add(DaterecordTableMap::COL_DATERECORDID, (array)$values, Criteria::IN);
		}

		$query = DaterecordQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			DaterecordTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				DaterecordTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the daterecord table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return DaterecordQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a Daterecord or Criteria object.
	 *
	 * @param mixed $criteria Criteria or Daterecord object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(DaterecordTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from Daterecord object
		}

		if ($criteria->containsKey(DaterecordTableMap::COL_DATERECORDID) && $criteria->keyContainsValue(DaterecordTableMap::COL_DATERECORDID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . DaterecordTableMap::COL_DATERECORDID . ')');
		}


		// Set the correct dbName
		$query = DaterecordQuery::create()->mergeWith($criteria);

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
		return $withPrefix ? DaterecordTableMap::CLASS_DEFAULT : DaterecordTableMap::OM_CLASS;
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
				: self::translateFieldName('Daterecordid', TableMap::TYPE_PHPNAME, $indexType)
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
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Daterecordid', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Daterecordid', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Daterecordid', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Daterecordid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Daterecordid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Daterecordid', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(DaterecordTableMap::DATABASE_NAME)->getTable(DaterecordTableMap::TABLE_NAME);
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
		$this->setName('daterecord');
		$this->setPhpName('Daterecord');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\Daterecord');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('dateRecordId', 'Daterecordid', 'INTEGER', true, null, null);
		$this->addColumn('dateRequired', 'Daterequired', 'DATE', true, null, null);
		$this->addColumn('dateDefaultNull', 'Datedefaultnull', 'DATE', false, null, null);
		$this->addColumn('dateDefaultNullable', 'Datedefaultnullable', 'DATE', false, null, '2000-01-02');
		$this->addColumn('dateDefaultNotNull', 'Datedefaultnotnull', 'DATE', true, null, '2000-01-02');
		$this->addColumn('timestampDefaultCurrentNullable', 'Timestampdefaultcurrentnullable', 'TIMESTAMP', false, null, 'CURRENT_TIMESTAMP');
		$this->addColumn('timestampDefaultCurrentNotNull', 'Timestampdefaultcurrentnotnull', 'TIMESTAMP', true, null, 'CURRENT_TIMESTAMP');
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
	 * @return array (Daterecord object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = DaterecordTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = DaterecordTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + DaterecordTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = DaterecordTableMap::OM_CLASS;
			/** @var Daterecord $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			DaterecordTableMap::addInstanceToPool($obj, $key);
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
			$key = DaterecordTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = DaterecordTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var Daterecord $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				DaterecordTableMap::addInstanceToPool($obj, $key);
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
			$criteria->removeSelectColumn(DaterecordTableMap::COL_DATERECORDID);
			$criteria->removeSelectColumn(DaterecordTableMap::COL_DATEREQUIRED);
			$criteria->removeSelectColumn(DaterecordTableMap::COL_DATEDEFAULTNULL);
			$criteria->removeSelectColumn(DaterecordTableMap::COL_DATEDEFAULTNULLABLE);
			$criteria->removeSelectColumn(DaterecordTableMap::COL_DATEDEFAULTNOTNULL);
			$criteria->removeSelectColumn(DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNULLABLE);
			$criteria->removeSelectColumn(DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNOTNULL);
		} else {
			$criteria->removeSelectColumn($alias . '.dateRecordId');
			$criteria->removeSelectColumn($alias . '.dateRequired');
			$criteria->removeSelectColumn($alias . '.dateDefaultNull');
			$criteria->removeSelectColumn($alias . '.dateDefaultNullable');
			$criteria->removeSelectColumn($alias . '.dateDefaultNotNull');
			$criteria->removeSelectColumn($alias . '.timestampDefaultCurrentNullable');
			$criteria->removeSelectColumn($alias . '.timestampDefaultCurrentNotNull');
		}
	}
}
