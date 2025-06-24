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
use SOB\Propel2\Invoice as ChildInvoice;
use SOB\Propel2\InvoiceQuery as ChildInvoiceQuery;
use SOB\Propel2\Map\InvoiceTableMap;

/**
 * Base class that represents a query for the `invoice` table.
 *
 * @method     ChildInvoiceQuery orderByInvoiceId($order = Criteria::ASC) Order by the invoice_id column
 * @method     ChildInvoiceQuery orderByOrderId($order = Criteria::ASC) Order by the order_id column
 * @method     ChildInvoiceQuery orderByInvoiceDate($order = Criteria::ASC) Order by the invoice_date column
 * @method     ChildInvoiceQuery orderByDueDate($order = Criteria::ASC) Order by the due_date column
 * @method     ChildInvoiceQuery orderByTax($order = Criteria::ASC) Order by the tax column
 * @method     ChildInvoiceQuery orderByShipping($order = Criteria::ASC) Order by the shipping column
 * @method     ChildInvoiceQuery orderByAmountDue($order = Criteria::ASC) Order by the amount_due column
 *
 * @method     ChildInvoiceQuery groupByInvoiceId() Group by the invoice_id column
 * @method     ChildInvoiceQuery groupByOrderId() Group by the order_id column
 * @method     ChildInvoiceQuery groupByInvoiceDate() Group by the invoice_date column
 * @method     ChildInvoiceQuery groupByDueDate() Group by the due_date column
 * @method     ChildInvoiceQuery groupByTax() Group by the tax column
 * @method     ChildInvoiceQuery groupByShipping() Group by the shipping column
 * @method     ChildInvoiceQuery groupByAmountDue() Group by the amount_due column
 *
 * @method     ChildInvoiceQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInvoiceQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInvoiceQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInvoiceQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInvoiceQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInvoiceQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInvoice|null findOne(?ConnectionInterface $con = null) Return the first ChildInvoice matching the query
 * @method     ChildInvoice findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildInvoice matching the query, or a new ChildInvoice object populated from the query conditions when no match is found
 *
 * @method     ChildInvoice|null findOneByInvoiceId(int $invoice_id) Return the first ChildInvoice filtered by the invoice_id column
 * @method     ChildInvoice|null findOneByOrderId(int $order_id) Return the first ChildInvoice filtered by the order_id column
 * @method     ChildInvoice|null findOneByInvoiceDate(string $invoice_date) Return the first ChildInvoice filtered by the invoice_date column
 * @method     ChildInvoice|null findOneByDueDate(string $due_date) Return the first ChildInvoice filtered by the due_date column
 * @method     ChildInvoice|null findOneByTax(string $tax) Return the first ChildInvoice filtered by the tax column
 * @method     ChildInvoice|null findOneByShipping(string $shipping) Return the first ChildInvoice filtered by the shipping column
 * @method     ChildInvoice|null findOneByAmountDue(string $amount_due) Return the first ChildInvoice filtered by the amount_due column
 *
 * @method     ChildInvoice requirePk($key, ?ConnectionInterface $con = null) Return the ChildInvoice by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvoice requireOne(?ConnectionInterface $con = null) Return the first ChildInvoice matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInvoice requireOneByInvoiceId(int $invoice_id) Return the first ChildInvoice filtered by the invoice_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvoice requireOneByOrderId(int $order_id) Return the first ChildInvoice filtered by the order_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvoice requireOneByInvoiceDate(string $invoice_date) Return the first ChildInvoice filtered by the invoice_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvoice requireOneByDueDate(string $due_date) Return the first ChildInvoice filtered by the due_date column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvoice requireOneByTax(string $tax) Return the first ChildInvoice filtered by the tax column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvoice requireOneByShipping(string $shipping) Return the first ChildInvoice filtered by the shipping column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInvoice requireOneByAmountDue(string $amount_due) Return the first ChildInvoice filtered by the amount_due column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInvoice[]|Collection find(?ConnectionInterface $con = null) Return ChildInvoice objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildInvoice> find(?ConnectionInterface $con = null) Return ChildInvoice objects based on current ModelCriteria
 *
 * @method     ChildInvoice[]|Collection findByInvoiceId(int|array<int> $invoice_id) Return ChildInvoice objects filtered by the invoice_id column
 * @psalm-method Collection&\Traversable<ChildInvoice> findByInvoiceId(int|array<int> $invoice_id) Return ChildInvoice objects filtered by the invoice_id column
 * @method     ChildInvoice[]|Collection findByOrderId(int|array<int> $order_id) Return ChildInvoice objects filtered by the order_id column
 * @psalm-method Collection&\Traversable<ChildInvoice> findByOrderId(int|array<int> $order_id) Return ChildInvoice objects filtered by the order_id column
 * @method     ChildInvoice[]|Collection findByInvoiceDate(string|array<string> $invoice_date) Return ChildInvoice objects filtered by the invoice_date column
 * @psalm-method Collection&\Traversable<ChildInvoice> findByInvoiceDate(string|array<string> $invoice_date) Return ChildInvoice objects filtered by the invoice_date column
 * @method     ChildInvoice[]|Collection findByDueDate(string|array<string> $due_date) Return ChildInvoice objects filtered by the due_date column
 * @psalm-method Collection&\Traversable<ChildInvoice> findByDueDate(string|array<string> $due_date) Return ChildInvoice objects filtered by the due_date column
 * @method     ChildInvoice[]|Collection findByTax(string|array<string> $tax) Return ChildInvoice objects filtered by the tax column
 * @psalm-method Collection&\Traversable<ChildInvoice> findByTax(string|array<string> $tax) Return ChildInvoice objects filtered by the tax column
 * @method     ChildInvoice[]|Collection findByShipping(string|array<string> $shipping) Return ChildInvoice objects filtered by the shipping column
 * @psalm-method Collection&\Traversable<ChildInvoice> findByShipping(string|array<string> $shipping) Return ChildInvoice objects filtered by the shipping column
 * @method     ChildInvoice[]|Collection findByAmountDue(string|array<string> $amount_due) Return ChildInvoice objects filtered by the amount_due column
 * @psalm-method Collection&\Traversable<ChildInvoice> findByAmountDue(string|array<string> $amount_due) Return ChildInvoice objects filtered by the amount_due column
 *
 * @method     ChildInvoice[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildInvoice> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class InvoiceQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\InvoiceQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\Invoice', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildInvoiceQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildInvoiceQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildInvoiceQuery) {
			return $criteria;
		}
		$query = new ChildInvoiceQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(InvoiceTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(InvoiceTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			InvoiceTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			InvoiceTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the invoice table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(InvoiceTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			InvoiceTableMap::clearInstancePool();
			InvoiceTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the amount_due column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAmountDue(1234); // WHERE amount_due = 1234
	 * $query->filterByAmountDue(array(12, 34)); // WHERE amount_due IN (12, 34)
	 * $query->filterByAmountDue(array('min' => 12)); // WHERE amount_due > 12
	 * </code>
	 *
	 * @param mixed $amountDue The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByAmountDue($amountDue = null, ?string $comparison = null)
	{
		if (\is_array($amountDue)) {
			$useMinMax = false;

			if (isset($amountDue['min'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_AMOUNT_DUE, $amountDue['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($amountDue['max'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_AMOUNT_DUE, $amountDue['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InvoiceTableMap::COL_AMOUNT_DUE, $amountDue, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the due_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDueDate('2011-03-14'); // WHERE due_date = '2011-03-14'
	 * $query->filterByDueDate('now'); // WHERE due_date = '2011-03-14'
	 * $query->filterByDueDate(array('max' => 'yesterday')); // WHERE due_date > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $dueDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDueDate($dueDate = null, ?string $comparison = null)
	{
		if (\is_array($dueDate)) {
			$useMinMax = false;

			if (isset($dueDate['min'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_DUE_DATE, $dueDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($dueDate['max'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_DUE_DATE, $dueDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InvoiceTableMap::COL_DUE_DATE, $dueDate, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the invoice_date column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInvoiceDate('2011-03-14'); // WHERE invoice_date = '2011-03-14'
	 * $query->filterByInvoiceDate('now'); // WHERE invoice_date = '2011-03-14'
	 * $query->filterByInvoiceDate(array('max' => 'yesterday')); // WHERE invoice_date > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $invoiceDate The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByInvoiceDate($invoiceDate = null, ?string $comparison = null)
	{
		if (\is_array($invoiceDate)) {
			$useMinMax = false;

			if (isset($invoiceDate['min'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_INVOICE_DATE, $invoiceDate['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($invoiceDate['max'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_INVOICE_DATE, $invoiceDate['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InvoiceTableMap::COL_INVOICE_DATE, $invoiceDate, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the invoice_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInvoiceId(1234); // WHERE invoice_id = 1234
	 * $query->filterByInvoiceId(array(12, 34)); // WHERE invoice_id IN (12, 34)
	 * $query->filterByInvoiceId(array('min' => 12)); // WHERE invoice_id > 12
	 * </code>
	 *
	 * @param mixed $invoiceId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByInvoiceId($invoiceId = null, ?string $comparison = null)
	{
		if (\is_array($invoiceId)) {
			$useMinMax = false;

			if (isset($invoiceId['min'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_INVOICE_ID, $invoiceId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($invoiceId['max'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_INVOICE_ID, $invoiceId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InvoiceTableMap::COL_INVOICE_ID, $invoiceId, $comparison);

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
				$this->addUsingAlias(InvoiceTableMap::COL_ORDER_ID, $orderId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($orderId['max'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_ORDER_ID, $orderId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InvoiceTableMap::COL_ORDER_ID, $orderId, $comparison);

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

		$this->addUsingAlias(InvoiceTableMap::COL_INVOICE_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(InvoiceTableMap::COL_INVOICE_ID, $keys, Criteria::IN);

		return $this;
	}

	/**
	 * Filter the query on the shipping column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByShipping(1234); // WHERE shipping = 1234
	 * $query->filterByShipping(array(12, 34)); // WHERE shipping IN (12, 34)
	 * $query->filterByShipping(array('min' => 12)); // WHERE shipping > 12
	 * </code>
	 *
	 * @param mixed $shipping The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByShipping($shipping = null, ?string $comparison = null)
	{
		if (\is_array($shipping)) {
			$useMinMax = false;

			if (isset($shipping['min'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_SHIPPING, $shipping['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($shipping['max'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_SHIPPING, $shipping['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InvoiceTableMap::COL_SHIPPING, $shipping, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the tax column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTax(1234); // WHERE tax = 1234
	 * $query->filterByTax(array(12, 34)); // WHERE tax IN (12, 34)
	 * $query->filterByTax(array('min' => 12)); // WHERE tax > 12
	 * </code>
	 *
	 * @param mixed $tax The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByTax($tax = null, ?string $comparison = null)
	{
		if (\is_array($tax)) {
			$useMinMax = false;

			if (isset($tax['min'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_TAX, $tax['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($tax['max'])) {
				$this->addUsingAlias(InvoiceTableMap::COL_TAX, $tax['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InvoiceTableMap::COL_TAX, $tax, $comparison);

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
	 * @return ChildInvoice|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(InvoiceTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = InvoiceTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildInvoice $invoice Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($invoice = null)
	{
		if ($invoice) {
			$this->addUsingAlias(InvoiceTableMap::COL_INVOICE_ID, $invoice->getInvoiceId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildInvoice|array|mixed the result, formatted by the current formatter
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
	 * @return ChildInvoice A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT invoice_id, order_id, invoice_date, due_date, tax, shipping, amount_due FROM invoice WHERE invoice_id = :p0';

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
			/** @var ChildInvoice $obj */
			$obj = new ChildInvoice();
			$obj->hydrate($row);
			InvoiceTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
