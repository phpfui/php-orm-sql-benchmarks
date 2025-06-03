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
use SOB\Propel2\Map\StringrecordTableMap;
use SOB\Propel2\Stringrecord as ChildStringrecord;
use SOB\Propel2\StringrecordQuery as ChildStringrecordQuery;

/**
 * Base class that represents a query for the `stringrecord` table.
 *
 * @method     ChildStringrecordQuery orderByStringrecordid($order = Criteria::ASC) Order by the stringRecordId column
 * @method     ChildStringrecordQuery orderByStringrequired($order = Criteria::ASC) Order by the stringRequired column
 * @method     ChildStringrecordQuery orderByStringdefaultnull($order = Criteria::ASC) Order by the stringDefaultNull column
 * @method     ChildStringrecordQuery orderByStringdefaultnullable($order = Criteria::ASC) Order by the stringDefaultNullable column
 * @method     ChildStringrecordQuery orderByStringdefaultnotnull($order = Criteria::ASC) Order by the stringDefaultNotNull column
 *
 * @method     ChildStringrecordQuery groupByStringrecordid() Group by the stringRecordId column
 * @method     ChildStringrecordQuery groupByStringrequired() Group by the stringRequired column
 * @method     ChildStringrecordQuery groupByStringdefaultnull() Group by the stringDefaultNull column
 * @method     ChildStringrecordQuery groupByStringdefaultnullable() Group by the stringDefaultNullable column
 * @method     ChildStringrecordQuery groupByStringdefaultnotnull() Group by the stringDefaultNotNull column
 *
 * @method     ChildStringrecordQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildStringrecordQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildStringrecordQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildStringrecordQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildStringrecordQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildStringrecordQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildStringrecord|null findOne(?ConnectionInterface $con = null) Return the first ChildStringrecord matching the query
 * @method     ChildStringrecord findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildStringrecord matching the query, or a new ChildStringrecord object populated from the query conditions when no match is found
 *
 * @method     ChildStringrecord|null findOneByStringrecordid(int $stringRecordId) Return the first ChildStringrecord filtered by the stringRecordId column
 * @method     ChildStringrecord|null findOneByStringrequired(string $stringRequired) Return the first ChildStringrecord filtered by the stringRequired column
 * @method     ChildStringrecord|null findOneByStringdefaultnull(string $stringDefaultNull) Return the first ChildStringrecord filtered by the stringDefaultNull column
 * @method     ChildStringrecord|null findOneByStringdefaultnullable(string $stringDefaultNullable) Return the first ChildStringrecord filtered by the stringDefaultNullable column
 * @method     ChildStringrecord|null findOneByStringdefaultnotnull(string $stringDefaultNotNull) Return the first ChildStringrecord filtered by the stringDefaultNotNull column
 *
 * @method     ChildStringrecord requirePk($key, ?ConnectionInterface $con = null) Return the ChildStringrecord by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStringrecord requireOne(?ConnectionInterface $con = null) Return the first ChildStringrecord matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStringrecord requireOneByStringrecordid(int $stringRecordId) Return the first ChildStringrecord filtered by the stringRecordId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStringrecord requireOneByStringrequired(string $stringRequired) Return the first ChildStringrecord filtered by the stringRequired column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStringrecord requireOneByStringdefaultnull(string $stringDefaultNull) Return the first ChildStringrecord filtered by the stringDefaultNull column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStringrecord requireOneByStringdefaultnullable(string $stringDefaultNullable) Return the first ChildStringrecord filtered by the stringDefaultNullable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStringrecord requireOneByStringdefaultnotnull(string $stringDefaultNotNull) Return the first ChildStringrecord filtered by the stringDefaultNotNull column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStringrecord[]|Collection find(?ConnectionInterface $con = null) Return ChildStringrecord objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildStringrecord> find(?ConnectionInterface $con = null) Return ChildStringrecord objects based on current ModelCriteria
 *
 * @method     ChildStringrecord[]|Collection findByStringrecordid(int|array<int> $stringRecordId) Return ChildStringrecord objects filtered by the stringRecordId column
 * @psalm-method Collection&\Traversable<ChildStringrecord> findByStringrecordid(int|array<int> $stringRecordId) Return ChildStringrecord objects filtered by the stringRecordId column
 * @method     ChildStringrecord[]|Collection findByStringrequired(string|array<string> $stringRequired) Return ChildStringrecord objects filtered by the stringRequired column
 * @psalm-method Collection&\Traversable<ChildStringrecord> findByStringrequired(string|array<string> $stringRequired) Return ChildStringrecord objects filtered by the stringRequired column
 * @method     ChildStringrecord[]|Collection findByStringdefaultnull(string|array<string> $stringDefaultNull) Return ChildStringrecord objects filtered by the stringDefaultNull column
 * @psalm-method Collection&\Traversable<ChildStringrecord> findByStringdefaultnull(string|array<string> $stringDefaultNull) Return ChildStringrecord objects filtered by the stringDefaultNull column
 * @method     ChildStringrecord[]|Collection findByStringdefaultnullable(string|array<string> $stringDefaultNullable) Return ChildStringrecord objects filtered by the stringDefaultNullable column
 * @psalm-method Collection&\Traversable<ChildStringrecord> findByStringdefaultnullable(string|array<string> $stringDefaultNullable) Return ChildStringrecord objects filtered by the stringDefaultNullable column
 * @method     ChildStringrecord[]|Collection findByStringdefaultnotnull(string|array<string> $stringDefaultNotNull) Return ChildStringrecord objects filtered by the stringDefaultNotNull column
 * @psalm-method Collection&\Traversable<ChildStringrecord> findByStringdefaultnotnull(string|array<string> $stringDefaultNotNull) Return ChildStringrecord objects filtered by the stringDefaultNotNull column
 *
 * @method     ChildStringrecord[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildStringrecord> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class StringrecordQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\StringrecordQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\Stringrecord', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildStringrecordQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildStringrecordQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildStringrecordQuery) {
			return $criteria;
		}
		$query = new ChildStringrecordQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(StringrecordTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(StringrecordTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(static function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			StringrecordTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			StringrecordTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the stringrecord table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(StringrecordTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			StringrecordTableMap::clearInstancePool();
			StringrecordTableMap::clearRelatedInstancePool();

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

		$this->addUsingAlias(StringrecordTableMap::COL_STRINGRECORDID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(StringrecordTableMap::COL_STRINGRECORDID, $keys, Criteria::IN);

		return $this;
	}

	/**
	 * Filter the query on the stringDefaultNotNull column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStringdefaultnotnull('fooValue');   // WHERE stringDefaultNotNull = 'fooValue'
	 * $query->filterByStringdefaultnotnull('%fooValue%', Criteria::LIKE); // WHERE stringDefaultNotNull LIKE '%fooValue%'
	 * $query->filterByStringdefaultnotnull(['foo', 'bar']); // WHERE stringDefaultNotNull IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $stringdefaultnotnull The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByStringdefaultnotnull($stringdefaultnotnull = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($stringdefaultnotnull)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(StringrecordTableMap::COL_STRINGDEFAULTNOTNULL, $stringdefaultnotnull, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the stringDefaultNull column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStringdefaultnull('fooValue');   // WHERE stringDefaultNull = 'fooValue'
	 * $query->filterByStringdefaultnull('%fooValue%', Criteria::LIKE); // WHERE stringDefaultNull LIKE '%fooValue%'
	 * $query->filterByStringdefaultnull(['foo', 'bar']); // WHERE stringDefaultNull IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $stringdefaultnull The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByStringdefaultnull($stringdefaultnull = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($stringdefaultnull)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(StringrecordTableMap::COL_STRINGDEFAULTNULL, $stringdefaultnull, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the stringDefaultNullable column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStringdefaultnullable('fooValue');   // WHERE stringDefaultNullable = 'fooValue'
	 * $query->filterByStringdefaultnullable('%fooValue%', Criteria::LIKE); // WHERE stringDefaultNullable LIKE '%fooValue%'
	 * $query->filterByStringdefaultnullable(['foo', 'bar']); // WHERE stringDefaultNullable IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $stringdefaultnullable The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByStringdefaultnullable($stringdefaultnullable = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($stringdefaultnullable)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(StringrecordTableMap::COL_STRINGDEFAULTNULLABLE, $stringdefaultnullable, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the stringRecordId column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStringrecordid(1234); // WHERE stringRecordId = 1234
	 * $query->filterByStringrecordid(array(12, 34)); // WHERE stringRecordId IN (12, 34)
	 * $query->filterByStringrecordid(array('min' => 12)); // WHERE stringRecordId > 12
	 * </code>
	 *
	 * @param mixed $stringrecordid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByStringrecordid($stringrecordid = null, ?string $comparison = null)
	{
		if (\is_array($stringrecordid)) {
			$useMinMax = false;

			if (isset($stringrecordid['min'])) {
				$this->addUsingAlias(StringrecordTableMap::COL_STRINGRECORDID, $stringrecordid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($stringrecordid['max'])) {
				$this->addUsingAlias(StringrecordTableMap::COL_STRINGRECORDID, $stringrecordid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(StringrecordTableMap::COL_STRINGRECORDID, $stringrecordid, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the stringRequired column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStringrequired('fooValue');   // WHERE stringRequired = 'fooValue'
	 * $query->filterByStringrequired('%fooValue%', Criteria::LIKE); // WHERE stringRequired LIKE '%fooValue%'
	 * $query->filterByStringrequired(['foo', 'bar']); // WHERE stringRequired IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $stringrequired The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByStringrequired($stringrequired = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($stringrequired)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(StringrecordTableMap::COL_STRINGREQUIRED, $stringrequired, $comparison);

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
	 * @return ChildStringrecord|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(StringrecordTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = StringrecordTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildStringrecord $stringrecord Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($stringrecord = null)
	{
		if ($stringrecord) {
			$this->addUsingAlias(StringrecordTableMap::COL_STRINGRECORDID, $stringrecord->getStringrecordid(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildStringrecord|array|mixed the result, formatted by the current formatter
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
	 * @return ChildStringrecord A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT stringRecordId, stringRequired, stringDefaultNull, stringDefaultNullable, stringDefaultNotNull FROM stringrecord WHERE stringRecordId = :p0';

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
			/** @var ChildStringrecord $obj */
			$obj = new ChildStringrecord();
			$obj->hydrate($row);
			StringrecordTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
