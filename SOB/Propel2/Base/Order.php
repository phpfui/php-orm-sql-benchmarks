<?php

namespace SOB\Propel2\Base;

use DateTime;
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
use Propel\Runtime\Util\PropelDateTime;
use SOB\Propel2\Map\OrderTableMap;
use SOB\Propel2\OrderQuery as ChildOrderQuery;

/**
 * Base class that represents a row from the 'order' table.
 *
 *
 *
 * @package    propel.generator.SOB.Propel2.Base
 */
abstract class Order implements ActiveRecordInterface
{
	/**
	 * TableMap class name
	 *
	 * @var string
	 */
	public const TABLE_MAP = '\\SOB\\Propel2\\Map\\OrderTableMap';

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 *
	 * @var bool
	 */
	protected $alreadyInSave = false;

	/**
	 * The value for the customer_id field.
	 *
	 * @var        int|null
	 */
	protected $customer_id;

	/**
	 * attribute to determine whether this object has been deleted.
	 * @var bool
	 */
	protected $deleted = false;

	/**
	 * The value for the employee_id field.
	 *
	 * @var        int|null
	 */
	protected $employee_id;

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
	 * The value for the order_date field.
	 *
	 * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
	 * @var        DateTime
	 */
	protected $order_date;

	/**
	 * The value for the order_id field.
	 *
	 * @var        int
	 */
	protected $order_id;

	/**
	 * The value for the order_status_id field.
	 *
	 * Note: this column has a database default value of: 0
	 * @var        int|null
	 */
	protected $order_status_id;

	/**
	 * The value for the order_tax_status_id field.
	 *
	 * @var        int|null
	 */
	protected $order_tax_status_id;

	/**
	 * The value for the paid_date field.
	 *
	 * @var        DateTime|null
	 */
	protected $paid_date;

	/**
	 * The value for the payment_type field.
	 *
	 * @var        string|null
	 */
	protected $payment_type;

	/**
	 * The value for the ship_address field.
	 *
	 * @var        string|null
	 */
	protected $ship_address;

	/**
	 * The value for the ship_city field.
	 *
	 * @var        string|null
	 */
	protected $ship_city;

	/**
	 * The value for the ship_country_region field.
	 *
	 * @var        string|null
	 */
	protected $ship_country_region;

	/**
	 * The value for the ship_name field.
	 *
	 * @var        string|null
	 */
	protected $ship_name;

	/**
	 * The value for the ship_state_province field.
	 *
	 * @var        string|null
	 */
	protected $ship_state_province;

	/**
	 * The value for the ship_zip_postal_code field.
	 *
	 * @var        string|null
	 */
	protected $ship_zip_postal_code;

	/**
	 * The value for the shipped_date field.
	 *
	 * @var        DateTime|null
	 */
	protected $shipped_date;

	/**
	 * The value for the shipper_id field.
	 *
	 * @var        int|null
	 */
	protected $shipper_id;

	/**
	 * The value for the shipping_fee field.
	 *
	 * Note: this column has a database default value of: '0.0000'
	 * @var        string|null
	 */
	protected $shipping_fee;

	/**
	 * The value for the tax_rate field.
	 *
	 * Note: this column has a database default value of: 0.0
	 * @var        float|null
	 */
	protected $tax_rate;

	/**
	 * The value for the taxes field.
	 *
	 * Note: this column has a database default value of: '0.0000'
	 * @var        string|null
	 */
	protected $taxes;

	/**
	 * The (virtual) columns that are added at runtime
	 * The formatters can add supplementary columns based on a resultset
	 * @var array
	 */
	protected $virtualColumns = [];

	/**
	 * Initializes internal state of SOB\Propel2\Base\Order object.
	 * @see applyDefaults()
	 */
	public function __construct()
	{
		$this->applyDefaultValues();
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
		return (string)$this->exportTo(OrderTableMap::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see __construct()
	 */
	public function applyDefaultValues() : void
	{
		$this->shipping_fee = '0.0000';
		$this->taxes = '0.0000';
		$this->tax_rate = 0.0;
		$this->order_status_id = 0;
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria() : Criteria
	{
		$criteria = new Criteria(OrderTableMap::DATABASE_NAME);

		if ($this->isColumnModified(OrderTableMap::COL_ORDER_ID)) {
			$criteria->add(OrderTableMap::COL_ORDER_ID, $this->order_id);
		}

		if ($this->isColumnModified(OrderTableMap::COL_EMPLOYEE_ID)) {
			$criteria->add(OrderTableMap::COL_EMPLOYEE_ID, $this->employee_id);
		}

		if ($this->isColumnModified(OrderTableMap::COL_CUSTOMER_ID)) {
			$criteria->add(OrderTableMap::COL_CUSTOMER_ID, $this->customer_id);
		}

		if ($this->isColumnModified(OrderTableMap::COL_ORDER_DATE)) {
			$criteria->add(OrderTableMap::COL_ORDER_DATE, $this->order_date);
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIPPED_DATE)) {
			$criteria->add(OrderTableMap::COL_SHIPPED_DATE, $this->shipped_date);
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIPPER_ID)) {
			$criteria->add(OrderTableMap::COL_SHIPPER_ID, $this->shipper_id);
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIP_NAME)) {
			$criteria->add(OrderTableMap::COL_SHIP_NAME, $this->ship_name);
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIP_ADDRESS)) {
			$criteria->add(OrderTableMap::COL_SHIP_ADDRESS, $this->ship_address);
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIP_CITY)) {
			$criteria->add(OrderTableMap::COL_SHIP_CITY, $this->ship_city);
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIP_STATE_PROVINCE)) {
			$criteria->add(OrderTableMap::COL_SHIP_STATE_PROVINCE, $this->ship_state_province);
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIP_ZIP_POSTAL_CODE)) {
			$criteria->add(OrderTableMap::COL_SHIP_ZIP_POSTAL_CODE, $this->ship_zip_postal_code);
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIP_COUNTRY_REGION)) {
			$criteria->add(OrderTableMap::COL_SHIP_COUNTRY_REGION, $this->ship_country_region);
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIPPING_FEE)) {
			$criteria->add(OrderTableMap::COL_SHIPPING_FEE, $this->shipping_fee);
		}

		if ($this->isColumnModified(OrderTableMap::COL_TAXES)) {
			$criteria->add(OrderTableMap::COL_TAXES, $this->taxes);
		}

		if ($this->isColumnModified(OrderTableMap::COL_PAYMENT_TYPE)) {
			$criteria->add(OrderTableMap::COL_PAYMENT_TYPE, $this->payment_type);
		}

		if ($this->isColumnModified(OrderTableMap::COL_PAID_DATE)) {
			$criteria->add(OrderTableMap::COL_PAID_DATE, $this->paid_date);
		}

		if ($this->isColumnModified(OrderTableMap::COL_NOTES)) {
			$criteria->add(OrderTableMap::COL_NOTES, $this->notes);
		}

		if ($this->isColumnModified(OrderTableMap::COL_TAX_RATE)) {
			$criteria->add(OrderTableMap::COL_TAX_RATE, $this->tax_rate);
		}

		if ($this->isColumnModified(OrderTableMap::COL_ORDER_TAX_STATUS_ID)) {
			$criteria->add(OrderTableMap::COL_ORDER_TAX_STATUS_ID, $this->order_tax_status_id);
		}

		if ($this->isColumnModified(OrderTableMap::COL_ORDER_STATUS_ID)) {
			$criteria->add(OrderTableMap::COL_ORDER_STATUS_ID, $this->order_status_id);
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
		$criteria = ChildOrderQuery::create();
		$criteria->add(OrderTableMap::COL_ORDER_ID, $this->order_id);

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
		$this->order_id = null;
		$this->employee_id = null;
		$this->customer_id = null;
		$this->order_date = null;
		$this->shipped_date = null;
		$this->shipper_id = null;
		$this->ship_name = null;
		$this->ship_address = null;
		$this->ship_city = null;
		$this->ship_state_province = null;
		$this->ship_zip_postal_code = null;
		$this->ship_country_region = null;
		$this->shipping_fee = null;
		$this->taxes = null;
		$this->payment_type = null;
		$this->paid_date = null;
		$this->notes = null;
		$this->tax_rate = null;
		$this->order_tax_status_id = null;
		$this->order_status_id = null;
		$this->alreadyInSave = false;
		$this->clearAllReferences();
		$this->applyDefaultValues();
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
	 * @return \SOB\Propel2\Order Clone of current object.
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
	 * @param object $copyObj An object of \SOB\Propel2\Order (or compatible) type.
	 * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true) : void
	{
		$copyObj->setEmployeeId($this->getEmployeeId());
		$copyObj->setCustomerId($this->getCustomerId());
		$copyObj->setOrderDate($this->getOrderDate());
		$copyObj->setShippedDate($this->getShippedDate());
		$copyObj->setShipperId($this->getShipperId());
		$copyObj->setShipName($this->getShipName());
		$copyObj->setShipAddress($this->getShipAddress());
		$copyObj->setShipCity($this->getShipCity());
		$copyObj->setShipStateProvince($this->getShipStateProvince());
		$copyObj->setShipZipPostalCode($this->getShipZipPostalCode());
		$copyObj->setShipCountryRegion($this->getShipCountryRegion());
		$copyObj->setShippingFee($this->getShippingFee());
		$copyObj->setTaxes($this->getTaxes());
		$copyObj->setPaymentType($this->getPaymentType());
		$copyObj->setPaidDate($this->getPaidDate());
		$copyObj->setNotes($this->getNotes());
		$copyObj->setTaxRate($this->getTaxRate());
		$copyObj->setOrderTaxStatusId($this->getOrderTaxStatusId());
		$copyObj->setOrderStatusId($this->getOrderStatusId());

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setOrderId(null); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 * @see Order::setDeleted()
	 * @see Order::isDeleted()
	 */
	public function delete(?ConnectionInterface $con = null) : void
	{
		if ($this->isDeleted()) {
			throw new PropelException('This object has already been deleted.');
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(OrderTableMap::DATABASE_NAME);
		}

		$con->transaction(function() use ($con) : void {
			$deleteQuery = ChildOrderQuery::create()
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
	 * Compares this with another <code>Order</code> instance.  If
	 * <code>obj</code> is an instance of <code>Order</code>, delegates to
	 * <code>equals(Order)</code>.  Otherwise, returns <code>false</code>.
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
		$keys = OrderTableMap::getFieldNames($keyType);

		if (\array_key_exists($keys[0], $arr)) {
			$this->setOrderId($arr[$keys[0]]);
		}

		if (\array_key_exists($keys[1], $arr)) {
			$this->setEmployeeId($arr[$keys[1]]);
		}

		if (\array_key_exists($keys[2], $arr)) {
			$this->setCustomerId($arr[$keys[2]]);
		}

		if (\array_key_exists($keys[3], $arr)) {
			$this->setOrderDate($arr[$keys[3]]);
		}

		if (\array_key_exists($keys[4], $arr)) {
			$this->setShippedDate($arr[$keys[4]]);
		}

		if (\array_key_exists($keys[5], $arr)) {
			$this->setShipperId($arr[$keys[5]]);
		}

		if (\array_key_exists($keys[6], $arr)) {
			$this->setShipName($arr[$keys[6]]);
		}

		if (\array_key_exists($keys[7], $arr)) {
			$this->setShipAddress($arr[$keys[7]]);
		}

		if (\array_key_exists($keys[8], $arr)) {
			$this->setShipCity($arr[$keys[8]]);
		}

		if (\array_key_exists($keys[9], $arr)) {
			$this->setShipStateProvince($arr[$keys[9]]);
		}

		if (\array_key_exists($keys[10], $arr)) {
			$this->setShipZipPostalCode($arr[$keys[10]]);
		}

		if (\array_key_exists($keys[11], $arr)) {
			$this->setShipCountryRegion($arr[$keys[11]]);
		}

		if (\array_key_exists($keys[12], $arr)) {
			$this->setShippingFee($arr[$keys[12]]);
		}

		if (\array_key_exists($keys[13], $arr)) {
			$this->setTaxes($arr[$keys[13]]);
		}

		if (\array_key_exists($keys[14], $arr)) {
			$this->setPaymentType($arr[$keys[14]]);
		}

		if (\array_key_exists($keys[15], $arr)) {
			$this->setPaidDate($arr[$keys[15]]);
		}

		if (\array_key_exists($keys[16], $arr)) {
			$this->setNotes($arr[$keys[16]]);
		}

		if (\array_key_exists($keys[17], $arr)) {
			$this->setTaxRate($arr[$keys[17]]);
		}

		if (\array_key_exists($keys[18], $arr)) {
			$this->setOrderTaxStatusId($arr[$keys[18]]);
		}

		if (\array_key_exists($keys[19], $arr)) {
			$this->setOrderStatusId($arr[$keys[19]]);
		}

		return $this;
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
		$pos = OrderTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
				return $this->getOrderId();

			case 1:
				return $this->getEmployeeId();

			case 2:
				return $this->getCustomerId();

			case 3:
				return $this->getOrderDate();

			case 4:
				return $this->getShippedDate();

			case 5:
				return $this->getShipperId();

			case 6:
				return $this->getShipName();

			case 7:
				return $this->getShipAddress();

			case 8:
				return $this->getShipCity();

			case 9:
				return $this->getShipStateProvince();

			case 10:
				return $this->getShipZipPostalCode();

			case 11:
				return $this->getShipCountryRegion();

			case 12:
				return $this->getShippingFee();

			case 13:
				return $this->getTaxes();

			case 14:
				return $this->getPaymentType();

			case 15:
				return $this->getPaidDate();

			case 16:
				return $this->getNotes();

			case 17:
				return $this->getTaxRate();

			case 18:
				return $this->getOrderTaxStatusId();

			case 19:
				return $this->getOrderStatusId();

			default:
				return;
		} // switch()
	}

	/**
	 * Get the [customer_id] column value.
	 *
	 * @return int|null
	 */
	public function getCustomerId()
	{
		return $this->customer_id;
	}

	/**
	 * Get the [employee_id] column value.
	 *
	 * @return int|null
	 */
	public function getEmployeeId()
	{
		return $this->employee_id;
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
	 * Get the [optionally formatted] temporal [order_date] column value.
	 *
	 *
	 * @param string|null $format The date/time format string (either date()-style or strftime()-style).
	 *   If format is NULL, then the raw DateTime object will be returned.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException - if unable to parse/validate the date/time value.
	 * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), and 0 if column value is 0000-00-00 00:00:00.
	 *
	 *
	 * @psalm-return ($format is null ? DateTime : string)
	 */
	public function getOrderDate($format = null)
	{
		if (null === $format) {
			return $this->order_date;
		}

			return $this->order_date instanceof \DateTimeInterface ? $this->order_date->format($format) : null;

	}

	/**
	 * Get the [order_id] column value.
	 *
	 * @return int
	 */
	public function getOrderId()
	{
		return $this->order_id;
	}

	/**
	 * Get the [order_status_id] column value.
	 *
	 * @return int|null
	 */
	public function getOrderStatusId()
	{
		return $this->order_status_id;
	}

	/**
	 * Get the [order_tax_status_id] column value.
	 *
	 * @return int|null
	 */
	public function getOrderTaxStatusId()
	{
		return $this->order_tax_status_id;
	}

	/**
	 * Get the [optionally formatted] temporal [paid_date] column value.
	 *
	 *
	 * @param string|null $format The date/time format string (either date()-style or strftime()-style).
	 *   If format is NULL, then the raw DateTime object will be returned.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException - if unable to parse/validate the date/time value.
	 * @return string|DateTime|null Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00.
	 *
	 *
	 * @psalm-return ($format is null ? DateTime|null : string|null)
	 */
	public function getPaidDate($format = null)
	{
		if (null === $format) {
			return $this->paid_date;
		}

			return $this->paid_date instanceof \DateTimeInterface ? $this->paid_date->format($format) : null;

	}

	/**
	 * Get the [payment_type] column value.
	 *
	 * @return string|null
	 */
	public function getPaymentType()
	{
		return $this->payment_type;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return int
	 */
	public function getPrimaryKey()
	{
		return $this->getOrderId();
	}

	/**
	 * Get the [ship_address] column value.
	 *
	 * @return string|null
	 */
	public function getShipAddress()
	{
		return $this->ship_address;
	}

	/**
	 * Get the [ship_city] column value.
	 *
	 * @return string|null
	 */
	public function getShipCity()
	{
		return $this->ship_city;
	}

	/**
	 * Get the [ship_country_region] column value.
	 *
	 * @return string|null
	 */
	public function getShipCountryRegion()
	{
		return $this->ship_country_region;
	}

	/**
	 * Get the [ship_name] column value.
	 *
	 * @return string|null
	 */
	public function getShipName()
	{
		return $this->ship_name;
	}

	/**
	 * Get the [optionally formatted] temporal [shipped_date] column value.
	 *
	 *
	 * @param string|null $format The date/time format string (either date()-style or strftime()-style).
	 *   If format is NULL, then the raw DateTime object will be returned.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException - if unable to parse/validate the date/time value.
	 * @return string|DateTime|null Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00.
	 *
	 *
	 * @psalm-return ($format is null ? DateTime|null : string|null)
	 */
	public function getShippedDate($format = null)
	{
		if (null === $format) {
			return $this->shipped_date;
		}

			return $this->shipped_date instanceof \DateTimeInterface ? $this->shipped_date->format($format) : null;

	}

	/**
	 * Get the [shipper_id] column value.
	 *
	 * @return int|null
	 */
	public function getShipperId()
	{
		return $this->shipper_id;
	}

	/**
	 * Get the [shipping_fee] column value.
	 *
	 * @return string|null
	 */
	public function getShippingFee()
	{
		return $this->shipping_fee;
	}

	/**
	 * Get the [ship_state_province] column value.
	 *
	 * @return string|null
	 */
	public function getShipStateProvince()
	{
		return $this->ship_state_province;
	}

	/**
	 * Get the [ship_zip_postal_code] column value.
	 *
	 * @return string|null
	 */
	public function getShipZipPostalCode()
	{
		return $this->ship_zip_postal_code;
	}

	/**
	 * Get the [taxes] column value.
	 *
	 * @return string|null
	 */
	public function getTaxes()
	{
		return $this->taxes;
	}

	/**
	 * Get the [tax_rate] column value.
	 *
	 * @return float|null
	 */
	public function getTaxRate()
	{
		return $this->tax_rate;
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
	 * If the primary key is not null, return the hashcode of the
	 * primary key. Otherwise, return the hash code of the object.
	 *
	 * @return int|string Hashcode
	 */
	public function hashCode()
	{
		$validPk = null !== $this->getOrderId();

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
			if ('0.0000' !== $this->shipping_fee) {
				return false;
			}

			if ('0.0000' !== $this->taxes) {
				return false;
			}

			if (0.0 !== $this->tax_rate) {
				return false;
			}

			return ! (0 !== $this->order_status_id);



		// otherwise, everything was equal, so return TRUE
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

			$col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : OrderTableMap::translateFieldName('OrderId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->order_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : OrderTableMap::translateFieldName('EmployeeId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->employee_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : OrderTableMap::translateFieldName('CustomerId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->customer_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : OrderTableMap::translateFieldName('OrderDate', TableMap::TYPE_PHPNAME, $indexType)];

			if ('0000-00-00 00:00:00' === $col) {
				$col = null;
			}
			$this->order_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : OrderTableMap::translateFieldName('ShippedDate', TableMap::TYPE_PHPNAME, $indexType)];

			if ('0000-00-00 00:00:00' === $col) {
				$col = null;
			}
			$this->shipped_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : OrderTableMap::translateFieldName('ShipperId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->shipper_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : OrderTableMap::translateFieldName('ShipName', TableMap::TYPE_PHPNAME, $indexType)];
			$this->ship_name = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : OrderTableMap::translateFieldName('ShipAddress', TableMap::TYPE_PHPNAME, $indexType)];
			$this->ship_address = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : OrderTableMap::translateFieldName('ShipCity', TableMap::TYPE_PHPNAME, $indexType)];
			$this->ship_city = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : OrderTableMap::translateFieldName('ShipStateProvince', TableMap::TYPE_PHPNAME, $indexType)];
			$this->ship_state_province = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : OrderTableMap::translateFieldName('ShipZipPostalCode', TableMap::TYPE_PHPNAME, $indexType)];
			$this->ship_zip_postal_code = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : OrderTableMap::translateFieldName('ShipCountryRegion', TableMap::TYPE_PHPNAME, $indexType)];
			$this->ship_country_region = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : OrderTableMap::translateFieldName('ShippingFee', TableMap::TYPE_PHPNAME, $indexType)];
			$this->shipping_fee = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : OrderTableMap::translateFieldName('Taxes', TableMap::TYPE_PHPNAME, $indexType)];
			$this->taxes = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : OrderTableMap::translateFieldName('PaymentType', TableMap::TYPE_PHPNAME, $indexType)];
			$this->payment_type = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : OrderTableMap::translateFieldName('PaidDate', TableMap::TYPE_PHPNAME, $indexType)];

			if ('0000-00-00 00:00:00' === $col) {
				$col = null;
			}
			$this->paid_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 16 + $startcol : OrderTableMap::translateFieldName('Notes', TableMap::TYPE_PHPNAME, $indexType)];
			$this->notes = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 17 + $startcol : OrderTableMap::translateFieldName('TaxRate', TableMap::TYPE_PHPNAME, $indexType)];
			$this->tax_rate = (null !== $col) ? (float)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 18 + $startcol : OrderTableMap::translateFieldName('OrderTaxStatusId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->order_tax_status_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 19 + $startcol : OrderTableMap::translateFieldName('OrderStatusId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->order_status_id = (null !== $col) ? (int)$col : null;

			$this->resetModified();
			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 20; // 20 = OrderTableMap::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException(\sprintf('Error populating %s object', '\\SOB\\Propel2\\Order'), 0, $e);
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
		return null === $this->getOrderId();
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
			$con = Propel::getServiceContainer()->getReadConnection(OrderTableMap::DATABASE_NAME);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$dataFetcher = ChildOrderQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
			$con = Propel::getServiceContainer()->getWriteConnection(OrderTableMap::DATABASE_NAME);
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
				OrderTableMap::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}

			return $affectedRows;
		});
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
		$pos = OrderTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

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
				$this->setOrderId($value);

				break;

			case 1:
				$this->setEmployeeId($value);

				break;

			case 2:
				$this->setCustomerId($value);

				break;

			case 3:
				$this->setOrderDate($value);

				break;

			case 4:
				$this->setShippedDate($value);

				break;

			case 5:
				$this->setShipperId($value);

				break;

			case 6:
				$this->setShipName($value);

				break;

			case 7:
				$this->setShipAddress($value);

				break;

			case 8:
				$this->setShipCity($value);

				break;

			case 9:
				$this->setShipStateProvince($value);

				break;

			case 10:
				$this->setShipZipPostalCode($value);

				break;

			case 11:
				$this->setShipCountryRegion($value);

				break;

			case 12:
				$this->setShippingFee($value);

				break;

			case 13:
				$this->setTaxes($value);

				break;

			case 14:
				$this->setPaymentType($value);

				break;

			case 15:
				$this->setPaidDate($value);

				break;

			case 16:
				$this->setNotes($value);

				break;

			case 17:
				$this->setTaxRate($value);

				break;

			case 18:
				$this->setOrderTaxStatusId($value);

				break;

			case 19:
				$this->setOrderStatusId($value);

				break;
		} // switch()

		return $this;
	}

	/**
	 * Set the value of [customer_id] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setCustomerId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->customer_id !== $v) {
			$this->customer_id = $v;
			$this->modifiedColumns[OrderTableMap::COL_CUSTOMER_ID] = true;
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
	 * Set the value of [employee_id] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setEmployeeId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->employee_id !== $v) {
			$this->employee_id = $v;
			$this->modifiedColumns[OrderTableMap::COL_EMPLOYEE_ID] = true;
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
			$this->modifiedColumns[OrderTableMap::COL_NOTES] = true;
		}

		return $this;
	}

	/**
	 * Sets the value of [order_date] column to a normalized version of the date/time value specified.
	 *
	 * @param string|int|\DateTimeInterface $v string, integer (timestamp), or \DateTimeInterface value.
	 *               Empty strings are treated as NULL.
	 * @return $this The current object (for fluent API support)
	 */
	public function setOrderDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');

		if (null !== $this->order_date || null !== $dt) {
			if (null === $this->order_date || null === $dt || $dt->format('Y-m-d H:i:s.u') !== $this->order_date->format('Y-m-d H:i:s.u')) {
				$this->order_date = null === $dt ? null : clone $dt;
				$this->modifiedColumns[OrderTableMap::COL_ORDER_DATE] = true;
			}
		} // if either are not null

		return $this;
	}

	/**
	 * Set the value of [order_id] column.
	 *
	 * @param int $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setOrderId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->order_id !== $v) {
			$this->order_id = $v;
			$this->modifiedColumns[OrderTableMap::COL_ORDER_ID] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [order_status_id] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setOrderStatusId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->order_status_id !== $v) {
			$this->order_status_id = $v;
			$this->modifiedColumns[OrderTableMap::COL_ORDER_STATUS_ID] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [order_tax_status_id] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setOrderTaxStatusId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->order_tax_status_id !== $v) {
			$this->order_tax_status_id = $v;
			$this->modifiedColumns[OrderTableMap::COL_ORDER_TAX_STATUS_ID] = true;
		}

		return $this;
	}

	/**
	 * Sets the value of [paid_date] column to a normalized version of the date/time value specified.
	 *
	 * @param string|int|\DateTimeInterface|null $v string, integer (timestamp), or \DateTimeInterface value.
	 *               Empty strings are treated as NULL.
	 * @return $this The current object (for fluent API support)
	 */
	public function setPaidDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');

		if (null !== $this->paid_date || null !== $dt) {
			if (null === $this->paid_date || null === $dt || $dt->format('Y-m-d H:i:s.u') !== $this->paid_date->format('Y-m-d H:i:s.u')) {
				$this->paid_date = null === $dt ? null : clone $dt;
				$this->modifiedColumns[OrderTableMap::COL_PAID_DATE] = true;
			}
		} // if either are not null

		return $this;
	}

	/**
	 * Set the value of [payment_type] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setPaymentType($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->payment_type !== $v) {
			$this->payment_type = $v;
			$this->modifiedColumns[OrderTableMap::COL_PAYMENT_TYPE] = true;
		}

		return $this;
	}

	/**
	 * Generic method to set the primary key (order_id column).
	 *
	 * @param int|null $key Primary key.
	 */
	public function setPrimaryKey(?int $key = null) : void
	{
		$this->setOrderId($key);
	}

	/**
	 * Set the value of [ship_address] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setShipAddress($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->ship_address !== $v) {
			$this->ship_address = $v;
			$this->modifiedColumns[OrderTableMap::COL_SHIP_ADDRESS] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [ship_city] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setShipCity($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->ship_city !== $v) {
			$this->ship_city = $v;
			$this->modifiedColumns[OrderTableMap::COL_SHIP_CITY] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [ship_country_region] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setShipCountryRegion($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->ship_country_region !== $v) {
			$this->ship_country_region = $v;
			$this->modifiedColumns[OrderTableMap::COL_SHIP_COUNTRY_REGION] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [ship_name] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setShipName($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->ship_name !== $v) {
			$this->ship_name = $v;
			$this->modifiedColumns[OrderTableMap::COL_SHIP_NAME] = true;
		}

		return $this;
	}

	/**
	 * Sets the value of [shipped_date] column to a normalized version of the date/time value specified.
	 *
	 * @param string|int|\DateTimeInterface|null $v string, integer (timestamp), or \DateTimeInterface value.
	 *               Empty strings are treated as NULL.
	 * @return $this The current object (for fluent API support)
	 */
	public function setShippedDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');

		if (null !== $this->shipped_date || null !== $dt) {
			if (null === $this->shipped_date || null === $dt || $dt->format('Y-m-d H:i:s.u') !== $this->shipped_date->format('Y-m-d H:i:s.u')) {
				$this->shipped_date = null === $dt ? null : clone $dt;
				$this->modifiedColumns[OrderTableMap::COL_SHIPPED_DATE] = true;
			}
		} // if either are not null

		return $this;
	}

	/**
	 * Set the value of [shipper_id] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setShipperId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->shipper_id !== $v) {
			$this->shipper_id = $v;
			$this->modifiedColumns[OrderTableMap::COL_SHIPPER_ID] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [shipping_fee] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setShippingFee($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->shipping_fee !== $v) {
			$this->shipping_fee = $v;
			$this->modifiedColumns[OrderTableMap::COL_SHIPPING_FEE] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [ship_state_province] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setShipStateProvince($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->ship_state_province !== $v) {
			$this->ship_state_province = $v;
			$this->modifiedColumns[OrderTableMap::COL_SHIP_STATE_PROVINCE] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [ship_zip_postal_code] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setShipZipPostalCode($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->ship_zip_postal_code !== $v) {
			$this->ship_zip_postal_code = $v;
			$this->modifiedColumns[OrderTableMap::COL_SHIP_ZIP_POSTAL_CODE] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [taxes] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setTaxes($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->taxes !== $v) {
			$this->taxes = $v;
			$this->modifiedColumns[OrderTableMap::COL_TAXES] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [tax_rate] column.
	 *
	 * @param float|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setTaxRate($v)
	{
		if (null !== $v) {
			$v = (float)$v;
		}

		if ($this->tax_rate !== $v) {
			$this->tax_rate = $v;
			$this->modifiedColumns[OrderTableMap::COL_TAX_RATE] = true;
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
		if (isset($alreadyDumpedObjects['Order'][$this->hashCode()])) {
			return ['*RECURSION*'];
		}
		$alreadyDumpedObjects['Order'][$this->hashCode()] = true;
		$keys = OrderTableMap::getFieldNames($keyType);
		$result = [
			$keys[0] => $this->getOrderId(),
			$keys[1] => $this->getEmployeeId(),
			$keys[2] => $this->getCustomerId(),
			$keys[3] => $this->getOrderDate(),
			$keys[4] => $this->getShippedDate(),
			$keys[5] => $this->getShipperId(),
			$keys[6] => $this->getShipName(),
			$keys[7] => $this->getShipAddress(),
			$keys[8] => $this->getShipCity(),
			$keys[9] => $this->getShipStateProvince(),
			$keys[10] => $this->getShipZipPostalCode(),
			$keys[11] => $this->getShipCountryRegion(),
			$keys[12] => $this->getShippingFee(),
			$keys[13] => $this->getTaxes(),
			$keys[14] => $this->getPaymentType(),
			$keys[15] => $this->getPaidDate(),
			$keys[16] => $this->getNotes(),
			$keys[17] => $this->getTaxRate(),
			$keys[18] => $this->getOrderTaxStatusId(),
			$keys[19] => $this->getOrderStatusId(),
		];

		if ($result[$keys[3]] instanceof \DateTimeInterface) {
			$result[$keys[3]] = $result[$keys[3]]->format('Y-m-d H:i:s.u');
		}

		if ($result[$keys[4]] instanceof \DateTimeInterface) {
			$result[$keys[4]] = $result[$keys[4]]->format('Y-m-d H:i:s.u');
		}

		if ($result[$keys[15]] instanceof \DateTimeInterface) {
			$result[$keys[15]] = $result[$keys[15]]->format('Y-m-d H:i:s.u');
		}

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

		$this->modifiedColumns[OrderTableMap::COL_ORDER_ID] = true;

		if (null !== $this->order_id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . OrderTableMap::COL_ORDER_ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(OrderTableMap::COL_ORDER_ID)) {
			$modifiedColumns[':p' . $index++] = 'order_id';
		}

		if ($this->isColumnModified(OrderTableMap::COL_EMPLOYEE_ID)) {
			$modifiedColumns[':p' . $index++] = 'employee_id';
		}

		if ($this->isColumnModified(OrderTableMap::COL_CUSTOMER_ID)) {
			$modifiedColumns[':p' . $index++] = 'customer_id';
		}

		if ($this->isColumnModified(OrderTableMap::COL_ORDER_DATE)) {
			$modifiedColumns[':p' . $index++] = 'order_date';
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIPPED_DATE)) {
			$modifiedColumns[':p' . $index++] = 'shipped_date';
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIPPER_ID)) {
			$modifiedColumns[':p' . $index++] = 'shipper_id';
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIP_NAME)) {
			$modifiedColumns[':p' . $index++] = 'ship_name';
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIP_ADDRESS)) {
			$modifiedColumns[':p' . $index++] = 'ship_address';
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIP_CITY)) {
			$modifiedColumns[':p' . $index++] = 'ship_city';
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIP_STATE_PROVINCE)) {
			$modifiedColumns[':p' . $index++] = 'ship_state_province';
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIP_ZIP_POSTAL_CODE)) {
			$modifiedColumns[':p' . $index++] = 'ship_zip_postal_code';
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIP_COUNTRY_REGION)) {
			$modifiedColumns[':p' . $index++] = 'ship_country_region';
		}

		if ($this->isColumnModified(OrderTableMap::COL_SHIPPING_FEE)) {
			$modifiedColumns[':p' . $index++] = 'shipping_fee';
		}

		if ($this->isColumnModified(OrderTableMap::COL_TAXES)) {
			$modifiedColumns[':p' . $index++] = 'taxes';
		}

		if ($this->isColumnModified(OrderTableMap::COL_PAYMENT_TYPE)) {
			$modifiedColumns[':p' . $index++] = 'payment_type';
		}

		if ($this->isColumnModified(OrderTableMap::COL_PAID_DATE)) {
			$modifiedColumns[':p' . $index++] = 'paid_date';
		}

		if ($this->isColumnModified(OrderTableMap::COL_NOTES)) {
			$modifiedColumns[':p' . $index++] = 'notes';
		}

		if ($this->isColumnModified(OrderTableMap::COL_TAX_RATE)) {
			$modifiedColumns[':p' . $index++] = 'tax_rate';
		}

		if ($this->isColumnModified(OrderTableMap::COL_ORDER_TAX_STATUS_ID)) {
			$modifiedColumns[':p' . $index++] = 'order_tax_status_id';
		}

		if ($this->isColumnModified(OrderTableMap::COL_ORDER_STATUS_ID)) {
			$modifiedColumns[':p' . $index++] = 'order_status_id';
		}

		$sql = \sprintf(
			'INSERT INTO order (%s) VALUES (%s)',
			\implode(', ', $modifiedColumns),
			\implode(', ', \array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);

			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case 'order_id':
						$stmt->bindValue($identifier, $this->order_id, PDO::PARAM_INT);

						break;

					case 'employee_id':
						$stmt->bindValue($identifier, $this->employee_id, PDO::PARAM_INT);

						break;

					case 'customer_id':
						$stmt->bindValue($identifier, $this->customer_id, PDO::PARAM_INT);

						break;

					case 'order_date':
						$stmt->bindValue($identifier, $this->order_date ? $this->order_date->format('Y-m-d H:i:s.u') : null, PDO::PARAM_STR);

						break;

					case 'shipped_date':
						$stmt->bindValue($identifier, $this->shipped_date ? $this->shipped_date->format('Y-m-d H:i:s.u') : null, PDO::PARAM_STR);

						break;

					case 'shipper_id':
						$stmt->bindValue($identifier, $this->shipper_id, PDO::PARAM_INT);

						break;

					case 'ship_name':
						$stmt->bindValue($identifier, $this->ship_name, PDO::PARAM_STR);

						break;

					case 'ship_address':
						$stmt->bindValue($identifier, $this->ship_address, PDO::PARAM_STR);

						break;

					case 'ship_city':
						$stmt->bindValue($identifier, $this->ship_city, PDO::PARAM_STR);

						break;

					case 'ship_state_province':
						$stmt->bindValue($identifier, $this->ship_state_province, PDO::PARAM_STR);

						break;

					case 'ship_zip_postal_code':
						$stmt->bindValue($identifier, $this->ship_zip_postal_code, PDO::PARAM_STR);

						break;

					case 'ship_country_region':
						$stmt->bindValue($identifier, $this->ship_country_region, PDO::PARAM_STR);

						break;

					case 'shipping_fee':
						$stmt->bindValue($identifier, $this->shipping_fee, PDO::PARAM_STR);

						break;

					case 'taxes':
						$stmt->bindValue($identifier, $this->taxes, PDO::PARAM_STR);

						break;

					case 'payment_type':
						$stmt->bindValue($identifier, $this->payment_type, PDO::PARAM_STR);

						break;

					case 'paid_date':
						$stmt->bindValue($identifier, $this->paid_date ? $this->paid_date->format('Y-m-d H:i:s.u') : null, PDO::PARAM_STR);

						break;

					case 'notes':
						$stmt->bindValue($identifier, $this->notes, PDO::PARAM_STR);

						break;

					case 'tax_rate':
						$stmt->bindValue($identifier, $this->tax_rate, PDO::PARAM_STR);

						break;

					case 'order_tax_status_id':
						$stmt->bindValue($identifier, $this->order_tax_status_id, PDO::PARAM_INT);

						break;

					case 'order_status_id':
						$stmt->bindValue($identifier, $this->order_status_id, PDO::PARAM_INT);

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
		$this->setOrderId($pk);

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
