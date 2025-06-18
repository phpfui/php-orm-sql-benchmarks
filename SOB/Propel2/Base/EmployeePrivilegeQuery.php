<?php

namespace SOB\Propel2\Base;

use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Propel;
use SOB\Propel2\EmployeePrivilege as ChildEmployeePrivilege;
use SOB\Propel2\EmployeePrivilegeQuery as ChildEmployeePrivilegeQuery;
use SOB\Propel2\Map\EmployeePrivilegeTableMap;

/**
 * Base class that represents a query for the `employee_privilege` table.
 *
 * @method     ChildEmployeePrivilegeQuery orderByEmployeeId($order = Criteria::ASC) Order by the employee_id column
 * @method     ChildEmployeePrivilegeQuery orderByPrivilegeId($order = Criteria::ASC) Order by the privilege_id column
 *
 * @method     ChildEmployeePrivilegeQuery groupByEmployeeId() Group by the employee_id column
 * @method     ChildEmployeePrivilegeQuery groupByPrivilegeId() Group by the privilege_id column
 *
 * @method     ChildEmployeePrivilegeQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildEmployeePrivilegeQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildEmployeePrivilegeQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildEmployeePrivilegeQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildEmployeePrivilegeQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildEmployeePrivilegeQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildEmployeePrivilege|null findOne(?ConnectionInterface $con = null) Return the first ChildEmployeePrivilege matching the query
 * @method     ChildEmployeePrivilege findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildEmployeePrivilege matching the query, or a new ChildEmployeePrivilege object populated from the query conditions when no match is found
 *
 * @method     ChildEmployeePrivilege|null findOneByEmployeeId(int $employee_id) Return the first ChildEmployeePrivilege filtered by the employee_id column
 * @method     ChildEmployeePrivilege|null findOneByPrivilegeId(int $privilege_id) Return the first ChildEmployeePrivilege filtered by the privilege_id column
 *
 * @method     ChildEmployeePrivilege requirePk($key, ?ConnectionInterface $con = null) Return the ChildEmployeePrivilege by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployeePrivilege requireOne(?ConnectionInterface $con = null) Return the first ChildEmployeePrivilege matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEmployeePrivilege requireOneByEmployeeId(int $employee_id) Return the first ChildEmployeePrivilege filtered by the employee_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildEmployeePrivilege requireOneByPrivilegeId(int $privilege_id) Return the first ChildEmployeePrivilege filtered by the privilege_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildEmployeePrivilege[]|Collection find(?ConnectionInterface $con = null) Return ChildEmployeePrivilege objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildEmployeePrivilege> find(?ConnectionInterface $con = null) Return ChildEmployeePrivilege objects based on current ModelCriteria
 *
 * @method     ChildEmployeePrivilege[]|Collection findByEmployeeId(int|array<int> $employee_id) Return ChildEmployeePrivilege objects filtered by the employee_id column
 * @psalm-method Collection&\Traversable<ChildEmployeePrivilege> findByEmployeeId(int|array<int> $employee_id) Return ChildEmployeePrivilege objects filtered by the employee_id column
 * @method     ChildEmployeePrivilege[]|Collection findByPrivilegeId(int|array<int> $privilege_id) Return ChildEmployeePrivilege objects filtered by the privilege_id column
 * @psalm-method Collection&\Traversable<ChildEmployeePrivilege> findByPrivilegeId(int|array<int> $privilege_id) Return ChildEmployeePrivilege objects filtered by the privilege_id column
 *
 * @method     ChildEmployeePrivilege[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildEmployeePrivilege> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class EmployeePrivilegeQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\EmployeePrivilegeQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\EmployeePrivilege', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildEmployeePrivilegeQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildEmployeePrivilegeQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildEmployeePrivilegeQuery) {
			return $criteria;
		}
		$query = new ChildEmployeePrivilegeQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(EmployeePrivilegeTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(EmployeePrivilegeTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(static function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			EmployeePrivilegeTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			EmployeePrivilegeTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the employee_privilege table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(EmployeePrivilegeTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			EmployeePrivilegeTableMap::clearInstancePool();
			EmployeePrivilegeTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
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
				$this->addUsingAlias(EmployeePrivilegeTableMap::COL_EMPLOYEE_ID, $employeeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($employeeId['max'])) {
				$this->addUsingAlias(EmployeePrivilegeTableMap::COL_EMPLOYEE_ID, $employeeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(EmployeePrivilegeTableMap::COL_EMPLOYEE_ID, $employeeId, $comparison);

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
		throw new LogicException('The EmployeePrivilege object has no primary key');
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
		throw new LogicException('The EmployeePrivilege object has no primary key');
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
				$this->addUsingAlias(EmployeePrivilegeTableMap::COL_PRIVILEGE_ID, $privilegeId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($privilegeId['max'])) {
				$this->addUsingAlias(EmployeePrivilegeTableMap::COL_PRIVILEGE_ID, $privilegeId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(EmployeePrivilegeTableMap::COL_PRIVILEGE_ID, $privilegeId, $comparison);

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
	 * @return ChildEmployeePrivilege|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		throw new LogicException('The EmployeePrivilege object has no primary key');
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
		throw new LogicException('The EmployeePrivilege object has no primary key');
	}

	/**
	 * Exclude object from result
	 *
	 * @param ChildEmployeePrivilege $employeePrivilege Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($employeePrivilege = null)
	{
		if ($employeePrivilege) {
			throw new LogicException('EmployeePrivilege object has no primary key');

		}

		return $this;
	}
}
