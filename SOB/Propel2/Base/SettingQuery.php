<?php

namespace SOB\Propel2\Base;

use Exception;
use PDO;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Propel;
use SOB\Propel2\Map\SettingTableMap;
use SOB\Propel2\Setting as ChildSetting;
use SOB\Propel2\SettingQuery as ChildSettingQuery;

/**
 * Base class that represents a query for the `setting` table.
 *
 * @method     ChildSettingQuery orderBySettingId($order = Criteria::ASC) Order by the setting_id column
 * @method     ChildSettingQuery orderBySettingData($order = Criteria::ASC) Order by the setting_data column
 *
 * @method     ChildSettingQuery groupBySettingId() Group by the setting_id column
 * @method     ChildSettingQuery groupBySettingData() Group by the setting_data column
 *
 * @method     ChildSettingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSettingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSettingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSettingQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSettingQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSettingQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSetting|null findOne(?ConnectionInterface $con = null) Return the first ChildSetting matching the query
 * @method     ChildSetting findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildSetting matching the query, or a new ChildSetting object populated from the query conditions when no match is found
 *
 * @method     ChildSetting|null findOneBySettingId(int $setting_id) Return the first ChildSetting filtered by the setting_id column
 * @method     ChildSetting|null findOneBySettingData(string $setting_data) Return the first ChildSetting filtered by the setting_data column
 *
 * @method     ChildSetting requirePk($key, ?ConnectionInterface $con = null) Return the ChildSetting by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSetting requireOne(?ConnectionInterface $con = null) Return the first ChildSetting matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSetting requireOneBySettingId(int $setting_id) Return the first ChildSetting filtered by the setting_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSetting requireOneBySettingData(string $setting_data) Return the first ChildSetting filtered by the setting_data column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSetting[]|Collection find(?ConnectionInterface $con = null) Return ChildSetting objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildSetting> find(?ConnectionInterface $con = null) Return ChildSetting objects based on current ModelCriteria
 *
 * @method     ChildSetting[]|Collection findBySettingId(int|array<int> $setting_id) Return ChildSetting objects filtered by the setting_id column
 * @psalm-method Collection&\Traversable<ChildSetting> findBySettingId(int|array<int> $setting_id) Return ChildSetting objects filtered by the setting_id column
 * @method     ChildSetting[]|Collection findBySettingData(string|array<string> $setting_data) Return ChildSetting objects filtered by the setting_data column
 * @psalm-method Collection&\Traversable<ChildSetting> findBySettingData(string|array<string> $setting_data) Return ChildSetting objects filtered by the setting_data column
 *
 * @method     ChildSetting[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildSetting> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class SettingQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\SettingQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\Setting', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildSettingQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildSettingQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildSettingQuery) {
			return $criteria;
		}
		$query = new ChildSettingQuery();

		if (null !== $modelAlias) {
			$query->setModelAlias($modelAlias);
		}

		if ($criteria instanceof Criteria) {
			$query->mergeWith($criteria);
		}

		return $query;
	}

	/**
	 * Performs a DELETE on the database based on the current ModelCriteria
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *                         if supported by native driver or if emulated using Propel.
	 */
	public function delete(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(SettingTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(SettingTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			SettingTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			SettingTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the setting table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(SettingTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			SettingTableMap::clearInstancePool();
			SettingTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query by primary key
	 *
	 * @param mixed $key Primary key to use for the query
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPrimaryKey($key)
	{

		$this->addUsingAlias(SettingTableMap::COL_SETTING_ID, $key, Criteria::EQUAL);

		return $this;
	}

	/**
	 * Filter the query by a list of primary keys
	 *
	 * @param array|int $keys The list of primary key to use for the query
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPrimaryKeys($keys)
	{

		$this->addUsingAlias(SettingTableMap::COL_SETTING_ID, $keys, Criteria::IN);

		return $this;
	}

	/**
	 * Filter the query on the setting_data column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySettingData('fooValue');   // WHERE setting_data = 'fooValue'
	 * $query->filterBySettingData('%fooValue%', Criteria::LIKE); // WHERE setting_data LIKE '%fooValue%'
	 * $query->filterBySettingData(['foo', 'bar']); // WHERE setting_data IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $settingData The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterBySettingData($settingData = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($settingData)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SettingTableMap::COL_SETTING_DATA, $settingData, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the setting_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySettingId(1234); // WHERE setting_id = 1234
	 * $query->filterBySettingId(array(12, 34)); // WHERE setting_id IN (12, 34)
	 * $query->filterBySettingId(array('min' => 12)); // WHERE setting_id > 12
	 * </code>
	 *
	 * @param mixed $settingId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterBySettingId($settingId = null, ?string $comparison = null)
	{
		if (\is_array($settingId)) {
			$useMinMax = false;

			if (isset($settingId['min'])) {
				$this->addUsingAlias(SettingTableMap::COL_SETTING_ID, $settingId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($settingId['max'])) {
				$this->addUsingAlias(SettingTableMap::COL_SETTING_ID, $settingId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SettingTableMap::COL_SETTING_ID, $settingId, $comparison);

		return $this;
	}

	/**
	 * Find object by primary key.
	 * Propel uses the instance pool to skip the database if the object exists.
	 * Go fast if the query is untouched.
	 *
	 * <code>
	 * $obj  = $c->findPk(12, $con);
	 * </code>
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con an optional connection object
	 *
	 * @return ChildSetting|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(SettingTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = SettingTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
			// the object is already in the instance pool
			return $obj;
		}

		return $this->findPkSimple($key, $con);
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(12, 56, 832), $con);
	 * </code>
	 * @param array $keys Primary keys to use for the query
	 * @param ConnectionInterface $con an optional connection object
	 *
	 * @return Collection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
		}
		$this->basePreSelect($con);
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$dataFetcher = $criteria
			->filterByPrimaryKeys($keys)
			->doSelect($con);

		return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
	}

	/**
	 * Exclude object from result
	 *
	 * @param ChildSetting $setting Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($setting = null)
	{
		if ($setting) {
			$this->addUsingAlias(SettingTableMap::COL_SETTING_ID, $setting->getSettingId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildSetting|array|mixed the result, formatted by the current formatter
	 */
	protected function findPkComplex($key, ConnectionInterface $con)
	{
		// As the query uses a PK condition, no limit(1) is necessary.
		$criteria = $this->isKeepQuery() ? clone $this : $this;
		$dataFetcher = $criteria
			->filterByPrimaryKey($key)
			->doSelect($con);

		return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
	}

	/**
	 * Find object by primary key using raw SQL to go fast.
	 * Bypass doSelect() and the object formatter by using generated code.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 *
	 * @return ChildSetting A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT setting_id, setting_data FROM setting WHERE setting_id = :p0';

		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_INT);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);

			throw new PropelException(\sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
		}
		$obj = null;

		if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
			/** @var ChildSetting $obj */
			$obj = new ChildSetting();
			$obj->hydrate($row);
			SettingTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
