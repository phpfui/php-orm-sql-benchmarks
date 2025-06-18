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
use SOB\Propel2\Map\OrderDetailStatusTableMap;
use SOB\Propel2\OrderDetailStatus as ChildOrderDetailStatus;
use SOB\Propel2\OrderDetailStatusQuery as ChildOrderDetailStatusQuery;

/**
 * Base class that represents a query for the `order_detail_status` table.
 *
 * @method     ChildOrderDetailStatusQuery orderByOrderDetailStatusId($order = Criteria::ASC) Order by the order_detail_status_id column
 * @method     ChildOrderDetailStatusQuery orderByOrderDetailStatusName($order = Criteria::ASC) Order by the order_detail_status_name column
 *
 * @method     ChildOrderDetailStatusQuery groupByOrderDetailStatusId() Group by the order_detail_status_id column
 * @method     ChildOrderDetailStatusQuery groupByOrderDetailStatusName() Group by the order_detail_status_name column
 *
 * @method     ChildOrderDetailStatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrderDetailStatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrderDetailStatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrderDetailStatusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrderDetailStatusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrderDetailStatusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrderDetailStatus|null findOne(?ConnectionInterface $con = null) Return the first ChildOrderDetailStatus matching the query
 * @method     ChildOrderDetailStatus findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildOrderDetailStatus matching the query, or a new ChildOrderDetailStatus object populated from the query conditions when no match is found
 *
 * @method     ChildOrderDetailStatus|null findOneByOrderDetailStatusId(int $order_detail_status_id) Return the first ChildOrderDetailStatus filtered by the order_detail_status_id column
 * @method     ChildOrderDetailStatus|null findOneByOrderDetailStatusName(string $order_detail_status_name) Return the first ChildOrderDetailStatus filtered by the order_detail_status_name column
 *
 * @method     ChildOrderDetailStatus requirePk($key, ?ConnectionInterface $con = null) Return the ChildOrderDetailStatus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderDetailStatus requireOne(?ConnectionInterface $con = null) Return the first ChildOrderDetailStatus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderDetailStatus requireOneByOrderDetailStatusId(int $order_detail_status_id) Return the first ChildOrderDetailStatus filtered by the order_detail_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderDetailStatus requireOneByOrderDetailStatusName(string $order_detail_status_name) Return the first ChildOrderDetailStatus filtered by the order_detail_status_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderDetailStatus[]|Collection find(?ConnectionInterface $con = null) Return ChildOrderDetailStatus objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildOrderDetailStatus> find(?ConnectionInterface $con = null) Return ChildOrderDetailStatus objects based on current ModelCriteria
 *
 * @method     ChildOrderDetailStatus[]|Collection findByOrderDetailStatusId(int|array<int> $order_detail_status_id) Return ChildOrderDetailStatus objects filtered by the order_detail_status_id column
 * @psalm-method Collection&\Traversable<ChildOrderDetailStatus> findByOrderDetailStatusId(int|array<int> $order_detail_status_id) Return ChildOrderDetailStatus objects filtered by the order_detail_status_id column
 * @method     ChildOrderDetailStatus[]|Collection findByOrderDetailStatusName(string|array<string> $order_detail_status_name) Return ChildOrderDetailStatus objects filtered by the order_detail_status_name column
 * @psalm-method Collection&\Traversable<ChildOrderDetailStatus> findByOrderDetailStatusName(string|array<string> $order_detail_status_name) Return ChildOrderDetailStatus objects filtered by the order_detail_status_name column
 *
 * @method     ChildOrderDetailStatus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildOrderDetailStatus> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class OrderDetailStatusQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\OrderDetailStatusQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\OrderDetailStatus', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildOrderDetailStatusQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildOrderDetailStatusQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildOrderDetailStatusQuery) {
			return $criteria;
		}
		$query = new ChildOrderDetailStatusQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(OrderDetailStatusTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(OrderDetailStatusTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(static function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			OrderDetailStatusTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			OrderDetailStatusTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the order_detail_status table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(OrderDetailStatusTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			OrderDetailStatusTableMap::clearInstancePool();
			OrderDetailStatusTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the order_detail_status_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrderDetailStatusId(1234); // WHERE order_detail_status_id = 1234
	 * $query->filterByOrderDetailStatusId(array(12, 34)); // WHERE order_detail_status_id IN (12, 34)
	 * $query->filterByOrderDetailStatusId(array('min' => 12)); // WHERE order_detail_status_id > 12
	 * </code>
	 *
	 * @param mixed $orderDetailStatusId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByOrderDetailStatusId($orderDetailStatusId = null, ?string $comparison = null)
	{
		if (\is_array($orderDetailStatusId)) {
			$useMinMax = false;

			if (isset($orderDetailStatusId['min'])) {
				$this->addUsingAlias(OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_ID, $orderDetailStatusId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($orderDetailStatusId['max'])) {
				$this->addUsingAlias(OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_ID, $orderDetailStatusId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_ID, $orderDetailStatusId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the order_detail_status_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrderDetailStatusName('fooValue');   // WHERE order_detail_status_name = 'fooValue'
	 * $query->filterByOrderDetailStatusName('%fooValue%', Criteria::LIKE); // WHERE order_detail_status_name LIKE '%fooValue%'
	 * $query->filterByOrderDetailStatusName(['foo', 'bar']); // WHERE order_detail_status_name IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $orderDetailStatusName The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByOrderDetailStatusName($orderDetailStatusName = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($orderDetailStatusName)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_NAME, $orderDetailStatusName, $comparison);

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

		$this->addUsingAlias(OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_ID, $keys, Criteria::IN);

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
	 * @return ChildOrderDetailStatus|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(OrderDetailStatusTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = OrderDetailStatusTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildOrderDetailStatus $orderDetailStatus Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($orderDetailStatus = null)
	{
		if ($orderDetailStatus) {
			$this->addUsingAlias(OrderDetailStatusTableMap::COL_ORDER_DETAIL_STATUS_ID, $orderDetailStatus->getOrderDetailStatusId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildOrderDetailStatus|array|mixed the result, formatted by the current formatter
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
	 * @return ChildOrderDetailStatus A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT order_detail_status_id, order_detail_status_name FROM order_detail_status WHERE order_detail_status_id = :p0';

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
			/** @var ChildOrderDetailStatus $obj */
			$obj = new ChildOrderDetailStatus();
			$obj->hydrate($row);
			OrderDetailStatusTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
