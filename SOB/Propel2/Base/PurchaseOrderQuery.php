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
use SOB\Propel2\Map\PurchaseOrderTableMap;
use SOB\Propel2\PurchaseOrder as ChildPurchaseOrder;
use SOB\Propel2\PurchaseOrderQuery as ChildPurchaseOrderQuery;

/**
 * Base class that represents a query for the `purchase_order` table.
 *
 * @method     ChildPurchaseOrderQuery orderByPurchaseOrderId($order = Criteria::ASC) Order by the purchase_order_id column
 * @method     ChildPurchaseOrderQuery orderBySupplierId($order = Criteria::ASC) Order by the supplier_id column
 * @method     ChildPurchaseOrderQuery orderByCreatedBy($order = Criteria::ASC) Order by the created_by column
 * @method     ChildPurchaseOrderQuery orderBySubmittedDate($order = Criteria::ASC) Order by the submitted_date column
 * @method     ChildPurchaseOrderQuery orderByCreationDate($order = Criteria::ASC) Order by the creation_date column
 * @method     ChildPurchaseOrderQuery orderByPurchaseOrderStatusId($order = Criteria::ASC) Order by the purchase_order_status_id column
 * @method     ChildPurchaseOrderQuery orderByExpectedDate($order = Criteria::ASC) Order by the expected_date column
 * @method     ChildPurchaseOrderQuery orderByShippingFee($order = Criteria::ASC) Order by the shipping_fee column
 * @method     ChildPurchaseOrderQuery orderByTaxes($order = Criteria::ASC) Order by the taxes column
 * @method     ChildPurchaseOrderQuery orderByPaymentDate($order = Criteria::ASC) Order by the payment_date column
 * @method     ChildPurchaseOrderQuery orderByPaymentAmount($order = Criteria::ASC) Order by the payment_amount column
 * @method     ChildPurchaseOrderQuery orderByPaymentMethod($order = Criteria::ASC) Order by the payment_method column
 * @method     ChildPurchaseOrderQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method     ChildPurchaseOrderQuery orderByApprovedBy($order = Criteria::ASC) Order by the approved_by column
 * @method     ChildPurchaseOrderQuery orderByApprovedDate($order = Criteria::ASC) Order by the approved_date column
 * @method     ChildPurchaseOrderQuery orderBySubmittedBy($order = Criteria::ASC) Order by the submitted_by column
 *
 * @method     ChildPurchaseOrderQuery groupByPurchaseOrderId() Group by the purchase_order_id column
 * @method     ChildPurchaseOrderQuery groupBySupplierId() Group by the supplier_id column
 * @method     ChildPurchaseOrderQuery groupByCreatedBy() Group by the created_by column
 * @method     ChildPurchaseOrderQuery groupBySubmittedDate() Group by the submitted_date column
 * @method     ChildPurchaseOrderQuery groupByCreationDate() Group by the creation_date column
 * @method     ChildPurchaseOrderQuery groupByPurchaseOrderStatusId() Group by the purchase_order_status_id column
 * @method     ChildPurchaseOrderQuery groupByExpectedDate() Group by the expected_date column
 * @method     ChildPurchaseOrderQuery groupByShippingFee() Group by the shipping_fee column
 * @method     ChildPurchaseOrderQuery groupByTaxes() Group by the taxes column
 * @method     ChildPurchaseOrderQuery groupByPaymentDate() Group by the payment_date column
 * @method     ChildPurchaseOrderQuery groupByPaymentAmount() Group by the payment_amount column
 * @method     ChildPurchaseOrderQuery groupByPaymentMethod() Group by the payment_method column
 * @method     ChildPurchaseOrderQuery groupByNotes() Group by the notes column
 * @method     ChildPurchaseOrderQuery groupByApprovedBy() Group by the approved_by column
 * @method     ChildPurchaseOrderQuery groupByApprovedDate() Group by the approved_date column
 * @method     ChildPurchaseOrderQuery groupBySubmittedBy() Group by the submitted_by column
 *
 * @method     ChildPurchaseOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPurchaseOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPurchaseOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPurchaseOrderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPurchaseOrderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPurchaseOrderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPurchaseOrder|null findOne(?ConnectionInterface $con = null) Return the first ChildPurchaseOrder matching the query
 * @method     ChildPurchaseOrder findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildPurchaseOrder matching the query, or a new ChildPurchaseOrder object populated from the query conditions when no match is found
 *
 * @method     ChildPurchaseOrder|null findOneByPurchaseOrderId(int $purchase_order_id) Return the first ChildPurchaseOrder filtered by the purchase_order_id column
 * @method     ChildPurchaseOrder|null findOneBySupplierId(int $supplier_id) Return the first ChildPurchaseOrder filtered by the supplier_id column
 * @method     ChildPurchaseOrder|null findOneByCreatedBy(int $created_by) Return the first ChildPurchaseOrder filtered by the created_by column
 * @method     ChildPurchaseOrder|null findOneBySubmittedDate(string $submitted_date) Return the first ChildPurchaseOrder filtered by the submitted_date column
 * @method     ChildPurchaseOrder|null findOneByCreationDate(string $creation_date) Return the first ChildPurchaseOrder filtered by the creation_date column
 * @method     ChildPurchaseOrder|null findOneByPurchaseOrderStatusId(int $purchase_order_status_id) Return the first ChildPurchaseOrder filtered by the purchase_order_status_id column
 * @method     ChildPurchaseOrder|null findOneByExpectedDate(string $expected_date) Return the first ChildPurchaseOrder filtered by the expected_date column
 * @method     ChildPurchaseOrder|null findOneByShippingFee(string $shipping_fee) Return the first ChildPurchaseOrder filtered by the shipping_fee column
 * @method     ChildPurchaseOrder|null findOneByTaxes(string $taxes) Return the first ChildPurchaseOrder filtered by the taxes column
 * @method     ChildPurchaseOrder|null findOneByPaymentDate(string $payment_date) Return the first ChildPurchaseOrder filtered by the payment_date column
 * @method     ChildPurchaseOrder|null findOneByPaymentAmount(string $payment_amount) Return the first ChildPurchaseOrder filtered by the payment_amount column
 * @method     ChildPurchaseOrder|null findOneByPaymentMethod(string $payment_method) Return the first ChildPurchaseOrder filtered by the payment_method column
 * @method     ChildPurchaseOrder|null findOneByNotes(string $notes) Return the first ChildPurchaseOrder filtered by the notes column
 * @method     ChildPurchaseOrder|null findOneByApprovedBy(int $approved_by) Return the first ChildPurchaseOrder filtered by the approved_by column
 * @method     ChildPurchaseOrder|null findOneByApprovedDate(string $approved_date) Return the first ChildPurchaseOrder filtered by the approved_date column
 * @method     ChildPurchaseOrder|null findOneBySubmittedBy(int $submitted_by) Return the first ChildPurchaseOrder filtered by the submitted_by column
 *
 * @method     ChildPurchaseOrder requirePk($key, ?ConnectionInterface $con = null) Return the ChildPurchaseOrder by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOne(?ConnectionInterface $con = null) Return the first ChildPurchaseOrder matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPurchaseOrder requireOneByPurchaseOrderId(int $purchase_order_id) Return the first ChildPurchaseOrder filtered by the purchase_order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneBySupplierId(int $supplier_id) Return the first ChildPurchaseOrder filtered by the supplier_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneByCreatedBy(int $created_by) Return the first ChildPurchaseOrder filtered by the created_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneBySubmittedDate(string $submitted_date) Return the first ChildPurchaseOrder filtered by the submitted_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneByCreationDate(string $creation_date) Return the first ChildPurchaseOrder filtered by the creation_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneByPurchaseOrderStatusId(int $purchase_order_status_id) Return the first ChildPurchaseOrder filtered by the purchase_order_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneByExpectedDate(string $expected_date) Return the first ChildPurchaseOrder filtered by the expected_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneByShippingFee(string $shipping_fee) Return the first ChildPurchaseOrder filtered by the shipping_fee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneByTaxes(string $taxes) Return the first ChildPurchaseOrder filtered by the taxes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneByPaymentDate(string $payment_date) Return the first ChildPurchaseOrder filtered by the payment_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneByPaymentAmount(string $payment_amount) Return the first ChildPurchaseOrder filtered by the payment_amount column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneByPaymentMethod(string $payment_method) Return the first ChildPurchaseOrder filtered by the payment_method column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneByNotes(string $notes) Return the first ChildPurchaseOrder filtered by the notes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneByApprovedBy(int $approved_by) Return the first ChildPurchaseOrder filtered by the approved_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneByApprovedDate(string $approved_date) Return the first ChildPurchaseOrder filtered by the approved_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPurchaseOrder requireOneBySubmittedBy(int $submitted_by) Return the first ChildPurchaseOrder filtered by the submitted_by column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPurchaseOrder[]|Collection find(?ConnectionInterface $con = null) Return ChildPurchaseOrder objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> find(?ConnectionInterface $con = null) Return ChildPurchaseOrder objects based on current ModelCriteria
 *
 * @method     ChildPurchaseOrder[]|Collection findByPurchaseOrderId(int|array<int> $purchase_order_id) Return ChildPurchaseOrder objects filtered by the purchase_order_id column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByPurchaseOrderId(int|array<int> $purchase_order_id) Return ChildPurchaseOrder objects filtered by the purchase_order_id column
 * @method     ChildPurchaseOrder[]|Collection findBySupplierId(int|array<int> $supplier_id) Return ChildPurchaseOrder objects filtered by the supplier_id column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findBySupplierId(int|array<int> $supplier_id) Return ChildPurchaseOrder objects filtered by the supplier_id column
 * @method     ChildPurchaseOrder[]|Collection findByCreatedBy(int|array<int> $created_by) Return ChildPurchaseOrder objects filtered by the created_by column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByCreatedBy(int|array<int> $created_by) Return ChildPurchaseOrder objects filtered by the created_by column
 * @method     ChildPurchaseOrder[]|Collection findBySubmittedDate(string|array<string> $submitted_date) Return ChildPurchaseOrder objects filtered by the submitted_date column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findBySubmittedDate(string|array<string> $submitted_date) Return ChildPurchaseOrder objects filtered by the submitted_date column
 * @method     ChildPurchaseOrder[]|Collection findByCreationDate(string|array<string> $creation_date) Return ChildPurchaseOrder objects filtered by the creation_date column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByCreationDate(string|array<string> $creation_date) Return ChildPurchaseOrder objects filtered by the creation_date column
 * @method     ChildPurchaseOrder[]|Collection findByPurchaseOrderStatusId(int|array<int> $purchase_order_status_id) Return ChildPurchaseOrder objects filtered by the purchase_order_status_id column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByPurchaseOrderStatusId(int|array<int> $purchase_order_status_id) Return ChildPurchaseOrder objects filtered by the purchase_order_status_id column
 * @method     ChildPurchaseOrder[]|Collection findByExpectedDate(string|array<string> $expected_date) Return ChildPurchaseOrder objects filtered by the expected_date column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByExpectedDate(string|array<string> $expected_date) Return ChildPurchaseOrder objects filtered by the expected_date column
 * @method     ChildPurchaseOrder[]|Collection findByShippingFee(string|array<string> $shipping_fee) Return ChildPurchaseOrder objects filtered by the shipping_fee column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByShippingFee(string|array<string> $shipping_fee) Return ChildPurchaseOrder objects filtered by the shipping_fee column
 * @method     ChildPurchaseOrder[]|Collection findByTaxes(string|array<string> $taxes) Return ChildPurchaseOrder objects filtered by the taxes column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByTaxes(string|array<string> $taxes) Return ChildPurchaseOrder objects filtered by the taxes column
 * @method     ChildPurchaseOrder[]|Collection findByPaymentDate(string|array<string> $payment_date) Return ChildPurchaseOrder objects filtered by the payment_date column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByPaymentDate(string|array<string> $payment_date) Return ChildPurchaseOrder objects filtered by the payment_date column
 * @method     ChildPurchaseOrder[]|Collection findByPaymentAmount(string|array<string> $payment_amount) Return ChildPurchaseOrder objects filtered by the payment_amount column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByPaymentAmount(string|array<string> $payment_amount) Return ChildPurchaseOrder objects filtered by the payment_amount column
 * @method     ChildPurchaseOrder[]|Collection findByPaymentMethod(string|array<string> $payment_method) Return ChildPurchaseOrder objects filtered by the payment_method column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByPaymentMethod(string|array<string> $payment_method) Return ChildPurchaseOrder objects filtered by the payment_method column
 * @method     ChildPurchaseOrder[]|Collection findByNotes(string|array<string> $notes) Return ChildPurchaseOrder objects filtered by the notes column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByNotes(string|array<string> $notes) Return ChildPurchaseOrder objects filtered by the notes column
 * @method     ChildPurchaseOrder[]|Collection findByApprovedBy(int|array<int> $approved_by) Return ChildPurchaseOrder objects filtered by the approved_by column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByApprovedBy(int|array<int> $approved_by) Return ChildPurchaseOrder objects filtered by the approved_by column
 * @method     ChildPurchaseOrder[]|Collection findByApprovedDate(string|array<string> $approved_date) Return ChildPurchaseOrder objects filtered by the approved_date column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findByApprovedDate(string|array<string> $approved_date) Return ChildPurchaseOrder objects filtered by the approved_date column
 * @method     ChildPurchaseOrder[]|Collection findBySubmittedBy(int|array<int> $submitted_by) Return ChildPurchaseOrder objects filtered by the submitted_by column
 * @psalm-method Collection&\Traversable<ChildPurchaseOrder> findBySubmittedBy(int|array<int> $submitted_by) Return ChildPurchaseOrder objects filtered by the submitted_by column
 *
 * @method     ChildPurchaseOrder[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildPurchaseOrder> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class PurchaseOrderQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\PurchaseOrderQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\PurchaseOrder', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildPurchaseOrderQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildPurchaseOrderQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildPurchaseOrderQuery) {
			return $criteria;
		}
		$query = new ChildPurchaseOrderQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(PurchaseOrderTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(static function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			PurchaseOrderTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			PurchaseOrderTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the purchase_order table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			PurchaseOrderTableMap::clearInstancePool();
			PurchaseOrderTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the approved_by column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByApprovedBy(1234); // WHERE approved_by = 1234
	 * $query->filterByApprovedBy(array(12, 34)); // WHERE approved_by IN (12, 34)
	 * $query->filterByApprovedBy(array('min' => 12)); // WHERE approved_by > 12
	 * </code>
	 *
	 * @param mixed $approvedBy The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByApprovedBy($approvedBy = null, ?string $comparison = null)
	{
		if (\is_array($approvedBy)) {
			$useMinMax = false;

			if (isset($approvedBy['min'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_APPROVED_BY, $approvedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($approvedBy['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_APPROVED_BY, $approvedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_APPROVED_BY, $approvedBy, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the approved_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByApprovedDate('2011-03-14'); // WHERE approved_date = '2011-03-14'
	 * $query->filterByApprovedDate('now'); // WHERE approved_date = '2011-03-14'
	 * $query->filterByApprovedDate(array('max' => 'yesterday')); // WHERE approved_date > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $approvedDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByApprovedDate($approvedDate = null, ?string $comparison = null)
	{
		if (\is_array($approvedDate)) {
			$useMinMax = false;

			if (isset($approvedDate['min'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_APPROVED_DATE, $approvedDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($approvedDate['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_APPROVED_DATE, $approvedDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_APPROVED_DATE, $approvedDate, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the created_by column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCreatedBy(1234); // WHERE created_by = 1234
	 * $query->filterByCreatedBy(array(12, 34)); // WHERE created_by IN (12, 34)
	 * $query->filterByCreatedBy(array('min' => 12)); // WHERE created_by > 12
	 * </code>
	 *
	 * @param mixed $createdBy The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByCreatedBy($createdBy = null, ?string $comparison = null)
	{
		if (\is_array($createdBy)) {
			$useMinMax = false;

			if (isset($createdBy['min'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_CREATED_BY, $createdBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($createdBy['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_CREATED_BY, $createdBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_CREATED_BY, $createdBy, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the creation_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCreationDate('2011-03-14'); // WHERE creation_date = '2011-03-14'
	 * $query->filterByCreationDate('now'); // WHERE creation_date = '2011-03-14'
	 * $query->filterByCreationDate(array('max' => 'yesterday')); // WHERE creation_date > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $creationDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByCreationDate($creationDate = null, ?string $comparison = null)
	{
		if (\is_array($creationDate)) {
			$useMinMax = false;

			if (isset($creationDate['min'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_CREATION_DATE, $creationDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($creationDate['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_CREATION_DATE, $creationDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_CREATION_DATE, $creationDate, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the expected_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByExpectedDate('2011-03-14'); // WHERE expected_date = '2011-03-14'
	 * $query->filterByExpectedDate('now'); // WHERE expected_date = '2011-03-14'
	 * $query->filterByExpectedDate(array('max' => 'yesterday')); // WHERE expected_date > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $expectedDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByExpectedDate($expectedDate = null, ?string $comparison = null)
	{
		if (\is_array($expectedDate)) {
			$useMinMax = false;

			if (isset($expectedDate['min'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_EXPECTED_DATE, $expectedDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($expectedDate['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_EXPECTED_DATE, $expectedDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_EXPECTED_DATE, $expectedDate, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the notes column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByNotes('fooValue');   // WHERE notes = 'fooValue'
	 * $query->filterByNotes('%fooValue%', Criteria::LIKE); // WHERE notes LIKE '%fooValue%'
	 * $query->filterByNotes(['foo', 'bar']); // WHERE notes IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $notes The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByNotes($notes = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($notes)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_NOTES, $notes, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the payment_amount column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPaymentAmount(1234); // WHERE payment_amount = 1234
	 * $query->filterByPaymentAmount(array(12, 34)); // WHERE payment_amount IN (12, 34)
	 * $query->filterByPaymentAmount(array('min' => 12)); // WHERE payment_amount > 12
	 * </code>
	 *
	 * @param mixed $paymentAmount The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPaymentAmount($paymentAmount = null, ?string $comparison = null)
	{
		if (\is_array($paymentAmount)) {
			$useMinMax = false;

			if (isset($paymentAmount['min'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_PAYMENT_AMOUNT, $paymentAmount['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($paymentAmount['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_PAYMENT_AMOUNT, $paymentAmount['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_PAYMENT_AMOUNT, $paymentAmount, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the payment_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPaymentDate('2011-03-14'); // WHERE payment_date = '2011-03-14'
	 * $query->filterByPaymentDate('now'); // WHERE payment_date = '2011-03-14'
	 * $query->filterByPaymentDate(array('max' => 'yesterday')); // WHERE payment_date > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $paymentDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPaymentDate($paymentDate = null, ?string $comparison = null)
	{
		if (\is_array($paymentDate)) {
			$useMinMax = false;

			if (isset($paymentDate['min'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_PAYMENT_DATE, $paymentDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($paymentDate['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_PAYMENT_DATE, $paymentDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_PAYMENT_DATE, $paymentDate, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the payment_method column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPaymentMethod('fooValue');   // WHERE payment_method = 'fooValue'
	 * $query->filterByPaymentMethod('%fooValue%', Criteria::LIKE); // WHERE payment_method LIKE '%fooValue%'
	 * $query->filterByPaymentMethod(['foo', 'bar']); // WHERE payment_method IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $paymentMethod The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPaymentMethod($paymentMethod = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($paymentMethod)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_PAYMENT_METHOD, $paymentMethod, $comparison);

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

		$this->addUsingAlias(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID, $keys, Criteria::IN);

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
				$this->addUsingAlias(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrderId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($purchaseOrderId['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrderId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrderId, $comparison);

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
				$this->addUsingAlias(PurchaseOrderTableMap::COL_PURCHASE_ORDER_STATUS_ID, $purchaseOrderStatusId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($purchaseOrderStatusId['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_PURCHASE_ORDER_STATUS_ID, $purchaseOrderStatusId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_PURCHASE_ORDER_STATUS_ID, $purchaseOrderStatusId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the shipping_fee column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShippingFee(1234); // WHERE shipping_fee = 1234
	 * $query->filterByShippingFee(array(12, 34)); // WHERE shipping_fee IN (12, 34)
	 * $query->filterByShippingFee(array('min' => 12)); // WHERE shipping_fee > 12
	 * </code>
	 *
	 * @param mixed $shippingFee The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByShippingFee($shippingFee = null, ?string $comparison = null)
	{
		if (\is_array($shippingFee)) {
			$useMinMax = false;

			if (isset($shippingFee['min'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_SHIPPING_FEE, $shippingFee['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($shippingFee['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_SHIPPING_FEE, $shippingFee['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_SHIPPING_FEE, $shippingFee, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the submitted_by column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySubmittedBy(1234); // WHERE submitted_by = 1234
	 * $query->filterBySubmittedBy(array(12, 34)); // WHERE submitted_by IN (12, 34)
	 * $query->filterBySubmittedBy(array('min' => 12)); // WHERE submitted_by > 12
	 * </code>
	 *
	 * @param mixed $submittedBy The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterBySubmittedBy($submittedBy = null, ?string $comparison = null)
	{
		if (\is_array($submittedBy)) {
			$useMinMax = false;

			if (isset($submittedBy['min'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_SUBMITTED_BY, $submittedBy['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($submittedBy['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_SUBMITTED_BY, $submittedBy['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_SUBMITTED_BY, $submittedBy, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the submitted_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySubmittedDate('2011-03-14'); // WHERE submitted_date = '2011-03-14'
	 * $query->filterBySubmittedDate('now'); // WHERE submitted_date = '2011-03-14'
	 * $query->filterBySubmittedDate(array('max' => 'yesterday')); // WHERE submitted_date > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $submittedDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterBySubmittedDate($submittedDate = null, ?string $comparison = null)
	{
		if (\is_array($submittedDate)) {
			$useMinMax = false;

			if (isset($submittedDate['min'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_SUBMITTED_DATE, $submittedDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($submittedDate['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_SUBMITTED_DATE, $submittedDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_SUBMITTED_DATE, $submittedDate, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the supplier_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterBySupplierId(1234); // WHERE supplier_id = 1234
	 * $query->filterBySupplierId(array(12, 34)); // WHERE supplier_id IN (12, 34)
	 * $query->filterBySupplierId(array('min' => 12)); // WHERE supplier_id > 12
	 * </code>
	 *
	 * @param mixed $supplierId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterBySupplierId($supplierId = null, ?string $comparison = null)
	{
		if (\is_array($supplierId)) {
			$useMinMax = false;

			if (isset($supplierId['min'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_SUPPLIER_ID, $supplierId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($supplierId['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_SUPPLIER_ID, $supplierId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_SUPPLIER_ID, $supplierId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the taxes column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTaxes(1234); // WHERE taxes = 1234
	 * $query->filterByTaxes(array(12, 34)); // WHERE taxes IN (12, 34)
	 * $query->filterByTaxes(array('min' => 12)); // WHERE taxes > 12
	 * </code>
	 *
	 * @param mixed $taxes The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByTaxes($taxes = null, ?string $comparison = null)
	{
		if (\is_array($taxes)) {
			$useMinMax = false;

			if (isset($taxes['min'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_TAXES, $taxes['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($taxes['max'])) {
				$this->addUsingAlias(PurchaseOrderTableMap::COL_TAXES, $taxes['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PurchaseOrderTableMap::COL_TAXES, $taxes, $comparison);

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
	 * @return ChildPurchaseOrder|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(PurchaseOrderTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = PurchaseOrderTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildPurchaseOrder $purchaseOrder Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($purchaseOrder = null)
	{
		if ($purchaseOrder) {
			$this->addUsingAlias(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID, $purchaseOrder->getPurchaseOrderId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildPurchaseOrder|array|mixed the result, formatted by the current formatter
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
	 * @return ChildPurchaseOrder A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT purchase_order_id, supplier_id, created_by, submitted_date, creation_date, purchase_order_status_id, expected_date, shipping_fee, taxes, payment_date, payment_amount, payment_method, notes, approved_by, approved_date, submitted_by FROM purchase_order WHERE purchase_order_id = :p0';

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
			/** @var ChildPurchaseOrder $obj */
			$obj = new ChildPurchaseOrder();
			$obj->hydrate($row);
			PurchaseOrderTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
