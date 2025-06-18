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
use SOB\Propel2\Map\OrderStatusTableMap;
use SOB\Propel2\OrderStatus as ChildOrderStatus;
use SOB\Propel2\OrderStatusQuery as ChildOrderStatusQuery;

/**
 * Base class that represents a query for the `order_status` table.
 *
 * @method     ChildOrderStatusQuery orderByOrderStatusId($order = Criteria::ASC) Order by the order_status_id column
 * @method     ChildOrderStatusQuery orderByOrderStatusName($order = Criteria::ASC) Order by the order_status_name column
 *
 * @method     ChildOrderStatusQuery groupByOrderStatusId() Group by the order_status_id column
 * @method     ChildOrderStatusQuery groupByOrderStatusName() Group by the order_status_name column
 *
 * @method     ChildOrderStatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrderStatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrderStatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrderStatusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrderStatusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrderStatusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrderStatus|null findOne(?ConnectionInterface $con = null) Return the first ChildOrderStatus matching the query
 * @method     ChildOrderStatus findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildOrderStatus matching the query, or a new ChildOrderStatus object populated from the query conditions when no match is found
 *
 * @method     ChildOrderStatus|null findOneByOrderStatusId(int $order_status_id) Return the first ChildOrderStatus filtered by the order_status_id column
 * @method     ChildOrderStatus|null findOneByOrderStatusName(string $order_status_name) Return the first ChildOrderStatus filtered by the order_status_name column
 *
 * @method     ChildOrderStatus requirePk($key, ?ConnectionInterface $con = null) Return the ChildOrderStatus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderStatus requireOne(?ConnectionInterface $con = null) Return the first ChildOrderStatus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderStatus requireOneByOrderStatusId(int $order_status_id) Return the first ChildOrderStatus filtered by the order_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderStatus requireOneByOrderStatusName(string $order_status_name) Return the first ChildOrderStatus filtered by the order_status_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderStatus[]|Collection find(?ConnectionInterface $con = null) Return ChildOrderStatus objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildOrderStatus> find(?ConnectionInterface $con = null) Return ChildOrderStatus objects based on current ModelCriteria
 *
 * @method     ChildOrderStatus[]|Collection findByOrderStatusId(int|array<int> $order_status_id) Return ChildOrderStatus objects filtered by the order_status_id column
 * @psalm-method Collection&\Traversable<ChildOrderStatus> findByOrderStatusId(int|array<int> $order_status_id) Return ChildOrderStatus objects filtered by the order_status_id column
 * @method     ChildOrderStatus[]|Collection findByOrderStatusName(string|array<string> $order_status_name) Return ChildOrderStatus objects filtered by the order_status_name column
 * @psalm-method Collection&\Traversable<ChildOrderStatus> findByOrderStatusName(string|array<string> $order_status_name) Return ChildOrderStatus objects filtered by the order_status_name column
 *
 * @method     ChildOrderStatus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildOrderStatus> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class OrderStatusQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\OrderStatusQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\OrderStatus', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildOrderStatusQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildOrderStatusQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildOrderStatusQuery) {
			return $criteria;
		}
		$query = new ChildOrderStatusQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(OrderStatusTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(OrderStatusTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(static function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			OrderStatusTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			OrderStatusTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the order_status table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(OrderStatusTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			OrderStatusTableMap::clearInstancePool();
			OrderStatusTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the order_status_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrderStatusId(1234); // WHERE order_status_id = 1234
	 * $query->filterByOrderStatusId(array(12, 34)); // WHERE order_status_id IN (12, 34)
	 * $query->filterByOrderStatusId(array('min' => 12)); // WHERE order_status_id > 12
	 * </code>
	 *
	 * @param mixed $orderStatusId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByOrderStatusId($orderStatusId = null, ?string $comparison = null)
	{
		if (\is_array($orderStatusId)) {
			$useMinMax = false;

			if (isset($orderStatusId['min'])) {
				$this->addUsingAlias(OrderStatusTableMap::COL_ORDER_STATUS_ID, $orderStatusId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($orderStatusId['max'])) {
				$this->addUsingAlias(OrderStatusTableMap::COL_ORDER_STATUS_ID, $orderStatusId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderStatusTableMap::COL_ORDER_STATUS_ID, $orderStatusId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the order_status_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrderStatusName('fooValue');   // WHERE order_status_name = 'fooValue'
	 * $query->filterByOrderStatusName('%fooValue%', Criteria::LIKE); // WHERE order_status_name LIKE '%fooValue%'
	 * $query->filterByOrderStatusName(['foo', 'bar']); // WHERE order_status_name IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $orderStatusName The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByOrderStatusName($orderStatusName = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($orderStatusName)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderStatusTableMap::COL_ORDER_STATUS_NAME, $orderStatusName, $comparison);

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

		$this->addUsingAlias(OrderStatusTableMap::COL_ORDER_STATUS_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(OrderStatusTableMap::COL_ORDER_STATUS_ID, $keys, Criteria::IN);

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
	 * @return ChildOrderStatus|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(OrderStatusTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = OrderStatusTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildOrderStatus $orderStatus Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($orderStatus = null)
	{
		if ($orderStatus) {
			$this->addUsingAlias(OrderStatusTableMap::COL_ORDER_STATUS_ID, $orderStatus->getOrderStatusId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildOrderStatus|array|mixed the result, formatted by the current formatter
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
	 * @return ChildOrderStatus A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT order_status_id, order_status_name FROM order_status WHERE order_status_id = :p0';

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
			/** @var ChildOrderStatus $obj */
			$obj = new ChildOrderStatus();
			$obj->hydrate($row);
			OrderStatusTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
