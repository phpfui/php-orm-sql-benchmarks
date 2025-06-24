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
use SOB\Propel2\Map\OrderTaxStatusTableMap;
use SOB\Propel2\OrderTaxStatus as ChildOrderTaxStatus;
use SOB\Propel2\OrderTaxStatusQuery as ChildOrderTaxStatusQuery;

/**
 * Base class that represents a query for the `order_tax_status` table.
 *
 * @method     ChildOrderTaxStatusQuery orderByOrderTaxStatusId($order = Criteria::ASC) Order by the order_tax_status_id column
 * @method     ChildOrderTaxStatusQuery orderByOrderTaxStatusName($order = Criteria::ASC) Order by the order_tax_status_name column
 *
 * @method     ChildOrderTaxStatusQuery groupByOrderTaxStatusId() Group by the order_tax_status_id column
 * @method     ChildOrderTaxStatusQuery groupByOrderTaxStatusName() Group by the order_tax_status_name column
 *
 * @method     ChildOrderTaxStatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrderTaxStatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrderTaxStatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrderTaxStatusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrderTaxStatusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrderTaxStatusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrderTaxStatus|null findOne(?ConnectionInterface $con = null) Return the first ChildOrderTaxStatus matching the query
 * @method     ChildOrderTaxStatus findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildOrderTaxStatus matching the query, or a new ChildOrderTaxStatus object populated from the query conditions when no match is found
 *
 * @method     ChildOrderTaxStatus|null findOneByOrderTaxStatusId(int $order_tax_status_id) Return the first ChildOrderTaxStatus filtered by the order_tax_status_id column
 * @method     ChildOrderTaxStatus|null findOneByOrderTaxStatusName(string $order_tax_status_name) Return the first ChildOrderTaxStatus filtered by the order_tax_status_name column
 *
 * @method     ChildOrderTaxStatus requirePk($key, ?ConnectionInterface $con = null) Return the ChildOrderTaxStatus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderTaxStatus requireOne(?ConnectionInterface $con = null) Return the first ChildOrderTaxStatus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderTaxStatus requireOneByOrderTaxStatusId(int $order_tax_status_id) Return the first ChildOrderTaxStatus filtered by the order_tax_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderTaxStatus requireOneByOrderTaxStatusName(string $order_tax_status_name) Return the first ChildOrderTaxStatus filtered by the order_tax_status_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderTaxStatus[]|Collection find(?ConnectionInterface $con = null) Return ChildOrderTaxStatus objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildOrderTaxStatus> find(?ConnectionInterface $con = null) Return ChildOrderTaxStatus objects based on current ModelCriteria
 *
 * @method     ChildOrderTaxStatus[]|Collection findByOrderTaxStatusId(int|array<int> $order_tax_status_id) Return ChildOrderTaxStatus objects filtered by the order_tax_status_id column
 * @psalm-method Collection&\Traversable<ChildOrderTaxStatus> findByOrderTaxStatusId(int|array<int> $order_tax_status_id) Return ChildOrderTaxStatus objects filtered by the order_tax_status_id column
 * @method     ChildOrderTaxStatus[]|Collection findByOrderTaxStatusName(string|array<string> $order_tax_status_name) Return ChildOrderTaxStatus objects filtered by the order_tax_status_name column
 * @psalm-method Collection&\Traversable<ChildOrderTaxStatus> findByOrderTaxStatusName(string|array<string> $order_tax_status_name) Return ChildOrderTaxStatus objects filtered by the order_tax_status_name column
 *
 * @method     ChildOrderTaxStatus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildOrderTaxStatus> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class OrderTaxStatusQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\OrderTaxStatusQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\OrderTaxStatus', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildOrderTaxStatusQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildOrderTaxStatusQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildOrderTaxStatusQuery) {
			return $criteria;
		}
		$query = new ChildOrderTaxStatusQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(OrderTaxStatusTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(OrderTaxStatusTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			OrderTaxStatusTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			OrderTaxStatusTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the order_tax_status table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(OrderTaxStatusTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			OrderTaxStatusTableMap::clearInstancePool();
			OrderTaxStatusTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the order_tax_status_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrderTaxStatusId(1234); // WHERE order_tax_status_id = 1234
	 * $query->filterByOrderTaxStatusId(array(12, 34)); // WHERE order_tax_status_id IN (12, 34)
	 * $query->filterByOrderTaxStatusId(array('min' => 12)); // WHERE order_tax_status_id > 12
	 * </code>
	 *
	 * @param mixed $orderTaxStatusId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByOrderTaxStatusId($orderTaxStatusId = null, ?string $comparison = null)
	{
		if (\is_array($orderTaxStatusId)) {
			$useMinMax = false;

			if (isset($orderTaxStatusId['min'])) {
				$this->addUsingAlias(OrderTaxStatusTableMap::COL_ORDER_TAX_STATUS_ID, $orderTaxStatusId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($orderTaxStatusId['max'])) {
				$this->addUsingAlias(OrderTaxStatusTableMap::COL_ORDER_TAX_STATUS_ID, $orderTaxStatusId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTaxStatusTableMap::COL_ORDER_TAX_STATUS_ID, $orderTaxStatusId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the order_tax_status_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrderTaxStatusName('fooValue');   // WHERE order_tax_status_name = 'fooValue'
	 * $query->filterByOrderTaxStatusName('%fooValue%', Criteria::LIKE); // WHERE order_tax_status_name LIKE '%fooValue%'
	 * $query->filterByOrderTaxStatusName(['foo', 'bar']); // WHERE order_tax_status_name IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $orderTaxStatusName The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByOrderTaxStatusName($orderTaxStatusName = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($orderTaxStatusName)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTaxStatusTableMap::COL_ORDER_TAX_STATUS_NAME, $orderTaxStatusName, $comparison);

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

		$this->addUsingAlias(OrderTaxStatusTableMap::COL_ORDER_TAX_STATUS_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(OrderTaxStatusTableMap::COL_ORDER_TAX_STATUS_ID, $keys, Criteria::IN);

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
	 * @return ChildOrderTaxStatus|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(OrderTaxStatusTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = OrderTaxStatusTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildOrderTaxStatus $orderTaxStatus Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($orderTaxStatus = null)
	{
		if ($orderTaxStatus) {
			$this->addUsingAlias(OrderTaxStatusTableMap::COL_ORDER_TAX_STATUS_ID, $orderTaxStatus->getOrderTaxStatusId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildOrderTaxStatus|array|mixed the result, formatted by the current formatter
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
	 * @return ChildOrderTaxStatus A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT order_tax_status_id, order_tax_status_name FROM order_tax_status WHERE order_tax_status_id = :p0';

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
			/** @var ChildOrderTaxStatus $obj */
			$obj = new ChildOrderTaxStatus();
			$obj->hydrate($row);
			OrderTaxStatusTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
