<?php

namespace SOB\Propel2\Base;

use Exception;
use PDO;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Propel;
use SOB\Propel2\Map\ShipperTableMap;
use SOB\Propel2\ShipperQuery as ChildShipperQuery;

/**
 * Base class that represents a row from the 'shipper' table.
 *
 *
 *
 * @package    propel.generator.SOB.Propel2.Base
 */
abstract class Shipper implements ActiveRecordInterface
{
	/**
	 * TableMap class name
	 *
	 * @var string
	 */
	public const TABLE_MAP = '\\SOB\\Propel2\\Map\\ShipperTableMap';

	/**
	 * The value for the address field.
	 *
	 * @var        string|null
	 */
	protected $address;

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 *
	 * @var bool
	 */
	protected $alreadyInSave = false;

	/**
	 * The value for the attachments field.
	 *
	 * @var        string|null
	 */
	protected $attachments;

	/**
	 * The value for the business_phone field.
	 *
	 * @var        string|null
	 */
	protected $business_phone;

	/**
	 * The value for the city field.
	 *
	 * @var        string|null
	 */
	protected $city;

	/**
	 * The value for the company field.
	 *
	 * @var        string|null
	 */
	protected $company;

	/**
	 * The value for the country_region field.
	 *
	 * @var        string|null
	 */
	protected $country_region;

	/**
	 * attribute to determine whether this object has been deleted.
	 * @var bool
	 */
	protected $deleted = false;

	/**
	 * The value for the email_address field.
	 *
	 * @var        string|null
	 */
	protected $email_address;

	/**
	 * The value for the fax_number field.
	 *
	 * @var        string|null
	 */
	protected $fax_number;

	/**
	 * The value for the first_name field.
	 *
	 * @var        string|null
	 */
	protected $first_name;

	/**
	 * The value for the home_phone field.
	 *
	 * @var        string|null
	 */
	protected $home_phone;

	/**
	 * The value for the job_title field.
	 *
	 * @var        string|null
	 */
	protected $job_title;

	/**
	 * The value for the last_name field.
	 *
	 * @var        string|null
	 */
	protected $last_name;

	/**
	 * The value for the mobile_phone field.
	 *
	 * @var        string|null
	 */
	protected $mobile_phone;

	/**
	 * The columns that have been modified in current object.
	 * Tracking modified columns allows us to only update modified columns.
	 * @var array
	 */
	protected $modifiedColumns = [];

	/**
	 * attribute to determine if this object has previously been saved.
	 * @var bool
	 */
	protected $new = true;

	/**
	 * The value for the notes field.
	 *
	 * @var        string|null
	 */
	protected $notes;

	/**
	 * The value for the shipper_id field.
	 *
	 * @var        int
	 */
	protected $shipper_id;

	/**
	 * The value for the state_province field.
	 *
	 * @var        string|null
	 */
	protected $state_province;

	/**
	 * The (virtual) columns that are added at runtime
	 * The formatters can add supplementary columns based on a resultset
	 * @var array
	 */
	protected $virtualColumns = [];

	/**
	 * The value for the web_page field.
	 *
	 * @var        string|null
	 */
	protected $web_page;

	/**
	 * The value for the zip_postal_code field.
	 *
	 * @var        string|null
	 */
	protected $zip_postal_code;

	/**
	 * Initializes internal state of SOB\Propel2\Base\Shipper object.
	 */
	public function __construct()
	{
	}

	/**
	 * Derived method to catches calls to undefined methods.
	 *
	 * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
	 * Allows to define default __call() behavior if you overwrite __call()
	 *
	 * @param string $name
	 *
	 * @return array|string
	 */
	public function __call($name, $params)
	{
		if (0 === \strpos($name, 'get')) {
			$virtualColumn = \substr($name, 3);

			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}

			$virtualColumn = \lcfirst($virtualColumn);

			if ($this->hasVirtualColumn($virtualColumn)) {
				return $this->getVirtualColumn($virtualColumn);
			}
		}

		if (0 === \strpos($name, 'from')) {
			$format = \substr($name, 4);
			$inputData = $params[0];
			$keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

			return $this->importFrom($format, $inputData, $keyType);
		}

		if (0 === \strpos($name, 'to')) {
			$format = \substr($name, 2);
			$includeLazyLoadColumns = $params[0] ?? true;
			$keyType = $params[1] ?? TableMap::TYPE_PHPNAME;

			return $this->exportTo($format, $includeLazyLoadColumns, $keyType);
		}

		throw new BadMethodCallException(\sprintf('Call to undefined method: %s.', $name));
	}

	/**
	 * Clean up internal collections prior to serializing
	 * Avoids recursive loops that turn into segmentation faults when serializing
	 *
	 * @return array<string>
	 */
	public function __sleep() : array
	{
		$this->clearAllReferences();

		$cls = new \ReflectionClass($this);
		$propertyNames = [];
		$serializableProperties = \array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

		foreach($serializableProperties as $property) {
			$propertyNames[] = $property->getName();
		}

		return $propertyNames;
	}

	/**
	 * Return the string representation of this object
	 *
	 * @return string
	 */
	public function __toString()
	{
		return (string)$this->exportTo(ShipperTableMap::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria() : Criteria
	{
		$criteria = new Criteria(ShipperTableMap::DATABASE_NAME);

		if ($this->isColumnModified(ShipperTableMap::COL_SHIPPER_ID)) {
			$criteria->add(ShipperTableMap::COL_SHIPPER_ID, $this->shipper_id);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_COMPANY)) {
			$criteria->add(ShipperTableMap::COL_COMPANY, $this->company);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_LAST_NAME)) {
			$criteria->add(ShipperTableMap::COL_LAST_NAME, $this->last_name);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_FIRST_NAME)) {
			$criteria->add(ShipperTableMap::COL_FIRST_NAME, $this->first_name);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_EMAIL_ADDRESS)) {
			$criteria->add(ShipperTableMap::COL_EMAIL_ADDRESS, $this->email_address);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_JOB_TITLE)) {
			$criteria->add(ShipperTableMap::COL_JOB_TITLE, $this->job_title);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_BUSINESS_PHONE)) {
			$criteria->add(ShipperTableMap::COL_BUSINESS_PHONE, $this->business_phone);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_HOME_PHONE)) {
			$criteria->add(ShipperTableMap::COL_HOME_PHONE, $this->home_phone);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_MOBILE_PHONE)) {
			$criteria->add(ShipperTableMap::COL_MOBILE_PHONE, $this->mobile_phone);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_FAX_NUMBER)) {
			$criteria->add(ShipperTableMap::COL_FAX_NUMBER, $this->fax_number);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_ADDRESS)) {
			$criteria->add(ShipperTableMap::COL_ADDRESS, $this->address);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_CITY)) {
			$criteria->add(ShipperTableMap::COL_CITY, $this->city);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_STATE_PROVINCE)) {
			$criteria->add(ShipperTableMap::COL_STATE_PROVINCE, $this->state_province);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_ZIP_POSTAL_CODE)) {
			$criteria->add(ShipperTableMap::COL_ZIP_POSTAL_CODE, $this->zip_postal_code);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_COUNTRY_REGION)) {
			$criteria->add(ShipperTableMap::COL_COUNTRY_REGION, $this->country_region);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_WEB_PAGE)) {
			$criteria->add(ShipperTableMap::COL_WEB_PAGE, $this->web_page);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_NOTES)) {
			$criteria->add(ShipperTableMap::COL_NOTES, $this->notes);
		}

		if ($this->isColumnModified(ShipperTableMap::COL_ATTACHMENTS)) {
			$criteria->add(ShipperTableMap::COL_ATTACHMENTS, $this->attachments);
		}

		return $criteria;
	}

	/**
	 * Builds a Criteria object containing the primary key for this object.
	 *
	 * Unlike buildCriteria() this method includes the primary key values regardless
	 * of whether they have been modified.
	 *
	 * @throws LogicException if no primary key is defined
	 *
	 * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing value(s) for primary key(s).
	 */
	public function buildPkeyCriteria() : Criteria
	{
		$criteria = ChildShipperQuery::create();
		$criteria->add(ShipperTableMap::COL_SHIPPER_ID, $this->shipper_id);

		return $criteria;
	}

	/**
	 * Clears the current object, sets all attributes to their default values and removes
	 * outgoing references as well as back-references (from other objects to this one. Results probably in a database
	 * change of those foreign objects when you call `save` there).
	 *
	 * @return $this
	 */
	public function clear()
	{
		$this->shipper_id = null;
		$this->company = null;
		$this->last_name = null;
		$this->first_name = null;
		$this->email_address = null;
		$this->job_title = null;
		$this->business_phone = null;
		$this->home_phone = null;
		$this->mobile_phone = null;
		$this->fax_number = null;
		$this->address = null;
		$this->city = null;
		$this->state_province = null;
		$this->zip_postal_code = null;
		$this->country_region = null;
		$this->web_page = null;
		$this->notes = null;
		$this->attachments = null;
		$this->alreadyInSave = false;
		$this->clearAllReferences();
		$this->resetModified();
		$this->setNew(true);
		$this->setDeleted(false);

		return $this;
	}

	/**
	 * Resets all references and back-references to other model objects or collections of model objects.
	 *
	 * This method is used to reset all php object references (not the actual reference in the database).
	 * Necessary for object serialisation.
	 *
	 * @param bool $deep Whether to also clear the references on all referrer objects.
	 * @return $this
	 */
	public function clearAllReferences(bool $deep = false)
	{
		if ($deep) {
		} // if ($deep)

		return $this;
	}

	/**
	 * Makes a copy of this object that will be inserted as a new row in table when saved.
	 * It creates a new object filling in the simple attributes, but skipping any primary
	 * keys that are defined for the table.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @throws \Propel\Runtime\Exception\PropelException
	 * @return \SOB\Propel2\Shipper Clone of current object.
	 */
	public function copy(bool $deepCopy = false)
	{
		// we use get_class(), because this might be a subclass
		$clazz = static::class;
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);

		return $copyObj;
	}

	/**
	 * Sets contents of passed object to values from current object.
	 *
	 * If desired, this method can also make copies of all associated (fkey referrers)
	 * objects.
	 *
	 * @param object $copyObj An object of \SOB\Propel2\Shipper (or compatible) type.
	 * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true) : void
	{
		$copyObj->setCompany($this->getCompany());
		$copyObj->setLastName($this->getLastName());
		$copyObj->setFirstName($this->getFirstName());
		$copyObj->setEmailAddress($this->getEmailAddress());
		$copyObj->setJobTitle($this->getJobTitle());
		$copyObj->setBusinessPhone($this->getBusinessPhone());
		$copyObj->setHomePhone($this->getHomePhone());
		$copyObj->setMobilePhone($this->getMobilePhone());
		$copyObj->setFaxNumber($this->getFaxNumber());
		$copyObj->setAddress($this->getAddress());
		$copyObj->setCity($this->getCity());
		$copyObj->setStateProvince($this->getStateProvince());
		$copyObj->setZipPostalCode($this->getZipPostalCode());
		$copyObj->setCountryRegion($this->getCountryRegion());
		$copyObj->setWebPage($this->getWebPage());
		$copyObj->setNotes($this->getNotes());
		$copyObj->setAttachments($this->getAttachments());

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setShipperId(null); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 * @see Shipper::setDeleted()
	 * @see Shipper::isDeleted()
	 */
	public function delete(?ConnectionInterface $con = null) : void
	{
		if ($this->isDeleted()) {
			throw new PropelException('This object has already been deleted.');
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(ShipperTableMap::DATABASE_NAME);
		}

		$con->transaction(function() use ($con) : void {
			$deleteQuery = ChildShipperQuery::create()
				->filterByPrimaryKey($this->getPrimaryKey());
			$ret = $this->preDelete($con);

			if ($ret) {
				$deleteQuery->delete($con);
				$this->postDelete($con);
				$this->setDeleted(true);
			}
		});
	}

	/**
	 * Checks and repairs the internal consistency of the object.
	 *
	 * This method is executed after an already-instantiated object is re-hydrated
	 * from the database.  It exists to check any foreign keys to make sure that
	 * the objects related to the current object are correct based on foreign key.
	 *
	 * You can override this method in the stub class, but you should always invoke
	 * the base method from the overridden method (i.e. parent::ensureConsistency()),
	 * in case your model changes.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function ensureConsistency() : void
	{
	}

	/**
	 * Compares this with another <code>Shipper</code> instance.  If
	 * <code>obj</code> is an instance of <code>Shipper</code>, delegates to
	 * <code>equals(Shipper)</code>.  Otherwise, returns <code>false</code>.
	 *
	 * @param mixed $obj The object to compare to.
	 * @return bool Whether equal to the object specified.
	 */
	public function equals($obj) : bool
	{
		if (! $obj instanceof static) {
			return false;
		}

		if ($this === $obj) {
			return true;
		}

		if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
			return false;
		}

		return $this->getPrimaryKey() === $obj->getPrimaryKey();
	}

	/**
	 * Export the current object properties to a string, using a given parser format
	 * <code>
	 * $book = BookQuery::create()->findPk(9012);
	 * echo $book->exportTo('JSON');
	 *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
	 * </code>
	 *
	 * @param \Propel\Runtime\Parser\AbstractParser|string $parser An AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
	 * @param bool $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
	 * @param string $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME, TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM. Defaults to TableMap::TYPE_PHPNAME.
	 * @return string The exported data
	 */
	public function exportTo($parser, bool $includeLazyLoadColumns = true, string $keyType = TableMap::TYPE_PHPNAME) : string
	{
		if (! $parser instanceof AbstractParser) {
			$parser = AbstractParser::getParser($parser);
		}

		return $parser->fromArray($this->toArray($keyType, $includeLazyLoadColumns, [], true));
	}

	/**
	 * Populates the object using an array.
	 *
	 * This is particularly useful when populating an object from one of the
	 * request arrays (e.g. $_POST).  This method goes through the column
	 * names, checking to see whether a matching key exists in populated
	 * array. If so the setByName() method is called for that column.
	 *
	 * You can specify the key type of the array by additionally passing one
	 * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
	 * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
	 * The default key type is the column's TableMap::TYPE_PHPNAME.
	 *
	 * @param array $arr An array to populate the object from.
	 * @param string $keyType The type of keys the array uses.
	 * @return $this
	 */
	public function fromArray(array $arr, string $keyType = TableMap::TYPE_PHPNAME)
	{
		$keys = ShipperTableMap::getFieldNames($keyType);

		if (\array_key_exists($keys[0], $arr)) {
			$this->setShipperId($arr[$keys[0]]);
		}

		if (\array_key_exists($keys[1], $arr)) {
			$this->setCompany($arr[$keys[1]]);
		}

		if (\array_key_exists($keys[2], $arr)) {
			$this->setLastName($arr[$keys[2]]);
		}

		if (\array_key_exists($keys[3], $arr)) {
			$this->setFirstName($arr[$keys[3]]);
		}

		if (\array_key_exists($keys[4], $arr)) {
			$this->setEmailAddress($arr[$keys[4]]);
		}

		if (\array_key_exists($keys[5], $arr)) {
			$this->setJobTitle($arr[$keys[5]]);
		}

		if (\array_key_exists($keys[6], $arr)) {
			$this->setBusinessPhone($arr[$keys[6]]);
		}

		if (\array_key_exists($keys[7], $arr)) {
			$this->setHomePhone($arr[$keys[7]]);
		}

		if (\array_key_exists($keys[8], $arr)) {
			$this->setMobilePhone($arr[$keys[8]]);
		}

		if (\array_key_exists($keys[9], $arr)) {
			$this->setFaxNumber($arr[$keys[9]]);
		}

		if (\array_key_exists($keys[10], $arr)) {
			$this->setAddress($arr[$keys[10]]);
		}

		if (\array_key_exists($keys[11], $arr)) {
			$this->setCity($arr[$keys[11]]);
		}

		if (\array_key_exists($keys[12], $arr)) {
			$this->setStateProvince($arr[$keys[12]]);
		}

		if (\array_key_exists($keys[13], $arr)) {
			$this->setZipPostalCode($arr[$keys[13]]);
		}

		if (\array_key_exists($keys[14], $arr)) {
			$this->setCountryRegion($arr[$keys[14]]);
		}

		if (\array_key_exists($keys[15], $arr)) {
			$this->setWebPage($arr[$keys[15]]);
		}

		if (\array_key_exists($keys[16], $arr)) {
			$this->setNotes($arr[$keys[16]]);
		}

		if (\array_key_exists($keys[17], $arr)) {
			$this->setAttachments($arr[$keys[17]]);
		}

		return $this;
	}

	/**
	 * Get the [address] column value.
	 *
	 * @return string|null
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Get the [attachments] column value.
	 *
	 * @return string|null
	 */
	public function getAttachments()
	{
		return $this->attachments;
	}

	/**
	 * Get the [business_phone] column value.
	 *
	 * @return string|null
	 */
	public function getBusinessPhone()
	{
		return $this->business_phone;
	}

	/**
	 * Retrieves a field from the object by name passed in as a string.
	 *
	 * @param string $name name
	 * @param string $type The type of fieldname the $name is of:
	 *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
	 *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
	 *                     Defaults to TableMap::TYPE_PHPNAME.
	 * @return mixed Value of field.
	 */
	public function getByName(string $name, string $type = TableMap::TYPE_PHPNAME)
	{
		$pos = ShipperTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
		$field = $this->getByPosition($pos);

		return $field;
	}

	/**
	 * Retrieves a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param int $pos Position in XML schema
	 * @return mixed Value of field at $pos
	 */
	public function getByPosition(int $pos)
	{
		switch ($pos) {
			case 0:
				return $this->getShipperId();

			case 1:
				return $this->getCompany();

			case 2:
				return $this->getLastName();

			case 3:
				return $this->getFirstName();

			case 4:
				return $this->getEmailAddress();

			case 5:
				return $this->getJobTitle();

			case 6:
				return $this->getBusinessPhone();

			case 7:
				return $this->getHomePhone();

			case 8:
				return $this->getMobilePhone();

			case 9:
				return $this->getFaxNumber();

			case 10:
				return $this->getAddress();

			case 11:
				return $this->getCity();

			case 12:
				return $this->getStateProvince();

			case 13:
				return $this->getZipPostalCode();

			case 14:
				return $this->getCountryRegion();

			case 15:
				return $this->getWebPage();

			case 16:
				return $this->getNotes();

			case 17:
				return $this->getAttachments();

			default:
				return;
		} // switch()
	}

	/**
	 * Get the [city] column value.
	 *
	 * @return string|null
	 */
	public function getCity()
	{
		return $this->city;
	}

	/**
	 * Get the [company] column value.
	 *
	 * @return string|null
	 */
	public function getCompany()
	{
		return $this->company;
	}

	/**
	 * Get the [country_region] column value.
	 *
	 * @return string|null
	 */
	public function getCountryRegion()
	{
		return $this->country_region;
	}

	/**
	 * Get the [email_address] column value.
	 *
	 * @return string|null
	 */
	public function getEmailAddress()
	{
		return $this->email_address;
	}

	/**
	 * Get the [fax_number] column value.
	 *
	 * @return string|null
	 */
	public function getFaxNumber()
	{
		return $this->fax_number;
	}

	/**
	 * Get the [first_name] column value.
	 *
	 * @return string|null
	 */
	public function getFirstName()
	{
		return $this->first_name;
	}

	/**
	 * Get the [home_phone] column value.
	 *
	 * @return string|null
	 */
	public function getHomePhone()
	{
		return $this->home_phone;
	}

	/**
	 * Get the [job_title] column value.
	 *
	 * @return string|null
	 */
	public function getJobTitle()
	{
		return $this->job_title;
	}

	/**
	 * Get the [last_name] column value.
	 *
	 * @return string|null
	 */
	public function getLastName()
	{
		return $this->last_name;
	}

	/**
	 * Get the [mobile_phone] column value.
	 *
	 * @return string|null
	 */
	public function getMobilePhone()
	{
		return $this->mobile_phone;
	}

	/**
	 * Get the columns that have been modified in this object.
	 * @return array A unique list of the modified column names for this object.
	 */
	public function getModifiedColumns() : array
	{
		return $this->modifiedColumns ? \array_keys($this->modifiedColumns) : [];
	}

	/**
	 * Get the [notes] column value.
	 *
	 * @return string|null
	 */
	public function getNotes()
	{
		return $this->notes;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return int
	 */
	public function getPrimaryKey()
	{
		return $this->getShipperId();
	}

	/**
	 * Get the [shipper_id] column value.
	 *
	 * @return int
	 */
	public function getShipperId()
	{
		return $this->shipper_id;
	}

	/**
	 * Get the [state_province] column value.
	 *
	 * @return string|null
	 */
	public function getStateProvince()
	{
		return $this->state_province;
	}

	/**
	 * Get the value of a virtual column in this object
	 *
	 * @param string $name The virtual column name
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function getVirtualColumn(string $name)
	{
		if (! $this->hasVirtualColumn($name)) {
			throw new PropelException(\sprintf('Cannot get value of nonexistent virtual column `%s`.', $name));
		}

		return $this->virtualColumns[$name];
	}

	/**
	 * Get the associative array of the virtual columns in this object
	 *
	 */
	public function getVirtualColumns() : array
	{
		return $this->virtualColumns;
	}

	/**
	 * Get the [web_page] column value.
	 *
	 * @return string|null
	 */
	public function getWebPage()
	{
		return $this->web_page;
	}

	/**
	 * Get the [zip_postal_code] column value.
	 *
	 * @return string|null
	 */
	public function getZipPostalCode()
	{
		return $this->zip_postal_code;
	}

	/**
	 * If the primary key is not null, return the hashcode of the
	 * primary key. Otherwise, return the hash code of the object.
	 *
	 * @return int|string Hashcode
	 */
	public function hashCode()
	{
		$validPk = null !== $this->getShipperId();

		$validPrimaryKeyFKs = 0;
		$primaryKeyFKs = [];

		if ($validPk) {
			return \crc32(\json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
		} elseif ($validPrimaryKeyFKs) {
			return \crc32(\json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
		}

		return \spl_object_hash($this);
	}

	/**
	 * Indicates whether the columns in this object are only set to default values.
	 *
	 * This method can be used in conjunction with isModified() to indicate whether an object is both
	 * modified _and_ has some values set which are non-default.
	 *
	 * @return bool Whether the columns in this object are only been set with default values.
	 */
	public function hasOnlyDefaultValues() : bool
	{
		// otherwise, everything was equal, so return TRUE
		return true;
	}

	/**
	 * Checks the existence of a virtual column in this object
	 *
	 * @param string $name The virtual column name
	 */
	public function hasVirtualColumn(string $name) : bool
	{
		return \array_key_exists($name, $this->virtualColumns);
	}

	/**
	 * Hydrates (populates) the object variables with values from the database resultset.
	 *
	 * An offset (0-based "start column") is specified so that objects can be hydrated
	 * with a subset of the columns in the resultset rows.  This is needed, for example,
	 * for results of JOIN queries where the resultset row includes columns from two or
	 * more tables.
	 *
	 * @param array $row The row returned by DataFetcher->fetch().
	 * @param int $startcol 0-based offset column which indicates which resultset column to start with.
	 * @param bool $rehydrate Whether this object is being re-hydrated from the database.
	 * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
	 * One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
	 *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException - Any caught Exception will be rewrapped as a PropelException.
	 * @return int next starting column
	 */
	public function hydrate(array $row, int $startcol = 0, bool $rehydrate = false, string $indexType = TableMap::TYPE_NUM) : int
	{
		try {

			$col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ShipperTableMap::translateFieldName('ShipperId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->shipper_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ShipperTableMap::translateFieldName('Company', TableMap::TYPE_PHPNAME, $indexType)];
			$this->company = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ShipperTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
			$this->last_name = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ShipperTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
			$this->first_name = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ShipperTableMap::translateFieldName('EmailAddress', TableMap::TYPE_PHPNAME, $indexType)];
			$this->email_address = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ShipperTableMap::translateFieldName('JobTitle', TableMap::TYPE_PHPNAME, $indexType)];
			$this->job_title = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ShipperTableMap::translateFieldName('BusinessPhone', TableMap::TYPE_PHPNAME, $indexType)];
			$this->business_phone = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ShipperTableMap::translateFieldName('HomePhone', TableMap::TYPE_PHPNAME, $indexType)];
			$this->home_phone = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ShipperTableMap::translateFieldName('MobilePhone', TableMap::TYPE_PHPNAME, $indexType)];
			$this->mobile_phone = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ShipperTableMap::translateFieldName('FaxNumber', TableMap::TYPE_PHPNAME, $indexType)];
			$this->fax_number = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ShipperTableMap::translateFieldName('Address', TableMap::TYPE_PHPNAME, $indexType)];
			$this->address = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ShipperTableMap::translateFieldName('City', TableMap::TYPE_PHPNAME, $indexType)];
			$this->city = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ShipperTableMap::translateFieldName('StateProvince', TableMap::TYPE_PHPNAME, $indexType)];
			$this->state_province = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : ShipperTableMap::translateFieldName('ZipPostalCode', TableMap::TYPE_PHPNAME, $indexType)];
			$this->zip_postal_code = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : ShipperTableMap::translateFieldName('CountryRegion', TableMap::TYPE_PHPNAME, $indexType)];
			$this->country_region = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : ShipperTableMap::translateFieldName('WebPage', TableMap::TYPE_PHPNAME, $indexType)];
			$this->web_page = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : ShipperTableMap::translateFieldName('Notes', TableMap::TYPE_PHPNAME, $indexType)];
			$this->notes = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : ShipperTableMap::translateFieldName('Attachments', TableMap::TYPE_PHPNAME, $indexType)];

			if (null !== $col) {
				$this->attachments = \fopen('php://memory', 'r+');
				\fwrite($this->attachments, $col);
				\rewind($this->attachments);
			} else {
				$this->attachments = null;
			}

			$this->resetModified();
			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 18; // 18 = ShipperTableMap::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException(\sprintf('Error populating %s object', '\\SOB\\Propel2\\Shipper'), 0, $e);
		}
	}

	 /**
	  * Populate the current object from a string, using a given parser format
	  * <code>
	  * $book = new Book();
	  * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
	  * </code>
	  *
	  * You can specify the key type of the array by additionally passing one
	  * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
	  * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
	  * The default key type is the column's TableMap::TYPE_PHPNAME.
	  *
	  * @param mixed $parser A AbstractParser instance,
	  *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
	  * @param string $data The source data to import from
	  * @param string $keyType The type of keys the array uses.
	  *
	  * @return $this The current object, for fluid interface
	  */
	public function importFrom($parser, string $data, string $keyType = TableMap::TYPE_PHPNAME)
	{
		if (! $parser instanceof AbstractParser) {
			$parser = AbstractParser::getParser($parser);
		}

		$this->fromArray($parser->toArray($data), $keyType);

		return $this;
	}

	/**
	 * Has specified column been modified?
	 *
	 * @param string $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
	 * @return bool True if $col has been modified.
	 */
	public function isColumnModified(string $col) : bool
	{
		return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
	}

	/**
	 * Whether this object has been deleted.
	 * @return bool The deleted state of this object.
	 */
	public function isDeleted() : bool
	{
		return $this->deleted;
	}

	/**
	 * Returns whether the object has been modified.
	 *
	 * @return bool True if the object has been modified.
	 */
	public function isModified() : bool
	{
		return (bool)$this->modifiedColumns;
	}

	/**
	 * Returns whether the object has ever been saved.  This will
	 * be false, if the object was retrieved from storage or was created
	 * and then saved.
	 *
	 * @return bool True, if the object has never been persisted.
	 */
	public function isNew() : bool
	{
		return $this->new;
	}

	/**
	 * Returns true if the primary key for this object is null.
	 *
	 */
	public function isPrimaryKeyNull() : bool
	{
		return null === $this->getShipperId();
	}

	/**
	 * Code to be run after deleting the object in database
	 */
	public function postDelete(?ConnectionInterface $con = null) : void
	{
			}

	/**
	 * Code to be run after inserting to database
	 */
	public function postInsert(?ConnectionInterface $con = null) : void
	{
			}

	/**
	 * Code to be run after persisting the object
	 */
	public function postSave(?ConnectionInterface $con = null) : void
	{
			}

	/**
	 * Code to be run after updating the object in database
	 */
	public function postUpdate(?ConnectionInterface $con = null) : void
	{
			}

	/**
	 * Code to be run before deleting the object in database
	 */
	public function preDelete(?ConnectionInterface $con = null) : bool
	{
				return true;
	}

	/**
	 * Code to be run before inserting to database
	 */
	public function preInsert(?ConnectionInterface $con = null) : bool
	{
				return true;
	}

	/**
	 * Code to be run before persisting the object
	 */
	public function preSave(?ConnectionInterface $con = null) : bool
	{
				return true;
	}

	/**
	 * Code to be run before updating the object in database
	 */
	public function preUpdate(?ConnectionInterface $con = null) : bool
	{
				return true;
	}

	/**
	 * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
	 *
	 * This will only work if the object has been saved and has a valid primary key set.
	 *
	 * @param bool $deep (optional) Whether to also de-associated any related objects.
	 * @param ConnectionInterface $con (optional) The ConnectionInterface connection to use.
	 * @throws \Propel\Runtime\Exception\PropelException - if this object is deleted, unsaved or doesn't have pk match in db
	 */
	public function reload(bool $deep = false, ?ConnectionInterface $con = null) : void
	{
		if ($this->isDeleted()) {
			throw new PropelException('Cannot reload a deleted object.');
		}

		if ($this->isNew()) {
			throw new PropelException('Cannot reload an unsaved object.');
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getReadConnection(ShipperTableMap::DATABASE_NAME);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$dataFetcher = ChildShipperQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
		$row = $dataFetcher->fetch();
		$dataFetcher->close();

		if (! $row) {
			throw new PropelException('Cannot find matching row in the database to reload object values.');
		}
		$this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

		if ($deep) {  // also de-associate any related objects?

		} // if (deep)
	}

	/**
	 * Sets the modified state for the object to be false.
	 * @param string $col If supplied, only the specified column is reset.
	 */
	public function resetModified(?string $col = null) : void
	{
		if (null !== $col) {
			unset($this->modifiedColumns[$col]);
		} else {
			$this->modifiedColumns = [];
		}
	}

	/**
	 * Persists this object to the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All modified related objects will also be persisted in the doSave()
	 * method.  This method wraps all precipitate database operations in a
	 * single transaction.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @see doSave()
	 */
	public function save(?ConnectionInterface $con = null) : int
	{
		if ($this->isDeleted()) {
			throw new PropelException('You cannot save an object that has been deleted.');
		}

		if ($this->alreadyInSave) {
			return 0;
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(ShipperTableMap::DATABASE_NAME);
		}

		return $con->transaction(function() use ($con) {
			$ret = $this->preSave($con);
			$isInsert = $this->isNew();

			if ($isInsert) {
				$ret = $ret && $this->preInsert($con);
			} else {
				$ret = $ret && $this->preUpdate($con);
			}

			if ($ret) {
				$affectedRows = $this->doSave($con);

				if ($isInsert) {
					$this->postInsert($con);
				} else {
					$this->postUpdate($con);
				}
				$this->postSave($con);
				ShipperTableMap::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}

			return $affectedRows;
		});
	}

	/**
	 * Set the value of [address] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setAddress($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->address !== $v) {
			$this->address = $v;
			$this->modifiedColumns[ShipperTableMap::COL_ADDRESS] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [attachments] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setAttachments($v)
	{
		// Because BLOB columns are streams in PDO we have to assume that they are
		// always modified when a new value is passed in.  For example, the contents
		// of the stream itself may have changed externally.
		if (! \is_resource($v) && null !== $v) {
			$this->attachments = \fopen('php://memory', 'r+');
			\fwrite($this->attachments, $v);
			\rewind($this->attachments);
		} else { // it's already a stream
			$this->attachments = $v;
		}
		$this->modifiedColumns[ShipperTableMap::COL_ATTACHMENTS] = true;

		return $this;
	}

	/**
	 * Set the value of [business_phone] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setBusinessPhone($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->business_phone !== $v) {
			$this->business_phone = $v;
			$this->modifiedColumns[ShipperTableMap::COL_BUSINESS_PHONE] = true;
		}

		return $this;
	}

	/**
	 * Sets a field from the object by name passed in as a string.
	 *
	 * @param mixed $value field value
	 * @param string $type The type of fieldname the $name is of:
	 *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
	 *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
	 *                Defaults to TableMap::TYPE_PHPNAME.
	 * @return $this
	 */
	public function setByName(string $name, $value, string $type = TableMap::TYPE_PHPNAME)
	{
		$pos = ShipperTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

		$this->setByPosition($pos, $value);

		return $this;
	}

	/**
	 * Sets a field from the object by Position as specified in the xml schema.
	 * Zero-based.
	 *
	 * @param int $pos position in xml schema
	 * @param mixed $value field value
	 * @return $this
	 */
	public function setByPosition(int $pos, $value)
	{
		switch ($pos) {
			case 0:
				$this->setShipperId($value);

				break;

			case 1:
				$this->setCompany($value);

				break;

			case 2:
				$this->setLastName($value);

				break;

			case 3:
				$this->setFirstName($value);

				break;

			case 4:
				$this->setEmailAddress($value);

				break;

			case 5:
				$this->setJobTitle($value);

				break;

			case 6:
				$this->setBusinessPhone($value);

				break;

			case 7:
				$this->setHomePhone($value);

				break;

			case 8:
				$this->setMobilePhone($value);

				break;

			case 9:
				$this->setFaxNumber($value);

				break;

			case 10:
				$this->setAddress($value);

				break;

			case 11:
				$this->setCity($value);

				break;

			case 12:
				$this->setStateProvince($value);

				break;

			case 13:
				$this->setZipPostalCode($value);

				break;

			case 14:
				$this->setCountryRegion($value);

				break;

			case 15:
				$this->setWebPage($value);

				break;

			case 16:
				$this->setNotes($value);

				break;

			case 17:
				$this->setAttachments($value);

				break;
		} // switch()

		return $this;
	}

	/**
	 * Set the value of [city] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setCity($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->city !== $v) {
			$this->city = $v;
			$this->modifiedColumns[ShipperTableMap::COL_CITY] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [company] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setCompany($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->company !== $v) {
			$this->company = $v;
			$this->modifiedColumns[ShipperTableMap::COL_COMPANY] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [country_region] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setCountryRegion($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->country_region !== $v) {
			$this->country_region = $v;
			$this->modifiedColumns[ShipperTableMap::COL_COUNTRY_REGION] = true;
		}

		return $this;
	}

	/**
	 * Specify whether this object has been deleted.
	 * @param bool $b The deleted state of this object.
	 */
	public function setDeleted(bool $b) : void
	{
		$this->deleted = $b;
	}

	/**
	 * Set the value of [email_address] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setEmailAddress($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->email_address !== $v) {
			$this->email_address = $v;
			$this->modifiedColumns[ShipperTableMap::COL_EMAIL_ADDRESS] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [fax_number] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setFaxNumber($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->fax_number !== $v) {
			$this->fax_number = $v;
			$this->modifiedColumns[ShipperTableMap::COL_FAX_NUMBER] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [first_name] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setFirstName($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->first_name !== $v) {
			$this->first_name = $v;
			$this->modifiedColumns[ShipperTableMap::COL_FIRST_NAME] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [home_phone] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setHomePhone($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->home_phone !== $v) {
			$this->home_phone = $v;
			$this->modifiedColumns[ShipperTableMap::COL_HOME_PHONE] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [job_title] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setJobTitle($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->job_title !== $v) {
			$this->job_title = $v;
			$this->modifiedColumns[ShipperTableMap::COL_JOB_TITLE] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [last_name] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setLastName($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->last_name !== $v) {
			$this->last_name = $v;
			$this->modifiedColumns[ShipperTableMap::COL_LAST_NAME] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [mobile_phone] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setMobilePhone($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->mobile_phone !== $v) {
			$this->mobile_phone = $v;
			$this->modifiedColumns[ShipperTableMap::COL_MOBILE_PHONE] = true;
		}

		return $this;
	}

	/**
	 * Setter for the isNew attribute.  This method will be called
	 * by Propel-generated children and objects.
	 *
	 * @param bool $b the state of the object.
	 */
	public function setNew(bool $b) : void
	{
		$this->new = $b;
	}

	/**
	 * Set the value of [notes] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setNotes($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->notes !== $v) {
			$this->notes = $v;
			$this->modifiedColumns[ShipperTableMap::COL_NOTES] = true;
		}

		return $this;
	}

	/**
	 * Generic method to set the primary key (shipper_id column).
	 *
	 * @param int|null $key Primary key.
	 */
	public function setPrimaryKey(?int $key = null) : void
	{
		$this->setShipperId($key);
	}

	/**
	 * Set the value of [shipper_id] column.
	 *
	 * @param int $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setShipperId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->shipper_id !== $v) {
			$this->shipper_id = $v;
			$this->modifiedColumns[ShipperTableMap::COL_SHIPPER_ID] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [state_province] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setStateProvince($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->state_province !== $v) {
			$this->state_province = $v;
			$this->modifiedColumns[ShipperTableMap::COL_STATE_PROVINCE] = true;
		}

		return $this;
	}

	/**
	 * Set the value of a virtual column in this object
	 *
	 * @param string $name The virtual column name
	 * @param mixed $value The value to give to the virtual column
	 *
	 * @return $this The current object, for fluid interface
	 */
	public function setVirtualColumn(string $name, $value)
	{
		$this->virtualColumns[$name] = $value;

		return $this;
	}

	/**
	 * Set the value of [web_page] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setWebPage($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->web_page !== $v) {
			$this->web_page = $v;
			$this->modifiedColumns[ShipperTableMap::COL_WEB_PAGE] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [zip_postal_code] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setZipPostalCode($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->zip_postal_code !== $v) {
			$this->zip_postal_code = $v;
			$this->modifiedColumns[ShipperTableMap::COL_ZIP_POSTAL_CODE] = true;
		}

		return $this;
	}

	/**
	 * Exports the object as an array.
	 *
	 * You can specify the key type of the array by passing one of the class
	 * type constants.
	 *
	 * @param string $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
	 *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
	 *                    Defaults to TableMap::TYPE_PHPNAME.
	 * @param bool $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
	 * @param array $alreadyDumpedObjects List of objects to skip to avoid recursion
	 *
	 * @return array An associative array containing the field names (as keys) and field values
	 */
	public function toArray(string $keyType = TableMap::TYPE_PHPNAME, bool $includeLazyLoadColumns = true, array $alreadyDumpedObjects = []) : array
	{
		if (isset($alreadyDumpedObjects['Shipper'][$this->hashCode()])) {
			return ['*RECURSION*'];
		}
		$alreadyDumpedObjects['Shipper'][$this->hashCode()] = true;
		$keys = ShipperTableMap::getFieldNames($keyType);
		$result = [
			$keys[0] => $this->getShipperId(),
			$keys[1] => $this->getCompany(),
			$keys[2] => $this->getLastName(),
			$keys[3] => $this->getFirstName(),
			$keys[4] => $this->getEmailAddress(),
			$keys[5] => $this->getJobTitle(),
			$keys[6] => $this->getBusinessPhone(),
			$keys[7] => $this->getHomePhone(),
			$keys[8] => $this->getMobilePhone(),
			$keys[9] => $this->getFaxNumber(),
			$keys[10] => $this->getAddress(),
			$keys[11] => $this->getCity(),
			$keys[12] => $this->getStateProvince(),
			$keys[13] => $this->getZipPostalCode(),
			$keys[14] => $this->getCountryRegion(),
			$keys[15] => $this->getWebPage(),
			$keys[16] => $this->getNotes(),
			$keys[17] => $this->getAttachments(),
		];
		$virtualColumns = $this->virtualColumns;

		foreach ($virtualColumns as $key => $virtualColumn) {
			$result[$key] = $virtualColumn;
		}


		return $result;
	}

	/**
	 * Insert the row in the database.
	 *
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 * @see doSave()
	 */
	protected function doInsert(ConnectionInterface $con) : void
	{
		$modifiedColumns = [];
		$index = 0;

		$this->modifiedColumns[ShipperTableMap::COL_SHIPPER_ID] = true;

		if (null !== $this->shipper_id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ShipperTableMap::COL_SHIPPER_ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ShipperTableMap::COL_SHIPPER_ID)) {
			$modifiedColumns[':p' . $index++] = 'shipper_id';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_COMPANY)) {
			$modifiedColumns[':p' . $index++] = 'company';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_LAST_NAME)) {
			$modifiedColumns[':p' . $index++] = 'last_name';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_FIRST_NAME)) {
			$modifiedColumns[':p' . $index++] = 'first_name';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_EMAIL_ADDRESS)) {
			$modifiedColumns[':p' . $index++] = 'email_address';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_JOB_TITLE)) {
			$modifiedColumns[':p' . $index++] = 'job_title';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_BUSINESS_PHONE)) {
			$modifiedColumns[':p' . $index++] = 'business_phone';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_HOME_PHONE)) {
			$modifiedColumns[':p' . $index++] = 'home_phone';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_MOBILE_PHONE)) {
			$modifiedColumns[':p' . $index++] = 'mobile_phone';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_FAX_NUMBER)) {
			$modifiedColumns[':p' . $index++] = 'fax_number';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_ADDRESS)) {
			$modifiedColumns[':p' . $index++] = 'address';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_CITY)) {
			$modifiedColumns[':p' . $index++] = 'city';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_STATE_PROVINCE)) {
			$modifiedColumns[':p' . $index++] = 'state_province';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_ZIP_POSTAL_CODE)) {
			$modifiedColumns[':p' . $index++] = 'zip_postal_code';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_COUNTRY_REGION)) {
			$modifiedColumns[':p' . $index++] = 'country_region';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_WEB_PAGE)) {
			$modifiedColumns[':p' . $index++] = 'web_page';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_NOTES)) {
			$modifiedColumns[':p' . $index++] = 'notes';
		}

		if ($this->isColumnModified(ShipperTableMap::COL_ATTACHMENTS)) {
			$modifiedColumns[':p' . $index++] = 'attachments';
		}

		$sql = \sprintf(
			'INSERT INTO shipper (%s) VALUES (%s)',
			\implode(', ', $modifiedColumns),
			\implode(', ', \array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);

			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case 'shipper_id':
						$stmt->bindValue($identifier, $this->shipper_id, PDO::PARAM_INT);

						break;

					case 'company':
						$stmt->bindValue($identifier, $this->company, PDO::PARAM_STR);

						break;

					case 'last_name':
						$stmt->bindValue($identifier, $this->last_name, PDO::PARAM_STR);

						break;

					case 'first_name':
						$stmt->bindValue($identifier, $this->first_name, PDO::PARAM_STR);

						break;

					case 'email_address':
						$stmt->bindValue($identifier, $this->email_address, PDO::PARAM_STR);

						break;

					case 'job_title':
						$stmt->bindValue($identifier, $this->job_title, PDO::PARAM_STR);

						break;

					case 'business_phone':
						$stmt->bindValue($identifier, $this->business_phone, PDO::PARAM_STR);

						break;

					case 'home_phone':
						$stmt->bindValue($identifier, $this->home_phone, PDO::PARAM_STR);

						break;

					case 'mobile_phone':
						$stmt->bindValue($identifier, $this->mobile_phone, PDO::PARAM_STR);

						break;

					case 'fax_number':
						$stmt->bindValue($identifier, $this->fax_number, PDO::PARAM_STR);

						break;

					case 'address':
						$stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);

						break;

					case 'city':
						$stmt->bindValue($identifier, $this->city, PDO::PARAM_STR);

						break;

					case 'state_province':
						$stmt->bindValue($identifier, $this->state_province, PDO::PARAM_STR);

						break;

					case 'zip_postal_code':
						$stmt->bindValue($identifier, $this->zip_postal_code, PDO::PARAM_STR);

						break;

					case 'country_region':
						$stmt->bindValue($identifier, $this->country_region, PDO::PARAM_STR);

						break;

					case 'web_page':
						$stmt->bindValue($identifier, $this->web_page, PDO::PARAM_STR);

						break;

					case 'notes':
						$stmt->bindValue($identifier, $this->notes, PDO::PARAM_STR);

						break;

					case 'attachments':
						if (\is_resource($this->attachments)) {
							\rewind($this->attachments);
						}
						$stmt->bindValue($identifier, $this->attachments, PDO::PARAM_LOB);

						break;
				}
			}
			$stmt->execute();
		} catch (Exception $e) {
			Propel::log($e->getMessage(), Propel::LOG_ERR);

			throw new PropelException(\sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
		}

		try {
			$pk = $con->lastInsertId();
		} catch (Exception $e) {
			throw new PropelException('Unable to get autoincrement id.', 0, $e);
		}
		$this->setShipperId($pk);

		$this->setNew(false);
	}

	/**
	 * Performs the work of inserting or updating the row in the database.
	 *
	 * If the object is new, it inserts it; otherwise an update is performed.
	 * All related objects are also updated in this method.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 * @return int The number of rows affected by this insert/update and any referring fk objects' save() operations.
	 * @see save()
	 */
	protected function doSave(ConnectionInterface $con) : int
	{
		$affectedRows = 0; // initialize var to track total num of affected rows

		if (! $this->alreadyInSave) {
			$this->alreadyInSave = true;

			if ($this->isNew() || $this->isModified()) {
				// persist changes
				if ($this->isNew()) {
					$this->doInsert($con);
					$affectedRows += 1;
				} else {
					$affectedRows += $this->doUpdate($con);
				}

				// Rewind the attachments LOB column, since PDO does not rewind after inserting value.
				if (null !== $this->attachments && \is_resource($this->attachments)) {
					\rewind($this->attachments);
				}

				$this->resetModified();
			}

			$this->alreadyInSave = false;

		}

		return $affectedRows;
	}

	/**
	 * Update the row in the database.
	 *
	 *
	 * @return int Number of updated rows
	 * @see doSave()
	 */
	protected function doUpdate(ConnectionInterface $con) : int
	{
		$selectCriteria = $this->buildPkeyCriteria();
		$valuesCriteria = $this->buildCriteria();

		return $selectCriteria->doUpdate($valuesCriteria, $con);
	}

	/**
	 * Logs a message using Propel::log().
	 *
	 * @param int $priority One of the Propel::LOG_* logging levels
	 */
	protected function log(string $msg, int $priority = Propel::LOG_INFO) : void
	{
		Propel::log(static::class . ': ' . $msg, $priority);
	}
}
