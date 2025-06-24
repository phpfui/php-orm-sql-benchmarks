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
use SOB\Propel2\InventoryTransactionType as ChildInventoryTransactionType;
use SOB\Propel2\InventoryTransactionTypeQuery as ChildInventoryTransactionTypeQuery;
use SOB\Propel2\Map\InventoryTransactionTypeTableMap;

/**
 * Base class that represents a query for the `inventory_transaction_type` table.
 *
 * @method     ChildInventoryTransactionTypeQuery orderByInventoryTransactionTypeId($order = Criteria::ASC) Order by the inventory_transaction_type_id column
 * @method     ChildInventoryTransactionTypeQuery orderByInventoryTransactionTypeName($order = Criteria::ASC) Order by the inventory_transaction_type_name column
 *
 * @method     ChildInventoryTransactionTypeQuery groupByInventoryTransactionTypeId() Group by the inventory_transaction_type_id column
 * @method     ChildInventoryTransactionTypeQuery groupByInventoryTransactionTypeName() Group by the inventory_transaction_type_name column
 *
 * @method     ChildInventoryTransactionTypeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildInventoryTransactionTypeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildInventoryTransactionTypeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildInventoryTransactionTypeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildInventoryTransactionTypeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildInventoryTransactionTypeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildInventoryTransactionType|null findOne(?ConnectionInterface $con = null) Return the first ChildInventoryTransactionType matching the query
 * @method     ChildInventoryTransactionType findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildInventoryTransactionType matching the query, or a new ChildInventoryTransactionType object populated from the query conditions when no match is found
 *
 * @method     ChildInventoryTransactionType|null findOneByInventoryTransactionTypeId(int $inventory_transaction_type_id) Return the first ChildInventoryTransactionType filtered by the inventory_transaction_type_id column
 * @method     ChildInventoryTransactionType|null findOneByInventoryTransactionTypeName(string $inventory_transaction_type_name) Return the first ChildInventoryTransactionType filtered by the inventory_transaction_type_name column
 *
 * @method     ChildInventoryTransactionType requirePk($key, ?ConnectionInterface $con = null) Return the ChildInventoryTransactionType by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInventoryTransactionType requireOne(?ConnectionInterface $con = null) Return the first ChildInventoryTransactionType matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInventoryTransactionType requireOneByInventoryTransactionTypeId(int $inventory_transaction_type_id) Return the first ChildInventoryTransactionType filtered by the inventory_transaction_type_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildInventoryTransactionType requireOneByInventoryTransactionTypeName(string $inventory_transaction_type_name) Return the first ChildInventoryTransactionType filtered by the inventory_transaction_type_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildInventoryTransactionType[]|Collection find(?ConnectionInterface $con = null) Return ChildInventoryTransactionType objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildInventoryTransactionType> find(?ConnectionInterface $con = null) Return ChildInventoryTransactionType objects based on current ModelCriteria
 *
 * @method     ChildInventoryTransactionType[]|Collection findByInventoryTransactionTypeId(int|array<int> $inventory_transaction_type_id) Return ChildInventoryTransactionType objects filtered by the inventory_transaction_type_id column
 * @psalm-method Collection&\Traversable<ChildInventoryTransactionType> findByInventoryTransactionTypeId(int|array<int> $inventory_transaction_type_id) Return ChildInventoryTransactionType objects filtered by the inventory_transaction_type_id column
 * @method     ChildInventoryTransactionType[]|Collection findByInventoryTransactionTypeName(string|array<string> $inventory_transaction_type_name) Return ChildInventoryTransactionType objects filtered by the inventory_transaction_type_name column
 * @psalm-method Collection&\Traversable<ChildInventoryTransactionType> findByInventoryTransactionTypeName(string|array<string> $inventory_transaction_type_name) Return ChildInventoryTransactionType objects filtered by the inventory_transaction_type_name column
 *
 * @method     ChildInventoryTransactionType[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildInventoryTransactionType> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class InventoryTransactionTypeQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\InventoryTransactionTypeQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\InventoryTransactionType', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildInventoryTransactionTypeQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildInventoryTransactionTypeQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildInventoryTransactionTypeQuery) {
			return $criteria;
		}
		$query = new ChildInventoryTransactionTypeQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(InventoryTransactionTypeTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(InventoryTransactionTypeTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			InventoryTransactionTypeTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			InventoryTransactionTypeTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the inventory_transaction_type table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(InventoryTransactionTypeTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			InventoryTransactionTypeTableMap::clearInstancePool();
			InventoryTransactionTypeTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
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
				$this->addUsingAlias(InventoryTransactionTypeTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID, $inventoryTransactionTypeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($inventoryTransactionTypeId['max'])) {
				$this->addUsingAlias(InventoryTransactionTypeTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID, $inventoryTransactionTypeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InventoryTransactionTypeTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID, $inventoryTransactionTypeId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the inventory_transaction_type_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByInventoryTransactionTypeName('fooValue');   // WHERE inventory_transaction_type_name = 'fooValue'
	 * $query->filterByInventoryTransactionTypeName('%fooValue%', Criteria::LIKE); // WHERE inventory_transaction_type_name LIKE '%fooValue%'
	 * $query->filterByInventoryTransactionTypeName(['foo', 'bar']); // WHERE inventory_transaction_type_name IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $inventoryTransactionTypeName The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByInventoryTransactionTypeName($inventoryTransactionTypeName = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($inventoryTransactionTypeName)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(InventoryTransactionTypeTableMap::COL_INVENTORY_TRANSACTION_TYPE_NAME, $inventoryTransactionTypeName, $comparison);

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

		$this->addUsingAlias(InventoryTransactionTypeTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(InventoryTransactionTypeTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID, $keys, Criteria::IN);

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
	 * @return ChildInventoryTransactionType|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(InventoryTransactionTypeTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = InventoryTransactionTypeTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildInventoryTransactionType $inventoryTransactionType Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($inventoryTransactionType = null)
	{
		if ($inventoryTransactionType) {
			$this->addUsingAlias(InventoryTransactionTypeTableMap::COL_INVENTORY_TRANSACTION_TYPE_ID, $inventoryTransactionType->getInventoryTransactionTypeId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildInventoryTransactionType|array|mixed the result, formatted by the current formatter
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
	 * @return ChildInventoryTransactionType A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT inventory_transaction_type_id, inventory_transaction_type_name FROM inventory_transaction_type WHERE inventory_transaction_type_id = :p0';

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
			/** @var ChildInventoryTransactionType $obj */
			$obj = new ChildInventoryTransactionType();
			$obj->hydrate($row);
			InventoryTransactionTypeTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
