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
use SOB\Propel2\Map\PurchaseOrderStatusTableMap;
use SOB\Propel2\PurchaseOrderStatus as ChildPurchaseOrderStatus;
use SOB\Propel2\PurchaseOrderStatusQuery as ChildPurchaseOrderStatusQuery;

/**
 * Base class that represents a query for the `purchase_order_status` table.
 *
 * @method     ChildPurchaseOrderStatusQuery orderByPurchaseOrderStatusId($order = Criteria::ASC) Order by the purchase_order_status_id column
 * @method     ChildPurchaseOrderStatusQuery orderByPurchaseOrderStatusName($order = Criteria::ASC) Order by the purchase_order_status_name column
 *
 * @method     ChildPurchaseOrderStatusQuery groupByPurchaseOrderStatusId() Group by the purchase_order_status_id column
 * @method     ChildPurchaseOrderStatusQuery groupByPurchaseOrderStatusName() Group by the purchase_order_status_name column
 *
 * @method     ChildPurchaseOrderStatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPurchaseOrderStatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPurchaseOrderStatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPurchaseOrderStatusQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPurchaseOrderStatusQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPurchaseOrderStatusQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPurchaseOrderStatus|null findOne(?ConnectionInterface $con = null) Return the first ChildPurchaseOrderStatus matching the query
 * @method     ChildPurchaseOrderStatus findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildPurchaseOrderStatus matching the query, or a new ChildPurchaseOrderStatus object populated from the query conditions when no match is found
 *
 * @method     ChildPurchaseOrderStatus|null findOneByPurchaseOrderStatusId(int $purchase_order_status_id) Return the first ChildPurchaseOrderStatus filtered by the purchase_order_status_id column
 * @method     ChildPurchaseOrderStatus|null findOneByPurchaseOrderStatusName(string $purchase_order_status_name) Return the first ChildPurchaseOrderStatus filtered by the purchase_order_status_name column
 *
 * @method     ChildPurchaseOrderStatus requirePk($key, ?ConnectionInterface $con = null) Return the ChildPurchaseOrderStatus by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrderStatus requireOne(?ConnectionInterface $con = null) Return the first ChildPurchaseOrderStatus matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPurchaseOrderStatus requireOneByPurchaseOrderStatusId(int $purchase_order_status_id) Return the first ChildPurchaseOrderStatus filtered by the purchase_order_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrderStatus requireOneByPurchaseOrderStatusName(string $purchase_order_status_name) Return the first ChildPurchaseOrderStatus filtered by the purchase_order_status_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPurchaseOrderStatus[]|Collection find(?ConnectionInterface $con = null) Return ChildPurchaseOrderStatus objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildPurchaseOrderStatus> find(?ConnectionInterface $con = null) Return ChildPurchaseOrderStatus objects based on current ModelCriteria
 *
 * @method     ChildPurchaseOrderStatus[]|Collection findByPurchaseOrderStatusId(int|array<int> $purchase_order_status_id) Return ChildPurchaseOrderStatus objects filtered by the purchase_order_status_id column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrderStatus> findByPurchaseOrderStatusId(int|array<int> $purchase_order_status_id) Return ChildPurchaseOrderStatus objects filtered by the purchase_order_status_id column
 * @method     ChildPurchaseOrderStatus[]|Collection findByPurchaseOrderStatusName(string|array<string> $purchase_order_status_name) Return ChildPurchaseOrderStatus objects filtered by the purchase_order_status_name column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrderStatus> findByPurchaseOrderStatusName(string|array<string> $purchase_order_status_name) Return ChildPurchaseOrderStatus objects filtered by the purchase_order_status_name column
 *
 * @method     ChildPurchaseOrderStatus[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildPurchaseOrderStatus> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class PurchaseOrderStatusQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\PurchaseOrderStatusQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\PurchaseOrderStatus', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildPurchaseOrderStatusQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildPurchaseOrderStatusQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildPurchaseOrderStatusQuery) {
			return $criteria;
		}
		$query = new ChildPurchaseOrderStatusQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderStatusTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(PurchaseOrderStatusTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(static function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			PurchaseOrderStatusTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			PurchaseOrderStatusTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the purchase_order_status table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderStatusTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			PurchaseOrderStatusTableMap::clearInstancePool();
			PurchaseOrderStatusTableMap::clearRelatedInstancePool();

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

		$this->addUsingAlias(PurchaseOrderStatusTableMap::COL_PURCHASE_ORDER_STATUS_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(PurchaseOrderStatusTableMap::COL_PURCHASE_ORDER_STATUS_ID, $keys, Criteria::IN);

		return $this;
	}

	/**
	 * Filter the query on the purchase_order_status_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPurchaseOrderStatusId(1234); // WHERE purchase_order_status_id = 1234
	 * $query->filterByPurchaseOrderStatusId(array(12, 34)); // WHERE purchase_order_status_id IN (12, 34)
	 * $query->filterByPurchaseOrderStatusId(array('min' => 12)); // WHERE purchase_order_status_id > 12
	 * </code>
	 *
	 * @param mixed $purchaseOrderStatusId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPurchaseOrderStatusId($purchaseOrderStatusId = null, ?string $comparison = null)
	{
		if (\is_array($purchaseOrderStatusId)) {
			$useMinMax = false;

			if (isset($purchaseOrderStatusId['min'])) {
				$this->addUsingAlias(PurchaseOrderStatusTableMap::COL_PURCHASE_ORDER_STATUS_ID, $purchaseOrderStatusId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($purchaseOrderStatusId['max'])) {
				$this->addUsingAlias(PurchaseOrderStatusTableMap::COL_PURCHASE_ORDER_STATUS_ID, $purchaseOrderStatusId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderStatusTableMap::COL_PURCHASE_ORDER_STATUS_ID, $purchaseOrderStatusId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the purchase_order_status_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPurchaseOrderStatusName('fooValue');   // WHERE purchase_order_status_name = 'fooValue'
	 * $query->filterByPurchaseOrderStatusName('%fooValue%', Criteria::LIKE); // WHERE purchase_order_status_name LIKE '%fooValue%'
	 * $query->filterByPurchaseOrderStatusName(['foo', 'bar']); // WHERE purchase_order_status_name IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $purchaseOrderStatusName The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPurchaseOrderStatusName($purchaseOrderStatusName = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($purchaseOrderStatusName)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderStatusTableMap::COL_PURCHASE_ORDER_STATUS_NAME, $purchaseOrderStatusName, $comparison);

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
	 * @return ChildPurchaseOrderStatus|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(PurchaseOrderStatusTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = PurchaseOrderStatusTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildPurchaseOrderStatus $purchaseOrderStatus Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($purchaseOrderStatus = null)
	{
		if ($purchaseOrderStatus) {
			$this->addUsingAlias(PurchaseOrderStatusTableMap::COL_PURCHASE_ORDER_STATUS_ID, $purchaseOrderStatus->getPurchaseOrderStatusId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildPurchaseOrderStatus|array|mixed the result, formatted by the current formatter
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
	 * @return ChildPurchaseOrderStatus A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT purchase_order_status_id, purchase_order_status_name FROM purchase_order_status WHERE purchase_order_status_id = :p0';

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
			/** @var ChildPurchaseOrderStatus $obj */
			$obj = new ChildPurchaseOrderStatus();
			$obj->hydrate($row);
			PurchaseOrderStatusTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
