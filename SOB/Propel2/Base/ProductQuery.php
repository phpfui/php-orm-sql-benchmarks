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
use SOB\Propel2\Map\ProductTableMap;
use SOB\Propel2\Product as ChildProduct;
use SOB\Propel2\ProductQuery as ChildProductQuery;

/**
 * Base class that represents a query for the `product` table.
 *
 * @method     ChildProductQuery orderByProductId($order = Criteria::ASC) Order by the product_id column
 * @method     ChildProductQuery orderByProductCode($order = Criteria::ASC) Order by the product_code column
 * @method     ChildProductQuery orderByProductName($order = Criteria::ASC) Order by the product_name column
 * @method     ChildProductQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildProductQuery orderByStandardCost($order = Criteria::ASC) Order by the standard_cost column
 * @method     ChildProductQuery orderByListPrice($order = Criteria::ASC) Order by the list_price column
 * @method     ChildProductQuery orderByReorderLevel($order = Criteria::ASC) Order by the reorder_level column
 * @method     ChildProductQuery orderByTargetLevel($order = Criteria::ASC) Order by the target_level column
 * @method     ChildProductQuery orderByQuantityPerUnit($order = Criteria::ASC) Order by the quantity_per_unit column
 * @method     ChildProductQuery orderByDiscontinued($order = Criteria::ASC) Order by the discontinued column
 * @method     ChildProductQuery orderByMinimumReorderQuantity($order = Criteria::ASC) Order by the minimum_reorder_quantity column
 * @method     ChildProductQuery orderByCategory($order = Criteria::ASC) Order by the category column
 * @method     ChildProductQuery orderByAttachments($order = Criteria::ASC) Order by the attachments column
 *
 * @method     ChildProductQuery groupByProductId() Group by the product_id column
 * @method     ChildProductQuery groupByProductCode() Group by the product_code column
 * @method     ChildProductQuery groupByProductName() Group by the product_name column
 * @method     ChildProductQuery groupByDescription() Group by the description column
 * @method     ChildProductQuery groupByStandardCost() Group by the standard_cost column
 * @method     ChildProductQuery groupByListPrice() Group by the list_price column
 * @method     ChildProductQuery groupByReorderLevel() Group by the reorder_level column
 * @method     ChildProductQuery groupByTargetLevel() Group by the target_level column
 * @method     ChildProductQuery groupByQuantityPerUnit() Group by the quantity_per_unit column
 * @method     ChildProductQuery groupByDiscontinued() Group by the discontinued column
 * @method     ChildProductQuery groupByMinimumReorderQuantity() Group by the minimum_reorder_quantity column
 * @method     ChildProductQuery groupByCategory() Group by the category column
 * @method     ChildProductQuery groupByAttachments() Group by the attachments column
 *
 * @method     ChildProductQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildProductQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildProductQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildProductQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildProductQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildProductQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildProduct|null findOne(?ConnectionInterface $con = null) Return the first ChildProduct matching the query
 * @method     ChildProduct findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildProduct matching the query, or a new ChildProduct object populated from the query conditions when no match is found
 *
 * @method     ChildProduct|null findOneByProductId(int $product_id) Return the first ChildProduct filtered by the product_id column
 * @method     ChildProduct|null findOneByProductCode(string $product_code) Return the first ChildProduct filtered by the product_code column
 * @method     ChildProduct|null findOneByProductName(string $product_name) Return the first ChildProduct filtered by the product_name column
 * @method     ChildProduct|null findOneByDescription(string $description) Return the first ChildProduct filtered by the description column
 * @method     ChildProduct|null findOneByStandardCost(string $standard_cost) Return the first ChildProduct filtered by the standard_cost column
 * @method     ChildProduct|null findOneByListPrice(string $list_price) Return the first ChildProduct filtered by the list_price column
 * @method     ChildProduct|null findOneByReorderLevel(int $reorder_level) Return the first ChildProduct filtered by the reorder_level column
 * @method     ChildProduct|null findOneByTargetLevel(int $target_level) Return the first ChildProduct filtered by the target_level column
 * @method     ChildProduct|null findOneByQuantityPerUnit(string $quantity_per_unit) Return the first ChildProduct filtered by the quantity_per_unit column
 * @method     ChildProduct|null findOneByDiscontinued(int $discontinued) Return the first ChildProduct filtered by the discontinued column
 * @method     ChildProduct|null findOneByMinimumReorderQuantity(int $minimum_reorder_quantity) Return the first ChildProduct filtered by the minimum_reorder_quantity column
 * @method     ChildProduct|null findOneByCategory(string $category) Return the first ChildProduct filtered by the category column
 * @method     ChildProduct|null findOneByAttachments(string $attachments) Return the first ChildProduct filtered by the attachments column
 *
 * @method     ChildProduct requirePk($key, ?ConnectionInterface $con = null) Return the ChildProduct by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOne(?ConnectionInterface $con = null) Return the first ChildProduct matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProduct requireOneByProductId(int $product_id) Return the first ChildProduct filtered by the product_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByProductCode(string $product_code) Return the first ChildProduct filtered by the product_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByProductName(string $product_name) Return the first ChildProduct filtered by the product_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByDescription(string $description) Return the first ChildProduct filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByStandardCost(string $standard_cost) Return the first ChildProduct filtered by the standard_cost column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByListPrice(string $list_price) Return the first ChildProduct filtered by the list_price column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByReorderLevel(int $reorder_level) Return the first ChildProduct filtered by the reorder_level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByTargetLevel(int $target_level) Return the first ChildProduct filtered by the target_level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByQuantityPerUnit(string $quantity_per_unit) Return the first ChildProduct filtered by the quantity_per_unit column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByDiscontinued(int $discontinued) Return the first ChildProduct filtered by the discontinued column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByMinimumReorderQuantity(int $minimum_reorder_quantity) Return the first ChildProduct filtered by the minimum_reorder_quantity column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByCategory(string $category) Return the first ChildProduct filtered by the category column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildProduct requireOneByAttachments(string $attachments) Return the first ChildProduct filtered by the attachments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildProduct[]|Collection find(?ConnectionInterface $con = null) Return ChildProduct objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildProduct> find(?ConnectionInterface $con = null) Return ChildProduct objects based on current ModelCriteria
 *
 * @method     ChildProduct[]|Collection findByProductId(int|array<int> $product_id) Return ChildProduct objects filtered by the product_id column
 * @psalm-method Collection&\Traversable<ChildProduct> findByProductId(int|array<int> $product_id) Return ChildProduct objects filtered by the product_id column
 * @method     ChildProduct[]|Collection findByProductCode(string|array<string> $product_code) Return ChildProduct objects filtered by the product_code column
 * @psalm-method Collection&\Traversable<ChildProduct> findByProductCode(string|array<string> $product_code) Return ChildProduct objects filtered by the product_code column
 * @method     ChildProduct[]|Collection findByProductName(string|array<string> $product_name) Return ChildProduct objects filtered by the product_name column
 * @psalm-method Collection&\Traversable<ChildProduct> findByProductName(string|array<string> $product_name) Return ChildProduct objects filtered by the product_name column
 * @method     ChildProduct[]|Collection findByDescription(string|array<string> $description) Return ChildProduct objects filtered by the description column
 * @psalm-method Collection&\Traversable<ChildProduct> findByDescription(string|array<string> $description) Return ChildProduct objects filtered by the description column
 * @method     ChildProduct[]|Collection findByStandardCost(string|array<string> $standard_cost) Return ChildProduct objects filtered by the standard_cost column
 * @psalm-method Collection&\Traversable<ChildProduct> findByStandardCost(string|array<string> $standard_cost) Return ChildProduct objects filtered by the standard_cost column
 * @method     ChildProduct[]|Collection findByListPrice(string|array<string> $list_price) Return ChildProduct objects filtered by the list_price column
 * @psalm-method Collection&\Traversable<ChildProduct> findByListPrice(string|array<string> $list_price) Return ChildProduct objects filtered by the list_price column
 * @method     ChildProduct[]|Collection findByReorderLevel(int|array<int> $reorder_level) Return ChildProduct objects filtered by the reorder_level column
 * @psalm-method Collection&\Traversable<ChildProduct> findByReorderLevel(int|array<int> $reorder_level) Return ChildProduct objects filtered by the reorder_level column
 * @method     ChildProduct[]|Collection findByTargetLevel(int|array<int> $target_level) Return ChildProduct objects filtered by the target_level column
 * @psalm-method Collection&\Traversable<ChildProduct> findByTargetLevel(int|array<int> $target_level) Return ChildProduct objects filtered by the target_level column
 * @method     ChildProduct[]|Collection findByQuantityPerUnit(string|array<string> $quantity_per_unit) Return ChildProduct objects filtered by the quantity_per_unit column
 * @psalm-method Collection&\Traversable<ChildProduct> findByQuantityPerUnit(string|array<string> $quantity_per_unit) Return ChildProduct objects filtered by the quantity_per_unit column
 * @method     ChildProduct[]|Collection findByDiscontinued(int|array<int> $discontinued) Return ChildProduct objects filtered by the discontinued column
 * @psalm-method Collection&\Traversable<ChildProduct> findByDiscontinued(int|array<int> $discontinued) Return ChildProduct objects filtered by the discontinued column
 * @method     ChildProduct[]|Collection findByMinimumReorderQuantity(int|array<int> $minimum_reorder_quantity) Return ChildProduct objects filtered by the minimum_reorder_quantity column
 * @psalm-method Collection&\Traversable<ChildProduct> findByMinimumReorderQuantity(int|array<int> $minimum_reorder_quantity) Return ChildProduct objects filtered by the minimum_reorder_quantity column
 * @method     ChildProduct[]|Collection findByCategory(string|array<string> $category) Return ChildProduct objects filtered by the category column
 * @psalm-method Collection&\Traversable<ChildProduct> findByCategory(string|array<string> $category) Return ChildProduct objects filtered by the category column
 * @method     ChildProduct[]|Collection findByAttachments(string|array<string> $attachments) Return ChildProduct objects filtered by the attachments column
 * @psalm-method Collection&\Traversable<ChildProduct> findByAttachments(string|array<string> $attachments) Return ChildProduct objects filtered by the attachments column
 *
 * @method     ChildProduct[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildProduct> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class ProductQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\ProductQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\Product', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildProductQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildProductQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildProductQuery) {
			return $criteria;
		}
		$query = new ChildProductQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(ProductTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(ProductTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			ProductTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			ProductTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the product table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(ProductTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ProductTableMap::clearInstancePool();
			ProductTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the attachments column
	 *
	 * @param mixed $attachments The value to use as filter
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByAttachments($attachments = null, ?string $comparison = null)
	{

		$this->addUsingAlias(ProductTableMap::COL_ATTACHMENTS, $attachments, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the category column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCategory('fooValue');   // WHERE category = 'fooValue'
	 * $query->filterByCategory('%fooValue%', Criteria::LIKE); // WHERE category LIKE '%fooValue%'
	 * $query->filterByCategory(['foo', 'bar']); // WHERE category IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $category The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByCategory($category = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($category)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductTableMap::COL_CATEGORY, $category, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the description column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
	 * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
	 * $query->filterByDescription(['foo', 'bar']); // WHERE description IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $description The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDescription($description = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($description)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductTableMap::COL_DESCRIPTION, $description, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the discontinued column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByDiscontinued(1234); // WHERE discontinued = 1234
	 * $query->filterByDiscontinued(array(12, 34)); // WHERE discontinued IN (12, 34)
	 * $query->filterByDiscontinued(array('min' => 12)); // WHERE discontinued > 12
	 * </code>
	 *
	 * @param mixed $discontinued The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByDiscontinued($discontinued = null, ?string $comparison = null)
	{
		if (\is_array($discontinued)) {
			$useMinMax = false;

			if (isset($discontinued['min'])) {
				$this->addUsingAlias(ProductTableMap::COL_DISCONTINUED, $discontinued['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($discontinued['max'])) {
				$this->addUsingAlias(ProductTableMap::COL_DISCONTINUED, $discontinued['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductTableMap::COL_DISCONTINUED, $discontinued, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the list_price column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByListPrice(1234); // WHERE list_price = 1234
	 * $query->filterByListPrice(array(12, 34)); // WHERE list_price IN (12, 34)
	 * $query->filterByListPrice(array('min' => 12)); // WHERE list_price > 12
	 * </code>
	 *
	 * @param mixed $listPrice The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByListPrice($listPrice = null, ?string $comparison = null)
	{
		if (\is_array($listPrice)) {
			$useMinMax = false;

			if (isset($listPrice['min'])) {
				$this->addUsingAlias(ProductTableMap::COL_LIST_PRICE, $listPrice['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($listPrice['max'])) {
				$this->addUsingAlias(ProductTableMap::COL_LIST_PRICE, $listPrice['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductTableMap::COL_LIST_PRICE, $listPrice, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the minimum_reorder_quantity column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMinimumReorderQuantity(1234); // WHERE minimum_reorder_quantity = 1234
	 * $query->filterByMinimumReorderQuantity(array(12, 34)); // WHERE minimum_reorder_quantity IN (12, 34)
	 * $query->filterByMinimumReorderQuantity(array('min' => 12)); // WHERE minimum_reorder_quantity > 12
	 * </code>
	 *
	 * @param mixed $minimumReorderQuantity The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByMinimumReorderQuantity($minimumReorderQuantity = null, ?string $comparison = null)
	{
		if (\is_array($minimumReorderQuantity)) {
			$useMinMax = false;

			if (isset($minimumReorderQuantity['min'])) {
				$this->addUsingAlias(ProductTableMap::COL_MINIMUM_REORDER_QUANTITY, $minimumReorderQuantity['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($minimumReorderQuantity['max'])) {
				$this->addUsingAlias(ProductTableMap::COL_MINIMUM_REORDER_QUANTITY, $minimumReorderQuantity['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductTableMap::COL_MINIMUM_REORDER_QUANTITY, $minimumReorderQuantity, $comparison);

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

		$this->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $keys, Criteria::IN);

		return $this;
	}

	/**
	 * Filter the query on the product_code column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProductCode('fooValue');   // WHERE product_code = 'fooValue'
	 * $query->filterByProductCode('%fooValue%', Criteria::LIKE); // WHERE product_code LIKE '%fooValue%'
	 * $query->filterByProductCode(['foo', 'bar']); // WHERE product_code IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $productCode The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByProductCode($productCode = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($productCode)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductTableMap::COL_PRODUCT_CODE, $productCode, $comparison);

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
				$this->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $productId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($productId['max'])) {
				$this->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $productId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $productId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the product_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByProductName('fooValue');   // WHERE product_name = 'fooValue'
	 * $query->filterByProductName('%fooValue%', Criteria::LIKE); // WHERE product_name LIKE '%fooValue%'
	 * $query->filterByProductName(['foo', 'bar']); // WHERE product_name IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $productName The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByProductName($productName = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($productName)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductTableMap::COL_PRODUCT_NAME, $productName, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the quantity_per_unit column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByQuantityPerUnit('fooValue');   // WHERE quantity_per_unit = 'fooValue'
	 * $query->filterByQuantityPerUnit('%fooValue%', Criteria::LIKE); // WHERE quantity_per_unit LIKE '%fooValue%'
	 * $query->filterByQuantityPerUnit(['foo', 'bar']); // WHERE quantity_per_unit IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $quantityPerUnit The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByQuantityPerUnit($quantityPerUnit = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($quantityPerUnit)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductTableMap::COL_QUANTITY_PER_UNIT, $quantityPerUnit, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the reorder_level column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByReorderLevel(1234); // WHERE reorder_level = 1234
	 * $query->filterByReorderLevel(array(12, 34)); // WHERE reorder_level IN (12, 34)
	 * $query->filterByReorderLevel(array('min' => 12)); // WHERE reorder_level > 12
	 * </code>
	 *
	 * @param mixed $reorderLevel The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByReorderLevel($reorderLevel = null, ?string $comparison = null)
	{
		if (\is_array($reorderLevel)) {
			$useMinMax = false;

			if (isset($reorderLevel['min'])) {
				$this->addUsingAlias(ProductTableMap::COL_REORDER_LEVEL, $reorderLevel['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($reorderLevel['max'])) {
				$this->addUsingAlias(ProductTableMap::COL_REORDER_LEVEL, $reorderLevel['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductTableMap::COL_REORDER_LEVEL, $reorderLevel, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the standard_cost column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStandardCost(1234); // WHERE standard_cost = 1234
	 * $query->filterByStandardCost(array(12, 34)); // WHERE standard_cost IN (12, 34)
	 * $query->filterByStandardCost(array('min' => 12)); // WHERE standard_cost > 12
	 * </code>
	 *
	 * @param mixed $standardCost The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByStandardCost($standardCost = null, ?string $comparison = null)
	{
		if (\is_array($standardCost)) {
			$useMinMax = false;

			if (isset($standardCost['min'])) {
				$this->addUsingAlias(ProductTableMap::COL_STANDARD_COST, $standardCost['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($standardCost['max'])) {
				$this->addUsingAlias(ProductTableMap::COL_STANDARD_COST, $standardCost['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductTableMap::COL_STANDARD_COST, $standardCost, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the target_level column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByTargetLevel(1234); // WHERE target_level = 1234
	 * $query->filterByTargetLevel(array(12, 34)); // WHERE target_level IN (12, 34)
	 * $query->filterByTargetLevel(array('min' => 12)); // WHERE target_level > 12
	 * </code>
	 *
	 * @param mixed $targetLevel The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByTargetLevel($targetLevel = null, ?string $comparison = null)
	{
		if (\is_array($targetLevel)) {
			$useMinMax = false;

			if (isset($targetLevel['min'])) {
				$this->addUsingAlias(ProductTableMap::COL_TARGET_LEVEL, $targetLevel['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($targetLevel['max'])) {
				$this->addUsingAlias(ProductTableMap::COL_TARGET_LEVEL, $targetLevel['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ProductTableMap::COL_TARGET_LEVEL, $targetLevel, $comparison);

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
	 * @return ChildProduct|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(ProductTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = ProductTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildProduct $product Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($product = null)
	{
		if ($product) {
			$this->addUsingAlias(ProductTableMap::COL_PRODUCT_ID, $product->getProductId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildProduct|array|mixed the result, formatted by the current formatter
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
	 * @return ChildProduct A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT product_id, product_code, product_name, description, standard_cost, list_price, reorder_level, target_level, quantity_per_unit, discontinued, minimum_reorder_quantity, category, attachments FROM product WHERE product_id = :p0';

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
			/** @var ChildProduct $obj */
			$obj = new ChildProduct();
			$obj->hydrate($row);
			ProductTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
