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
use SOB\Propel2\Shipper;
use SOB\Propel2\ShipperQuery;

/**
 * This class defines the structure of the 'shipper' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class ShipperTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.Shipper';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.ShipperTableMap';

	/**
	 * the column name for the address field
	 */
	public const COL_ADDRESS = 'shipper.address';

	/**
	 * the column name for the attachments field
	 */
	public const COL_ATTACHMENTS = 'shipper.attachments';

	/**
	 * the column name for the business_phone field
	 */
	public const COL_BUSINESS_PHONE = 'shipper.business_phone';

	/**
	 * the column name for the city field
	 */
	public const COL_CITY = 'shipper.city';

	/**
	 * the column name for the company field
	 */
	public const COL_COMPANY = 'shipper.company';

	/**
	 * the column name for the country_region field
	 */
	public const COL_COUNTRY_REGION = 'shipper.country_region';

	/**
	 * the column name for the email_address field
	 */
	public const COL_EMAIL_ADDRESS = 'shipper.email_address';

	/**
	 * the column name for the fax_number field
	 */
	public const COL_FAX_NUMBER = 'shipper.fax_number';

	/**
	 * the column name for the first_name field
	 */
	public const COL_FIRST_NAME = 'shipper.first_name';

	/**
	 * the column name for the home_phone field
	 */
	public const COL_HOME_PHONE = 'shipper.home_phone';

	/**
	 * the column name for the job_title field
	 */
	public const COL_JOB_TITLE = 'shipper.job_title';

	/**
	 * the column name for the last_name field
	 */
	public const COL_LAST_NAME = 'shipper.last_name';

	/**
	 * the column name for the mobile_phone field
	 */
	public const COL_MOBILE_PHONE = 'shipper.mobile_phone';

	/**
	 * the column name for the notes field
	 */
	public const COL_NOTES = 'shipper.notes';

	/**
	 * the column name for the shipper_id field
	 */
	public const COL_SHIPPER_ID = 'shipper.shipper_id';

	/**
	 * the column name for the state_province field
	 */
	public const COL_STATE_PROVINCE = 'shipper.state_province';

	/**
	 * the column name for the web_page field
	 */
	public const COL_WEB_PAGE = 'shipper.web_page';

	/**
	 * the column name for the zip_postal_code field
	 */
	public const COL_ZIP_POSTAL_CODE = 'shipper.zip_postal_code';

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
	public const OM_CLASS = '\\SOB\\Propel2\\Shipper';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'shipper';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'Shipper';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['ShipperId' => 0, 'Company' => 1, 'LastName' => 2, 'FirstName' => 3, 'EmailAddress' => 4, 'JobTitle' => 5, 'BusinessPhone' => 6, 'HomePhone' => 7, 'MobilePhone' => 8, 'FaxNumber' => 9, 'Address' => 10, 'City' => 11, 'StateProvince' => 12, 'ZipPostalCode' => 13, 'CountryRegion' => 14, 'WebPage' => 15, 'Notes' => 16, 'Attachments' => 17, ],
		self::TYPE_CAMELNAME => ['shipperId' => 0, 'company' => 1, 'lastName' => 2, 'firstName' => 3, 'emailAddress' => 4, 'jobTitle' => 5, 'businessPhone' => 6, 'homePhone' => 7, 'mobilePhone' => 8, 'faxNumber' => 9, 'address' => 10, 'city' => 11, 'stateProvince' => 12, 'zipPostalCode' => 13, 'countryRegion' => 14, 'webPage' => 15, 'notes' => 16, 'attachments' => 17, ],
		self::TYPE_COLNAME => [ShipperTableMap::COL_SHIPPER_ID => 0, ShipperTableMap::COL_COMPANY => 1, ShipperTableMap::COL_LAST_NAME => 2, ShipperTableMap::COL_FIRST_NAME => 3, ShipperTableMap::COL_EMAIL_ADDRESS => 4, ShipperTableMap::COL_JOB_TITLE => 5, ShipperTableMap::COL_BUSINESS_PHONE => 6, ShipperTableMap::COL_HOME_PHONE => 7, ShipperTableMap::COL_MOBILE_PHONE => 8, ShipperTableMap::COL_FAX_NUMBER => 9, ShipperTableMap::COL_ADDRESS => 10, ShipperTableMap::COL_CITY => 11, ShipperTableMap::COL_STATE_PROVINCE => 12, ShipperTableMap::COL_ZIP_POSTAL_CODE => 13, ShipperTableMap::COL_COUNTRY_REGION => 14, ShipperTableMap::COL_WEB_PAGE => 15, ShipperTableMap::COL_NOTES => 16, ShipperTableMap::COL_ATTACHMENTS => 17, ],
		self::TYPE_FIELDNAME => ['shipper_id' => 0, 'company' => 1, 'last_name' => 2, 'first_name' => 3, 'email_address' => 4, 'job_title' => 5, 'business_phone' => 6, 'home_phone' => 7, 'mobile_phone' => 8, 'fax_number' => 9, 'address' => 10, 'city' => 11, 'state_province' => 12, 'zip_postal_code' => 13, 'country_region' => 14, 'web_page' => 15, 'notes' => 16, 'attachments' => 17, ],
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
		self::TYPE_PHPNAME => ['ShipperId', 'Company', 'LastName', 'FirstName', 'EmailAddress', 'JobTitle', 'BusinessPhone', 'HomePhone', 'MobilePhone', 'FaxNumber', 'Address', 'City', 'StateProvince', 'ZipPostalCode', 'CountryRegion', 'WebPage', 'Notes', 'Attachments', ],
		self::TYPE_CAMELNAME => ['shipperId', 'company', 'lastName', 'firstName', 'emailAddress', 'jobTitle', 'businessPhone', 'homePhone', 'mobilePhone', 'faxNumber', 'address', 'city', 'stateProvince', 'zipPostalCode', 'countryRegion', 'webPage', 'notes', 'attachments', ],
		self::TYPE_COLNAME => [ShipperTableMap::COL_SHIPPER_ID, ShipperTableMap::COL_COMPANY, ShipperTableMap::COL_LAST_NAME, ShipperTableMap::COL_FIRST_NAME, ShipperTableMap::COL_EMAIL_ADDRESS, ShipperTableMap::COL_JOB_TITLE, ShipperTableMap::COL_BUSINESS_PHONE, ShipperTableMap::COL_HOME_PHONE, ShipperTableMap::COL_MOBILE_PHONE, ShipperTableMap::COL_FAX_NUMBER, ShipperTableMap::COL_ADDRESS, ShipperTableMap::COL_CITY, ShipperTableMap::COL_STATE_PROVINCE, ShipperTableMap::COL_ZIP_POSTAL_CODE, ShipperTableMap::COL_COUNTRY_REGION, ShipperTableMap::COL_WEB_PAGE, ShipperTableMap::COL_NOTES, ShipperTableMap::COL_ATTACHMENTS, ],
		self::TYPE_FIELDNAME => ['shipper_id', 'company', 'last_name', 'first_name', 'email_address', 'job_title', 'business_phone', 'home_phone', 'mobile_phone', 'fax_number', 'address', 'city', 'state_province', 'zip_postal_code', 'country_region', 'web_page', 'notes', 'attachments', ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'ShipperId' => 'SHIPPER_ID',
		'Shipper.ShipperId' => 'SHIPPER_ID',
		'shipperId' => 'SHIPPER_ID',
		'shipper.shipperId' => 'SHIPPER_ID',
		'ShipperTableMap::COL_SHIPPER_ID' => 'SHIPPER_ID',
		'COL_SHIPPER_ID' => 'SHIPPER_ID',
		'shipper_id' => 'SHIPPER_ID',
		'shipper.shipper_id' => 'SHIPPER_ID',
		'Company' => 'COMPANY',
		'Shipper.Company' => 'COMPANY',
		'company' => 'COMPANY',
		'shipper.company' => 'COMPANY',
		'ShipperTableMap::COL_COMPANY' => 'COMPANY',
		'COL_COMPANY' => 'COMPANY',
		'LastName' => 'LAST_NAME',
		'Shipper.LastName' => 'LAST_NAME',
		'lastName' => 'LAST_NAME',
		'shipper.lastName' => 'LAST_NAME',
		'ShipperTableMap::COL_LAST_NAME' => 'LAST_NAME',
		'COL_LAST_NAME' => 'LAST_NAME',
		'last_name' => 'LAST_NAME',
		'shipper.last_name' => 'LAST_NAME',
		'FirstName' => 'FIRST_NAME',
		'Shipper.FirstName' => 'FIRST_NAME',
		'firstName' => 'FIRST_NAME',
		'shipper.firstName' => 'FIRST_NAME',
		'ShipperTableMap::COL_FIRST_NAME' => 'FIRST_NAME',
		'COL_FIRST_NAME' => 'FIRST_NAME',
		'first_name' => 'FIRST_NAME',
		'shipper.first_name' => 'FIRST_NAME',
		'EmailAddress' => 'EMAIL_ADDRESS',
		'Shipper.EmailAddress' => 'EMAIL_ADDRESS',
		'emailAddress' => 'EMAIL_ADDRESS',
		'shipper.emailAddress' => 'EMAIL_ADDRESS',
		'ShipperTableMap::COL_EMAIL_ADDRESS' => 'EMAIL_ADDRESS',
		'COL_EMAIL_ADDRESS' => 'EMAIL_ADDRESS',
		'email_address' => 'EMAIL_ADDRESS',
		'shipper.email_address' => 'EMAIL_ADDRESS',
		'JobTitle' => 'JOB_TITLE',
		'Shipper.JobTitle' => 'JOB_TITLE',
		'jobTitle' => 'JOB_TITLE',
		'shipper.jobTitle' => 'JOB_TITLE',
		'ShipperTableMap::COL_JOB_TITLE' => 'JOB_TITLE',
		'COL_JOB_TITLE' => 'JOB_TITLE',
		'job_title' => 'JOB_TITLE',
		'shipper.job_title' => 'JOB_TITLE',
		'BusinessPhone' => 'BUSINESS_PHONE',
		'Shipper.BusinessPhone' => 'BUSINESS_PHONE',
		'businessPhone' => 'BUSINESS_PHONE',
		'shipper.businessPhone' => 'BUSINESS_PHONE',
		'ShipperTableMap::COL_BUSINESS_PHONE' => 'BUSINESS_PHONE',
		'COL_BUSINESS_PHONE' => 'BUSINESS_PHONE',
		'business_phone' => 'BUSINESS_PHONE',
		'shipper.business_phone' => 'BUSINESS_PHONE',
		'HomePhone' => 'HOME_PHONE',
		'Shipper.HomePhone' => 'HOME_PHONE',
		'homePhone' => 'HOME_PHONE',
		'shipper.homePhone' => 'HOME_PHONE',
		'ShipperTableMap::COL_HOME_PHONE' => 'HOME_PHONE',
		'COL_HOME_PHONE' => 'HOME_PHONE',
		'home_phone' => 'HOME_PHONE',
		'shipper.home_phone' => 'HOME_PHONE',
		'MobilePhone' => 'MOBILE_PHONE',
		'Shipper.MobilePhone' => 'MOBILE_PHONE',
		'mobilePhone' => 'MOBILE_PHONE',
		'shipper.mobilePhone' => 'MOBILE_PHONE',
		'ShipperTableMap::COL_MOBILE_PHONE' => 'MOBILE_PHONE',
		'COL_MOBILE_PHONE' => 'MOBILE_PHONE',
		'mobile_phone' => 'MOBILE_PHONE',
		'shipper.mobile_phone' => 'MOBILE_PHONE',
		'FaxNumber' => 'FAX_NUMBER',
		'Shipper.FaxNumber' => 'FAX_NUMBER',
		'faxNumber' => 'FAX_NUMBER',
		'shipper.faxNumber' => 'FAX_NUMBER',
		'ShipperTableMap::COL_FAX_NUMBER' => 'FAX_NUMBER',
		'COL_FAX_NUMBER' => 'FAX_NUMBER',
		'fax_number' => 'FAX_NUMBER',
		'shipper.fax_number' => 'FAX_NUMBER',
		'Address' => 'ADDRESS',
		'Shipper.Address' => 'ADDRESS',
		'address' => 'ADDRESS',
		'shipper.address' => 'ADDRESS',
		'ShipperTableMap::COL_ADDRESS' => 'ADDRESS',
		'COL_ADDRESS' => 'ADDRESS',
		'City' => 'CITY',
		'Shipper.City' => 'CITY',
		'city' => 'CITY',
		'shipper.city' => 'CITY',
		'ShipperTableMap::COL_CITY' => 'CITY',
		'COL_CITY' => 'CITY',
		'StateProvince' => 'STATE_PROVINCE',
		'Shipper.StateProvince' => 'STATE_PROVINCE',
		'stateProvince' => 'STATE_PROVINCE',
		'shipper.stateProvince' => 'STATE_PROVINCE',
		'ShipperTableMap::COL_STATE_PROVINCE' => 'STATE_PROVINCE',
		'COL_STATE_PROVINCE' => 'STATE_PROVINCE',
		'state_province' => 'STATE_PROVINCE',
		'shipper.state_province' => 'STATE_PROVINCE',
		'ZipPostalCode' => 'ZIP_POSTAL_CODE',
		'Shipper.ZipPostalCode' => 'ZIP_POSTAL_CODE',
		'zipPostalCode' => 'ZIP_POSTAL_CODE',
		'shipper.zipPostalCode' => 'ZIP_POSTAL_CODE',
		'ShipperTableMap::COL_ZIP_POSTAL_CODE' => 'ZIP_POSTAL_CODE',
		'COL_ZIP_POSTAL_CODE' => 'ZIP_POSTAL_CODE',
		'zip_postal_code' => 'ZIP_POSTAL_CODE',
		'shipper.zip_postal_code' => 'ZIP_POSTAL_CODE',
		'CountryRegion' => 'COUNTRY_REGION',
		'Shipper.CountryRegion' => 'COUNTRY_REGION',
		'countryRegion' => 'COUNTRY_REGION',
		'shipper.countryRegion' => 'COUNTRY_REGION',
		'ShipperTableMap::COL_COUNTRY_REGION' => 'COUNTRY_REGION',
		'COL_COUNTRY_REGION' => 'COUNTRY_REGION',
		'country_region' => 'COUNTRY_REGION',
		'shipper.country_region' => 'COUNTRY_REGION',
		'WebPage' => 'WEB_PAGE',
		'Shipper.WebPage' => 'WEB_PAGE',
		'webPage' => 'WEB_PAGE',
		'shipper.webPage' => 'WEB_PAGE',
		'ShipperTableMap::COL_WEB_PAGE' => 'WEB_PAGE',
		'COL_WEB_PAGE' => 'WEB_PAGE',
		'web_page' => 'WEB_PAGE',
		'shipper.web_page' => 'WEB_PAGE',
		'Notes' => 'NOTES',
		'Shipper.Notes' => 'NOTES',
		'notes' => 'NOTES',
		'shipper.notes' => 'NOTES',
		'ShipperTableMap::COL_NOTES' => 'NOTES',
		'COL_NOTES' => 'NOTES',
		'Attachments' => 'ATTACHMENTS',
		'Shipper.Attachments' => 'ATTACHMENTS',
		'attachments' => 'ATTACHMENTS',
		'shipper.attachments' => 'ATTACHMENTS',
		'ShipperTableMap::COL_ATTACHMENTS' => 'ATTACHMENTS',
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
			$criteria->addSelectColumn(ShipperTableMap::COL_SHIPPER_ID);
			$criteria->addSelectColumn(ShipperTableMap::COL_COMPANY);
			$criteria->addSelectColumn(ShipperTableMap::COL_LAST_NAME);
			$criteria->addSelectColumn(ShipperTableMap::COL_FIRST_NAME);
			$criteria->addSelectColumn(ShipperTableMap::COL_EMAIL_ADDRESS);
			$criteria->addSelectColumn(ShipperTableMap::COL_JOB_TITLE);
			$criteria->addSelectColumn(ShipperTableMap::COL_BUSINESS_PHONE);
			$criteria->addSelectColumn(ShipperTableMap::COL_HOME_PHONE);
			$criteria->addSelectColumn(ShipperTableMap::COL_MOBILE_PHONE);
			$criteria->addSelectColumn(ShipperTableMap::COL_FAX_NUMBER);
			$criteria->addSelectColumn(ShipperTableMap::COL_ADDRESS);
			$criteria->addSelectColumn(ShipperTableMap::COL_CITY);
			$criteria->addSelectColumn(ShipperTableMap::COL_STATE_PROVINCE);
			$criteria->addSelectColumn(ShipperTableMap::COL_ZIP_POSTAL_CODE);
			$criteria->addSelectColumn(ShipperTableMap::COL_COUNTRY_REGION);
			$criteria->addSelectColumn(ShipperTableMap::COL_WEB_PAGE);
			$criteria->addSelectColumn(ShipperTableMap::COL_NOTES);
			$criteria->addSelectColumn(ShipperTableMap::COL_ATTACHMENTS);
		} else {
			$criteria->addSelectColumn($alias . '.shipper_id');
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
	 * Performs a DELETE on the database, given a Shipper or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or Shipper object or primary key or array of primary keys
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
			$con = Propel::getServiceContainer()->getWriteConnection(ShipperTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\Shipper) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(ShipperTableMap::DATABASE_NAME);
			$criteria->add(ShipperTableMap::COL_SHIPPER_ID, (array)$values, Criteria::IN);
		}

		$query = ShipperQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			ShipperTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				ShipperTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the shipper table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return ShipperQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a Shipper or Criteria object.
	 *
	 * @param mixed $criteria Criteria or Shipper object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(ShipperTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from Shipper object
		}

		if ($criteria->containsKey(ShipperTableMap::COL_SHIPPER_ID) && $criteria->keyContainsValue(ShipperTableMap::COL_SHIPPER_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ShipperTableMap::COL_SHIPPER_ID . ')');
		}


		// Set the correct dbName
		$query = ShipperQuery::create()->mergeWith($criteria);

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
		return $withPrefix ? ShipperTableMap::CLASS_DEFAULT : ShipperTableMap::OM_CLASS;
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
				: self::translateFieldName('ShipperId', TableMap::TYPE_PHPNAME, $indexType)
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
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ShipperId', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ShipperId', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ShipperId', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ShipperId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ShipperId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ShipperId', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(ShipperTableMap::DATABASE_NAME)->getTable(ShipperTableMap::TABLE_NAME);
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
		$this->setName('shipper');
		$this->setPhpName('Shipper');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\Shipper');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('shipper_id', 'ShipperId', 'INTEGER', true, null, null);
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
	 * @return array (Shipper object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = ShipperTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = ShipperTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + ShipperTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = ShipperTableMap::OM_CLASS;
			/** @var Shipper $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			ShipperTableMap::addInstanceToPool($obj, $key);
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
			$key = ShipperTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = ShipperTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var Shipper $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ShipperTableMap::addInstanceToPool($obj, $key);
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
			$criteria->removeSelectColumn(ShipperTableMap::COL_SHIPPER_ID);
			$criteria->removeSelectColumn(ShipperTableMap::COL_COMPANY);
			$criteria->removeSelectColumn(ShipperTableMap::COL_LAST_NAME);
			$criteria->removeSelectColumn(ShipperTableMap::COL_FIRST_NAME);
			$criteria->removeSelectColumn(ShipperTableMap::COL_EMAIL_ADDRESS);
			$criteria->removeSelectColumn(ShipperTableMap::COL_JOB_TITLE);
			$criteria->removeSelectColumn(ShipperTableMap::COL_BUSINESS_PHONE);
			$criteria->removeSelectColumn(ShipperTableMap::COL_HOME_PHONE);
			$criteria->removeSelectColumn(ShipperTableMap::COL_MOBILE_PHONE);
			$criteria->removeSelectColumn(ShipperTableMap::COL_FAX_NUMBER);
			$criteria->removeSelectColumn(ShipperTableMap::COL_ADDRESS);
			$criteria->removeSelectColumn(ShipperTableMap::COL_CITY);
			$criteria->removeSelectColumn(ShipperTableMap::COL_STATE_PROVINCE);
			$criteria->removeSelectColumn(ShipperTableMap::COL_ZIP_POSTAL_CODE);
			$criteria->removeSelectColumn(ShipperTableMap::COL_COUNTRY_REGION);
			$criteria->removeSelectColumn(ShipperTableMap::COL_WEB_PAGE);
			$criteria->removeSelectColumn(ShipperTableMap::COL_NOTES);
			$criteria->removeSelectColumn(ShipperTableMap::COL_ATTACHMENTS);
		} else {
			$criteria->removeSelectColumn($alias . '.shipper_id');
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
