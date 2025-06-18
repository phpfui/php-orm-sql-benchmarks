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
use SOB\Propel2\InventoryTransaction as ChildInventoryTransaction;
use SOB\Propel2\InventoryTransactionQuery as ChildInventoryTransactionQuery;
use SOB\Propel2\Map\InventoryTransactionTableMap;

/**
 * Base class that represents a query for the `inventory_transaction` table.
 *
 * @method     ChildInventoryTransactionQuery orderByInventoryTransactionId($order = Criteria::ASC) Order by the inventory_transaction_id column
 * @method     ChildInventoryTransactionQuery orderByInventoryTransactionTypeId($order = Criteria::ASC) Order by the inventory_transaction_type_id column
 * @method     ChildInventoryTransactionQuery orderByTransactionCreatedDate($order = Criteria::ASC) Order by the transaction_created_date column
 * @method     ChildInventoryTransactionQuery orderByTransactionModifiedDate($order = Criteria::ASC) Order by the transaction_modified_date column
 * @method     ChildInventoryTransactionQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildInventoryTransactionQuery orderByQuantity($order = Criteria::ASC) Order by the quantity column
 * @method     ChildInventoryTransactionQuery orderByPurchaseOrderId($order = Criteria::ASC) Order by the purchase_order_id column
 * @method     ChildInventoryTransactionQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildInventoryTransactionQuery orderByComments($order = Criteria::ASC) Order by the comments column
 *
 * @method     ChildInventoryTransactionQuery groupByInventoryTransactionId() Group by the inventory_transaction_id column
 * @method     ChildInventoryTransactionQuery groupByInventoryTransactionTypeId() Group by the inventory_transaction_type_id column
 * @method     ChildInventoryTransactionQuery groupByTransactionCreatedDate() Group by the transaction_created_date column
 * @method     ChildInventoryTransactionQuery groupByTransactionModifiedDate() Group by the transaction_modified_date column
 * @method     ChildInventoryTransactionQuery groupByProductId() Group by the product_id column
 * @method     ChildInventoryTransactionQuery groupByQuantity() Group by the quantity column
 * @method     ChildInventoryTransactionQuery groupByPurchaseOrderId() Group by the purchase_order_id column
 * @method     ChildInventoryTransactionQuery groupByOrderId() Group by the order_id column
 * @method     ChildInventoryTransactionQuery groupByComments() Group by the comments column
 *
 * @method     ChildInventoryTransactionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInventoryTransactionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInventoryTransactionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInventoryTransactionQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInventoryTransactionQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInventoryTransactionQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInventoryTransaction|null findOne(?ConnectionInterface $con = null) Return the first ChildInventoryTransaction matching the query
 * @method     ChildInventoryTransaction findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildInventoryTransaction matching the query, or a new ChildInventoryTransaction object populated from the query conditions when no match is found
 *
 * @method     ChildInventoryTransaction|null findOneByInventoryTransactionId(int $inventory_transaction_id) Return the first ChildInventoryTransaction filtered by the inventory_transaction_id column
 * @method     ChildInventoryTransaction|null findOneByInventoryTransactionTypeId(int $inventory_transaction_type_id) Return the first ChildInventoryTransaction filtered by the inventory_transaction_type_id column
 * @method     ChildInventoryTransaction|null findOneByTransactionCreatedDate(string $transaction_created_date) Return the first ChildInventoryTransaction filtered by the transaction_created_date column
 * @method     ChildInventoryTransaction|null findOneByTransactionModifiedDate(string $transaction_modified_date) Return the first ChildInventoryTransaction filtered by the transaction_modified_date column
 * @method     ChildInventoryTransaction|null findOneByProductId(int $product_id) Return the first ChildInventoryTransaction filtered by the product_id column
 * @method     ChildInventoryTransaction|null findOneByQuantity(int $quantity) Return the first ChildInventoryTransaction filtered by the quantity column
 * @method     ChildInventoryTransaction|null findOneByPurchaseOrderId(int $purchase_order_id) Return the first ChildInventoryTransaction filtered by the purchase_order_id column
 * @method     ChildInventoryTransaction|null findOneByOrderId(int $order_id) Return the first ChildInventoryTransaction filtered by the order_id column
 * @method     ChildInventoryTransaction|null findOneByComments(string $comments) Return the first ChildInventoryTransaction filtered by the comments column
 *
 * @method     ChildInventoryTransaction requirePk($key, ?ConnectionInterface $con = null) Return the ChildInventoryTransaction by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInventoryTransaction requireOne(?ConnectionInterface $con = null) Return the first ChildInventoryTransaction matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInventoryTransaction requireOneByInventoryTransactionId(int $inventory_transaction_id) Return the first ChildInventoryTransaction filtered by the inventory_transaction_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInventoryTransaction requireOneByInventoryTransactionTypeId(int $inventory_transaction_type_id) Return the first ChildInventoryTransaction filtered by the inventory_transaction_type_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInventoryTransaction requireOneByTransactionCreatedDate(string $transaction_created_date) Return the first ChildInventoryTransaction filtered by the transaction_created_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInventoryTransaction requireOneByTransactionModifiedDate(string $transaction_modified_date) Return the first ChildInventoryTransaction filtered by the transaction_modified_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInventoryTransaction requireOneByProductId(int $product_id) Return the first ChildInventoryTransaction filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInventoryTransaction requireOneByQuantity(int $quantity) Return the first ChildInventoryTransaction filtered by the quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInventoryTransaction requireOneByPurchaseOrderId(int $purchase_order_id) Return the first ChildInventoryTransaction filtered by the purchase_order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInventoryTransaction requireOneByOrderId(int $order_id) Return the first ChildInventoryTransaction filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInventoryTransaction requireOneByComments(string $comments) Return the first ChildInventoryTransaction filtered by the comments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInventoryTransaction[]|Collection find(?ConnectionInterface $con = null) Return ChildInventoryTransaction objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildInventoryTransaction> find(?ConnectionInterface $con = null) Return ChildInventoryTransaction objects based on current ModelCriteria
 *
 * @method     ChildInventoryTransaction[]|Collection findByInventoryTransactionId(int|array<int> $inventory_transaction_id) Return ChildInventoryTransaction objects filtered by the inventory_transaction_id column
 * @psalm-method Collection&\Traversable<ChildInventoryTransaction> findByInventoryTransactionId(int|array<int> $inventory_transaction_id) Return ChildInventoryTransaction objects filtered by the inventory_transaction_id column
 * @method     ChildInventoryTransaction[]|Collection findByInventoryTransactionTypeId(int|array<int> $inventory_transaction_type_id) Return ChildInventoryTransaction objects filtered by the inventory_transaction_type_id column
 * @psalm-method Collection&\Traversable<ChildInventoryTransaction> findByInventoryTransactionTypeId(int|array<int> $inventory_transaction_type_id) Return ChildInventoryTransaction objects filtered by the inventory_transaction_type_id column
 * @method     ChildInventoryTransaction[]|Collection findByTransactionCreatedDate(string|array<string> $transaction_created_date) Return ChildInventoryTransaction objects filtered by the transaction_created_date column
 * @psalm-method Collection&\Traversable<ChildInventoryTransaction> findByTransactionCreatedDate(string|array<string> $transaction_created_date) Return ChildInventoryTransaction objects filtered by the transaction_created_date column
 * @method     ChildInventoryTransaction[]|Collection findByTransactionModifiedDate(string|array<string> $transaction_modified_date) Return ChildInventoryTransaction objects filtered by the transaction_modified_date column
 * @psalm-method Collection&\Traversable<ChildInventoryTransaction> findByTransactionModifiedDate(string|array<string> $transaction_modified_date) Return ChildInventoryTransaction objects filtered by the transaction_modified_date column
 * @method     ChildInventoryTransaction[]|Collection findByProductId(int|array<int> $product_id) Return ChildInventoryTransaction objects filtered by the product_id column
 * @psalm-method Collection&\Traversable<ChildInventoryTransaction> findByProductId(int|array<int> $product_id) Return ChildInventoryTransaction objects filtered by the product_id column
 * @method     ChildInventoryTransaction[]|Collection findByQuantity(int|array<int> $quantity) Return ChildInventoryTransaction objects filtered by the quantity column
 * @psalm-method Collection&\Traversable<ChildInventoryTransaction> findByQuantity(int|array<int> $quantity) Return ChildInventoryTransaction objects filtered by the quantity column
 * @method     ChildInventoryTransaction[]|Collection findByPurchaseOrderId(int|array<int> $purchase_order_id) Return ChildInventoryTransaction objects filtered by the purchase_order_id column
 * @psalm-method Collection&\Traversable<ChildInventoryTransaction> findByPurchaseOrderId(int|array<int> $purchase_order_id) Return ChildInventoryTransaction objects filtered by the purchase_order_id column
 * @method     ChildInventoryTransaction[]|Collection findByOrderId(int|array<int> $order_id) Return ChildInventoryTransaction objects filtered by the order_id column
 * @psalm-method Collection&\Traversable<ChildInventoryTransaction> findByOrderId(int|array<int> $order_id) Return ChildInventoryTransaction objects filtered by the order_id column
 * @method     ChildInventoryTransaction[]|Collection findByComments(string|array<string> $comments) Return ChildInventoryTransaction objects filtered by the comments column
 * @psalm-method Collection&\Traversable<ChildInventoryTransaction> findByComments(string|array<string> $comments) Return ChildInventoryTransaction objects filtered by the comments column
 *
 * @method     ChildInventoryTransaction[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildInventoryTransaction> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class InventoryTransactionQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\InventoryTransactionQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\InventoryTransaction', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildInventoryTransactionQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildInventoryTransactionQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildInventoryTransactionQuery) {
			return $criteria;
		}
		$query = new ChildInventoryTransactionQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(InventoryTransactionTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(InventoryTransactionTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(static function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			InventoryTransactionTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			InventoryTransactionTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the inventory_transaction table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(InventoryTransactionTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			InventoryTransactionTableMap::clearInstancePool();
			InventoryTransactionTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the comments column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByComments('fooValue');   // WHERE comments = 'fooValue'
	 * $query->filterByComments('%fooValue%', Criteria::LIKE); // WHERE comments LIKE '%fooValue%'
	 * $query->filterByComments(['foo', 'bar']); // WHERE comments IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $comments The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByComments($comments = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($comments)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InventoryTransactionTableMap::COL_COMMENTS, $comments, $comparison);

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
				$this->addUsingAlias(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID, $inventoryTransactionId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($inventoryTransactionId['max'])) {
				$this->addUsingAlias(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID, $inventoryTransactionId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID, $inventoryTransactionId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the inventory_transaction_type_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInventoryTransactionTypeId(1234); // WHERE inventory_transaction_type_id = 1234
	 * $query->filterByInventoryTransactionTypeId(array(12, 34)); // WHERE inventory_transaction_type_id IN (12, 34)
	 * $query->filterByInventoryTransactionTypeId(array('min' => 12)); // WHERE inventory_transaction_type_id > 12
	 * </code>
	 *
	 * @param mixed $inventoryTransactionTypeId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByInventoryTransactionTypeId($inventoryTransactionTypeId = null, ?string $comparison = null)
	{
		if (\is_array($inventoryTransactionTypeId)) {
			$useMinMax = false;

			if (isset($inventoryTransactionTypeId['min'])) {
				$this->addUsingAlias(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID, $inventoryTransactionTypeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($inventoryTransactionTypeId['max'])) {
				$this->addUsingAlias(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID, $inventoryTransactionTypeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID, $inventoryTransactionTypeId, $comparison);

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
				$this->addUsingAlias(InventoryTransactionTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($orderId['max'])) {
				$this->addUsingAlias(InventoryTransactionTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InventoryTransactionTableMap::COL_ORDER_ID, $orderId, $comparison);

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

		$this->addUsingAlias(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID, $keys, Criteria::IN);

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
				$this->addUsingAlias(InventoryTransactionTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($productId['max'])) {
				$this->addUsingAlias(InventoryTransactionTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InventoryTransactionTableMap::COL_PRODUCT_ID, $productId, $comparison);

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
				$this->addUsingAlias(InventoryTransactionTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrderId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($purchaseOrderId['max'])) {
				$this->addUsingAlias(InventoryTransactionTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrderId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InventoryTransactionTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrderId, $comparison);

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
				$this->addUsingAlias(InventoryTransactionTableMap::COL_QUANTITY, $quantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($quantity['max'])) {
				$this->addUsingAlias(InventoryTransactionTableMap::COL_QUANTITY, $quantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InventoryTransactionTableMap::COL_QUANTITY, $quantity, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the transaction_created_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTransactionCreatedDate('2011-03-14'); // WHERE transaction_created_date = '2011-03-14'
	 * $query->filterByTransactionCreatedDate('now'); // WHERE transaction_created_date = '2011-03-14'
	 * $query->filterByTransactionCreatedDate(array('max' => 'yesterday')); // WHERE transaction_created_date > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $transactionCreatedDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByTransactionCreatedDate($transactionCreatedDate = null, ?string $comparison = null)
	{
		if (\is_array($transactionCreatedDate)) {
			$useMinMax = false;

			if (isset($transactionCreatedDate['min'])) {
				$this->addUsingAlias(InventoryTransactionTableMap::COL_TRANSACTION_CREATED_DATE, $transactionCreatedDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($transactionCreatedDate['max'])) {
				$this->addUsingAlias(InventoryTransactionTableMap::COL_TRANSACTION_CREATED_DATE, $transactionCreatedDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InventoryTransactionTableMap::COL_TRANSACTION_CREATED_DATE, $transactionCreatedDate, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the transaction_modified_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTransactionModifiedDate('2011-03-14'); // WHERE transaction_modified_date = '2011-03-14'
	 * $query->filterByTransactionModifiedDate('now'); // WHERE transaction_modified_date = '2011-03-14'
	 * $query->filterByTransactionModifiedDate(array('max' => 'yesterday')); // WHERE transaction_modified_date > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $transactionModifiedDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByTransactionModifiedDate($transactionModifiedDate = null, ?string $comparison = null)
	{
		if (\is_array($transactionModifiedDate)) {
			$useMinMax = false;

			if (isset($transactionModifiedDate['min'])) {
				$this->addUsingAlias(InventoryTransactionTableMap::COL_TRANSACTION_MODIFIED_DATE, $transactionModifiedDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($transactionModifiedDate['max'])) {
				$this->addUsingAlias(InventoryTransactionTableMap::COL_TRANSACTION_MODIFIED_DATE, $transactionModifiedDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InventoryTransactionTableMap::COL_TRANSACTION_MODIFIED_DATE, $transactionModifiedDate, $comparison);

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
	 * @return ChildInventoryTransaction|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(InventoryTransactionTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = InventoryTransactionTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildInventoryTransaction $inventoryTransaction Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($inventoryTransaction = null)
	{
		if ($inventoryTransaction) {
			$this->addUsingAlias(InventoryTransactionTableMap::COL_INVENTORY_TRANSACTION_ID, $inventoryTransaction->getInventoryTransactionId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildInventoryTransaction|array|mixed the result, formatted by the current formatter
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
	 * @return ChildInventoryTransaction A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT inventory_transaction_id, inventory_transaction_type_id, transaction_created_date, transaction_modified_date, product_id, quantity, purchase_order_id, order_id, comments FROM inventory_transaction WHERE inventory_transaction_id = :p0';

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
			/** @var ChildInventoryTransaction $obj */
			$obj = new ChildInventoryTransaction();
			$obj->hydrate($row);
			InventoryTransactionTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
