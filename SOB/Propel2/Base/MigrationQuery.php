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
use SOB\Propel2\Map\MigrationTableMap;
use SOB\Propel2\Migration as ChildMigration;
use SOB\Propel2\MigrationQuery as ChildMigrationQuery;

/**
 * Base class that represents a query for the `migration` table.
 *
 * @method     ChildMigrationQuery orderByMigrationid($order = Criteria::ASC) Order by the migrationId column
 * @method     ChildMigrationQuery orderByRan($order = Criteria::ASC) Order by the ran column
 *
 * @method     ChildMigrationQuery groupByMigrationid() Group by the migrationId column
 * @method     ChildMigrationQuery groupByRan() Group by the ran column
 *
 * @method     ChildMigrationQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildMigrationQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildMigrationQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildMigrationQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildMigrationQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildMigrationQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildMigration|null findOne(?ConnectionInterface $con = null) Return the first ChildMigration matching the query
 * @method     ChildMigration findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildMigration matching the query, or a new ChildMigration object populated from the query conditions when no match is found
 *
 * @method     ChildMigration|null findOneByMigrationid(int $migrationId) Return the first ChildMigration filtered by the migrationId column
 * @method     ChildMigration|null findOneByRan(string $ran) Return the first ChildMigration filtered by the ran column
 *
 * @method     ChildMigration requirePk($key, ?ConnectionInterface $con = null) Return the ChildMigration by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMigration requireOne(?ConnectionInterface $con = null) Return the first ChildMigration matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMigration requireOneByMigrationid(int $migrationId) Return the first ChildMigration filtered by the migrationId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildMigration requireOneByRan(string $ran) Return the first ChildMigration filtered by the ran column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildMigration[]|Collection find(?ConnectionInterface $con = null) Return ChildMigration objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildMigration> find(?ConnectionInterface $con = null) Return ChildMigration objects based on current ModelCriteria
 *
 * @method     ChildMigration[]|Collection findByMigrationid(int|array<int> $migrationId) Return ChildMigration objects filtered by the migrationId column
 * @psalm-method Collection&\Traversable<ChildMigration> findByMigrationid(int|array<int> $migrationId) Return ChildMigration objects filtered by the migrationId column
 * @method     ChildMigration[]|Collection findByRan(string|array<string> $ran) Return ChildMigration objects filtered by the ran column
 * @psalm-method Collection&\Traversable<ChildMigration> findByRan(string|array<string> $ran) Return ChildMigration objects filtered by the ran column
 *
 * @method     ChildMigration[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildMigration> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class MigrationQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\MigrationQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\Migration', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildMigrationQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildMigrationQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildMigrationQuery) {
			return $criteria;
		}
		$query = new ChildMigrationQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(MigrationTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(MigrationTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			MigrationTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			MigrationTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the migration table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(MigrationTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			MigrationTableMap::clearInstancePool();
			MigrationTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the migrationId column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMigrationid(1234); // WHERE migrationId = 1234
	 * $query->filterByMigrationid(array(12, 34)); // WHERE migrationId IN (12, 34)
	 * $query->filterByMigrationid(array('min' => 12)); // WHERE migrationId > 12
	 * </code>
	 *
	 * @param mixed $migrationid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByMigrationid($migrationid = null, ?string $comparison = null)
	{
		if (\is_array($migrationid)) {
			$useMinMax = false;

			if (isset($migrationid['min'])) {
				$this->addUsingAlias(MigrationTableMap::COL_MIGRATIONID, $migrationid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($migrationid['max'])) {
				$this->addUsingAlias(MigrationTableMap::COL_MIGRATIONID, $migrationid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(MigrationTableMap::COL_MIGRATIONID, $migrationid, $comparison);

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

		$this->addUsingAlias(MigrationTableMap::COL_MIGRATIONID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(MigrationTableMap::COL_MIGRATIONID, $keys, Criteria::IN);

		return $this;
	}

	/**
	 * Filter the query on the ran column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByRan('2011-03-14'); // WHERE ran = '2011-03-14'
	 * $query->filterByRan('now'); // WHERE ran = '2011-03-14'
	 * $query->filterByRan(array('max' => 'yesterday')); // WHERE ran > '2011-03-13'
	 * </code>
	 *
	 * @param mixed $ran The value to use as filter.
	 *              Values can be integers (unix timestamps), DateTime objects, or strings.
	 *              Empty strings are treated as NULL.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByRan($ran = null, ?string $comparison = null)
	{
		if (\is_array($ran)) {
			$useMinMax = false;

			if (isset($ran['min'])) {
				$this->addUsingAlias(MigrationTableMap::COL_RAN, $ran['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($ran['max'])) {
				$this->addUsingAlias(MigrationTableMap::COL_RAN, $ran['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(MigrationTableMap::COL_RAN, $ran, $comparison);

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
	 * @return ChildMigration|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(MigrationTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = MigrationTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildMigration $migration Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($migration = null)
	{
		if ($migration) {
			$this->addUsingAlias(MigrationTableMap::COL_MIGRATIONID, $migration->getMigrationid(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildMigration|array|mixed the result, formatted by the current formatter
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
	 * @return ChildMigration A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT migrationId, ran FROM migration WHERE migrationId = :p0';

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
			/** @var ChildMigration $obj */
			$obj = new ChildMigration();
			$obj->hydrate($row);
			MigrationTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
