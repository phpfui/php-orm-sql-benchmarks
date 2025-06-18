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
use SOB\Propel2\Map\PrivilegeTableMap;
use SOB\Propel2\Privilege as ChildPrivilege;
use SOB\Propel2\PrivilegeQuery as ChildPrivilegeQuery;

/**
 * Base class that represents a query for the `privilege` table.
 *
 * @method     ChildPrivilegeQuery orderByPrivilegeId($order = Criteria::ASC) Order by the privilege_id column
 * @method     ChildPrivilegeQuery orderByPrivilege($order = Criteria::ASC) Order by the privilege column
 *
 * @method     ChildPrivilegeQuery groupByPrivilegeId() Group by the privilege_id column
 * @method     ChildPrivilegeQuery groupByPrivilege() Group by the privilege column
 *
 * @method     ChildPrivilegeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPrivilegeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPrivilegeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPrivilegeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPrivilegeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPrivilegeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPrivilege|null findOne(?ConnectionInterface $con = null) Return the first ChildPrivilege matching the query
 * @method     ChildPrivilege findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildPrivilege matching the query, or a new ChildPrivilege object populated from the query conditions when no match is found
 *
 * @method     ChildPrivilege|null findOneByPrivilegeId(int $privilege_id) Return the first ChildPrivilege filtered by the privilege_id column
 * @method     ChildPrivilege|null findOneByPrivilege(string $privilege) Return the first ChildPrivilege filtered by the privilege column
 *
 * @method     ChildPrivilege requirePk($key, ?ConnectionInterface $con = null) Return the ChildPrivilege by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPrivilege requireOne(?ConnectionInterface $con = null) Return the first ChildPrivilege matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPrivilege requireOneByPrivilegeId(int $privilege_id) Return the first ChildPrivilege filtered by the privilege_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPrivilege requireOneByPrivilege(string $privilege) Return the first ChildPrivilege filtered by the privilege column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPrivilege[]|Collection find(?ConnectionInterface $con = null) Return ChildPrivilege objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildPrivilege> find(?ConnectionInterface $con = null) Return ChildPrivilege objects based on current ModelCriteria
 *
 * @method     ChildPrivilege[]|Collection findByPrivilegeId(int|array<int> $privilege_id) Return ChildPrivilege objects filtered by the privilege_id column
 * @psalm-method Collection&\Traversable<ChildPrivilege> findByPrivilegeId(int|array<int> $privilege_id) Return ChildPrivilege objects filtered by the privilege_id column
 * @method     ChildPrivilege[]|Collection findByPrivilege(string|array<string> $privilege) Return ChildPrivilege objects filtered by the privilege column
 * @psalm-method Collection&\Traversable<ChildPrivilege> findByPrivilege(string|array<string> $privilege) Return ChildPrivilege objects filtered by the privilege column
 *
 * @method     ChildPrivilege[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildPrivilege> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class PrivilegeQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\PrivilegeQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\Privilege', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildPrivilegeQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildPrivilegeQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildPrivilegeQuery) {
			return $criteria;
		}
		$query = new ChildPrivilegeQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(PrivilegeTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(PrivilegeTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(static function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			PrivilegeTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			PrivilegeTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the privilege table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(PrivilegeTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			PrivilegeTableMap::clearInstancePool();
			PrivilegeTableMap::clearRelatedInstancePool();

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

		$this->addUsingAlias(PrivilegeTableMap::COL_PRIVILEGE_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(PrivilegeTableMap::COL_PRIVILEGE_ID, $keys, Criteria::IN);

		return $this;
	}

	/**
	 * Filter the query on the privilege column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPrivilege('fooValue');   // WHERE privilege = 'fooValue'
	 * $query->filterByPrivilege('%fooValue%', Criteria::LIKE); // WHERE privilege LIKE '%fooValue%'
	 * $query->filterByPrivilege(['foo', 'bar']); // WHERE privilege IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $privilege The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPrivilege($privilege = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($privilege)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PrivilegeTableMap::COL_PRIVILEGE, $privilege, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the privilege_id column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPrivilegeId(1234); // WHERE privilege_id = 1234
	 * $query->filterByPrivilegeId(array(12, 34)); // WHERE privilege_id IN (12, 34)
	 * $query->filterByPrivilegeId(array('min' => 12)); // WHERE privilege_id > 12
	 * </code>
	 *
	 * @param mixed $privilegeId The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPrivilegeId($privilegeId = null, ?string $comparison = null)
	{
		if (\is_array($privilegeId)) {
			$useMinMax = false;

			if (isset($privilegeId['min'])) {
				$this->addUsingAlias(PrivilegeTableMap::COL_PRIVILEGE_ID, $privilegeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($privilegeId['max'])) {
				$this->addUsingAlias(PrivilegeTableMap::COL_PRIVILEGE_ID, $privilegeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(PrivilegeTableMap::COL_PRIVILEGE_ID, $privilegeId, $comparison);

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
	 * @return ChildPrivilege|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(PrivilegeTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = PrivilegeTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildPrivilege $privilege Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($privilege = null)
	{
		if ($privilege) {
			$this->addUsingAlias(PrivilegeTableMap::COL_PRIVILEGE_ID, $privilege->getPrivilegeId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildPrivilege|array|mixed the result, formatted by the current formatter
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
	 * @return ChildPrivilege A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT privilege_id, privilege FROM privilege WHERE privilege_id = :p0';

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
			/** @var ChildPrivilege $obj */
			$obj = new ChildPrivilege();
			$obj->hydrate($row);
			PrivilegeTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
