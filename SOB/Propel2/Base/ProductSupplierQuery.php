<?php

namespace SOB\Propel2\Base;

use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Propel;
use SOB\Propel2\Map\ProductSupplierTableMap;
use SOB\Propel2\ProductSupplier as ChildProductSupplier;
use SOB\Propel2\ProductSupplierQuery as ChildProductSupplierQuery;

/**
 * Base class that represents a query for the `product_supplier` table.
 *
 * @method     ChildProductSupplierQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildProductSupplierQuery orderBySupplierId($order = Criteria::ASC) Order by the supplier_id column
 *
 * @method     ChildProductSupplierQuery groupByProductId() Group by the product_id column
 * @method     ChildProductSupplierQuery groupBySupplierId() Group by the supplier_id column
 *
 * @method     ChildProductSupplierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProductSupplierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProductSupplierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProductSupplierQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProductSupplierQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProductSupplierQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProductSupplier|null findOne(?ConnectionInterface $con = null) Return the first ChildProductSupplier matching the query
 * @method     ChildProductSupplier findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildProductSupplier matching the query, or a new ChildProductSupplier object populated from the query conditions when no match is found
 *
 * @method     ChildProductSupplier|null findOneByProductId(int $product_id) Return the first ChildProductSupplier filtered by the product_id column
 * @method     ChildProductSupplier|null findOneBySupplierId(int $supplier_id) Return the first ChildProductSupplier filtered by the supplier_id column
 *
 * @method     ChildProductSupplier requirePk($key, ?ConnectionInterface $con = null) Return the ChildProductSupplier by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProductSupplier requireOne(?ConnectionInterface $con = null) Return the first ChildProductSupplier matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProductSupplier requireOneByProductId(int $product_id) Return the first ChildProductSupplier filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProductSupplier requireOneBySupplierId(int $supplier_id) Return the first ChildProductSupplier filtered by the supplier_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProductSupplier[]|Collection find(?ConnectionInterface $con = null) Return ChildProductSupplier objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildProductSupplier> find(?ConnectionInterface $con = null) Return ChildProductSupplier objects based on current ModelCriteria
 *
 * @method     ChildProductSupplier[]|Collection findByProductId(int|array<int> $product_id) Return ChildProductSupplier objects filtered by the product_id column
 * @psalm-method Collection&\Traversable<ChildProductSupplier> findByProductId(int|array<int> $product_id) Return ChildProductSupplier objects filtered by the product_id column
 * @method     ChildProductSupplier[]|Collection findBySupplierId(int|array<int> $supplier_id) Return ChildProductSupplier objects filtered by the supplier_id column
 * @psalm-method Collection&\Traversable<ChildProductSupplier> findBySupplierId(int|array<int> $supplier_id) Return ChildProductSupplier objects filtered by the supplier_id column
 *
 * @method     ChildProductSupplier[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildProductSupplier> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class ProductSupplierQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\ProductSupplierQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\ProductSupplier', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildProductSupplierQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildProductSupplierQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildProductSupplierQuery) {
			return $criteria;
		}
		$query = new ChildProductSupplierQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(ProductSupplierTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(ProductSupplierTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			ProductSupplierTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			ProductSupplierTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the product_supplier table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(ProductSupplierTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ProductSupplierTableMap::clearInstancePool();
			ProductSupplierTableMap::clearRelatedInstancePool();

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
		throw new LogicException('The ProductSupplier object has no primary key');
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
		throw new LogicException('The ProductSupplier object has no primary key');
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
				$this->addUsingAlias(ProductSupplierTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($productId['max'])) {
				$this->addUsingAlias(ProductSupplierTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductSupplierTableMap::COL_PRODUCT_ID, $productId, $comparison);

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
				$this->addUsingAlias(ProductSupplierTableMap::COL_SUPPLIER_ID, $supplierId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($supplierId['max'])) {
				$this->addUsingAlias(ProductSupplierTableMap::COL_SUPPLIER_ID, $supplierId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductSupplierTableMap::COL_SUPPLIER_ID, $supplierId, $comparison);

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
	 * @return ChildProductSupplier|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		throw new LogicException('The ProductSupplier object has no primary key');
	}

	/**
	 * Find objects by primary key
	 * <code>
	 * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
	 * </code>
	 * @param array $keys Primary keys to use for the query
	 * @param ConnectionInterface $con an optional connection object
	 *
	 * @return Collection|array|mixed the list of results, formatted by the current formatter
	 */
	public function findPks($keys, ?ConnectionInterface $con = null)
	{
		throw new LogicException('The ProductSupplier object has no primary key');
	}

	/**
	 * Exclude object from result
	 *
	 * @param ChildProductSupplier $productSupplier Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($productSupplier = null)
	{
		if ($productSupplier) {
			throw new LogicException('ProductSupplier object has no primary key');

		}

		return $this;
	}
}
