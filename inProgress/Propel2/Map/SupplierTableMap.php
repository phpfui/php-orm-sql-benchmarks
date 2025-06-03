<?php

namespace SOB\Propel2\Map;

use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use Propel\Runtime\Propel;
use SOB\Propel2\Supplier;
use SOB\Propel2\SupplierQuery;

/**
 * This class defines the structure of the 'supplier' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class SupplierTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.Supplier';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.SupplierTableMap';

	/**
	 * the column name for the address field
	 */
	public const COL_ADDRESS = 'supplier.address';

	/**
	 * the column name for the attachments field
	 */
	public const COL_ATTACHMENTS = 'supplier.attachments';

	/**
	 * the column name for the business_phone field
	 */
	public const COL_BUSINESS_PHONE = 'supplier.business_phone';

	/**
	 * the column name for the city field
	 */
	public const COL_CITY = 'supplier.city';

	/**
	 * the column name for the company field
	 */
	public const COL_COMPANY = 'supplier.company';

	/**
	 * the column name for the country_region field
	 */
	public const COL_COUNTRY_REGION = 'supplier.country_region';

	/**
	 * the column name for the email_address field
	 */
	public const COL_EMAIL_ADDRESS = 'supplier.email_address';

	/**
	 * the column name for the fax_number field
	 */
	public const COL_FAX_NUMBER = 'supplier.fax_number';

	/**
	 * the column name for the first_name field
	 */
	public const COL_FIRST_NAME = 'supplier.first_name';

	/**
	 * the column name for the home_phone field
	 */
	public const COL_HOME_PHONE = 'supplier.home_phone';

	/**
	 * the column name for the job_title field
	 */
	public const COL_JOB_TITLE = 'supplier.job_title';

	/**
	 * the column name for the last_name field
	 */
	public const COL_LAST_NAME = 'supplier.last_name';

	/**
	 * the column name for the mobile_phone field
	 */
	public const COL_MOBILE_PHONE = 'supplier.mobile_phone';

	/**
	 * the column name for the notes field
	 */
	public const COL_NOTES = 'supplier.notes';

	/**
	 * the column name for the state_province field
	 */
	public const COL_STATE_PROVINCE = 'supplier.state_province';

	/**
	 * the column name for the supplier_id field
	 */
	public const COL_SUPPLIER_ID = 'supplier.supplier_id';

	/**
	 * the column name for the web_page field
	 */
	public const COL_WEB_PAGE = 'supplier.web_page';

	/**
	 * the column name for the zip_postal_code field
	 */
	public const COL_ZIP_POSTAL_CODE = 'supplier.zip_postal_code';

	/**
	 * The default database name for this class
	 */
	public const DATABASE_NAME = 'default';

	/**
	 * The default string format for model objects of the related table
	 */
	public const DEFAULT_STRING_FORMAT = 'YAML';

	/**
	 * The total number of columns
	 */
	public const NUM_COLUMNS = 18;

	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	public const NUM_HYDRATE_COLUMNS = 18;

	/**
	 * The number of lazy-loaded columns
	 */
	public const NUM_LAZY_LOAD_COLUMNS = 0;

	/**
	 * The related Propel class for this table
	 */
	public const OM_CLASS = '\\SOB\\Propel2\\Supplier';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'supplier';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'Supplier';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['SupplierId' => 0, 'Company' => 1, 'LastName' => 2, 'FirstName' => 3, 'EmailAddress' => 4, 'JobTitle' => 5, 'BusinessPhone' => 6, 'HomePhone' => 7, 'MobilePhone' => 8, 'FaxNumber' => 9, 'Address' => 10, 'City' => 11, 'StateProvince' => 12, 'ZipPostalCode' => 13, 'CountryRegion' => 14, 'WebPage' => 15, 'Notes' => 16, 'Attachments' => 17, ],
		self::TYPE_CAMELNAME => ['supplierId' => 0, 'company' => 1, 'lastName' => 2, 'firstName' => 3, 'emailAddress' => 4, 'jobTitle' => 5, 'businessPhone' => 6, 'homePhone' => 7, 'mobilePhone' => 8, 'faxNumber' => 9, 'address' => 10, 'city' => 11, 'stateProvince' => 12, 'zipPostalCode' => 13, 'countryRegion' => 14, 'webPage' => 15, 'notes' => 16, 'attachments' => 17, ],
		self::TYPE_COLNAME => [SupplierTableMap::COL_SUPPLIER_ID => 0, SupplierTableMap::COL_COMPANY => 1, SupplierTableMap::COL_LAST_NAME => 2, SupplierTableMap::COL_FIRST_NAME => 3, SupplierTableMap::COL_EMAIL_ADDRESS => 4, SupplierTableMap::COL_JOB_TITLE => 5, SupplierTableMap::COL_BUSINESS_PHONE => 6, SupplierTableMap::COL_HOME_PHONE => 7, SupplierTableMap::COL_MOBILE_PHONE => 8, SupplierTableMap::COL_FAX_NUMBER => 9, SupplierTableMap::COL_ADDRESS => 10, SupplierTableMap::COL_CITY => 11, SupplierTableMap::COL_STATE_PROVINCE => 12, SupplierTableMap::COL_ZIP_POSTAL_CODE => 13, SupplierTableMap::COL_COUNTRY_REGION => 14, SupplierTableMap::COL_WEB_PAGE => 15, SupplierTableMap::COL_NOTES => 16, SupplierTableMap::COL_ATTACHMENTS => 17, ],
		self::TYPE_FIELDNAME => ['supplier_id' => 0, 'company' => 1, 'last_name' => 2, 'first_name' => 3, 'email_address' => 4, 'job_title' => 5, 'business_phone' => 6, 'home_phone' => 7, 'mobile_phone' => 8, 'fax_number' => 9, 'address' => 10, 'city' => 11, 'state_province' => 12, 'zip_postal_code' => 13, 'country_region' => 14, 'web_page' => 15, 'notes' => 16, 'attachments' => 17, ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, ]
	];

	/**
	 * holds an array of fieldnames
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldNames = [
		self::TYPE_PHPNAME => ['SupplierId', 'Company', 'LastName', 'FirstName', 'EmailAddress', 'JobTitle', 'BusinessPhone', 'HomePhone', 'MobilePhone', 'FaxNumber', 'Address', 'City', 'StateProvince', 'ZipPostalCode', 'CountryRegion', 'WebPage', 'Notes', 'Attachments', ],
		self::TYPE_CAMELNAME => ['supplierId', 'company', 'lastName', 'firstName', 'emailAddress', 'jobTitle', 'businessPhone', 'homePhone', 'mobilePhone', 'faxNumber', 'address', 'city', 'stateProvince', 'zipPostalCode', 'countryRegion', 'webPage', 'notes', 'attachments', ],
		self::TYPE_COLNAME => [SupplierTableMap::COL_SUPPLIER_ID, SupplierTableMap::COL_COMPANY, SupplierTableMap::COL_LAST_NAME, SupplierTableMap::COL_FIRST_NAME, SupplierTableMap::COL_EMAIL_ADDRESS, SupplierTableMap::COL_JOB_TITLE, SupplierTableMap::COL_BUSINESS_PHONE, SupplierTableMap::COL_HOME_PHONE, SupplierTableMap::COL_MOBILE_PHONE, SupplierTableMap::COL_FAX_NUMBER, SupplierTableMap::COL_ADDRESS, SupplierTableMap::COL_CITY, SupplierTableMap::COL_STATE_PROVINCE, SupplierTableMap::COL_ZIP_POSTAL_CODE, SupplierTableMap::COL_COUNTRY_REGION, SupplierTableMap::COL_WEB_PAGE, SupplierTableMap::COL_NOTES, SupplierTableMap::COL_ATTACHMENTS, ],
		self::TYPE_FIELDNAME => ['supplier_id', 'company', 'last_name', 'first_name', 'email_address', 'job_title', 'business_phone', 'home_phone', 'mobile_phone', 'fax_number', 'address', 'city', 'state_province', 'zip_postal_code', 'country_region', 'web_page', 'notes', 'attachments', ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'SupplierId' => 'SUPPLIER_ID',
		'Supplier.SupplierId' => 'SUPPLIER_ID',
		'supplierId' => 'SUPPLIER_ID',
		'supplier.supplierId' => 'SUPPLIER_ID',
		'SupplierTableMap::COL_SUPPLIER_ID' => 'SUPPLIER_ID',
		'COL_SUPPLIER_ID' => 'SUPPLIER_ID',
		'supplier_id' => 'SUPPLIER_ID',
		'supplier.supplier_id' => 'SUPPLIER_ID',
		'Company' => 'COMPANY',
		'Supplier.Company' => 'COMPANY',
		'company' => 'COMPANY',
		'supplier.company' => 'COMPANY',
		'SupplierTableMap::COL_COMPANY' => 'COMPANY',
		'COL_COMPANY' => 'COMPANY',
		'LastName' => 'LAST_NAME',
		'Supplier.LastName' => 'LAST_NAME',
		'lastName' => 'LAST_NAME',
		'supplier.lastName' => 'LAST_NAME',
		'SupplierTableMap::COL_LAST_NAME' => 'LAST_NAME',
		'COL_LAST_NAME' => 'LAST_NAME',
		'last_name' => 'LAST_NAME',
		'supplier.last_name' => 'LAST_NAME',
		'FirstName' => 'FIRST_NAME',
		'Supplier.FirstName' => 'FIRST_NAME',
		'firstName' => 'FIRST_NAME',
		'supplier.firstName' => 'FIRST_NAME',
		'SupplierTableMap::COL_FIRST_NAME' => 'FIRST_NAME',
		'COL_FIRST_NAME' => 'FIRST_NAME',
		'first_name' => 'FIRST_NAME',
		'supplier.first_name' => 'FIRST_NAME',
		'EmailAddress' => 'EMAIL_ADDRESS',
		'Supplier.EmailAddress' => 'EMAIL_ADDRESS',
		'emailAddress' => 'EMAIL_ADDRESS',
		'supplier.emailAddress' => 'EMAIL_ADDRESS',
		'SupplierTableMap::COL_EMAIL_ADDRESS' => 'EMAIL_ADDRESS',
		'COL_EMAIL_ADDRESS' => 'EMAIL_ADDRESS',
		'email_address' => 'EMAIL_ADDRESS',
		'supplier.email_address' => 'EMAIL_ADDRESS',
		'JobTitle' => 'JOB_TITLE',
		'Supplier.JobTitle' => 'JOB_TITLE',
		'jobTitle' => 'JOB_TITLE',
		'supplier.jobTitle' => 'JOB_TITLE',
		'SupplierTableMap::COL_JOB_TITLE' => 'JOB_TITLE',
		'COL_JOB_TITLE' => 'JOB_TITLE',
		'job_title' => 'JOB_TITLE',
		'supplier.job_title' => 'JOB_TITLE',
		'BusinessPhone' => 'BUSINESS_PHONE',
		'Supplier.BusinessPhone' => 'BUSINESS_PHONE',
		'businessPhone' => 'BUSINESS_PHONE',
		'supplier.businessPhone' => 'BUSINESS_PHONE',
		'SupplierTableMap::COL_BUSINESS_PHONE' => 'BUSINESS_PHONE',
		'COL_BUSINESS_PHONE' => 'BUSINESS_PHONE',
		'business_phone' => 'BUSINESS_PHONE',
		'supplier.business_phone' => 'BUSINESS_PHONE',
		'HomePhone' => 'HOME_PHONE',
		'Supplier.HomePhone' => 'HOME_PHONE',
		'homePhone' => 'HOME_PHONE',
		'supplier.homePhone' => 'HOME_PHONE',
		'SupplierTableMap::COL_HOME_PHONE' => 'HOME_PHONE',
		'COL_HOME_PHONE' => 'HOME_PHONE',
		'home_phone' => 'HOME_PHONE',
		'supplier.home_phone' => 'HOME_PHONE',
		'MobilePhone' => 'MOBILE_PHONE',
		'Supplier.MobilePhone' => 'MOBILE_PHONE',
		'mobilePhone' => 'MOBILE_PHONE',
		'supplier.mobilePhone' => 'MOBILE_PHONE',
		'SupplierTableMap::COL_MOBILE_PHONE' => 'MOBILE_PHONE',
		'COL_MOBILE_PHONE' => 'MOBILE_PHONE',
		'mobile_phone' => 'MOBILE_PHONE',
		'supplier.mobile_phone' => 'MOBILE_PHONE',
		'FaxNumber' => 'FAX_NUMBER',
		'Supplier.FaxNumber' => 'FAX_NUMBER',
		'faxNumber' => 'FAX_NUMBER',
		'supplier.faxNumber' => 'FAX_NUMBER',
		'SupplierTableMap::COL_FAX_NUMBER' => 'FAX_NUMBER',
		'COL_FAX_NUMBER' => 'FAX_NUMBER',
		'fax_number' => 'FAX_NUMBER',
		'supplier.fax_number' => 'FAX_NUMBER',
		'Address' => 'ADDRESS',
		'Supplier.Address' => 'ADDRESS',
		'address' => 'ADDRESS',
		'supplier.address' => 'ADDRESS',
		'SupplierTableMap::COL_ADDRESS' => 'ADDRESS',
		'COL_ADDRESS' => 'ADDRESS',
		'City' => 'CITY',
		'Supplier.City' => 'CITY',
		'city' => 'CITY',
		'supplier.city' => 'CITY',
		'SupplierTableMap::COL_CITY' => 'CITY',
		'COL_CITY' => 'CITY',
		'StateProvince' => 'STATE_PROVINCE',
		'Supplier.StateProvince' => 'STATE_PROVINCE',
		'stateProvince' => 'STATE_PROVINCE',
		'supplier.stateProvince' => 'STATE_PROVINCE',
		'SupplierTableMap::COL_STATE_PROVINCE' => 'STATE_PROVINCE',
		'COL_STATE_PROVINCE' => 'STATE_PROVINCE',
		'state_province' => 'STATE_PROVINCE',
		'supplier.state_province' => 'STATE_PROVINCE',
		'ZipPostalCode' => 'ZIP_POSTAL_CODE',
		'Supplier.ZipPostalCode' => 'ZIP_POSTAL_CODE',
		'zipPostalCode' => 'ZIP_POSTAL_CODE',
		'supplier.zipPostalCode' => 'ZIP_POSTAL_CODE',
		'SupplierTableMap::COL_ZIP_POSTAL_CODE' => 'ZIP_POSTAL_CODE',
		'COL_ZIP_POSTAL_CODE' => 'ZIP_POSTAL_CODE',
		'zip_postal_code' => 'ZIP_POSTAL_CODE',
		'supplier.zip_postal_code' => 'ZIP_POSTAL_CODE',
		'CountryRegion' => 'COUNTRY_REGION',
		'Supplier.CountryRegion' => 'COUNTRY_REGION',
		'countryRegion' => 'COUNTRY_REGION',
		'supplier.countryRegion' => 'COUNTRY_REGION',
		'SupplierTableMap::COL_COUNTRY_REGION' => 'COUNTRY_REGION',
		'COL_COUNTRY_REGION' => 'COUNTRY_REGION',
		'country_region' => 'COUNTRY_REGION',
		'supplier.country_region' => 'COUNTRY_REGION',
		'WebPage' => 'WEB_PAGE',
		'Supplier.WebPage' => 'WEB_PAGE',
		'webPage' => 'WEB_PAGE',
		'supplier.webPage' => 'WEB_PAGE',
		'SupplierTableMap::COL_WEB_PAGE' => 'WEB_PAGE',
		'COL_WEB_PAGE' => 'WEB_PAGE',
		'web_page' => 'WEB_PAGE',
		'supplier.web_page' => 'WEB_PAGE',
		'Notes' => 'NOTES',
		'Supplier.Notes' => 'NOTES',
		'notes' => 'NOTES',
		'supplier.notes' => 'NOTES',
		'SupplierTableMap::COL_NOTES' => 'NOTES',
		'COL_NOTES' => 'NOTES',
		'Attachments' => 'ATTACHMENTS',
		'Supplier.Attachments' => 'ATTACHMENTS',
		'attachments' => 'ATTACHMENTS',
		'supplier.attachments' => 'ATTACHMENTS',
		'SupplierTableMap::COL_ATTACHMENTS' => 'ATTACHMENTS',
		'COL_ATTACHMENTS' => 'ATTACHMENTS',
	];

	/**
	 * Add all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be added to the select list and only loaded
	 * on demand.
	 *
	 * @param Criteria $criteria Object containing the columns to add.
	 * @param string|null $alias Optional table alias
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function addSelectColumns(Criteria $criteria, ?string $alias = null) : void
	{
		if (null === $alias) {
			$criteria->addSelectColumn(SupplierTableMap::COL_SUPPLIER_ID);
			$criteria->addSelectColumn(SupplierTableMap::COL_COMPANY);
			$criteria->addSelectColumn(SupplierTableMap::COL_LAST_NAME);
			$criteria->addSelectColumn(SupplierTableMap::COL_FIRST_NAME);
			$criteria->addSelectColumn(SupplierTableMap::COL_EMAIL_ADDRESS);
			$criteria->addSelectColumn(SupplierTableMap::COL_JOB_TITLE);
			$criteria->addSelectColumn(SupplierTableMap::COL_BUSINESS_PHONE);
			$criteria->addSelectColumn(SupplierTableMap::COL_HOME_PHONE);
			$criteria->addSelectColumn(SupplierTableMap::COL_MOBILE_PHONE);
			$criteria->addSelectColumn(SupplierTableMap::COL_FAX_NUMBER);
			$criteria->addSelectColumn(SupplierTableMap::COL_ADDRESS);
			$criteria->addSelectColumn(SupplierTableMap::COL_CITY);
			$criteria->addSelectColumn(SupplierTableMap::COL_STATE_PROVINCE);
			$criteria->addSelectColumn(SupplierTableMap::COL_ZIP_POSTAL_CODE);
			$criteria->addSelectColumn(SupplierTableMap::COL_COUNTRY_REGION);
			$criteria->addSelectColumn(SupplierTableMap::COL_WEB_PAGE);
			$criteria->addSelectColumn(SupplierTableMap::COL_NOTES);
			$criteria->addSelectColumn(SupplierTableMap::COL_ATTACHMENTS);
		} else {
			$criteria->addSelectColumn($alias . '.supplier_id');
			$criteria->addSelectColumn($alias . '.company');
			$criteria->addSelectColumn($alias . '.last_name');
			$criteria->addSelectColumn($alias . '.first_name');
			$criteria->addSelectColumn($alias . '.email_address');
			$criteria->addSelectColumn($alias . '.job_title');
			$criteria->addSelectColumn($alias . '.business_phone');
			$criteria->addSelectColumn($alias . '.home_phone');
			$criteria->addSelectColumn($alias . '.mobile_phone');
			$criteria->addSelectColumn($alias . '.fax_number');
			$criteria->addSelectColumn($alias . '.address');
			$criteria->addSelectColumn($alias . '.city');
			$criteria->addSelectColumn($alias . '.state_province');
			$criteria->addSelectColumn($alias . '.zip_postal_code');
			$criteria->addSelectColumn($alias . '.country_region');
			$criteria->addSelectColumn($alias . '.web_page');
			$criteria->addSelectColumn($alias . '.notes');
			$criteria->addSelectColumn($alias . '.attachments');
		}
	}

	/**
	 * Build the RelationMap objects for this table relationships
	 *
	 */
	public function buildRelations() : void
	{
	}

	/**
	 * Performs a DELETE on the database, given a Supplier or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or Supplier object or primary key or array of primary keys
	 *              which is used to create the DELETE statement
	 * @param ConnectionInterface $con the connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
	 *                         if supported by native driver or if emulated using Propel.
	 */
	 public static function doDelete($values, ?ConnectionInterface $con = null) : int
	 {
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(SupplierTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\Supplier) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(SupplierTableMap::DATABASE_NAME);
			$criteria->add(SupplierTableMap::COL_SUPPLIER_ID, (array)$values, Criteria::IN);
		}

		$query = SupplierQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			SupplierTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				SupplierTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the supplier table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return SupplierQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a Supplier or Criteria object.
	 *
	 * @param mixed $criteria Criteria or Supplier object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(SupplierTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from Supplier object
		}

		if ($criteria->containsKey(SupplierTableMap::COL_SUPPLIER_ID) && $criteria->keyContainsValue(SupplierTableMap::COL_SUPPLIER_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . SupplierTableMap::COL_SUPPLIER_ID . ')');
		}


		// Set the correct dbName
		$query = SupplierQuery::create()->mergeWith($criteria);

		// use transaction because $criteria could contain info
		// for more than one table (I guess, conceivably)
		return $con->transaction(static function() use ($con, $query) {
			return $query->doInsert($con);
		});
	}

	/**
	 * The class that the tableMap will make instances of.
	 *
	 * If $withPrefix is true, the returned path
	 * uses a dot-path notation which is translated into a path
	 * relative to a location on the PHP include_path.
	 * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
	 *
	 * @param bool $withPrefix Whether to return the path with the class name
	 * @return string path.to.ClassName
	 */
	public static function getOMClass(bool $withPrefix = true) : string
	{
		return $withPrefix ? SupplierTableMap::CLASS_DEFAULT : SupplierTableMap::OM_CLASS;
	}

	/**
	 * Retrieves the primary key from the DB resultset row
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, an array of the primary key columns will be returned.
	 *
	 * @param array $row Resultset row.
	 * @param int $offset The 0-based offset for reading from the resultset row.
	 * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
	 *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
	 *
	 * @return mixed The primary key of the row
	 */
	public static function getPrimaryKeyFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM)
	{
		return (int)$row[
			TableMap::TYPE_NUM == $indexType
				? 0 + $offset
				: self::translateFieldName('SupplierId', TableMap::TYPE_PHPNAME, $indexType)
		];
	}

	/**
	 * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
	 *
	 * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
	 * a multi-column primary key, a serialize()d version of the primary key will be returned.
	 *
	 * @param array $row Resultset row.
	 * @param int $offset The 0-based offset for reading from the resultset row.
	 * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
	 *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
	 *
	 * @return string|null The primary key hash of the row
	 */
	public static function getPrimaryKeyHashFromRow(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : ?string
	{
		// If the PK cannot be derived from the row, return NULL.
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SupplierId', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SupplierId', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SupplierId', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SupplierId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SupplierId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('SupplierId', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(SupplierTableMap::DATABASE_NAME)->getTable(SupplierTableMap::TABLE_NAME);
	}

	/**
	 * Initialize the table attributes and columns
	 * Relations are not initialized by this method since they are lazy loaded
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function initialize() : void
	{
		// attributes
		$this->setName('supplier');
		$this->setPhpName('Supplier');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\Supplier');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('supplier_id', 'SupplierId', 'INTEGER', true, null, null);
		$this->addColumn('company', 'Company', 'VARCHAR', false, 50, null);
		$this->addColumn('last_name', 'LastName', 'VARCHAR', false, 50, null);
		$this->addColumn('first_name', 'FirstName', 'VARCHAR', false, 50, null);
		$this->addColumn('email_address', 'EmailAddress', 'VARCHAR', false, 50, null);
		$this->addColumn('job_title', 'JobTitle', 'VARCHAR', false, 50, null);
		$this->addColumn('business_phone', 'BusinessPhone', 'VARCHAR', false, 25, null);
		$this->addColumn('home_phone', 'HomePhone', 'VARCHAR', false, 25, null);
		$this->addColumn('mobile_phone', 'MobilePhone', 'VARCHAR', false, 25, null);
		$this->addColumn('fax_number', 'FaxNumber', 'VARCHAR', false, 25, null);
		$this->addColumn('address', 'Address', 'CLOB', false, null, null);
		$this->addColumn('city', 'City', 'VARCHAR', false, 50, null);
		$this->addColumn('state_province', 'StateProvince', 'VARCHAR', false, 50, null);
		$this->addColumn('zip_postal_code', 'ZipPostalCode', 'VARCHAR', false, 15, null);
		$this->addColumn('country_region', 'CountryRegion', 'VARCHAR', false, 50, null);
		$this->addColumn('web_page', 'WebPage', 'CLOB', false, null, null);
		$this->addColumn('notes', 'Notes', 'CLOB', false, null, null);
		$this->addColumn('attachments', 'Attachments', 'LONGVARBINARY', false, null, null);
	}

	/**
	 * Populates an object of the default type or an object that inherit from the default.
	 *
	 * @param array $row Row returned by DataFetcher->fetch().
	 * @param int $offset The 0-based offset for reading from the resultset row.
	 * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
	 * One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
	 *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return array (Supplier object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = SupplierTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = SupplierTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + SupplierTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = SupplierTableMap::OM_CLASS;
			/** @var Supplier $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			SupplierTableMap::addInstanceToPool($obj, $key);
		}

		return [$obj, $col];
	}

	/**
	 * The returned array will contain objects of the default type or
	 * objects that inherit from the default.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return array<object>
	 */
	public static function populateObjects(DataFetcherInterface $dataFetcher) : array
	{
		$results = [];

		// set the class once to avoid overhead in the loop
		$cls = static::getOMClass(false);

		// populate the object(s)
		while ($row = $dataFetcher->fetch()) {
			$key = SupplierTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = SupplierTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var Supplier $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				SupplierTableMap::addInstanceToPool($obj, $key);
			} // if key exists
		}

		return $results;
	}

	/**
	 * Remove all the columns needed to create a new object.
	 *
	 * Note: any columns that were marked with lazyLoad="true" in the
	 * XML schema will not be removed as they are only loaded on demand.
	 *
	 * @param Criteria $criteria Object containing the columns to remove.
	 * @param string|null $alias Optional table alias
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function removeSelectColumns(Criteria $criteria, ?string $alias = null) : void
	{
		if (null === $alias) {
			$criteria->removeSelectColumn(SupplierTableMap::COL_SUPPLIER_ID);
			$criteria->removeSelectColumn(SupplierTableMap::COL_COMPANY);
			$criteria->removeSelectColumn(SupplierTableMap::COL_LAST_NAME);
			$criteria->removeSelectColumn(SupplierTableMap::COL_FIRST_NAME);
			$criteria->removeSelectColumn(SupplierTableMap::COL_EMAIL_ADDRESS);
			$criteria->removeSelectColumn(SupplierTableMap::COL_JOB_TITLE);
			$criteria->removeSelectColumn(SupplierTableMap::COL_BUSINESS_PHONE);
			$criteria->removeSelectColumn(SupplierTableMap::COL_HOME_PHONE);
			$criteria->removeSelectColumn(SupplierTableMap::COL_MOBILE_PHONE);
			$criteria->removeSelectColumn(SupplierTableMap::COL_FAX_NUMBER);
			$criteria->removeSelectColumn(SupplierTableMap::COL_ADDRESS);
			$criteria->removeSelectColumn(SupplierTableMap::COL_CITY);
			$criteria->removeSelectColumn(SupplierTableMap::COL_STATE_PROVINCE);
			$criteria->removeSelectColumn(SupplierTableMap::COL_ZIP_POSTAL_CODE);
			$criteria->removeSelectColumn(SupplierTableMap::COL_COUNTRY_REGION);
			$criteria->removeSelectColumn(SupplierTableMap::COL_WEB_PAGE);
			$criteria->removeSelectColumn(SupplierTableMap::COL_NOTES);
			$criteria->removeSelectColumn(SupplierTableMap::COL_ATTACHMENTS);
		} else {
			$criteria->removeSelectColumn($alias . '.supplier_id');
			$criteria->removeSelectColumn($alias . '.company');
			$criteria->removeSelectColumn($alias . '.last_name');
			$criteria->removeSelectColumn($alias . '.first_name');
			$criteria->removeSelectColumn($alias . '.email_address');
			$criteria->removeSelectColumn($alias . '.job_title');
			$criteria->removeSelectColumn($alias . '.business_phone');
			$criteria->removeSelectColumn($alias . '.home_phone');
			$criteria->removeSelectColumn($alias . '.mobile_phone');
			$criteria->removeSelectColumn($alias . '.fax_number');
			$criteria->removeSelectColumn($alias . '.address');
			$criteria->removeSelectColumn($alias . '.city');
			$criteria->removeSelectColumn($alias . '.state_province');
			$criteria->removeSelectColumn($alias . '.zip_postal_code');
			$criteria->removeSelectColumn($alias . '.country_region');
			$criteria->removeSelectColumn($alias . '.web_page');
			$criteria->removeSelectColumn($alias . '.notes');
			$criteria->removeSelectColumn($alias . '.attachments');
		}
	}
}
