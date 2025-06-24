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
use SOB\Propel2\Daterecord as ChildDaterecord;
use SOB\Propel2\DaterecordQuery as ChildDaterecordQuery;
use SOB\Propel2\Map\DaterecordTableMap;

/**
 * Base class that represents a query for the `daterecord` table.
 *
 * @method     ChildDaterecordQuery orderByDaterecordid($order = Criteria::ASC) Order by the dateRecordId column
 * @method     ChildDaterecordQuery orderByDaterequired($order = Criteria::ASC) Order by the dateRequired column
 * @method     ChildDaterecordQuery orderByDatedefaultnull($order = Criteria::ASC) Order by the dateDefaultNull column
 * @method     ChildDaterecordQuery orderByDatedefaultnullable($order = Criteria::ASC) Order by the dateDefaultNullable column
 * @method     ChildDaterecordQuery orderByDatedefaultnotnull($order = Criteria::ASC) Order by the dateDefaultNotNull column
 * @method     ChildDaterecordQuery orderByTimestampdefaultcurrentnullable($order = Criteria::ASC) Order by the timestampDefaultCurrentNullable column
 * @method     ChildDaterecordQuery orderByTimestampdefaultcurrentnotnull($order = Criteria::ASC) Order by the timestampDefaultCurrentNotNull column
 *
 * @method     ChildDaterecordQuery groupByDaterecordid() Group by the dateRecordId column
 * @method     ChildDaterecordQuery groupByDaterequired() Group by the dateRequired column
 * @method     ChildDaterecordQuery groupByDatedefaultnull() Group by the dateDefaultNull column
 * @method     ChildDaterecordQuery groupByDatedefaultnullable() Group by the dateDefaultNullable column
 * @method     ChildDaterecordQuery groupByDatedefaultnotnull() Group by the dateDefaultNotNull column
 * @method     ChildDaterecordQuery groupByTimestampdefaultcurrentnullable() Group by the timestampDefaultCurrentNullable column
 * @method     ChildDaterecordQuery groupByTimestampdefaultcurrentnotnull() Group by the timestampDefaultCurrentNotNull column
 *
 * @method     ChildDaterecordQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildDaterecordQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildDaterecordQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildDaterecordQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildDaterecordQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildDaterecordQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildDaterecord|null findOne(?ConnectionInterface $con = null) Return the first ChildDaterecord matching the query
 * @method     ChildDaterecord findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildDaterecord matching the query, or a new ChildDaterecord object populated from the query conditions when no match is found
 *
 * @method     ChildDaterecord|null findOneByDaterecordid(int $dateRecordId) Return the first ChildDaterecord filtered by the dateRecordId column
 * @method     ChildDaterecord|null findOneByDaterequired(string $dateRequired) Return the first ChildDaterecord filtered by the dateRequired column
 * @method     ChildDaterecord|null findOneByDatedefaultnull(string $dateDefaultNull) Return the first ChildDaterecord filtered by the dateDefaultNull column
 * @method     ChildDaterecord|null findOneByDatedefaultnullable(string $dateDefaultNullable) Return the first ChildDaterecord filtered by the dateDefaultNullable column
 * @method     ChildDaterecord|null findOneByDatedefaultnotnull(string $dateDefaultNotNull) Return the first ChildDaterecord filtered by the dateDefaultNotNull column
 * @method     ChildDaterecord|null findOneByTimestampdefaultcurrentnullable(string $timestampDefaultCurrentNullable) Return the first ChildDaterecord filtered by the timestampDefaultCurrentNullable column
 * @method     ChildDaterecord|null findOneByTimestampdefaultcurrentnotnull(string $timestampDefaultCurrentNotNull) Return the first ChildDaterecord filtered by the timestampDefaultCurrentNotNull column
 *
 * @method     ChildDaterecord requirePk($key, ?ConnectionInterface $con = null) Return the ChildDaterecord by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDaterecord requireOne(?ConnectionInterface $con = null) Return the first ChildDaterecord matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDaterecord requireOneByDaterecordid(int $dateRecordId) Return the first ChildDaterecord filtered by the dateRecordId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDaterecord requireOneByDaterequired(string $dateRequired) Return the first ChildDaterecord filtered by the dateRequired column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDaterecord requireOneByDatedefaultnull(string $dateDefaultNull) Return the first ChildDaterecord filtered by the dateDefaultNull column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDaterecord requireOneByDatedefaultnullable(string $dateDefaultNullable) Return the first ChildDaterecord filtered by the dateDefaultNullable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDaterecord requireOneByDatedefaultnotnull(string $dateDefaultNotNull) Return the first ChildDaterecord filtered by the dateDefaultNotNull column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDaterecord requireOneByTimestampdefaultcurrentnullable(string $timestampDefaultCurrentNullable) Return the first ChildDaterecord filtered by the timestampDefaultCurrentNullable column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildDaterecord requireOneByTimestampdefaultcurrentnotnull(string $timestampDefaultCurrentNotNull) Return the first ChildDaterecord filtered by the timestampDefaultCurrentNotNull column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildDaterecord[]|Collection find(?ConnectionInterface $con = null) Return ChildDaterecord objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildDaterecord> find(?ConnectionInterface $con = null) Return ChildDaterecord objects based on current ModelCriteria
 *
 * @method     ChildDaterecord[]|Collection findByDaterecordid(int|array<int> $dateRecordId) Return ChildDaterecord objects filtered by the dateRecordId column
 * @psalm-method Collection&\Traversable<ChildDaterecord> findByDaterecordid(int|array<int> $dateRecordId) Return ChildDaterecord objects filtered by the dateRecordId column
 * @method     ChildDaterecord[]|Collection findByDaterequired(string|array<string> $dateRequired) Return ChildDaterecord objects filtered by the dateRequired column
 * @psalm-method Collection&\Traversable<ChildDaterecord> findByDaterequired(string|array<string> $dateRequired) Return ChildDaterecord objects filtered by the dateRequired column
 * @method     ChildDaterecord[]|Collection findByDatedefaultnull(string|array<string> $dateDefaultNull) Return ChildDaterecord objects filtered by the dateDefaultNull column
 * @psalm-method Collection&\Traversable<ChildDaterecord> findByDatedefaultnull(string|array<string> $dateDefaultNull) Return ChildDaterecord objects filtered by the dateDefaultNull column
 * @method     ChildDaterecord[]|Collection findByDatedefaultnullable(string|array<string> $dateDefaultNullable) Return ChildDaterecord objects filtered by the dateDefaultNullable column
 * @psalm-method Collection&\Traversable<ChildDaterecord> findByDatedefaultnullable(string|array<string> $dateDefaultNullable) Return ChildDaterecord objects filtered by the dateDefaultNullable column
 * @method     ChildDaterecord[]|Collection findByDatedefaultnotnull(string|array<string> $dateDefaultNotNull) Return ChildDaterecord objects filtered by the dateDefaultNotNull column
 * @psalm-method Collection&\Traversable<ChildDaterecord> findByDatedefaultnotnull(string|array<string> $dateDefaultNotNull) Return ChildDaterecord objects filtered by the dateDefaultNotNull column
 * @method     ChildDaterecord[]|Collection findByTimestampdefaultcurrentnullable(string|array<string> $timestampDefaultCurrentNullable) Return ChildDaterecord objects filtered by the timestampDefaultCurrentNullable column
 * @psalm-method Collection&\Traversable<ChildDaterecord> findByTimestampdefaultcurrentnullable(string|array<string> $timestampDefaultCurrentNullable) Return ChildDaterecord objects filtered by the timestampDefaultCurrentNullable column
 * @method     ChildDaterecord[]|Collection findByTimestampdefaultcurrentnotnull(string|array<string> $timestampDefaultCurrentNotNull) Return ChildDaterecord objects filtered by the timestampDefaultCurrentNotNull column
 * @psalm-method Collection&\Traversable<ChildDaterecord> findByTimestampdefaultcurrentnotnull(string|array<string> $timestampDefaultCurrentNotNull) Return ChildDaterecord objects filtered by the timestampDefaultCurrentNotNull column
 *
 * @method     ChildDaterecord[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildDaterecord> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class DaterecordQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\DaterecordQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\Daterecord', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildDaterecordQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildDaterecordQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildDaterecordQuery) {
			return $criteria;
		}
		$query = new ChildDaterecordQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(DaterecordTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(DaterecordTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			DaterecordTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			DaterecordTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the daterecord table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(DaterecordTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			DaterecordTableMap::clearInstancePool();
			DaterecordTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the dateDefaultNotNull column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDatedefaultnotnull('2011-03-14'); // WHERE dateDefaultNotNull = '2011-03-14'
	 * $query->filterByDatedefaultnotnull('now'); // WHERE dateDefaultNotNull = '2011-03-14'
	 * $query->filterByDatedefaultnotnull(array('max' => 'yesterday')); // WHERE dateDefaultNotNull > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $datedefaultnotnull The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDatedefaultnotnull($datedefaultnotnull = null, ?string $comparison = null)
	{
		if (\is_array($datedefaultnotnull)) {
			$useMinMax = false;

			if (isset($datedefaultnotnull['min'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_DATEDEFAULTNOTNULL, $datedefaultnotnull['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($datedefaultnotnull['max'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_DATEDEFAULTNOTNULL, $datedefaultnotnull['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(DaterecordTableMap::COL_DATEDEFAULTNOTNULL, $datedefaultnotnull, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the dateDefaultNull column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDatedefaultnull('2011-03-14'); // WHERE dateDefaultNull = '2011-03-14'
	 * $query->filterByDatedefaultnull('now'); // WHERE dateDefaultNull = '2011-03-14'
	 * $query->filterByDatedefaultnull(array('max' => 'yesterday')); // WHERE dateDefaultNull > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $datedefaultnull The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDatedefaultnull($datedefaultnull = null, ?string $comparison = null)
	{
		if (\is_array($datedefaultnull)) {
			$useMinMax = false;

			if (isset($datedefaultnull['min'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_DATEDEFAULTNULL, $datedefaultnull['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($datedefaultnull['max'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_DATEDEFAULTNULL, $datedefaultnull['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(DaterecordTableMap::COL_DATEDEFAULTNULL, $datedefaultnull, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the dateDefaultNullable column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDatedefaultnullable('2011-03-14'); // WHERE dateDefaultNullable = '2011-03-14'
	 * $query->filterByDatedefaultnullable('now'); // WHERE dateDefaultNullable = '2011-03-14'
	 * $query->filterByDatedefaultnullable(array('max' => 'yesterday')); // WHERE dateDefaultNullable > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $datedefaultnullable The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDatedefaultnullable($datedefaultnullable = null, ?string $comparison = null)
	{
		if (\is_array($datedefaultnullable)) {
			$useMinMax = false;

			if (isset($datedefaultnullable['min'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_DATEDEFAULTNULLABLE, $datedefaultnullable['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($datedefaultnullable['max'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_DATEDEFAULTNULLABLE, $datedefaultnullable['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(DaterecordTableMap::COL_DATEDEFAULTNULLABLE, $datedefaultnullable, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the dateRecordId column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDaterecordid(1234); // WHERE dateRecordId = 1234
	 * $query->filterByDaterecordid(array(12, 34)); // WHERE dateRecordId IN (12, 34)
	 * $query->filterByDaterecordid(array('min' => 12)); // WHERE dateRecordId > 12
	 * </code>
	 *
	 * @param mixed $daterecordid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDaterecordid($daterecordid = null, ?string $comparison = null)
	{
		if (\is_array($daterecordid)) {
			$useMinMax = false;

			if (isset($daterecordid['min'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_DATERECORDID, $daterecordid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($daterecordid['max'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_DATERECORDID, $daterecordid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(DaterecordTableMap::COL_DATERECORDID, $daterecordid, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the dateRequired column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDaterequired('2011-03-14'); // WHERE dateRequired = '2011-03-14'
	 * $query->filterByDaterequired('now'); // WHERE dateRequired = '2011-03-14'
	 * $query->filterByDaterequired(array('max' => 'yesterday')); // WHERE dateRequired > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $daterequired The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDaterequired($daterequired = null, ?string $comparison = null)
	{
		if (\is_array($daterequired)) {
			$useMinMax = false;

			if (isset($daterequired['min'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_DATEREQUIRED, $daterequired['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($daterequired['max'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_DATEREQUIRED, $daterequired['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(DaterecordTableMap::COL_DATEREQUIRED, $daterequired, $comparison);

		return $this;
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

		$this->addUsingAlias(DaterecordTableMap::COL_DATERECORDID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(DaterecordTableMap::COL_DATERECORDID, $keys, Criteria::IN);

		return $this;
	}

	/**
	 * Filter the query on the timestampDefaultCurrentNotNull column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTimestampdefaultcurrentnotnull('2011-03-14'); // WHERE timestampDefaultCurrentNotNull = '2011-03-14'
	 * $query->filterByTimestampdefaultcurrentnotnull('now'); // WHERE timestampDefaultCurrentNotNull = '2011-03-14'
	 * $query->filterByTimestampdefaultcurrentnotnull(array('max' => 'yesterday')); // WHERE timestampDefaultCurrentNotNull > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $timestampdefaultcurrentnotnull The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByTimestampdefaultcurrentnotnull($timestampdefaultcurrentnotnull = null, ?string $comparison = null)
	{
		if (\is_array($timestampdefaultcurrentnotnull)) {
			$useMinMax = false;

			if (isset($timestampdefaultcurrentnotnull['min'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNOTNULL, $timestampdefaultcurrentnotnull['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($timestampdefaultcurrentnotnull['max'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNOTNULL, $timestampdefaultcurrentnotnull['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNOTNULL, $timestampdefaultcurrentnotnull, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the timestampDefaultCurrentNullable column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTimestampdefaultcurrentnullable('2011-03-14'); // WHERE timestampDefaultCurrentNullable = '2011-03-14'
	 * $query->filterByTimestampdefaultcurrentnullable('now'); // WHERE timestampDefaultCurrentNullable = '2011-03-14'
	 * $query->filterByTimestampdefaultcurrentnullable(array('max' => 'yesterday')); // WHERE timestampDefaultCurrentNullable > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $timestampdefaultcurrentnullable The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByTimestampdefaultcurrentnullable($timestampdefaultcurrentnullable = null, ?string $comparison = null)
	{
		if (\is_array($timestampdefaultcurrentnullable)) {
			$useMinMax = false;

			if (isset($timestampdefaultcurrentnullable['min'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNULLABLE, $timestampdefaultcurrentnullable['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($timestampdefaultcurrentnullable['max'])) {
				$this->addUsingAlias(DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNULLABLE, $timestampdefaultcurrentnullable['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(DaterecordTableMap::COL_TIMESTAMPDEFAULTCURRENTNULLABLE, $timestampdefaultcurrentnullable, $comparison);

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
	 * @return ChildDaterecord|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(DaterecordTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = DaterecordTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildDaterecord $daterecord Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($daterecord = null)
	{
		if ($daterecord) {
			$this->addUsingAlias(DaterecordTableMap::COL_DATERECORDID, $daterecord->getDaterecordid(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildDaterecord|array|mixed the result, formatted by the current formatter
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
	 * @return ChildDaterecord A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT dateRecordId, dateRequired, dateDefaultNull, dateDefaultNullable, dateDefaultNotNull, timestampDefaultCurrentNullable, timestampDefaultCurrentNotNull FROM daterecord WHERE dateRecordId = :p0';

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
			/** @var ChildDaterecord $obj */
			$obj = new ChildDaterecord();
			$obj->hydrate($row);
			DaterecordTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
