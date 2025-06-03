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
use SOB\Propel2\Stringrecord;
use SOB\Propel2\StringrecordQuery;

/**
 * This class defines the structure of the 'stringrecord' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class StringrecordTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.Stringrecord';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.StringrecordTableMap';

	/**
	 * the column name for the stringDefaultNotNull field
	 */
	public const COL_STRINGDEFAULTNOTNULL = 'stringrecord.stringDefaultNotNull';

	/**
	 * the column name for the stringDefaultNull field
	 */
	public const COL_STRINGDEFAULTNULL = 'stringrecord.stringDefaultNull';

	/**
	 * the column name for the stringDefaultNullable field
	 */
	public const COL_STRINGDEFAULTNULLABLE = 'stringrecord.stringDefaultNullable';

	/**
	 * the column name for the stringRecordId field
	 */
	public const COL_STRINGRECORDID = 'stringrecord.stringRecordId';

	/**
	 * the column name for the stringRequired field
	 */
	public const COL_STRINGREQUIRED = 'stringrecord.stringRequired';

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
	public const OM_CLASS = '\\SOB\\Propel2\\Stringrecord';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'stringrecord';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'Stringrecord';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['Stringrecordid' => 0, 'Stringrequired' => 1, 'Stringdefaultnull' => 2, 'Stringdefaultnullable' => 3, 'Stringdefaultnotnull' => 4, ],
		self::TYPE_CAMELNAME => ['stringrecordid' => 0, 'stringrequired' => 1, 'stringdefaultnull' => 2, 'stringdefaultnullable' => 3, 'stringdefaultnotnull' => 4, ],
		self::TYPE_COLNAME => [StringrecordTableMap::COL_STRINGRECORDID => 0, StringrecordTableMap::COL_STRINGREQUIRED => 1, StringrecordTableMap::COL_STRINGDEFAULTNULL => 2, StringrecordTableMap::COL_STRINGDEFAULTNULLABLE => 3, StringrecordTableMap::COL_STRINGDEFAULTNOTNULL => 4, ],
		self::TYPE_FIELDNAME => ['stringRecordId' => 0, 'stringRequired' => 1, 'stringDefaultNull' => 2, 'stringDefaultNullable' => 3, 'stringDefaultNotNull' => 4, ],
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
		self::TYPE_PHPNAME => ['Stringrecordid', 'Stringrequired', 'Stringdefaultnull', 'Stringdefaultnullable', 'Stringdefaultnotnull', ],
		self::TYPE_CAMELNAME => ['stringrecordid', 'stringrequired', 'stringdefaultnull', 'stringdefaultnullable', 'stringdefaultnotnull', ],
		self::TYPE_COLNAME => [StringrecordTableMap::COL_STRINGRECORDID, StringrecordTableMap::COL_STRINGREQUIRED, StringrecordTableMap::COL_STRINGDEFAULTNULL, StringrecordTableMap::COL_STRINGDEFAULTNULLABLE, StringrecordTableMap::COL_STRINGDEFAULTNOTNULL, ],
		self::TYPE_FIELDNAME => ['stringRecordId', 'stringRequired', 'stringDefaultNull', 'stringDefaultNullable', 'stringDefaultNotNull', ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'Stringrecordid' => 'STRINGRECORDID',
		'Stringrecord.Stringrecordid' => 'STRINGRECORDID',
		'stringrecordid' => 'STRINGRECORDID',
		'stringrecord.stringrecordid' => 'STRINGRECORDID',
		'StringrecordTableMap::COL_STRINGRECORDID' => 'STRINGRECORDID',
		'COL_STRINGRECORDID' => 'STRINGRECORDID',
		'stringRecordId' => 'STRINGRECORDID',
		'stringrecord.stringRecordId' => 'STRINGRECORDID',
		'Stringrequired' => 'STRINGREQUIRED',
		'Stringrecord.Stringrequired' => 'STRINGREQUIRED',
		'stringrequired' => 'STRINGREQUIRED',
		'stringrecord.stringrequired' => 'STRINGREQUIRED',
		'StringrecordTableMap::COL_STRINGREQUIRED' => 'STRINGREQUIRED',
		'COL_STRINGREQUIRED' => 'STRINGREQUIRED',
		'stringRequired' => 'STRINGREQUIRED',
		'stringrecord.stringRequired' => 'STRINGREQUIRED',
		'Stringdefaultnull' => 'STRINGDEFAULTNULL',
		'Stringrecord.Stringdefaultnull' => 'STRINGDEFAULTNULL',
		'stringdefaultnull' => 'STRINGDEFAULTNULL',
		'stringrecord.stringdefaultnull' => 'STRINGDEFAULTNULL',
		'StringrecordTableMap::COL_STRINGDEFAULTNULL' => 'STRINGDEFAULTNULL',
		'COL_STRINGDEFAULTNULL' => 'STRINGDEFAULTNULL',
		'stringDefaultNull' => 'STRINGDEFAULTNULL',
		'stringrecord.stringDefaultNull' => 'STRINGDEFAULTNULL',
		'Stringdefaultnullable' => 'STRINGDEFAULTNULLABLE',
		'Stringrecord.Stringdefaultnullable' => 'STRINGDEFAULTNULLABLE',
		'stringdefaultnullable' => 'STRINGDEFAULTNULLABLE',
		'stringrecord.stringdefaultnullable' => 'STRINGDEFAULTNULLABLE',
		'StringrecordTableMap::COL_STRINGDEFAULTNULLABLE' => 'STRINGDEFAULTNULLABLE',
		'COL_STRINGDEFAULTNULLABLE' => 'STRINGDEFAULTNULLABLE',
		'stringDefaultNullable' => 'STRINGDEFAULTNULLABLE',
		'stringrecord.stringDefaultNullable' => 'STRINGDEFAULTNULLABLE',
		'Stringdefaultnotnull' => 'STRINGDEFAULTNOTNULL',
		'Stringrecord.Stringdefaultnotnull' => 'STRINGDEFAULTNOTNULL',
		'stringdefaultnotnull' => 'STRINGDEFAULTNOTNULL',
		'stringrecord.stringdefaultnotnull' => 'STRINGDEFAULTNOTNULL',
		'StringrecordTableMap::COL_STRINGDEFAULTNOTNULL' => 'STRINGDEFAULTNOTNULL',
		'COL_STRINGDEFAULTNOTNULL' => 'STRINGDEFAULTNOTNULL',
		'stringDefaultNotNull' => 'STRINGDEFAULTNOTNULL',
		'stringrecord.stringDefaultNotNull' => 'STRINGDEFAULTNOTNULL',
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
			$criteria->addSelectColumn(StringrecordTableMap::COL_STRINGRECORDID);
			$criteria->addSelectColumn(StringrecordTableMap::COL_STRINGREQUIRED);
			$criteria->addSelectColumn(StringrecordTableMap::COL_STRINGDEFAULTNULL);
			$criteria->addSelectColumn(StringrecordTableMap::COL_STRINGDEFAULTNULLABLE);
			$criteria->addSelectColumn(StringrecordTableMap::COL_STRINGDEFAULTNOTNULL);
		} else {
			$criteria->addSelectColumn($alias . '.stringRecordId');
			$criteria->addSelectColumn($alias . '.stringRequired');
			$criteria->addSelectColumn($alias . '.stringDefaultNull');
			$criteria->addSelectColumn($alias . '.stringDefaultNullable');
			$criteria->addSelectColumn($alias . '.stringDefaultNotNull');
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
	 * Performs a DELETE on the database, given a Stringrecord or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or Stringrecord object or primary key or array of primary keys
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
			$con = Propel::getServiceContainer()->getWriteConnection(StringrecordTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\Stringrecord) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(StringrecordTableMap::DATABASE_NAME);
			$criteria->add(StringrecordTableMap::COL_STRINGRECORDID, (array)$values, Criteria::IN);
		}

		$query = StringrecordQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			StringrecordTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				StringrecordTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the stringrecord table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return StringrecordQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a Stringrecord or Criteria object.
	 *
	 * @param mixed $criteria Criteria or Stringrecord object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(StringrecordTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from Stringrecord object
		}

		if ($criteria->containsKey(StringrecordTableMap::COL_STRINGRECORDID) && $criteria->keyContainsValue(StringrecordTableMap::COL_STRINGRECORDID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . StringrecordTableMap::COL_STRINGRECORDID . ')');
		}


		// Set the correct dbName
		$query = StringrecordQuery::create()->mergeWith($criteria);

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
		return $withPrefix ? StringrecordTableMap::CLASS_DEFAULT : StringrecordTableMap::OM_CLASS;
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
				: self::translateFieldName('Stringrecordid', TableMap::TYPE_PHPNAME, $indexType)
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
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Stringrecordid', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Stringrecordid', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Stringrecordid', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Stringrecordid', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Stringrecordid', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Stringrecordid', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(StringrecordTableMap::DATABASE_NAME)->getTable(StringrecordTableMap::TABLE_NAME);
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
		$this->setName('stringrecord');
		$this->setPhpName('Stringrecord');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\Stringrecord');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('stringRecordId', 'Stringrecordid', 'INTEGER', true, null, null);
		$this->addColumn('stringRequired', 'Stringrequired', 'VARCHAR', true, 100, null);
		$this->addColumn('stringDefaultNull', 'Stringdefaultnull', 'VARCHAR', false, 100, null);
		$this->addColumn('stringDefaultNullable', 'Stringdefaultnullable', 'VARCHAR', false, 100, 'default');
		$this->addColumn('stringDefaultNotNull', 'Stringdefaultnotnull', 'VARCHAR', true, 100, 'default');
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
	 * @return array (Stringrecord object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = StringrecordTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = StringrecordTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + StringrecordTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = StringrecordTableMap::OM_CLASS;
			/** @var Stringrecord $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			StringrecordTableMap::addInstanceToPool($obj, $key);
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
			$key = StringrecordTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = StringrecordTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var Stringrecord $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				StringrecordTableMap::addInstanceToPool($obj, $key);
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
			$criteria->removeSelectColumn(StringrecordTableMap::COL_STRINGRECORDID);
			$criteria->removeSelectColumn(StringrecordTableMap::COL_STRINGREQUIRED);
			$criteria->removeSelectColumn(StringrecordTableMap::COL_STRINGDEFAULTNULL);
			$criteria->removeSelectColumn(StringrecordTableMap::COL_STRINGDEFAULTNULLABLE);
			$criteria->removeSelectColumn(StringrecordTableMap::COL_STRINGDEFAULTNOTNULL);
		} else {
			$criteria->removeSelectColumn($alias . '.stringRecordId');
			$criteria->removeSelectColumn($alias . '.stringRequired');
			$criteria->removeSelectColumn($alias . '.stringDefaultNull');
			$criteria->removeSelectColumn($alias . '.stringDefaultNullable');
			$criteria->removeSelectColumn($alias . '.stringDefaultNotNull');
		}
	}
}
