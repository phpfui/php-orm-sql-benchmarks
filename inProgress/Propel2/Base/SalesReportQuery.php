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
use SOB\Propel2\Map\SalesReportTableMap;
use SOB\Propel2\SalesReport as ChildSalesReport;
use SOB\Propel2\SalesReportQuery as ChildSalesReportQuery;

/**
 * Base class that represents a query for the `sales_report` table.
 *
 * @method     ChildSalesReportQuery orderByGroupBy($order = Criteria::ASC) Order by the group_by column
 * @method     ChildSalesReportQuery orderByDisplay($order = Criteria::ASC) Order by the display column
 * @method     ChildSalesReportQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildSalesReportQuery orderByFilterRowSource($order = Criteria::ASC) Order by the filter_row_source column
 * @method     ChildSalesReportQuery orderByDefault($order = Criteria::ASC) Order by the default column
 *
 * @method     ChildSalesReportQuery groupByGroupBy() Group by the group_by column
 * @method     ChildSalesReportQuery groupByDisplay() Group by the display column
 * @method     ChildSalesReportQuery groupByTitle() Group by the title column
 * @method     ChildSalesReportQuery groupByFilterRowSource() Group by the filter_row_source column
 * @method     ChildSalesReportQuery groupByDefault() Group by the default column
 *
 * @method     ChildSalesReportQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSalesReportQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSalesReportQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSalesReportQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSalesReportQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSalesReportQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSalesReport|null findOne(?ConnectionInterface $con = null) Return the first ChildSalesReport matching the query
 * @method     ChildSalesReport findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildSalesReport matching the query, or a new ChildSalesReport object populated from the query conditions when no match is found
 *
 * @method     ChildSalesReport|null findOneByGroupBy(string $group_by) Return the first ChildSalesReport filtered by the group_by column
 * @method     ChildSalesReport|null findOneByDisplay(string $display) Return the first ChildSalesReport filtered by the display column
 * @method     ChildSalesReport|null findOneByTitle(string $title) Return the first ChildSalesReport filtered by the title column
 * @method     ChildSalesReport|null findOneByFilterRowSource(string $filter_row_source) Return the first ChildSalesReport filtered by the filter_row_source column
 * @method     ChildSalesReport|null findOneByDefault(int $default) Return the first ChildSalesReport filtered by the default column
 *
 * @method     ChildSalesReport requirePk($key, ?ConnectionInterface $con = null) Return the ChildSalesReport by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesReport requireOne(?ConnectionInterface $con = null) Return the first ChildSalesReport matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSalesReport requireOneByGroupBy(string $group_by) Return the first ChildSalesReport filtered by the group_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesReport requireOneByDisplay(string $display) Return the first ChildSalesReport filtered by the display column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesReport requireOneByTitle(string $title) Return the first ChildSalesReport filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesReport requireOneByFilterRowSource(string $filter_row_source) Return the first ChildSalesReport filtered by the filter_row_source column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSalesReport requireOneByDefault(int $default) Return the first ChildSalesReport filtered by the default column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSalesReport[]|Collection find(?ConnectionInterface $con = null) Return ChildSalesReport objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildSalesReport> find(?ConnectionInterface $con = null) Return ChildSalesReport objects based on current ModelCriteria
 *
 * @method     ChildSalesReport[]|Collection findByGroupBy(string|array<string> $group_by) Return ChildSalesReport objects filtered by the group_by column
 * @psalm-method Collection&\Traversable<ChildSalesReport> findByGroupBy(string|array<string> $group_by) Return ChildSalesReport objects filtered by the group_by column
 * @method     ChildSalesReport[]|Collection findByDisplay(string|array<string> $display) Return ChildSalesReport objects filtered by the display column
 * @psalm-method Collection&\Traversable<ChildSalesReport> findByDisplay(string|array<string> $display) Return ChildSalesReport objects filtered by the display column
 * @method     ChildSalesReport[]|Collection findByTitle(string|array<string> $title) Return ChildSalesReport objects filtered by the title column
 * @psalm-method Collection&\Traversable<ChildSalesReport> findByTitle(string|array<string> $title) Return ChildSalesReport objects filtered by the title column
 * @method     ChildSalesReport[]|Collection findByFilterRowSource(string|array<string> $filter_row_source) Return ChildSalesReport objects filtered by the filter_row_source column
 * @psalm-method Collection&\Traversable<ChildSalesReport> findByFilterRowSource(string|array<string> $filter_row_source) Return ChildSalesReport objects filtered by the filter_row_source column
 * @method     ChildSalesReport[]|Collection findByDefault(int|array<int> $default) Return ChildSalesReport objects filtered by the default column
 * @psalm-method Collection&\Traversable<ChildSalesReport> findByDefault(int|array<int> $default) Return ChildSalesReport objects filtered by the default column
 *
 * @method     ChildSalesReport[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildSalesReport> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class SalesReportQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\SalesReportQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\SalesReport', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildSalesReportQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildSalesReportQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildSalesReportQuery) {
			return $criteria;
		}
		$query = new ChildSalesReportQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(SalesReportTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(SalesReportTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(static function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			SalesReportTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			SalesReportTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the sales_report table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(SalesReportTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			SalesReportTableMap::clearInstancePool();
			SalesReportTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the default column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDefault(1234); // WHERE default = 1234
	 * $query->filterByDefault(array(12, 34)); // WHERE default IN (12, 34)
	 * $query->filterByDefault(array('min' => 12)); // WHERE default > 12
	 * </code>
	 *
	 * @param mixed $default The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDefault($default = null, ?string $comparison = null)
	{
		if (\is_array($default)) {
			$useMinMax = false;

			if (isset($default['min'])) {
				$this->addUsingAlias(SalesReportTableMap::COL_DEFAULT, $default['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($default['max'])) {
				$this->addUsingAlias(SalesReportTableMap::COL_DEFAULT, $default['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SalesReportTableMap::COL_DEFAULT, $default, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the display column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDisplay('fooValue');   // WHERE display = 'fooValue'
	 * $query->filterByDisplay('%fooValue%', Criteria::LIKE); // WHERE display LIKE '%fooValue%'
	 * $query->filterByDisplay(['foo', 'bar']); // WHERE display IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $display The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDisplay($display = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($display)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SalesReportTableMap::COL_DISPLAY, $display, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the filter_row_source column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFilterRowSource('fooValue');   // WHERE filter_row_source = 'fooValue'
	 * $query->filterByFilterRowSource('%fooValue%', Criteria::LIKE); // WHERE filter_row_source LIKE '%fooValue%'
	 * $query->filterByFilterRowSource(['foo', 'bar']); // WHERE filter_row_source IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $filterRowSource The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByFilterRowSource($filterRowSource = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($filterRowSource)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SalesReportTableMap::COL_FILTER_ROW_SOURCE, $filterRowSource, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the group_by column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByGroupBy('fooValue');   // WHERE group_by = 'fooValue'
	 * $query->filterByGroupBy('%fooValue%', Criteria::LIKE); // WHERE group_by LIKE '%fooValue%'
	 * $query->filterByGroupBy(['foo', 'bar']); // WHERE group_by IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $groupBy The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByGroupBy($groupBy = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($groupBy)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SalesReportTableMap::COL_GROUP_BY, $groupBy, $comparison);

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

		$this->addUsingAlias(SalesReportTableMap::COL_GROUP_BY, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(SalesReportTableMap::COL_GROUP_BY, $keys, Criteria::IN);

		return $this;
	}

	/**
	 * Filter the query on the title column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
	 * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
	 * $query->filterByTitle(['foo', 'bar']); // WHERE title IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $title The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByTitle($title = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($title)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SalesReportTableMap::COL_TITLE, $title, $comparison);

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
	 * @return ChildSalesReport|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(SalesReportTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = SalesReportTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildSalesReport $salesReport Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($salesReport = null)
	{
		if ($salesReport) {
			$this->addUsingAlias(SalesReportTableMap::COL_GROUP_BY, $salesReport->getGroupBy(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildSalesReport|array|mixed the result, formatted by the current formatter
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
	 * @return ChildSalesReport A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT group_by, display, title, filter_row_source, default FROM sales_report WHERE group_by = :p0';

		try {
			$stmt = $con->prepare($sql);
			$stmt->bindValue(':p0', $key, PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);

			throw new PropelException(\sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
		}
		$obj = null;

		if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
			/** @var ChildSalesReport $obj */
			$obj = new ChildSalesReport();
			$obj->hydrate($row);
			SalesReportTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
