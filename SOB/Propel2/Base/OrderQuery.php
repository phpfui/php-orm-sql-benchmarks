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
use SOB\Propel2\Map\OrderTableMap;
use SOB\Propel2\Order as ChildOrder;
use SOB\Propel2\OrderQuery as ChildOrderQuery;

/**
 * Base class that represents a query for the `order` table.
 *
 * @method     ChildOrderQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildOrderQuery orderByEmployeeId($order = Criteria::ASC) Order by the employee_id column
 * @method     ChildOrderQuery orderByCustomerId($order = Criteria::ASC) Order by the customer_id column
 * @method     ChildOrderQuery orderByOrderDate($order = Criteria::ASC) Order by the order_date column
 * @method     ChildOrderQuery orderByShippedDate($order = Criteria::ASC) Order by the shipped_date column
 * @method     ChildOrderQuery orderByShipperId($order = Criteria::ASC) Order by the shipper_id column
 * @method     ChildOrderQuery orderByShipName($order = Criteria::ASC) Order by the ship_name column
 * @method     ChildOrderQuery orderByShipAddress($order = Criteria::ASC) Order by the ship_address column
 * @method     ChildOrderQuery orderByShipCity($order = Criteria::ASC) Order by the ship_city column
 * @method     ChildOrderQuery orderByShipStateProvince($order = Criteria::ASC) Order by the ship_state_province column
 * @method     ChildOrderQuery orderByShipZipPostalCode($order = Criteria::ASC) Order by the ship_zip_postal_code column
 * @method     ChildOrderQuery orderByShipCountryRegion($order = Criteria::ASC) Order by the ship_country_region column
 * @method     ChildOrderQuery orderByShippingFee($order = Criteria::ASC) Order by the shipping_fee column
 * @method     ChildOrderQuery orderByTaxes($order = Criteria::ASC) Order by the taxes column
 * @method     ChildOrderQuery orderByPaymentType($order = Criteria::ASC) Order by the payment_type column
 * @method     ChildOrderQuery orderByPaidDate($order = Criteria::ASC) Order by the paid_date column
 * @method     ChildOrderQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method     ChildOrderQuery orderByTaxRate($order = Criteria::ASC) Order by the tax_rate column
 * @method     ChildOrderQuery orderByOrderTaxStatusId($order = Criteria::ASC) Order by the order_tax_status_id column
 * @method     ChildOrderQuery orderByOrderStatusId($order = Criteria::ASC) Order by the order_status_id column
 *
 * @method     ChildOrderQuery groupByOrderId() Group by the order_id column
 * @method     ChildOrderQuery groupByEmployeeId() Group by the employee_id column
 * @method     ChildOrderQuery groupByCustomerId() Group by the customer_id column
 * @method     ChildOrderQuery groupByOrderDate() Group by the order_date column
 * @method     ChildOrderQuery groupByShippedDate() Group by the shipped_date column
 * @method     ChildOrderQuery groupByShipperId() Group by the shipper_id column
 * @method     ChildOrderQuery groupByShipName() Group by the ship_name column
 * @method     ChildOrderQuery groupByShipAddress() Group by the ship_address column
 * @method     ChildOrderQuery groupByShipCity() Group by the ship_city column
 * @method     ChildOrderQuery groupByShipStateProvince() Group by the ship_state_province column
 * @method     ChildOrderQuery groupByShipZipPostalCode() Group by the ship_zip_postal_code column
 * @method     ChildOrderQuery groupByShipCountryRegion() Group by the ship_country_region column
 * @method     ChildOrderQuery groupByShippingFee() Group by the shipping_fee column
 * @method     ChildOrderQuery groupByTaxes() Group by the taxes column
 * @method     ChildOrderQuery groupByPaymentType() Group by the payment_type column
 * @method     ChildOrderQuery groupByPaidDate() Group by the paid_date column
 * @method     ChildOrderQuery groupByNotes() Group by the notes column
 * @method     ChildOrderQuery groupByTaxRate() Group by the tax_rate column
 * @method     ChildOrderQuery groupByOrderTaxStatusId() Group by the order_tax_status_id column
 * @method     ChildOrderQuery groupByOrderStatusId() Group by the order_status_id column
 *
 * @method     ChildOrderQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildOrderQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildOrderQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildOrderQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildOrderQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildOrderQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildOrder|null findOne(?ConnectionInterface $con = null) Return the first ChildOrder matching the query
 * @method     ChildOrder findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildOrder matching the query, or a new ChildOrder object populated from the query conditions when no match is found
 *
 * @method     ChildOrder|null findOneByOrderId(int $order_id) Return the first ChildOrder filtered by the order_id column
 * @method     ChildOrder|null findOneByEmployeeId(int $employee_id) Return the first ChildOrder filtered by the employee_id column
 * @method     ChildOrder|null findOneByCustomerId(int $customer_id) Return the first ChildOrder filtered by the customer_id column
 * @method     ChildOrder|null findOneByOrderDate(string $order_date) Return the first ChildOrder filtered by the order_date column
 * @method     ChildOrder|null findOneByShippedDate(string $shipped_date) Return the first ChildOrder filtered by the shipped_date column
 * @method     ChildOrder|null findOneByShipperId(int $shipper_id) Return the first ChildOrder filtered by the shipper_id column
 * @method     ChildOrder|null findOneByShipName(string $ship_name) Return the first ChildOrder filtered by the ship_name column
 * @method     ChildOrder|null findOneByShipAddress(string $ship_address) Return the first ChildOrder filtered by the ship_address column
 * @method     ChildOrder|null findOneByShipCity(string $ship_city) Return the first ChildOrder filtered by the ship_city column
 * @method     ChildOrder|null findOneByShipStateProvince(string $ship_state_province) Return the first ChildOrder filtered by the ship_state_province column
 * @method     ChildOrder|null findOneByShipZipPostalCode(string $ship_zip_postal_code) Return the first ChildOrder filtered by the ship_zip_postal_code column
 * @method     ChildOrder|null findOneByShipCountryRegion(string $ship_country_region) Return the first ChildOrder filtered by the ship_country_region column
 * @method     ChildOrder|null findOneByShippingFee(string $shipping_fee) Return the first ChildOrder filtered by the shipping_fee column
 * @method     ChildOrder|null findOneByTaxes(string $taxes) Return the first ChildOrder filtered by the taxes column
 * @method     ChildOrder|null findOneByPaymentType(string $payment_type) Return the first ChildOrder filtered by the payment_type column
 * @method     ChildOrder|null findOneByPaidDate(string $paid_date) Return the first ChildOrder filtered by the paid_date column
 * @method     ChildOrder|null findOneByNotes(string $notes) Return the first ChildOrder filtered by the notes column
 * @method     ChildOrder|null findOneByTaxRate(double $tax_rate) Return the first ChildOrder filtered by the tax_rate column
 * @method     ChildOrder|null findOneByOrderTaxStatusId(int $order_tax_status_id) Return the first ChildOrder filtered by the order_tax_status_id column
 * @method     ChildOrder|null findOneByOrderStatusId(int $order_status_id) Return the first ChildOrder filtered by the order_status_id column
 *
 * @method     ChildOrder requirePk($key, ?ConnectionInterface $con = null) Return the ChildOrder by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOne(?ConnectionInterface $con = null) Return the first ChildOrder matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrder requireOneByOrderId(int $order_id) Return the first ChildOrder filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByEmployeeId(int $employee_id) Return the first ChildOrder filtered by the employee_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByCustomerId(int $customer_id) Return the first ChildOrder filtered by the customer_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByOrderDate(string $order_date) Return the first ChildOrder filtered by the order_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByShippedDate(string $shipped_date) Return the first ChildOrder filtered by the shipped_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByShipperId(int $shipper_id) Return the first ChildOrder filtered by the shipper_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByShipName(string $ship_name) Return the first ChildOrder filtered by the ship_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByShipAddress(string $ship_address) Return the first ChildOrder filtered by the ship_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByShipCity(string $ship_city) Return the first ChildOrder filtered by the ship_city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByShipStateProvince(string $ship_state_province) Return the first ChildOrder filtered by the ship_state_province column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByShipZipPostalCode(string $ship_zip_postal_code) Return the first ChildOrder filtered by the ship_zip_postal_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByShipCountryRegion(string $ship_country_region) Return the first ChildOrder filtered by the ship_country_region column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByShippingFee(string $shipping_fee) Return the first ChildOrder filtered by the shipping_fee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByTaxes(string $taxes) Return the first ChildOrder filtered by the taxes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByPaymentType(string $payment_type) Return the first ChildOrder filtered by the payment_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByPaidDate(string $paid_date) Return the first ChildOrder filtered by the paid_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByNotes(string $notes) Return the first ChildOrder filtered by the notes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByTaxRate(double $tax_rate) Return the first ChildOrder filtered by the tax_rate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByOrderTaxStatusId(int $order_tax_status_id) Return the first ChildOrder filtered by the order_tax_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildOrder requireOneByOrderStatusId(int $order_status_id) Return the first ChildOrder filtered by the order_status_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildOrder[]|Collection find(?ConnectionInterface $con = null) Return ChildOrder objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildOrder> find(?ConnectionInterface $con = null) Return ChildOrder objects based on current ModelCriteria
 *
 * @method     ChildOrder[]|Collection findByOrderId(int|array<int> $order_id) Return ChildOrder objects filtered by the order_id column
 * @psalm-method Collection&\Traversable<ChildOrder> findByOrderId(int|array<int> $order_id) Return ChildOrder objects filtered by the order_id column
 * @method     ChildOrder[]|Collection findByEmployeeId(int|array<int> $employee_id) Return ChildOrder objects filtered by the employee_id column
 * @psalm-method Collection&\Traversable<ChildOrder> findByEmployeeId(int|array<int> $employee_id) Return ChildOrder objects filtered by the employee_id column
 * @method     ChildOrder[]|Collection findByCustomerId(int|array<int> $customer_id) Return ChildOrder objects filtered by the customer_id column
 * @psalm-method Collection&\Traversable<ChildOrder> findByCustomerId(int|array<int> $customer_id) Return ChildOrder objects filtered by the customer_id column
 * @method     ChildOrder[]|Collection findByOrderDate(string|array<string> $order_date) Return ChildOrder objects filtered by the order_date column
 * @psalm-method Collection&\Traversable<ChildOrder> findByOrderDate(string|array<string> $order_date) Return ChildOrder objects filtered by the order_date column
 * @method     ChildOrder[]|Collection findByShippedDate(string|array<string> $shipped_date) Return ChildOrder objects filtered by the shipped_date column
 * @psalm-method Collection&\Traversable<ChildOrder> findByShippedDate(string|array<string> $shipped_date) Return ChildOrder objects filtered by the shipped_date column
 * @method     ChildOrder[]|Collection findByShipperId(int|array<int> $shipper_id) Return ChildOrder objects filtered by the shipper_id column
 * @psalm-method Collection&\Traversable<ChildOrder> findByShipperId(int|array<int> $shipper_id) Return ChildOrder objects filtered by the shipper_id column
 * @method     ChildOrder[]|Collection findByShipName(string|array<string> $ship_name) Return ChildOrder objects filtered by the ship_name column
 * @psalm-method Collection&\Traversable<ChildOrder> findByShipName(string|array<string> $ship_name) Return ChildOrder objects filtered by the ship_name column
 * @method     ChildOrder[]|Collection findByShipAddress(string|array<string> $ship_address) Return ChildOrder objects filtered by the ship_address column
 * @psalm-method Collection&\Traversable<ChildOrder> findByShipAddress(string|array<string> $ship_address) Return ChildOrder objects filtered by the ship_address column
 * @method     ChildOrder[]|Collection findByShipCity(string|array<string> $ship_city) Return ChildOrder objects filtered by the ship_city column
 * @psalm-method Collection&\Traversable<ChildOrder> findByShipCity(string|array<string> $ship_city) Return ChildOrder objects filtered by the ship_city column
 * @method     ChildOrder[]|Collection findByShipStateProvince(string|array<string> $ship_state_province) Return ChildOrder objects filtered by the ship_state_province column
 * @psalm-method Collection&\Traversable<ChildOrder> findByShipStateProvince(string|array<string> $ship_state_province) Return ChildOrder objects filtered by the ship_state_province column
 * @method     ChildOrder[]|Collection findByShipZipPostalCode(string|array<string> $ship_zip_postal_code) Return ChildOrder objects filtered by the ship_zip_postal_code column
 * @psalm-method Collection&\Traversable<ChildOrder> findByShipZipPostalCode(string|array<string> $ship_zip_postal_code) Return ChildOrder objects filtered by the ship_zip_postal_code column
 * @method     ChildOrder[]|Collection findByShipCountryRegion(string|array<string> $ship_country_region) Return ChildOrder objects filtered by the ship_country_region column
 * @psalm-method Collection&\Traversable<ChildOrder> findByShipCountryRegion(string|array<string> $ship_country_region) Return ChildOrder objects filtered by the ship_country_region column
 * @method     ChildOrder[]|Collection findByShippingFee(string|array<string> $shipping_fee) Return ChildOrder objects filtered by the shipping_fee column
 * @psalm-method Collection&\Traversable<ChildOrder> findByShippingFee(string|array<string> $shipping_fee) Return ChildOrder objects filtered by the shipping_fee column
 * @method     ChildOrder[]|Collection findByTaxes(string|array<string> $taxes) Return ChildOrder objects filtered by the taxes column
 * @psalm-method Collection&\Traversable<ChildOrder> findByTaxes(string|array<string> $taxes) Return ChildOrder objects filtered by the taxes column
 * @method     ChildOrder[]|Collection findByPaymentType(string|array<string> $payment_type) Return ChildOrder objects filtered by the payment_type column
 * @psalm-method Collection&\Traversable<ChildOrder> findByPaymentType(string|array<string> $payment_type) Return ChildOrder objects filtered by the payment_type column
 * @method     ChildOrder[]|Collection findByPaidDate(string|array<string> $paid_date) Return ChildOrder objects filtered by the paid_date column
 * @psalm-method Collection&\Traversable<ChildOrder> findByPaidDate(string|array<string> $paid_date) Return ChildOrder objects filtered by the paid_date column
 * @method     ChildOrder[]|Collection findByNotes(string|array<string> $notes) Return ChildOrder objects filtered by the notes column
 * @psalm-method Collection&\Traversable<ChildOrder> findByNotes(string|array<string> $notes) Return ChildOrder objects filtered by the notes column
 * @method     ChildOrder[]|Collection findByTaxRate(double|array<double> $tax_rate) Return ChildOrder objects filtered by the tax_rate column
 * @psalm-method Collection&\Traversable<ChildOrder> findByTaxRate(double|array<double> $tax_rate) Return ChildOrder objects filtered by the tax_rate column
 * @method     ChildOrder[]|Collection findByOrderTaxStatusId(int|array<int> $order_tax_status_id) Return ChildOrder objects filtered by the order_tax_status_id column
 * @psalm-method Collection&\Traversable<ChildOrder> findByOrderTaxStatusId(int|array<int> $order_tax_status_id) Return ChildOrder objects filtered by the order_tax_status_id column
 * @method     ChildOrder[]|Collection findByOrderStatusId(int|array<int> $order_status_id) Return ChildOrder objects filtered by the order_status_id column
 * @psalm-method Collection&\Traversable<ChildOrder> findByOrderStatusId(int|array<int> $order_status_id) Return ChildOrder objects filtered by the order_status_id column
 *
 * @method     ChildOrder[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildOrder> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class OrderQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\OrderQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\Order', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildOrderQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildOrderQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildOrderQuery) {
			return $criteria;
		}
		$query = new ChildOrderQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(OrderTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(OrderTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(static function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			OrderTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			OrderTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the order table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(OrderTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			OrderTableMap::clearInstancePool();
			OrderTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the customer_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCustomerId(1234); // WHERE customer_id = 1234
	 * $query->filterByCustomerId(array(12, 34)); // WHERE customer_id IN (12, 34)
	 * $query->filterByCustomerId(array('min' => 12)); // WHERE customer_id > 12
	 * </code>
	 *
	 * @param mixed $customerId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByCustomerId($customerId = null, ?string $comparison = null)
	{
		if (\is_array($customerId)) {
			$useMinMax = false;

			if (isset($customerId['min'])) {
				$this->addUsingAlias(OrderTableMap::COL_CUSTOMER_ID, $customerId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($customerId['max'])) {
				$this->addUsingAlias(OrderTableMap::COL_CUSTOMER_ID, $customerId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_CUSTOMER_ID, $customerId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the employee_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEmployeeId(1234); // WHERE employee_id = 1234
	 * $query->filterByEmployeeId(array(12, 34)); // WHERE employee_id IN (12, 34)
	 * $query->filterByEmployeeId(array('min' => 12)); // WHERE employee_id > 12
	 * </code>
	 *
	 * @param mixed $employeeId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByEmployeeId($employeeId = null, ?string $comparison = null)
	{
		if (\is_array($employeeId)) {
			$useMinMax = false;

			if (isset($employeeId['min'])) {
				$this->addUsingAlias(OrderTableMap::COL_EMPLOYEE_ID, $employeeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($employeeId['max'])) {
				$this->addUsingAlias(OrderTableMap::COL_EMPLOYEE_ID, $employeeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_EMPLOYEE_ID, $employeeId, $comparison);

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

		$this->addUsingAlias(OrderTableMap::COL_NOTES, $notes, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the order_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByOrderDate('2011-03-14'); // WHERE order_date = '2011-03-14'
	 * $query->filterByOrderDate('now'); // WHERE order_date = '2011-03-14'
	 * $query->filterByOrderDate(array('max' => 'yesterday')); // WHERE order_date > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $orderDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByOrderDate($orderDate = null, ?string $comparison = null)
	{
		if (\is_array($orderDate)) {
			$useMinMax = false;

			if (isset($orderDate['min'])) {
				$this->addUsingAlias(OrderTableMap::COL_ORDER_DATE, $orderDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($orderDate['max'])) {
				$this->addUsingAlias(OrderTableMap::COL_ORDER_DATE, $orderDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_ORDER_DATE, $orderDate, $comparison);

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
				$this->addUsingAlias(OrderTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($orderId['max'])) {
				$this->addUsingAlias(OrderTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_ORDER_ID, $orderId, $comparison);

		return $this;
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
				$this->addUsingAlias(OrderTableMap::COL_ORDER_STATUS_ID, $orderStatusId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($orderStatusId['max'])) {
				$this->addUsingAlias(OrderTableMap::COL_ORDER_STATUS_ID, $orderStatusId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_ORDER_STATUS_ID, $orderStatusId, $comparison);

		return $this;
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
				$this->addUsingAlias(OrderTableMap::COL_ORDER_TAX_STATUS_ID, $orderTaxStatusId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($orderTaxStatusId['max'])) {
				$this->addUsingAlias(OrderTableMap::COL_ORDER_TAX_STATUS_ID, $orderTaxStatusId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_ORDER_TAX_STATUS_ID, $orderTaxStatusId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the paid_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPaidDate('2011-03-14'); // WHERE paid_date = '2011-03-14'
	 * $query->filterByPaidDate('now'); // WHERE paid_date = '2011-03-14'
	 * $query->filterByPaidDate(array('max' => 'yesterday')); // WHERE paid_date > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $paidDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPaidDate($paidDate = null, ?string $comparison = null)
	{
		if (\is_array($paidDate)) {
			$useMinMax = false;

			if (isset($paidDate['min'])) {
				$this->addUsingAlias(OrderTableMap::COL_PAID_DATE, $paidDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($paidDate['max'])) {
				$this->addUsingAlias(OrderTableMap::COL_PAID_DATE, $paidDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_PAID_DATE, $paidDate, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the payment_type column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPaymentType('fooValue');   // WHERE payment_type = 'fooValue'
	 * $query->filterByPaymentType('%fooValue%', Criteria::LIKE); // WHERE payment_type LIKE '%fooValue%'
	 * $query->filterByPaymentType(['foo', 'bar']); // WHERE payment_type IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $paymentType The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPaymentType($paymentType = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($paymentType)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_PAYMENT_TYPE, $paymentType, $comparison);

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

		$this->addUsingAlias(OrderTableMap::COL_ORDER_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(OrderTableMap::COL_ORDER_ID, $keys, Criteria::IN);

		return $this;
	}

	/**
	 * Filter the query on the ship_address column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShipAddress('fooValue');   // WHERE ship_address = 'fooValue'
	 * $query->filterByShipAddress('%fooValue%', Criteria::LIKE); // WHERE ship_address LIKE '%fooValue%'
	 * $query->filterByShipAddress(['foo', 'bar']); // WHERE ship_address IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $shipAddress The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByShipAddress($shipAddress = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($shipAddress)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_SHIP_ADDRESS, $shipAddress, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the ship_city column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShipCity('fooValue');   // WHERE ship_city = 'fooValue'
	 * $query->filterByShipCity('%fooValue%', Criteria::LIKE); // WHERE ship_city LIKE '%fooValue%'
	 * $query->filterByShipCity(['foo', 'bar']); // WHERE ship_city IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $shipCity The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByShipCity($shipCity = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($shipCity)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_SHIP_CITY, $shipCity, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the ship_country_region column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShipCountryRegion('fooValue');   // WHERE ship_country_region = 'fooValue'
	 * $query->filterByShipCountryRegion('%fooValue%', Criteria::LIKE); // WHERE ship_country_region LIKE '%fooValue%'
	 * $query->filterByShipCountryRegion(['foo', 'bar']); // WHERE ship_country_region IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $shipCountryRegion The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByShipCountryRegion($shipCountryRegion = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($shipCountryRegion)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_SHIP_COUNTRY_REGION, $shipCountryRegion, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the ship_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShipName('fooValue');   // WHERE ship_name = 'fooValue'
	 * $query->filterByShipName('%fooValue%', Criteria::LIKE); // WHERE ship_name LIKE '%fooValue%'
	 * $query->filterByShipName(['foo', 'bar']); // WHERE ship_name IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $shipName The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByShipName($shipName = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($shipName)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_SHIP_NAME, $shipName, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the shipped_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShippedDate('2011-03-14'); // WHERE shipped_date = '2011-03-14'
	 * $query->filterByShippedDate('now'); // WHERE shipped_date = '2011-03-14'
	 * $query->filterByShippedDate(array('max' => 'yesterday')); // WHERE shipped_date > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $shippedDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByShippedDate($shippedDate = null, ?string $comparison = null)
	{
		if (\is_array($shippedDate)) {
			$useMinMax = false;

			if (isset($shippedDate['min'])) {
				$this->addUsingAlias(OrderTableMap::COL_SHIPPED_DATE, $shippedDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($shippedDate['max'])) {
				$this->addUsingAlias(OrderTableMap::COL_SHIPPED_DATE, $shippedDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_SHIPPED_DATE, $shippedDate, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the shipper_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShipperId(1234); // WHERE shipper_id = 1234
	 * $query->filterByShipperId(array(12, 34)); // WHERE shipper_id IN (12, 34)
	 * $query->filterByShipperId(array('min' => 12)); // WHERE shipper_id > 12
	 * </code>
	 *
	 * @param mixed $shipperId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByShipperId($shipperId = null, ?string $comparison = null)
	{
		if (\is_array($shipperId)) {
			$useMinMax = false;

			if (isset($shipperId['min'])) {
				$this->addUsingAlias(OrderTableMap::COL_SHIPPER_ID, $shipperId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($shipperId['max'])) {
				$this->addUsingAlias(OrderTableMap::COL_SHIPPER_ID, $shipperId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_SHIPPER_ID, $shipperId, $comparison);

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
				$this->addUsingAlias(OrderTableMap::COL_SHIPPING_FEE, $shippingFee['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($shippingFee['max'])) {
				$this->addUsingAlias(OrderTableMap::COL_SHIPPING_FEE, $shippingFee['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_SHIPPING_FEE, $shippingFee, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the ship_state_province column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShipStateProvince('fooValue');   // WHERE ship_state_province = 'fooValue'
	 * $query->filterByShipStateProvince('%fooValue%', Criteria::LIKE); // WHERE ship_state_province LIKE '%fooValue%'
	 * $query->filterByShipStateProvince(['foo', 'bar']); // WHERE ship_state_province IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $shipStateProvince The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByShipStateProvince($shipStateProvince = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($shipStateProvince)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_SHIP_STATE_PROVINCE, $shipStateProvince, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the ship_zip_postal_code column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShipZipPostalCode('fooValue');   // WHERE ship_zip_postal_code = 'fooValue'
	 * $query->filterByShipZipPostalCode('%fooValue%', Criteria::LIKE); // WHERE ship_zip_postal_code LIKE '%fooValue%'
	 * $query->filterByShipZipPostalCode(['foo', 'bar']); // WHERE ship_zip_postal_code IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $shipZipPostalCode The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByShipZipPostalCode($shipZipPostalCode = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($shipZipPostalCode)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_SHIP_ZIP_POSTAL_CODE, $shipZipPostalCode, $comparison);

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
				$this->addUsingAlias(OrderTableMap::COL_TAXES, $taxes['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($taxes['max'])) {
				$this->addUsingAlias(OrderTableMap::COL_TAXES, $taxes['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_TAXES, $taxes, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the tax_rate column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTaxRate(1234); // WHERE tax_rate = 1234
	 * $query->filterByTaxRate(array(12, 34)); // WHERE tax_rate IN (12, 34)
	 * $query->filterByTaxRate(array('min' => 12)); // WHERE tax_rate > 12
	 * </code>
	 *
	 * @param mixed $taxRate The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByTaxRate($taxRate = null, ?string $comparison = null)
	{
		if (\is_array($taxRate)) {
			$useMinMax = false;

			if (isset($taxRate['min'])) {
				$this->addUsingAlias(OrderTableMap::COL_TAX_RATE, $taxRate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($taxRate['max'])) {
				$this->addUsingAlias(OrderTableMap::COL_TAX_RATE, $taxRate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(OrderTableMap::COL_TAX_RATE, $taxRate, $comparison);

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
	 * @return ChildOrder|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(OrderTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = OrderTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildOrder $order Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($order = null)
	{
		if ($order) {
			$this->addUsingAlias(OrderTableMap::COL_ORDER_ID, $order->getOrderId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildOrder|array|mixed the result, formatted by the current formatter
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
	 * @return ChildOrder A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT order_id, employee_id, customer_id, order_date, shipped_date, shipper_id, ship_name, ship_address, ship_city, ship_state_province, ship_zip_postal_code, ship_country_region, shipping_fee, taxes, payment_type, paid_date, notes, tax_rate, order_tax_status_id, order_status_id FROM order WHERE order_id = :p0';

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
			/** @var ChildOrder $obj */
			$obj = new ChildOrder();
			$obj->hydrate($row);
			OrderTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
