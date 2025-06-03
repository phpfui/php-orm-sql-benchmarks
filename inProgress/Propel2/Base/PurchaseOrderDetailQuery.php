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
use SOB\Propel2\Map\PurchaseOrderDetailTableMap;
use SOB\Propel2\PurchaseOrderDetail as ChildPurchaseOrderDetail;
use SOB\Propel2\PurchaseOrderDetailQuery as ChildPurchaseOrderDetailQuery;

/**
 * Base class that represents a query for the `purchase_order_detail` table.
 *
 * @method     ChildPurchaseOrderDetailQuery orderByPurchaseOrderDetailId($order = Criteria::ASC) Order by the purchase_order_detail_id column
 * @method     ChildPurchaseOrderDetailQuery orderByPurchaseOrderId($order = Criteria::ASC) Order by the purchase_order_id column
 * @method     ChildPurchaseOrderDetailQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildPurchaseOrderDetailQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildPurchaseOrderDetailQuery orderByUnitCost($order = Criteria::ASC) Order by the unit_cost column
 * @method     ChildPurchaseOrderDetailQuery orderByDateReceived($order = Criteria::ASC) Order by the date_received column
 * @method     ChildPurchaseOrderDetailQuery orderByPostedToInventory($order = Criteria::ASC) Order by the posted_to_inventory column
 * @method     ChildPurchaseOrderDetailQuery orderByInventoryTransactionId($order = Criteria::ASC) Order by the inventory_transaction_id column
 *
 * @method     ChildPurchaseOrderDetailQuery groupByPurchaseOrderDetailId() Group by the purchase_order_detail_id column
 * @method     ChildPurchaseOrderDetailQuery groupByPurchaseOrderId() Group by the purchase_order_id column
 * @method     ChildPurchaseOrderDetailQuery groupByProductId() Group by the product_id column
 * @method     ChildPurchaseOrderDetailQuery groupByQuantity() Group by the quantity column
 * @method     ChildPurchaseOrderDetailQuery groupByUnitCost() Group by the unit_cost column
 * @method     ChildPurchaseOrderDetailQuery groupByDateReceived() Group by the date_received column
 * @method     ChildPurchaseOrderDetailQuery groupByPostedToInventory() Group by the posted_to_inventory column
 * @method     ChildPurchaseOrderDetailQuery groupByInventoryTransactionId() Group by the inventory_transaction_id column
 *
 * @method     ChildPurchaseOrderDetailQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPurchaseOrderDetailQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPurchaseOrderDetailQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPurchaseOrderDetailQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPurchaseOrderDetailQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPurchaseOrderDetailQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPurchaseOrderDetail|null findOne(?ConnectionInterface $con = null) Return the first ChildPurchaseOrderDetail matching the query
 * @method     ChildPurchaseOrderDetail findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildPurchaseOrderDetail matching the query, or a new ChildPurchaseOrderDetail object populated from the query conditions when no match is found
 *
 * @method     ChildPurchaseOrderDetail|null findOneByPurchaseOrderDetailId(int $purchase_order_detail_id) Return the first ChildPurchaseOrderDetail filtered by the purchase_order_detail_id column
 * @method     ChildPurchaseOrderDetail|null findOneByPurchaseOrderId(int $purchase_order_id) Return the first ChildPurchaseOrderDetail filtered by the purchase_order_id column
 * @method     ChildPurchaseOrderDetail|null findOneByProductId(int $product_id) Return the first ChildPurchaseOrderDetail filtered by the product_id column
 * @method     ChildPurchaseOrderDetail|null findOneByQuantity(string $quantity) Return the first ChildPurchaseOrderDetail filtered by the quantity column
 * @method     ChildPurchaseOrderDetail|null findOneByUnitCost(string $unit_cost) Return the first ChildPurchaseOrderDetail filtered by the unit_cost column
 * @method     ChildPurchaseOrderDetail|null findOneByDateReceived(string $date_received) Return the first ChildPurchaseOrderDetail filtered by the date_received column
 * @method     ChildPurchaseOrderDetail|null findOneByPostedToInventory(int $posted_to_inventory) Return the first ChildPurchaseOrderDetail filtered by the posted_to_inventory column
 * @method     ChildPurchaseOrderDetail|null findOneByInventoryTransactionId(int $inventory_transaction_id) Return the first ChildPurchaseOrderDetail filtered by the inventory_transaction_id column
 *
 * @method     ChildPurchaseOrderDetail requirePk($key, ?ConnectionInterface $con = null) Return the ChildPurchaseOrderDetail by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrderDetail requireOne(?ConnectionInterface $con = null) Return the first ChildPurchaseOrderDetail matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPurchaseOrderDetail requireOneByPurchaseOrderDetailId(int $purchase_order_detail_id) Return the first ChildPurchaseOrderDetail filtered by the purchase_order_detail_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrderDetail requireOneByPurchaseOrderId(int $purchase_order_id) Return the first ChildPurchaseOrderDetail filtered by the purchase_order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrderDetail requireOneByProductId(int $product_id) Return the first ChildPurchaseOrderDetail filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrderDetail requireOneByQuantity(string $quantity) Return the first ChildPurchaseOrderDetail filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrderDetail requireOneByUnitCost(string $unit_cost) Return the first ChildPurchaseOrderDetail filtered by the unit_cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrderDetail requireOneByDateReceived(string $date_received) Return the first ChildPurchaseOrderDetail filtered by the date_received column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrderDetail requireOneByPostedToInventory(int $posted_to_inventory) Return the first ChildPurchaseOrderDetail filtered by the posted_to_inventory column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrderDetail requireOneByInventoryTransactionId(int $inventory_transaction_id) Return the first ChildPurchaseOrderDetail filtered by the inventory_transaction_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPurchaseOrderDetail[]|Collection find(?ConnectionInterface $con = null) Return ChildPurchaseOrderDetail objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildPurchaseOrderDetail> find(?ConnectionInterface $con = null) Return ChildPurchaseOrderDetail objects based on current ModelCriteria
 *
 * @method     ChildPurchaseOrderDetail[]|Collection findByPurchaseOrderDetailId(int|array<int> $purchase_order_detail_id) Return ChildPurchaseOrderDetail objects filtered by the purchase_order_detail_id column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrderDetail> findByPurchaseOrderDetailId(int|array<int> $purchase_order_detail_id) Return ChildPurchaseOrderDetail objects filtered by the purchase_order_detail_id column
 * @method     ChildPurchaseOrderDetail[]|Collection findByPurchaseOrderId(int|array<int> $purchase_order_id) Return ChildPurchaseOrderDetail objects filtered by the purchase_order_id column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrderDetail> findByPurchaseOrderId(int|array<int> $purchase_order_id) Return ChildPurchaseOrderDetail objects filtered by the purchase_order_id column
 * @method     ChildPurchaseOrderDetail[]|Collection findByProductId(int|array<int> $product_id) Return ChildPurchaseOrderDetail objects filtered by the product_id column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrderDetail> findByProductId(int|array<int> $product_id) Return ChildPurchaseOrderDetail objects filtered by the product_id column
 * @method     ChildPurchaseOrderDetail[]|Collection findByQuantity(string|array<string> $quantity) Return ChildPurchaseOrderDetail objects filtered by the quantity column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrderDetail> findByQuantity(string|array<string> $quantity) Return ChildPurchaseOrderDetail objects filtered by the quantity column
 * @method     ChildPurchaseOrderDetail[]|Collection findByUnitCost(string|array<string> $unit_cost) Return ChildPurchaseOrderDetail objects filtered by the unit_cost column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrderDetail> findByUnitCost(string|array<string> $unit_cost) Return ChildPurchaseOrderDetail objects filtered by the unit_cost column
 * @method     ChildPurchaseOrderDetail[]|Collection findByDateReceived(string|array<string> $date_received) Return ChildPurchaseOrderDetail objects filtered by the date_received column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrderDetail> findByDateReceived(string|array<string> $date_received) Return ChildPurchaseOrderDetail objects filtered by the date_received column
 * @method     ChildPurchaseOrderDetail[]|Collection findByPostedToInventory(int|array<int> $posted_to_inventory) Return ChildPurchaseOrderDetail objects filtered by the posted_to_inventory column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrderDetail> findByPostedToInventory(int|array<int> $posted_to_inventory) Return ChildPurchaseOrderDetail objects filtered by the posted_to_inventory column
 * @method     ChildPurchaseOrderDetail[]|Collection findByInventoryTransactionId(int|array<int> $inventory_transaction_id) Return ChildPurchaseOrderDetail objects filtered by the inventory_transaction_id column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrderDetail> findByInventoryTransactionId(int|array<int> $inventory_transaction_id) Return ChildPurchaseOrderDetail objects filtered by the inventory_transaction_id column
 *
 * @method     ChildPurchaseOrderDetail[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildPurchaseOrderDetail> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class PurchaseOrderDetailQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\PurchaseOrderDetailQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\PurchaseOrderDetail', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildPurchaseOrderDetailQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildPurchaseOrderDetailQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildPurchaseOrderDetailQuery) {
			return $criteria;
		}
		$query = new ChildPurchaseOrderDetailQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderDetailTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(PurchaseOrderDetailTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(static function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			PurchaseOrderDetailTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			PurchaseOrderDetailTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the purchase_order_detail table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderDetailTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			PurchaseOrderDetailTableMap::clearInstancePool();
			PurchaseOrderDetailTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the date_received column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDateReceived('2011-03-14'); // WHERE date_received = '2011-03-14'
	 * $query->filterByDateReceived('now'); // WHERE date_received = '2011-03-14'
	 * $query->filterByDateReceived(array('max' => 'yesterday')); // WHERE date_received > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $dateReceived The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDateReceived($dateReceived = null, ?string $comparison = null)
	{
		if (\is_array($dateReceived)) {
			$useMinMax = false;

			if (isset($dateReceived['min'])) {
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_DATE_RECEIVED, $dateReceived['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($dateReceived['max'])) {
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_DATE_RECEIVED, $dateReceived['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_DATE_RECEIVED, $dateReceived, $comparison);

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
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID, $inventoryTransactionId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($inventoryTransactionId['max'])) {
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID, $inventoryTransactionId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID, $inventoryTransactionId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the posted_to_inventory column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPostedToInventory(1234); // WHERE posted_to_inventory = 1234
	 * $query->filterByPostedToInventory(array(12, 34)); // WHERE posted_to_inventory IN (12, 34)
	 * $query->filterByPostedToInventory(array('min' => 12)); // WHERE posted_to_inventory > 12
	 * </code>
	 *
	 * @param mixed $postedToInventory The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPostedToInventory($postedToInventory = null, ?string $comparison = null)
	{
		if (\is_array($postedToInventory)) {
			$useMinMax = false;

			if (isset($postedToInventory['min'])) {
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_POSTED_TO_INVENTORY, $postedToInventory['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($postedToInventory['max'])) {
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_POSTED_TO_INVENTORY, $postedToInventory['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_POSTED_TO_INVENTORY, $postedToInventory, $comparison);

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

		$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID, $keys, Criteria::IN);

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
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($productId['max'])) {
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_PRODUCT_ID, $productId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the purchase_order_detail_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPurchaseOrderDetailId(1234); // WHERE purchase_order_detail_id = 1234
	 * $query->filterByPurchaseOrderDetailId(array(12, 34)); // WHERE purchase_order_detail_id IN (12, 34)
	 * $query->filterByPurchaseOrderDetailId(array('min' => 12)); // WHERE purchase_order_detail_id > 12
	 * </code>
	 *
	 * @param mixed $purchaseOrderDetailId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPurchaseOrderDetailId($purchaseOrderDetailId = null, ?string $comparison = null)
	{
		if (\is_array($purchaseOrderDetailId)) {
			$useMinMax = false;

			if (isset($purchaseOrderDetailId['min'])) {
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID, $purchaseOrderDetailId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($purchaseOrderDetailId['max'])) {
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID, $purchaseOrderDetailId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID, $purchaseOrderDetailId, $comparison);

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
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrderId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($purchaseOrderId['max'])) {
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrderId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrderId, $comparison);

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
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($quantity['max'])) {
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_QUANTITY, $quantity, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the unit_cost column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByUnitCost(1234); // WHERE unit_cost = 1234
	 * $query->filterByUnitCost(array(12, 34)); // WHERE unit_cost IN (12, 34)
	 * $query->filterByUnitCost(array('min' => 12)); // WHERE unit_cost > 12
	 * </code>
	 *
	 * @param mixed $unitCost The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByUnitCost($unitCost = null, ?string $comparison = null)
	{
		if (\is_array($unitCost)) {
			$useMinMax = false;

			if (isset($unitCost['min'])) {
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_UNIT_COST, $unitCost['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($unitCost['max'])) {
				$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_UNIT_COST, $unitCost['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_UNIT_COST, $unitCost, $comparison);

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
	 * @return ChildPurchaseOrderDetail|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(PurchaseOrderDetailTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = PurchaseOrderDetailTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildPurchaseOrderDetail $purchaseOrderDetail Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($purchaseOrderDetail = null)
	{
		if ($purchaseOrderDetail) {
			$this->addUsingAlias(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID, $purchaseOrderDetail->getPurchaseOrderDetailId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildPurchaseOrderDetail|array|mixed the result, formatted by the current formatter
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
	 * @return ChildPurchaseOrderDetail A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT purchase_order_detail_id, purchase_order_id, product_id, quantity, unit_cost, date_received, posted_to_inventory, inventory_transaction_id FROM purchase_order_detail WHERE purchase_order_detail_id = :p0';

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
			/** @var ChildPurchaseOrderDetail $obj */
			$obj = new ChildPurchaseOrderDetail();
			$obj->hydrate($row);
			PurchaseOrderDetailTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
