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
use SOB\Propel2\Image as ChildImage;
use SOB\Propel2\ImageQuery as ChildImageQuery;
use SOB\Propel2\Map\ImageTableMap;

/**
 * Base class that represents a query for the `image` table.
 *
 * @method     ChildImageQuery orderByImageid($order = Criteria::ASC) Order by the imageId column
 * @method     ChildImageQuery orderByImageableid($order = Criteria::ASC) Order by the imageableId column
 * @method     ChildImageQuery orderByImageableType($order = Criteria::ASC) Order by the imageable_type column
 * @method     ChildImageQuery orderByPath($order = Criteria::ASC) Order by the path column
 *
 * @method     ChildImageQuery groupByImageid() Group by the imageId column
 * @method     ChildImageQuery groupByImageableid() Group by the imageableId column
 * @method     ChildImageQuery groupByImageableType() Group by the imageable_type column
 * @method     ChildImageQuery groupByPath() Group by the path column
 *
 * @method     ChildImageQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildImageQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildImageQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildImageQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildImageQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildImageQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildImage|null findOne(?ConnectionInterface $con = null) Return the first ChildImage matching the query
 * @method     ChildImage findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildImage matching the query, or a new ChildImage object populated from the query conditions when no match is found
 *
 * @method     ChildImage|null findOneByImageid(int $imageId) Return the first ChildImage filtered by the imageId column
 * @method     ChildImage|null findOneByImageableid(int $imageableId) Return the first ChildImage filtered by the imageableId column
 * @method     ChildImage|null findOneByImageableType(string $imageable_type) Return the first ChildImage filtered by the imageable_type column
 * @method     ChildImage|null findOneByPath(string $path) Return the first ChildImage filtered by the path column
 *
 * @method     ChildImage requirePk($key, ?ConnectionInterface $con = null) Return the ChildImage by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImage requireOne(?ConnectionInterface $con = null) Return the first ChildImage matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildImage requireOneByImageid(int $imageId) Return the first ChildImage filtered by the imageId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImage requireOneByImageableid(int $imageableId) Return the first ChildImage filtered by the imageableId column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImage requireOneByImageableType(string $imageable_type) Return the first ChildImage filtered by the imageable_type column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildImage requireOneByPath(string $path) Return the first ChildImage filtered by the path column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildImage[]|Collection find(?ConnectionInterface $con = null) Return ChildImage objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildImage> find(?ConnectionInterface $con = null) Return ChildImage objects based on current ModelCriteria
 *
 * @method     ChildImage[]|Collection findByImageid(int|array<int> $imageId) Return ChildImage objects filtered by the imageId column
 * @psalm-method Collection&\Traversable<ChildImage> findByImageid(int|array<int> $imageId) Return ChildImage objects filtered by the imageId column
 * @method     ChildImage[]|Collection findByImageableid(int|array<int> $imageableId) Return ChildImage objects filtered by the imageableId column
 * @psalm-method Collection&\Traversable<ChildImage> findByImageableid(int|array<int> $imageableId) Return ChildImage objects filtered by the imageableId column
 * @method     ChildImage[]|Collection findByImageableType(string|array<string> $imageable_type) Return ChildImage objects filtered by the imageable_type column
 * @psalm-method Collection&\Traversable<ChildImage> findByImageableType(string|array<string> $imageable_type) Return ChildImage objects filtered by the imageable_type column
 * @method     ChildImage[]|Collection findByPath(string|array<string> $path) Return ChildImage objects filtered by the path column
 * @psalm-method Collection&\Traversable<ChildImage> findByPath(string|array<string> $path) Return ChildImage objects filtered by the path column
 *
 * @method     ChildImage[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildImage> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class ImageQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\ImageQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\Image', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildImageQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildImageQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildImageQuery) {
			return $criteria;
		}
		$query = new ChildImageQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(ImageTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(ImageTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			ImageTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			ImageTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the image table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(ImageTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			ImageTableMap::clearInstancePool();
			ImageTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the imageableId column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByImageableid(1234); // WHERE imageableId = 1234
	 * $query->filterByImageableid(array(12, 34)); // WHERE imageableId IN (12, 34)
	 * $query->filterByImageableid(array('min' => 12)); // WHERE imageableId > 12
	 * </code>
	 *
	 * @param mixed $imageableid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByImageableid($imageableid = null, ?string $comparison = null)
	{
		if (\is_array($imageableid)) {
			$useMinMax = false;

			if (isset($imageableid['min'])) {
				$this->addUsingAlias(ImageTableMap::COL_IMAGEABLEID, $imageableid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($imageableid['max'])) {
				$this->addUsingAlias(ImageTableMap::COL_IMAGEABLEID, $imageableid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ImageTableMap::COL_IMAGEABLEID, $imageableid, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the imageable_type column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByImageableType('fooValue');   // WHERE imageable_type = 'fooValue'
	 * $query->filterByImageableType('%fooValue%', Criteria::LIKE); // WHERE imageable_type LIKE '%fooValue%'
	 * $query->filterByImageableType(['foo', 'bar']); // WHERE imageable_type IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $imageableType The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByImageableType($imageableType = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($imageableType)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ImageTableMap::COL_IMAGEABLE_TYPE, $imageableType, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the imageId column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByImageid(1234); // WHERE imageId = 1234
	 * $query->filterByImageid(array(12, 34)); // WHERE imageId IN (12, 34)
	 * $query->filterByImageid(array('min' => 12)); // WHERE imageId > 12
	 * </code>
	 *
	 * @param mixed $imageid The value to use as filter.
	 *              Use scalar values for equality.
	 *              Use array values for in_array() equivalent.
	 *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByImageid($imageid = null, ?string $comparison = null)
	{
		if (\is_array($imageid)) {
			$useMinMax = false;

			if (isset($imageid['min'])) {
				$this->addUsingAlias(ImageTableMap::COL_IMAGEID, $imageid['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($imageid['max'])) {
				$this->addUsingAlias(ImageTableMap::COL_IMAGEID, $imageid['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ImageTableMap::COL_IMAGEID, $imageid, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the path column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByPath('fooValue');   // WHERE path = 'fooValue'
	 * $query->filterByPath('%fooValue%', Criteria::LIKE); // WHERE path LIKE '%fooValue%'
	 * $query->filterByPath(['foo', 'bar']); // WHERE path IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $path The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByPath($path = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($path)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(ImageTableMap::COL_PATH, $path, $comparison);

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

		$this->addUsingAlias(ImageTableMap::COL_IMAGEID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(ImageTableMap::COL_IMAGEID, $keys, Criteria::IN);

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
	 * @return ChildImage|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(ImageTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = ImageTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildImage $image Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($image = null)
	{
		if ($image) {
			$this->addUsingAlias(ImageTableMap::COL_IMAGEID, $image->getImageid(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildImage|array|mixed the result, formatted by the current formatter
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
	 * @return ChildImage A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT imageId, imageableId, imageable_type, path FROM image WHERE imageId = :p0';

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
			/** @var ChildImage $obj */
			$obj = new ChildImage();
			$obj->hydrate($row);
			ImageTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
