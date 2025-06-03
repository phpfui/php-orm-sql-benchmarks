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
use SOB\Propel2\Map\SupplierTableMap;
use SOB\Propel2\Supplier as ChildSupplier;
use SOB\Propel2\SupplierQuery as ChildSupplierQuery;

/**
 * Base class that represents a query for the `supplier` table.
 *
 * @method     ChildSupplierQuery orderBySupplierId($order = Criteria::ASC) Order by the supplier_id column
 * @method     ChildSupplierQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method     ChildSupplierQuery orderByLastName($order = Criteria::ASC) Order by the last_name column
 * @method     ChildSupplierQuery orderByFirstName($order = Criteria::ASC) Order by the first_name column
 * @method     ChildSupplierQuery orderByEmailAddress($order = Criteria::ASC) Order by the email_address column
 * @method     ChildSupplierQuery orderByJobTitle($order = Criteria::ASC) Order by the job_title column
 * @method     ChildSupplierQuery orderByBusinessPhone($order = Criteria::ASC) Order by the business_phone column
 * @method     ChildSupplierQuery orderByHomePhone($order = Criteria::ASC) Order by the home_phone column
 * @method     ChildSupplierQuery orderByMobilePhone($order = Criteria::ASC) Order by the mobile_phone column
 * @method     ChildSupplierQuery orderByFaxNumber($order = Criteria::ASC) Order by the fax_number column
 * @method     ChildSupplierQuery orderByAddress($order = Criteria::ASC) Order by the address column
 * @method     ChildSupplierQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildSupplierQuery orderByStateProvince($order = Criteria::ASC) Order by the state_province column
 * @method     ChildSupplierQuery orderByZipPostalCode($order = Criteria::ASC) Order by the zip_postal_code column
 * @method     ChildSupplierQuery orderByCountryRegion($order = Criteria::ASC) Order by the country_region column
 * @method     ChildSupplierQuery orderByWebPage($order = Criteria::ASC) Order by the web_page column
 * @method     ChildSupplierQuery orderByNotes($order = Criteria::ASC) Order by the notes column
 * @method     ChildSupplierQuery orderByAttachments($order = Criteria::ASC) Order by the attachments column
 *
 * @method     ChildSupplierQuery groupBySupplierId() Group by the supplier_id column
 * @method     ChildSupplierQuery groupByCompany() Group by the company column
 * @method     ChildSupplierQuery groupByLastName() Group by the last_name column
 * @method     ChildSupplierQuery groupByFirstName() Group by the first_name column
 * @method     ChildSupplierQuery groupByEmailAddress() Group by the email_address column
 * @method     ChildSupplierQuery groupByJobTitle() Group by the job_title column
 * @method     ChildSupplierQuery groupByBusinessPhone() Group by the business_phone column
 * @method     ChildSupplierQuery groupByHomePhone() Group by the home_phone column
 * @method     ChildSupplierQuery groupByMobilePhone() Group by the mobile_phone column
 * @method     ChildSupplierQuery groupByFaxNumber() Group by the fax_number column
 * @method     ChildSupplierQuery groupByAddress() Group by the address column
 * @method     ChildSupplierQuery groupByCity() Group by the city column
 * @method     ChildSupplierQuery groupByStateProvince() Group by the state_province column
 * @method     ChildSupplierQuery groupByZipPostalCode() Group by the zip_postal_code column
 * @method     ChildSupplierQuery groupByCountryRegion() Group by the country_region column
 * @method     ChildSupplierQuery groupByWebPage() Group by the web_page column
 * @method     ChildSupplierQuery groupByNotes() Group by the notes column
 * @method     ChildSupplierQuery groupByAttachments() Group by the attachments column
 *
 * @method     ChildSupplierQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildSupplierQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildSupplierQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildSupplierQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildSupplierQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildSupplierQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildSupplier|null findOne(?ConnectionInterface $con = null) Return the first ChildSupplier matching the query
 * @method     ChildSupplier findOneOrCreate(?ConnectionInterface $con = null) Return the first ChildSupplier matching the query, or a new ChildSupplier object populated from the query conditions when no match is found
 *
 * @method     ChildSupplier|null findOneBySupplierId(int $supplier_id) Return the first ChildSupplier filtered by the supplier_id column
 * @method     ChildSupplier|null findOneByCompany(string $company) Return the first ChildSupplier filtered by the company column
 * @method     ChildSupplier|null findOneByLastName(string $last_name) Return the first ChildSupplier filtered by the last_name column
 * @method     ChildSupplier|null findOneByFirstName(string $first_name) Return the first ChildSupplier filtered by the first_name column
 * @method     ChildSupplier|null findOneByEmailAddress(string $email_address) Return the first ChildSupplier filtered by the email_address column
 * @method     ChildSupplier|null findOneByJobTitle(string $job_title) Return the first ChildSupplier filtered by the job_title column
 * @method     ChildSupplier|null findOneByBusinessPhone(string $business_phone) Return the first ChildSupplier filtered by the business_phone column
 * @method     ChildSupplier|null findOneByHomePhone(string $home_phone) Return the first ChildSupplier filtered by the home_phone column
 * @method     ChildSupplier|null findOneByMobilePhone(string $mobile_phone) Return the first ChildSupplier filtered by the mobile_phone column
 * @method     ChildSupplier|null findOneByFaxNumber(string $fax_number) Return the first ChildSupplier filtered by the fax_number column
 * @method     ChildSupplier|null findOneByAddress(string $address) Return the first ChildSupplier filtered by the address column
 * @method     ChildSupplier|null findOneByCity(string $city) Return the first ChildSupplier filtered by the city column
 * @method     ChildSupplier|null findOneByStateProvince(string $state_province) Return the first ChildSupplier filtered by the state_province column
 * @method     ChildSupplier|null findOneByZipPostalCode(string $zip_postal_code) Return the first ChildSupplier filtered by the zip_postal_code column
 * @method     ChildSupplier|null findOneByCountryRegion(string $country_region) Return the first ChildSupplier filtered by the country_region column
 * @method     ChildSupplier|null findOneByWebPage(string $web_page) Return the first ChildSupplier filtered by the web_page column
 * @method     ChildSupplier|null findOneByNotes(string $notes) Return the first ChildSupplier filtered by the notes column
 * @method     ChildSupplier|null findOneByAttachments(string $attachments) Return the first ChildSupplier filtered by the attachments column
 *
 * @method     ChildSupplier requirePk($key, ?ConnectionInterface $con = null) Return the ChildSupplier by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOne(?ConnectionInterface $con = null) Return the first ChildSupplier matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSupplier requireOneBySupplierId(int $supplier_id) Return the first ChildSupplier filtered by the supplier_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByCompany(string $company) Return the first ChildSupplier filtered by the company column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByLastName(string $last_name) Return the first ChildSupplier filtered by the last_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByFirstName(string $first_name) Return the first ChildSupplier filtered by the first_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByEmailAddress(string $email_address) Return the first ChildSupplier filtered by the email_address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByJobTitle(string $job_title) Return the first ChildSupplier filtered by the job_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByBusinessPhone(string $business_phone) Return the first ChildSupplier filtered by the business_phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByHomePhone(string $home_phone) Return the first ChildSupplier filtered by the home_phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByMobilePhone(string $mobile_phone) Return the first ChildSupplier filtered by the mobile_phone column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByFaxNumber(string $fax_number) Return the first ChildSupplier filtered by the fax_number column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByAddress(string $address) Return the first ChildSupplier filtered by the address column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByCity(string $city) Return the first ChildSupplier filtered by the city column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByStateProvince(string $state_province) Return the first ChildSupplier filtered by the state_province column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByZipPostalCode(string $zip_postal_code) Return the first ChildSupplier filtered by the zip_postal_code column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByCountryRegion(string $country_region) Return the first ChildSupplier filtered by the country_region column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByWebPage(string $web_page) Return the first ChildSupplier filtered by the web_page column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByNotes(string $notes) Return the first ChildSupplier filtered by the notes column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildSupplier requireOneByAttachments(string $attachments) Return the first ChildSupplier filtered by the attachments column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildSupplier[]|Collection find(?ConnectionInterface $con = null) Return ChildSupplier objects based on current ModelCriteria
 * @psalm-method Collection&\Traversable<ChildSupplier> find(?ConnectionInterface $con = null) Return ChildSupplier objects based on current ModelCriteria
 *
 * @method     ChildSupplier[]|Collection findBySupplierId(int|array<int> $supplier_id) Return ChildSupplier objects filtered by the supplier_id column
 * @psalm-method Collection&\Traversable<ChildSupplier> findBySupplierId(int|array<int> $supplier_id) Return ChildSupplier objects filtered by the supplier_id column
 * @method     ChildSupplier[]|Collection findByCompany(string|array<string> $company) Return ChildSupplier objects filtered by the company column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByCompany(string|array<string> $company) Return ChildSupplier objects filtered by the company column
 * @method     ChildSupplier[]|Collection findByLastName(string|array<string> $last_name) Return ChildSupplier objects filtered by the last_name column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByLastName(string|array<string> $last_name) Return ChildSupplier objects filtered by the last_name column
 * @method     ChildSupplier[]|Collection findByFirstName(string|array<string> $first_name) Return ChildSupplier objects filtered by the first_name column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByFirstName(string|array<string> $first_name) Return ChildSupplier objects filtered by the first_name column
 * @method     ChildSupplier[]|Collection findByEmailAddress(string|array<string> $email_address) Return ChildSupplier objects filtered by the email_address column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByEmailAddress(string|array<string> $email_address) Return ChildSupplier objects filtered by the email_address column
 * @method     ChildSupplier[]|Collection findByJobTitle(string|array<string> $job_title) Return ChildSupplier objects filtered by the job_title column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByJobTitle(string|array<string> $job_title) Return ChildSupplier objects filtered by the job_title column
 * @method     ChildSupplier[]|Collection findByBusinessPhone(string|array<string> $business_phone) Return ChildSupplier objects filtered by the business_phone column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByBusinessPhone(string|array<string> $business_phone) Return ChildSupplier objects filtered by the business_phone column
 * @method     ChildSupplier[]|Collection findByHomePhone(string|array<string> $home_phone) Return ChildSupplier objects filtered by the home_phone column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByHomePhone(string|array<string> $home_phone) Return ChildSupplier objects filtered by the home_phone column
 * @method     ChildSupplier[]|Collection findByMobilePhone(string|array<string> $mobile_phone) Return ChildSupplier objects filtered by the mobile_phone column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByMobilePhone(string|array<string> $mobile_phone) Return ChildSupplier objects filtered by the mobile_phone column
 * @method     ChildSupplier[]|Collection findByFaxNumber(string|array<string> $fax_number) Return ChildSupplier objects filtered by the fax_number column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByFaxNumber(string|array<string> $fax_number) Return ChildSupplier objects filtered by the fax_number column
 * @method     ChildSupplier[]|Collection findByAddress(string|array<string> $address) Return ChildSupplier objects filtered by the address column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByAddress(string|array<string> $address) Return ChildSupplier objects filtered by the address column
 * @method     ChildSupplier[]|Collection findByCity(string|array<string> $city) Return ChildSupplier objects filtered by the city column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByCity(string|array<string> $city) Return ChildSupplier objects filtered by the city column
 * @method     ChildSupplier[]|Collection findByStateProvince(string|array<string> $state_province) Return ChildSupplier objects filtered by the state_province column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByStateProvince(string|array<string> $state_province) Return ChildSupplier objects filtered by the state_province column
 * @method     ChildSupplier[]|Collection findByZipPostalCode(string|array<string> $zip_postal_code) Return ChildSupplier objects filtered by the zip_postal_code column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByZipPostalCode(string|array<string> $zip_postal_code) Return ChildSupplier objects filtered by the zip_postal_code column
 * @method     ChildSupplier[]|Collection findByCountryRegion(string|array<string> $country_region) Return ChildSupplier objects filtered by the country_region column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByCountryRegion(string|array<string> $country_region) Return ChildSupplier objects filtered by the country_region column
 * @method     ChildSupplier[]|Collection findByWebPage(string|array<string> $web_page) Return ChildSupplier objects filtered by the web_page column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByWebPage(string|array<string> $web_page) Return ChildSupplier objects filtered by the web_page column
 * @method     ChildSupplier[]|Collection findByNotes(string|array<string> $notes) Return ChildSupplier objects filtered by the notes column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByNotes(string|array<string> $notes) Return ChildSupplier objects filtered by the notes column
 * @method     ChildSupplier[]|Collection findByAttachments(string|array<string> $attachments) Return ChildSupplier objects filtered by the attachments column
 * @psalm-method Collection&\Traversable<ChildSupplier> findByAttachments(string|array<string> $attachments) Return ChildSupplier objects filtered by the attachments column
 *
 * @method     ChildSupplier[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 * @psalm-method \Propel\Runtime\Util\PropelModelPager&\Traversable<ChildSupplier> paginate($page = 1, $maxPerPage = 10, ?ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 */
abstract class SupplierQuery extends ModelCriteria
{
	protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

	/**
	 * Initializes internal state of \SOB\Propel2\Base\SupplierQuery object.
	 *
	 * @param string $dbName The database name
	 * @param string $modelName The phpName of a model, e.g. 'Book'
	 * @param string $modelAlias The alias for the model in this query, e.g. 'b'
	 */
	public function __construct($dbName = 'default', $modelName = '\\SOB\\Propel2\\Supplier', $modelAlias = null)
	{
		parent::__construct($dbName, $modelName, $modelAlias);
	}

	/**
	 * Returns a new ChildSupplierQuery object.
	 *
	 * @param string $modelAlias The alias of a model in the query
	 * @param Criteria $criteria Optional Criteria to build the query from
	 *
	 * @return ChildSupplierQuery
	 */
	public static function create(?string $modelAlias = null, ?Criteria $criteria = null) : Criteria
	{
		if ($criteria instanceof ChildSupplierQuery) {
			return $criteria;
		}
		$query = new ChildSupplierQuery();

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
			$con = Propel::getServiceContainer()->getWriteConnection(SupplierTableMap::DATABASE_NAME);
		}

		$criteria = $this;

		// Set the correct dbName
		$criteria->setDbName(SupplierTableMap::DATABASE_NAME);

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(static function() use ($con, $criteria) {
			$affectedRows = 0; // initialize var to track total num of affected rows

			SupplierTableMap::removeInstanceFromPool($criteria);

			$affectedRows += parent::delete($con);
			SupplierTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Deletes all rows from the supplier table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(SupplierTableMap::DATABASE_NAME);
		}

		// use transaction because $criteria could contain info
		// for more than one table or we could emulating ON DELETE CASCADE, etc.
		return $con->transaction(function() use ($con) {
			$affectedRows = 0; // initialize var to track total num of affected rows
			$affectedRows += parent::doDeleteAll($con);
			// Because this db requires some delete cascade/set null emulation, we have to
			// clear the cached instance *after* the emulation has happened (since
			// instances get re-added by the select statement contained therein).
			SupplierTableMap::clearInstancePool();
			SupplierTableMap::clearRelatedInstancePool();

			return $affectedRows;
		});
	}

	/**
	 * Filter the query on the address column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByAddress('fooValue');   // WHERE address = 'fooValue'
	 * $query->filterByAddress('%fooValue%', Criteria::LIKE); // WHERE address LIKE '%fooValue%'
	 * $query->filterByAddress(['foo', 'bar']); // WHERE address IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $address The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByAddress($address = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($address)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_ADDRESS, $address, $comparison);

		return $this;
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

		$this->addUsingAlias(SupplierTableMap::COL_ATTACHMENTS, $attachments, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the business_phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByBusinessPhone('fooValue');   // WHERE business_phone = 'fooValue'
	 * $query->filterByBusinessPhone('%fooValue%', Criteria::LIKE); // WHERE business_phone LIKE '%fooValue%'
	 * $query->filterByBusinessPhone(['foo', 'bar']); // WHERE business_phone IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $businessPhone The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByBusinessPhone($businessPhone = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($businessPhone)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_BUSINESS_PHONE, $businessPhone, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the city column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
	 * $query->filterByCity('%fooValue%', Criteria::LIKE); // WHERE city LIKE '%fooValue%'
	 * $query->filterByCity(['foo', 'bar']); // WHERE city IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $city The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByCity($city = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($city)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_CITY, $city, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the company column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCompany('fooValue');   // WHERE company = 'fooValue'
	 * $query->filterByCompany('%fooValue%', Criteria::LIKE); // WHERE company LIKE '%fooValue%'
	 * $query->filterByCompany(['foo', 'bar']); // WHERE company IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $company The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByCompany($company = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($company)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_COMPANY, $company, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the country_region column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByCountryRegion('fooValue');   // WHERE country_region = 'fooValue'
	 * $query->filterByCountryRegion('%fooValue%', Criteria::LIKE); // WHERE country_region LIKE '%fooValue%'
	 * $query->filterByCountryRegion(['foo', 'bar']); // WHERE country_region IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $countryRegion The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByCountryRegion($countryRegion = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($countryRegion)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_COUNTRY_REGION, $countryRegion, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the email_address column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByEmailAddress('fooValue');   // WHERE email_address = 'fooValue'
	 * $query->filterByEmailAddress('%fooValue%', Criteria::LIKE); // WHERE email_address LIKE '%fooValue%'
	 * $query->filterByEmailAddress(['foo', 'bar']); // WHERE email_address IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $emailAddress The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByEmailAddress($emailAddress = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($emailAddress)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_EMAIL_ADDRESS, $emailAddress, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the fax_number column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFaxNumber('fooValue');   // WHERE fax_number = 'fooValue'
	 * $query->filterByFaxNumber('%fooValue%', Criteria::LIKE); // WHERE fax_number LIKE '%fooValue%'
	 * $query->filterByFaxNumber(['foo', 'bar']); // WHERE fax_number IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $faxNumber The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByFaxNumber($faxNumber = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($faxNumber)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_FAX_NUMBER, $faxNumber, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the first_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByFirstName('fooValue');   // WHERE first_name = 'fooValue'
	 * $query->filterByFirstName('%fooValue%', Criteria::LIKE); // WHERE first_name LIKE '%fooValue%'
	 * $query->filterByFirstName(['foo', 'bar']); // WHERE first_name IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $firstName The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByFirstName($firstName = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($firstName)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_FIRST_NAME, $firstName, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the home_phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByHomePhone('fooValue');   // WHERE home_phone = 'fooValue'
	 * $query->filterByHomePhone('%fooValue%', Criteria::LIKE); // WHERE home_phone LIKE '%fooValue%'
	 * $query->filterByHomePhone(['foo', 'bar']); // WHERE home_phone IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $homePhone The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByHomePhone($homePhone = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($homePhone)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_HOME_PHONE, $homePhone, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the job_title column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByJobTitle('fooValue');   // WHERE job_title = 'fooValue'
	 * $query->filterByJobTitle('%fooValue%', Criteria::LIKE); // WHERE job_title LIKE '%fooValue%'
	 * $query->filterByJobTitle(['foo', 'bar']); // WHERE job_title IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $jobTitle The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByJobTitle($jobTitle = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($jobTitle)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_JOB_TITLE, $jobTitle, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the last_name column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByLastName('fooValue');   // WHERE last_name = 'fooValue'
	 * $query->filterByLastName('%fooValue%', Criteria::LIKE); // WHERE last_name LIKE '%fooValue%'
	 * $query->filterByLastName(['foo', 'bar']); // WHERE last_name IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $lastName The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByLastName($lastName = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($lastName)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_LAST_NAME, $lastName, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the mobile_phone column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByMobilePhone('fooValue');   // WHERE mobile_phone = 'fooValue'
	 * $query->filterByMobilePhone('%fooValue%', Criteria::LIKE); // WHERE mobile_phone LIKE '%fooValue%'
	 * $query->filterByMobilePhone(['foo', 'bar']); // WHERE mobile_phone IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $mobilePhone The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByMobilePhone($mobilePhone = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($mobilePhone)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_MOBILE_PHONE, $mobilePhone, $comparison);

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

		$this->addUsingAlias(SupplierTableMap::COL_NOTES, $notes, $comparison);

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

		$this->addUsingAlias(SupplierTableMap::COL_SUPPLIER_ID, $key, Criteria::EQUAL);

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

		$this->addUsingAlias(SupplierTableMap::COL_SUPPLIER_ID, $keys, Criteria::IN);

		return $this;
	}

	/**
	 * Filter the query on the state_province column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByStateProvince('fooValue');   // WHERE state_province = 'fooValue'
	 * $query->filterByStateProvince('%fooValue%', Criteria::LIKE); // WHERE state_province LIKE '%fooValue%'
	 * $query->filterByStateProvince(['foo', 'bar']); // WHERE state_province IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $stateProvince The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByStateProvince($stateProvince = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($stateProvince)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_STATE_PROVINCE, $stateProvince, $comparison);

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
				$this->addUsingAlias(SupplierTableMap::COL_SUPPLIER_ID, $supplierId['min'], Criteria::GREATER_EQUAL);
				$useMinMax = true;
			}

			if (isset($supplierId['max'])) {
				$this->addUsingAlias(SupplierTableMap::COL_SUPPLIER_ID, $supplierId['max'], Criteria::LESS_EQUAL);
				$useMinMax = true;
			}

			if ($useMinMax) {
				return $this;
			}

			if (null === $comparison) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_SUPPLIER_ID, $supplierId, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the web_page column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByWebPage('fooValue');   // WHERE web_page = 'fooValue'
	 * $query->filterByWebPage('%fooValue%', Criteria::LIKE); // WHERE web_page LIKE '%fooValue%'
	 * $query->filterByWebPage(['foo', 'bar']); // WHERE web_page IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $webPage The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByWebPage($webPage = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($webPage)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_WEB_PAGE, $webPage, $comparison);

		return $this;
	}

	/**
	 * Filter the query on the zip_postal_code column
	 *
	 * Example usage:
	 * <code>
	 * $query->filterByZipPostalCode('fooValue');   // WHERE zip_postal_code = 'fooValue'
	 * $query->filterByZipPostalCode('%fooValue%', Criteria::LIKE); // WHERE zip_postal_code LIKE '%fooValue%'
	 * $query->filterByZipPostalCode(['foo', 'bar']); // WHERE zip_postal_code IN ('foo', 'bar')
	 * </code>
	 *
	 * @param string|string[] $zipPostalCode The value to use as filter.
	 * @param string|null $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function filterByZipPostalCode($zipPostalCode = null, ?string $comparison = null)
	{
		if (null === $comparison) {
			if (\is_array($zipPostalCode)) {
				$comparison = Criteria::IN;
			}
		}

		$this->addUsingAlias(SupplierTableMap::COL_ZIP_POSTAL_CODE, $zipPostalCode, $comparison);

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
	 * @return ChildSupplier|array|mixed the result, formatted by the current formatter
	 */
	public function findPk($key, ?ConnectionInterface $con = null)
	{
		if (null === $key) {
			return null;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(SupplierTableMap::DATABASE_NAME);
		}

		$this->basePreSelect($con);

		if (
			$this->formatter || $this->modelAlias || $this->with || $this->select
			|| $this->selectColumns || $this->asColumns || $this->selectModifiers
			|| $this->map || $this->having || $this->joins
		) {
			return $this->findPkComplex($key, $con);
		}

		if ((null !== ($obj = SupplierTableMap::getInstanceFromPool(null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key)))) {
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
	 * @param ChildSupplier $supplier Object to remove from the list of results
	 *
	 * @return $this The current query, for fluid interface
	 */
	public function prune($supplier = null)
	{
		if ($supplier) {
			$this->addUsingAlias(SupplierTableMap::COL_SUPPLIER_ID, $supplier->getSupplierId(), Criteria::NOT_EQUAL);
		}

		return $this;
	}

	/**
	 * Find object by primary key.
	 *
	 * @param mixed $key Primary key to use for the query
	 * @param ConnectionInterface $con A connection object
	 *
	 * @return ChildSupplier|array|mixed the result, formatted by the current formatter
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
	 * @return ChildSupplier A model object, or null if the key is not found
	 */
	protected function findPkSimple($key, ConnectionInterface $con)
	{
		$sql = 'SELECT supplier_id, company, last_name, first_name, email_address, job_title, business_phone, home_phone, mobile_phone, fax_number, address, city, state_province, zip_postal_code, country_region, web_page, notes, attachments FROM supplier WHERE supplier_id = :p0';

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
			/** @var ChildSupplier $obj */
			$obj = new ChildSupplier();
			$obj->hydrate($row);
			SupplierTableMap::addInstanceToPool($obj, null === $key || \is_scalar($key) || \is_callable([$key, '__toString']) ? (string)$key : $key);
		}
		$stmt->closeCursor();

		return $obj;
	}
}
