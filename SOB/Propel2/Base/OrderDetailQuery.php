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
use SOB\Propel2\Map\OrderDetailTableMap;
use SOB\Propel2\OrderDetail as ChildOrderDetail;
use SOB\Propel2\OrderDetailQuery as ChildOrderDetailQuery;

/**
 * Base class that represents a query for the `order_detail` table.
 *
 * @method     ChildOrderDetailQuery orderByOrderDetailId($order = Criteria::ASC) Order by the order_detail_id column
 * @method     ChildOrderDetailQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOrderDetailQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildOrderDetailQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildOrderDetailQuery orderByUnitPrice($order = Criteria::ASC) Order by the unit_price column
 * @method     ChildOrderDetailQuery orderByDiscount($order = Criteria::ASC) Order by the discount column
 * @method     ChildOrderDetailQuery orderByOrderDetailStatusId($order = Criteria::ASC) Order by the order_detail_status_id column
 * @method     ChildOrderDetailQuery orderByDateAllocated($order = Criteria::ASC) Order by the date_allocated column
 * @method     ChildOrderDetailQuery orderByPurchaseOrderId($order = Criteria::ASC) Order by the purchase_order_id column
 * @method     ChildOrderDetailQuery orderByInventoryTransactionId($order = Criteria::ASC) Order by the inventory_transaction_id column
 *
 * @method     ChildOrderDetailQuery groupByOrderDetailId() Group by the order_detail_id column
 * @method     ChildOrderDetailQuery groupByOrderId() Group by the order_id column
 * @method     ChildOrderDetailQuery groupByProductId() Group by the product_id column
 * @method     ChildOrderDetailQuery groupByQuantity() Group by the quantity column
 * @method     ChildOrderDetailQuery groupByUnitPrice() Group by the unit_price column
 * @method     ChildOrderDetailQuery groupByDiscount() Group by the discount column
 * @method     ChildOrderDetailQuery groupByOrderDetailStatusId() Group by the order_detail_status_id column
 * @method     ChildOrderDetailQuery groupByDateAllocated() Group by the date_allocated column
 * @method     ChildOrderDetailQuery groupByPurchaseOrderId() Group by the purchase_order_id column
 * @method     ChildOrderDetailQuery groupByInventoryTransactionId() Group by the inventory_transaction_id column
 *
 * @method     ChildOrderDetailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrderDetailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrderDetailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrderDetailQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrderDetailQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrderDetailQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrderDetail|null findOne(?ConnectionInterface $con = null) Return the first ChildOrderDetail matching the query
 * @method     ChildOrderDetail findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildOrderDetail matching the query, or a new ChildOrderDetail object populated from the query conditions when no match is found
 *
 * @method     ChildOrderDetail|null findOneByOrderDetailId(int $order_detail_id) Return the first ChildOrderDetail filtered by the order_detail_id column
 * @method     ChildOrderDetail|null findOneByOrderId(int $order_id) Return the first ChildOrderDetail filtered by the order_id column
 * @method     ChildOrderDetail|null findOneByProductId(int $product_id) Return the first ChildOrderDetail filtered by the product_id column
 * @method     ChildOrderDetail|null findOneByQuantity(string $quantity) Return the first ChildOrderDetail filtered by the quantity column
 * @method     ChildOrderDetail|null findOneByUnitPrice(string $unit_price) Return the first ChildOrderDetail filtered by the unit_price column
 * @method     ChildOrderDetail|null findOneByDiscount(double $discount) Return the first ChildOrderDetail filtered by the discount column
 * @method     ChildOrderDetail|null findOneByOrderDetailStatusId(int $order_detail_status_id) Return the first ChildOrderDetail filtered by the order_detail_status_id column
 * @method     ChildOrderDetail|null findOneByDateAllocated(string $date_allocated) Return the first ChildOrderDetail filtered by the date_allocated column
 * @method     ChildOrderDetail|null findOneByPurchaseOrderId(int $purchase_order_id) Return the first ChildOrderDetail filtered by the purchase_order_id column
 * @method     ChildOrderDetail|null findOneByInventoryTransactionId(int $inventory_transaction_id) Return the first ChildOrderDetail filtered by the inventory_transaction_id column
 *
 * @method     ChildOrderDetail requirePk($key, ?ConnectionInterface $con = null) Return the ChildOrderDetail by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderDetail requireOne(?ConnectionInterface $con = null) Return the first ChildOrderDetail matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderDetail requireOneByOrderDetailId(int $order_detail_id) Return the first ChildOrderDetail filtered by the order_detail_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderDetail requireOneByOrderId(int $order_id) Return the first ChildOrderDetail filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderDetail requireOneByProductId(int $product_id) Return the first ChildOrderDetail filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderDetail requireOneByQuantity(string $quantity) Return the first ChildOrderDetail filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderDetail requireOneByUnitPrice(string $unit_price) Return the first ChildOrderDetail filtered by the unit_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderDetail requireOneByDiscount(double $discount) Return the first ChildOrderDetail filtered by the discount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderDetail requireOneByOrderDetailStatusId(int $order_detail_status_id) Return the first ChildOrderDetail filtered by the order_detail_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderDetail requireOneByDateAllocated(string $date_allocated) Return the first ChildOrderDetail filtered by the date_allocated column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderDetail requireOneByPurchaseOrderId(int $purchase_order_id) Return the first ChildOrderDetail filtered by the purchase_order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrderDetail requireOneByInventoryTransactionId(int $inventory_transaction_id) Return the first ChildOrderDetail filtered by the inventory_transaction_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrderDetail[]|Collection find(?ConnectionInterface $con = null) Return ChildOrderDetail objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildOrderDetail> find(?ConnectionInterface $con = null) Return ChildOrderDetail objects based on current ModelCriteria
 *
 * @method     ChildOrderDetail[]|Collection findByOrderDetailId(int|array<int> $order_detail_id) Return ChildOrderDetail objects filtered by the order_detail_id column
 * @psalm-method Collection&\Traversable<ChildOrderDetail> findByOrderDetailId(int|array<int> $order_detail_id) Return ChildOrderDetail objects filtered by the order_detail_id column
 * @method     ChildOrderDetail[]|Collection findByOrderId(int|array<int> $order_id) Return ChildOrderDetail objects filtered by the order_id column
 * @psalm-method Collection&\Traversable<ChildOrderDetail> findByOrderId(int|array<int> $order_id) Return ChildOrderDetail objects filtered by the order_id column
 * @method     ChildOrderDetail[]|Collection findByProductId(int|array<int> $product_id) Return ChildOrderDetail objects filtered by the product_id column
 * @psalm-method Collection&\Traversable<ChildOrderDetail> findByProductId(int|array<int> $product_id) Return ChildOrderDetail objects filtered by the product_id column
 * @method     ChildOrderDetail[]|Collection findByQuantity(string|array<string> $quantity) Return ChildOrderDetail objects filtered by the quantity column
 * @psalm-method Collection&\Traversable<ChildOrderDetail> findByQuantity(string|array<string> $quantity) Return ChildOrderDetail objects filtered by the quantity column
 * @method     ChildOrderDetail[]|Collection findByUnitPrice(string|array<string> $unit_price) Return ChildOrderDetail objects filtered by the unit_price column
 * @psalm-method Collection&\Traversable<ChildOrderDetail> findByUnitPrice(string|array<string> $unit_price) Return ChildOrderDetail objects filtered by the unit_price column
 * @method     ChildOrderDetail[]|Collection findByDiscount(double|array<double> $discount) Return ChildOrderDetail objects filtered by the discount column
 * @psalm-method Collection&\Traversable<ChildOrderDetail> findByDiscount(double|array<double> $discount) Return ChildOrderDetail objects filtered by the discount column
 * @method     ChildOrderDetail[]|Collection findByOrderDetailStatusId(int|array<int> $order_detail_status_id) Return ChildOrderDetail objects filtered by the order_detail_status_id column
 * @psalm-method Collection&\Traversable<ChildOrderDetail> findByOrderDetailStatusId(int|array<int> $order_detail_status_id) Return ChildOrderDetail objects filtered by the order_detail_status_id column
 * @method     ChildOrderDetail[]|Collection findByDateAllocated(string|array<string> $date_allocated) Return ChildOrderDetail objects filtered by the date_allocated column
 * @psalm-method Collection&\Traversable<ChildOrderDetail> findByDateAllocated(string|array<string> $date_allocated) Return ChildOrderDetail objects filtered by the date_allocated column
 * @method     ChildOrderDetail[]|Collection findByPurchaseOrderId(int|array<int> $purchase_order_id) Return ChildOrderDetail objects filtered by the purchase_order_id column
 * @psalm-method Collection&\Traversable<ChildOrderDetail> findByPurchaseOrderId(int|array<int> $purchase_order_id) Return ChildOrderDetail objects filtered by the purchase_order_id column
 * @method     ChildOrderDetail[]|Collection findByInventoryTransactionId(int|array<int> $inventory_transaction_id) Return ChildOrderDetail objects filtered by the inventory_transaction_id column
 * @psalm-method Collection&\Traversable<ChildOrderDetail> findByInventoryTransactionId(int|array<int> $inventory_transaction_id) Return ChildOrderDetail objects filtered by the inventory_transaction_id column
 *
 * @method     ChildOrderDetail[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildOrderDetail> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class OrderDetailQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\OrderDetailQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\OrderDetail', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildOrderDetailQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildOrderDetailQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildOrderDetailQuery) {
			return $criteria;
		}
		$query = new ChildOrderDetailQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(OrderDetailTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(OrderDetailTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			OrderDetailTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			OrderDetailTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the order_detail table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(OrderDetailTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			OrderDetailTableMap::clearInstancePool();
			OrderDetailTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the date_allocated column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDateAllocated('2011-03-14'); // WHERE date_allocated = '2011-03-14'
	 * $query->filterByDateAllocated('now'); // WHERE date_allocated = '2011-03-14'
	 * $query->filterByDateAllocated(array('max' => 'yesterday')); // WHERE date_allocated > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $dateAllocated The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDateAllocated($dateAllocated = null, ?string $comparison = null)
	{
		if (\is_array($dateAllocated)) {
			$useMinMax = false;

			if (isset($dateAllocated['min'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_DATE_ALLOCATED, $dateAllocated['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($dateAllocated['max'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_DATE_ALLOCATED, $dateAllocated['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderDetailTableMap::COL_DATE_ALLOCATED, $dateAllocated, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the discount column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDiscount(1234); // WHERE discount = 1234
	 * $query->filterByDiscount(array(12, 34)); // WHERE discount IN (12, 34)
	 * $query->filterByDiscount(array('min' => 12)); // WHERE discount > 12
	 * </code>
	 *
	 * @param mixed $discount The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDiscount($discount = null, ?string $comparison = null)
	{
		if (\is_array($discount)) {
			$useMinMax = false;

			if (isset($discount['min'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_DISCOUNT, $discount['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($discount['max'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_DISCOUNT, $discount['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderDetailTableMap::COL_DISCOUNT, $discount, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the inventory_transaction_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInventoryTransactionId(1234); // WHERE inventory_transaction_id = 1234
	 * $query->filterByInventoryTransactionId(array(12, 34)); // WHERE inventory_transaction_id IN (12, 34)
	 * $query->filterByInventoryTransactionId(array('min' => 12)); // WHERE inventory_transaction_id > 12
	 * </code>
	 *
	 * @param mixed $inventoryTransactionId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByInventoryTransactionId($inventoryTransactionId = null, ?string $comparison = null)
	{
		if (\is_array($inventoryTransactionId)) {
			$useMinMax = false;

			if (isset($inventoryTransactionId['min'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID, $inventoryTransactionId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($inventoryTransactionId['max'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID, $inventoryTransactionId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID, $inventoryTransactionId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the order_detail_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrderDetailId(1234); // WHERE order_detail_id = 1234
	 * $query->filterByOrderDetailId(array(12, 34)); // WHERE order_detail_id IN (12, 34)
	 * $query->filterByOrderDetailId(array('min' => 12)); // WHERE order_detail_id > 12
	 * </code>
	 *
	 * @param mixed $orderDetailId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByOrderDetailId($orderDetailId = null, ?string $comparison = null)
	{
		if (\is_array($orderDetailId)) {
			$useMinMax = false;

			if (isset($orderDetailId['min'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_ORDER_DETAIL_ID, $orderDetailId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($orderDetailId['max'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_ORDER_DETAIL_ID, $orderDetailId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderDetailTableMap::COL_ORDER_DETAIL_ID, $orderDetailId, $comparison);

		return $this;
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
				$this->addUsingAlias(OrderDetailTableMap::COL_ORDER_DETAIL_STATUS_ID, $orderDetailStatusId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($orderDetailStatusId['max'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_ORDER_DETAIL_STATUS_ID, $orderDetailStatusId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderDetailTableMap::COL_ORDER_DETAIL_STATUS_ID, $orderDetailStatusId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the order_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrderId(1234); // WHERE order_id = 1234
	 * $query->filterByOrderId(array(12, 34)); // WHERE order_id IN (12, 34)
	 * $query->filterByOrderId(array('min' => 12)); // WHERE order_id > 12
	 * </code>
	 *
	 * @param mixed $orderId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByOrderId($orderId = null, ?string $comparison = null)
	{
		if (\is_array($orderId)) {
			$useMinMax = false;

			if (isset($orderId['min'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($orderId['max'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderDetailTableMap::COL_ORDER_ID, $orderId, $comparison);

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

		$this->addUsingAlias(OrderDetailTableMap::COL_ORDER_DETAIL_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(OrderDetailTableMap::COL_ORDER_DETAIL_ID, $keys, Criteria::IN);

		return $this;
	}

	/**
	 * Filter the query on the product_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProductId(1234); // WHERE product_id = 1234
	 * $query->filterByProductId(array(12, 34)); // WHERE product_id IN (12, 34)
	 * $query->filterByProductId(array('min' => 12)); // WHERE product_id > 12
	 * </code>
	 *
	 * @param mixed $productId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByProductId($productId = null, ?string $comparison = null)
	{
		if (\is_array($productId)) {
			$useMinMax = false;

			if (isset($productId['min'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($productId['max'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderDetailTableMap::COL_PRODUCT_ID, $productId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the purchase_order_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPurchaseOrderId(1234); // WHERE purchase_order_id = 1234
	 * $query->filterByPurchaseOrderId(array(12, 34)); // WHERE purchase_order_id IN (12, 34)
	 * $query->filterByPurchaseOrderId(array('min' => 12)); // WHERE purchase_order_id > 12
	 * </code>
	 *
	 * @param mixed $purchaseOrderId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPurchaseOrderId($purchaseOrderId = null, ?string $comparison = null)
	{
		if (\is_array($purchaseOrderId)) {
			$useMinMax = false;

			if (isset($purchaseOrderId['min'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrderId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($purchaseOrderId['max'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrderId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderDetailTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrderId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the quantity column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByQuantity(1234); // WHERE quantity = 1234
	 * $query->filterByQuantity(array(12, 34)); // WHERE quantity IN (12, 34)
	 * $query->filterByQuantity(array('min' => 12)); // WHERE quantity > 12
	 * </code>
	 *
	 * @param mixed $quantity The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByQuantity($quantity = null, ?string $comparison = null)
	{
		if (\is_array($quantity)) {
			$useMinMax = false;

			if (isset($quantity['min'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($quantity['max'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderDetailTableMap::COL_QUANTITY, $quantity, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the unit_price column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUnitPrice(1234); // WHERE unit_price = 1234
	 * $query->filterByUnitPrice(array(12, 34)); // WHERE unit_price IN (12, 34)
	 * $query->filterByUnitPrice(array('min' => 12)); // WHERE unit_price > 12
	 * </code>
	 *
	 * @param mixed $unitPrice The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByUnitPrice($unitPrice = null, ?string $comparison = null)
	{
		if (\is_array($unitPrice)) {
			$useMinMax = false;

			if (isset($unitPrice['min'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_UNIT_PRICE, $unitPrice['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($unitPrice['max'])) {
				$this->addUsingAlias(OrderDetailTableMap::COL_UNIT_PRICE, $unitPrice['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderDetailTableMap::COL_UNIT_PRICE, $unitPrice, $comparison);

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
	 * @return ChildOrderDetail|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(OrderDetailTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = OrderDetailTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildOrderDetail $orderDetail Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($orderDetail = null)
	{
		if ($orderDetail) {
			$this->addUsingAlias(OrderDetailTableMap::COL_ORDER_DETAIL_ID, $orderDetail->getOrderDetailId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildOrderDetail|array|mixed the result, formatted by the current formatter
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
	 * @return ChildOrderDetail A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT order_detail_id, order_id, product_id, quantity, unit_price, discount, order_detail_status_id, date_allocated, purchase_order_id, inventory_transaction_id FROM order_detail WHERE order_detail_id = :p0';

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
			/** @var ChildOrderDetail $obj */
			$obj = new ChildOrderDetail();
			$obj->hydrate($row);
			OrderDetailTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
