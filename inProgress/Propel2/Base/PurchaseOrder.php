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
use SOB\Propel2\Map\PurchaseOrderTableMap;
use SOB\Propel2\PurchaseOrderQuery as ChildPurchaseOrderQuery;

/**
 * Base class that represents a row from the 'purchase_order' table.
 *
 *
 *
 * @package    propel.generator.SOB.Propel2.Base
 */
abstract class PurchaseOrder implements ActiveRecordInterface
{
	/**
	 * TableMap class name
	 *
	 * @var string
	 */
	public const TABLE_MAP = '\\SOB\\Propel2\\Map\\PurchaseOrderTableMap';

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 *
	 * @var bool
	 */
	protected $alreadyInSave = false;

	/**
	 * The value for the approved_by field.
	 *
	 * @var        int|null
	 */
	protected $approved_by;

	/**
	 * The value for the approved_date field.
	 *
	 * @var        DateTime|null
	 */
	protected $approved_date;

	/**
	 * The value for the created_by field.
	 *
	 * @var        int|null
	 */
	protected $created_by;

	/**
	 * The value for the creation_date field.
	 *
	 * Note: this column has a database default value of: (expression) CURRENT_TIMESTAMP
	 * @var        DateTime
	 */
	protected $creation_date;

	/**
	 * attribute to determine whether this object has been deleted.
	 * @var bool
	 */
	protected $deleted = false;

	/**
	 * The value for the expected_date field.
	 *
	 * @var        DateTime|null
	 */
	protected $expected_date;

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
	 * The value for the payment_amount field.
	 *
	 * Note: this column has a database default value of: '0.0000'
	 * @var        string|null
	 */
	protected $payment_amount;

	/**
	 * The value for the payment_date field.
	 *
	 * @var        DateTime|null
	 */
	protected $payment_date;

	/**
	 * The value for the payment_method field.
	 *
	 * @var        string|null
	 */
	protected $payment_method;

	/**
	 * The value for the purchase_order_id field.
	 *
	 * @var        int
	 */
	protected $purchase_order_id;

	/**
	 * The value for the purchase_order_status_id field.
	 *
	 * Note: this column has a database default value of: 0
	 * @var        int|null
	 */
	protected $purchase_order_status_id;

	/**
	 * The value for the shipping_fee field.
	 *
	 * Note: this column has a database default value of: '0.0000'
	 * @var        string
	 */
	protected $shipping_fee;

	/**
	 * The value for the submitted_by field.
	 *
	 * @var        int|null
	 */
	protected $submitted_by;

	/**
	 * The value for the submitted_date field.
	 *
	 * @var        DateTime|null
	 */
	protected $submitted_date;

	/**
	 * The value for the supplier_id field.
	 *
	 * @var        int|null
	 */
	protected $supplier_id;

	/**
	 * The value for the taxes field.
	 *
	 * Note: this column has a database default value of: '0.0000'
	 * @var        string
	 */
	protected $taxes;

	/**
	 * The (virtual) columns that are added at runtime
	 * The formatters can add supplementary columns based on a resultset
	 * @var array
	 */
	protected $virtualColumns = [];

	/**
	 * Initializes internal state of SOB\Propel2\Base\PurchaseOrder object.
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
		return (string)$this->exportTo(PurchaseOrderTableMap::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see __construct()
	 */
	public function applyDefaultValues() : void
	{
		$this->purchase_order_status_id = 0;
		$this->shipping_fee = '0.0000';
		$this->taxes = '0.0000';
		$this->payment_amount = '0.0000';
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria() : Criteria
	{
		$criteria = new Criteria(PurchaseOrderTableMap::DATABASE_NAME);

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID)) {
			$criteria->add(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID, $this->purchase_order_id);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_SUPPLIER_ID)) {
			$criteria->add(PurchaseOrderTableMap::COL_SUPPLIER_ID, $this->supplier_id);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_CREATED_BY)) {
			$criteria->add(PurchaseOrderTableMap::COL_CREATED_BY, $this->created_by);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_SUBMITTED_DATE)) {
			$criteria->add(PurchaseOrderTableMap::COL_SUBMITTED_DATE, $this->submitted_date);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_CREATION_DATE)) {
			$criteria->add(PurchaseOrderTableMap::COL_CREATION_DATE, $this->creation_date);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_PURCHASE_ORDER_STATUS_ID)) {
			$criteria->add(PurchaseOrderTableMap::COL_PURCHASE_ORDER_STATUS_ID, $this->purchase_order_status_id);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_EXPECTED_DATE)) {
			$criteria->add(PurchaseOrderTableMap::COL_EXPECTED_DATE, $this->expected_date);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_SHIPPING_FEE)) {
			$criteria->add(PurchaseOrderTableMap::COL_SHIPPING_FEE, $this->shipping_fee);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_TAXES)) {
			$criteria->add(PurchaseOrderTableMap::COL_TAXES, $this->taxes);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_PAYMENT_DATE)) {
			$criteria->add(PurchaseOrderTableMap::COL_PAYMENT_DATE, $this->payment_date);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_PAYMENT_AMOUNT)) {
			$criteria->add(PurchaseOrderTableMap::COL_PAYMENT_AMOUNT, $this->payment_amount);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_PAYMENT_METHOD)) {
			$criteria->add(PurchaseOrderTableMap::COL_PAYMENT_METHOD, $this->payment_method);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_NOTES)) {
			$criteria->add(PurchaseOrderTableMap::COL_NOTES, $this->notes);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_APPROVED_BY)) {
			$criteria->add(PurchaseOrderTableMap::COL_APPROVED_BY, $this->approved_by);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_APPROVED_DATE)) {
			$criteria->add(PurchaseOrderTableMap::COL_APPROVED_DATE, $this->approved_date);
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_SUBMITTED_BY)) {
			$criteria->add(PurchaseOrderTableMap::COL_SUBMITTED_BY, $this->submitted_by);
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
		$criteria = ChildPurchaseOrderQuery::create();
		$criteria->add(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID, $this->purchase_order_id);

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
		$this->purchase_order_id = null;
		$this->supplier_id = null;
		$this->created_by = null;
		$this->submitted_date = null;
		$this->creation_date = null;
		$this->purchase_order_status_id = null;
		$this->expected_date = null;
		$this->shipping_fee = null;
		$this->taxes = null;
		$this->payment_date = null;
		$this->payment_amount = null;
		$this->payment_method = null;
		$this->notes = null;
		$this->approved_by = null;
		$this->approved_date = null;
		$this->submitted_by = null;
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
	 * @return \SOB\Propel2\PurchaseOrder Clone of current object.
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
	 * @param object $copyObj An object of \SOB\Propel2\PurchaseOrder (or compatible) type.
	 * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true) : void
	{
		$copyObj->setSupplierId($this->getSupplierId());
		$copyObj->setCreatedBy($this->getCreatedBy());
		$copyObj->setSubmittedDate($this->getSubmittedDate());
		$copyObj->setCreationDate($this->getCreationDate());
		$copyObj->setPurchaseOrderStatusId($this->getPurchaseOrderStatusId());
		$copyObj->setExpectedDate($this->getExpectedDate());
		$copyObj->setShippingFee($this->getShippingFee());
		$copyObj->setTaxes($this->getTaxes());
		$copyObj->setPaymentDate($this->getPaymentDate());
		$copyObj->setPaymentAmount($this->getPaymentAmount());
		$copyObj->setPaymentMethod($this->getPaymentMethod());
		$copyObj->setNotes($this->getNotes());
		$copyObj->setApprovedBy($this->getApprovedBy());
		$copyObj->setApprovedDate($this->getApprovedDate());
		$copyObj->setSubmittedBy($this->getSubmittedBy());

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setPurchaseOrderId(null); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 * @see PurchaseOrder::setDeleted()
	 * @see PurchaseOrder::isDeleted()
	 */
	public function delete(?ConnectionInterface $con = null) : void
	{
		if ($this->isDeleted()) {
			throw new PropelException('This object has already been deleted.');
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderTableMap::DATABASE_NAME);
		}

		$con->transaction(function() use ($con) : void {
			$deleteQuery = ChildPurchaseOrderQuery::create()
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
	 * Compares this with another <code>PurchaseOrder</code> instance.  If
	 * <code>obj</code> is an instance of <code>PurchaseOrder</code>, delegates to
	 * <code>equals(PurchaseOrder)</code>.  Otherwise, returns <code>false</code>.
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
		$keys = PurchaseOrderTableMap::getFieldNames($keyType);

		if (\array_key_exists($keys[0], $arr)) {
			$this->setPurchaseOrderId($arr[$keys[0]]);
		}

		if (\array_key_exists($keys[1], $arr)) {
			$this->setSupplierId($arr[$keys[1]]);
		}

		if (\array_key_exists($keys[2], $arr)) {
			$this->setCreatedBy($arr[$keys[2]]);
		}

		if (\array_key_exists($keys[3], $arr)) {
			$this->setSubmittedDate($arr[$keys[3]]);
		}

		if (\array_key_exists($keys[4], $arr)) {
			$this->setCreationDate($arr[$keys[4]]);
		}

		if (\array_key_exists($keys[5], $arr)) {
			$this->setPurchaseOrderStatusId($arr[$keys[5]]);
		}

		if (\array_key_exists($keys[6], $arr)) {
			$this->setExpectedDate($arr[$keys[6]]);
		}

		if (\array_key_exists($keys[7], $arr)) {
			$this->setShippingFee($arr[$keys[7]]);
		}

		if (\array_key_exists($keys[8], $arr)) {
			$this->setTaxes($arr[$keys[8]]);
		}

		if (\array_key_exists($keys[9], $arr)) {
			$this->setPaymentDate($arr[$keys[9]]);
		}

		if (\array_key_exists($keys[10], $arr)) {
			$this->setPaymentAmount($arr[$keys[10]]);
		}

		if (\array_key_exists($keys[11], $arr)) {
			$this->setPaymentMethod($arr[$keys[11]]);
		}

		if (\array_key_exists($keys[12], $arr)) {
			$this->setNotes($arr[$keys[12]]);
		}

		if (\array_key_exists($keys[13], $arr)) {
			$this->setApprovedBy($arr[$keys[13]]);
		}

		if (\array_key_exists($keys[14], $arr)) {
			$this->setApprovedDate($arr[$keys[14]]);
		}

		if (\array_key_exists($keys[15], $arr)) {
			$this->setSubmittedBy($arr[$keys[15]]);
		}

		return $this;
	}

	/**
	 * Get the [approved_by] column value.
	 *
	 * @return int|null
	 */
	public function getApprovedBy()
	{
		return $this->approved_by;
	}

	/**
	 * Get the [optionally formatted] temporal [approved_date] column value.
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
	public function getApprovedDate($format = null)
	{
		if (null === $format) {
			return $this->approved_date;
		}

			return $this->approved_date instanceof \DateTimeInterface ? $this->approved_date->format($format) : null;

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
		$pos = PurchaseOrderTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
				return $this->getPurchaseOrderId();

			case 1:
				return $this->getSupplierId();

			case 2:
				return $this->getCreatedBy();

			case 3:
				return $this->getSubmittedDate();

			case 4:
				return $this->getCreationDate();

			case 5:
				return $this->getPurchaseOrderStatusId();

			case 6:
				return $this->getExpectedDate();

			case 7:
				return $this->getShippingFee();

			case 8:
				return $this->getTaxes();

			case 9:
				return $this->getPaymentDate();

			case 10:
				return $this->getPaymentAmount();

			case 11:
				return $this->getPaymentMethod();

			case 12:
				return $this->getNotes();

			case 13:
				return $this->getApprovedBy();

			case 14:
				return $this->getApprovedDate();

			case 15:
				return $this->getSubmittedBy();

			default:
				return;
		} // switch()
	}

	/**
	 * Get the [created_by] column value.
	 *
	 * @return int|null
	 */
	public function getCreatedBy()
	{
		return $this->created_by;
	}

	/**
	 * Get the [optionally formatted] temporal [creation_date] column value.
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
	public function getCreationDate($format = null)
	{
		if (null === $format) {
			return $this->creation_date;
		}

			return $this->creation_date instanceof \DateTimeInterface ? $this->creation_date->format($format) : null;

	}

	/**
	 * Get the [optionally formatted] temporal [expected_date] column value.
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
	public function getExpectedDate($format = null)
	{
		if (null === $format) {
			return $this->expected_date;
		}

			return $this->expected_date instanceof \DateTimeInterface ? $this->expected_date->format($format) : null;

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
	 * Get the [payment_amount] column value.
	 *
	 * @return string|null
	 */
	public function getPaymentAmount()
	{
		return $this->payment_amount;
	}

	/**
	 * Get the [optionally formatted] temporal [payment_date] column value.
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
	public function getPaymentDate($format = null)
	{
		if (null === $format) {
			return $this->payment_date;
		}

			return $this->payment_date instanceof \DateTimeInterface ? $this->payment_date->format($format) : null;

	}

	/**
	 * Get the [payment_method] column value.
	 *
	 * @return string|null
	 */
	public function getPaymentMethod()
	{
		return $this->payment_method;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return int
	 */
	public function getPrimaryKey()
	{
		return $this->getPurchaseOrderId();
	}

	/**
	 * Get the [purchase_order_id] column value.
	 *
	 * @return int
	 */
	public function getPurchaseOrderId()
	{
		return $this->purchase_order_id;
	}

	/**
	 * Get the [purchase_order_status_id] column value.
	 *
	 * @return int|null
	 */
	public function getPurchaseOrderStatusId()
	{
		return $this->purchase_order_status_id;
	}

	/**
	 * Get the [shipping_fee] column value.
	 *
	 * @return string
	 */
	public function getShippingFee()
	{
		return $this->shipping_fee;
	}

	/**
	 * Get the [submitted_by] column value.
	 *
	 * @return int|null
	 */
	public function getSubmittedBy()
	{
		return $this->submitted_by;
	}

	/**
	 * Get the [optionally formatted] temporal [submitted_date] column value.
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
	public function getSubmittedDate($format = null)
	{
		if (null === $format) {
			return $this->submitted_date;
		}

			return $this->submitted_date instanceof \DateTimeInterface ? $this->submitted_date->format($format) : null;

	}

	/**
	 * Get the [supplier_id] column value.
	 *
	 * @return int|null
	 */
	public function getSupplierId()
	{
		return $this->supplier_id;
	}

	/**
	 * Get the [taxes] column value.
	 *
	 * @return string
	 */
	public function getTaxes()
	{
		return $this->taxes;
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
		$validPk = null !== $this->getPurchaseOrderId();

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
			if (0 !== $this->purchase_order_status_id) {
				return false;
			}

			if ('0.0000' !== $this->shipping_fee) {
				return false;
			}

			if ('0.0000' !== $this->taxes) {
				return false;
			}

			return ! ('0.0000' !== $this->payment_amount);



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

			$col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PurchaseOrderTableMap::translateFieldName('PurchaseOrderId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->purchase_order_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PurchaseOrderTableMap::translateFieldName('SupplierId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->supplier_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PurchaseOrderTableMap::translateFieldName('CreatedBy', TableMap::TYPE_PHPNAME, $indexType)];
			$this->created_by = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PurchaseOrderTableMap::translateFieldName('SubmittedDate', TableMap::TYPE_PHPNAME, $indexType)];

			if ('0000-00-00 00:00:00' === $col) {
				$col = null;
			}
			$this->submitted_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PurchaseOrderTableMap::translateFieldName('CreationDate', TableMap::TYPE_PHPNAME, $indexType)];

			if ('0000-00-00 00:00:00' === $col) {
				$col = null;
			}
			$this->creation_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PurchaseOrderTableMap::translateFieldName('PurchaseOrderStatusId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->purchase_order_status_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PurchaseOrderTableMap::translateFieldName('ExpectedDate', TableMap::TYPE_PHPNAME, $indexType)];

			if ('0000-00-00 00:00:00' === $col) {
				$col = null;
			}
			$this->expected_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PurchaseOrderTableMap::translateFieldName('ShippingFee', TableMap::TYPE_PHPNAME, $indexType)];
			$this->shipping_fee = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PurchaseOrderTableMap::translateFieldName('Taxes', TableMap::TYPE_PHPNAME, $indexType)];
			$this->taxes = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : PurchaseOrderTableMap::translateFieldName('PaymentDate', TableMap::TYPE_PHPNAME, $indexType)];

			if ('0000-00-00 00:00:00' === $col) {
				$col = null;
			}
			$this->payment_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : PurchaseOrderTableMap::translateFieldName('PaymentAmount', TableMap::TYPE_PHPNAME, $indexType)];
			$this->payment_amount = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : PurchaseOrderTableMap::translateFieldName('PaymentMethod', TableMap::TYPE_PHPNAME, $indexType)];
			$this->payment_method = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : PurchaseOrderTableMap::translateFieldName('Notes', TableMap::TYPE_PHPNAME, $indexType)];
			$this->notes = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : PurchaseOrderTableMap::translateFieldName('ApprovedBy', TableMap::TYPE_PHPNAME, $indexType)];
			$this->approved_by = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 14 + $startcol : PurchaseOrderTableMap::translateFieldName('ApprovedDate', TableMap::TYPE_PHPNAME, $indexType)];

			if ('0000-00-00 00:00:00' === $col) {
				$col = null;
			}
			$this->approved_date = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 15 + $startcol : PurchaseOrderTableMap::translateFieldName('SubmittedBy', TableMap::TYPE_PHPNAME, $indexType)];
			$this->submitted_by = (null !== $col) ? (int)$col : null;

			$this->resetModified();
			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 16; // 16 = PurchaseOrderTableMap::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException(\sprintf('Error populating %s object', '\\SOB\\Propel2\\PurchaseOrder'), 0, $e);
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
		return null === $this->getPurchaseOrderId();
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
			$con = Propel::getServiceContainer()->getReadConnection(PurchaseOrderTableMap::DATABASE_NAME);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$dataFetcher = ChildPurchaseOrderQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderTableMap::DATABASE_NAME);
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
				PurchaseOrderTableMap::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}

			return $affectedRows;
		});
	}

	/**
	 * Set the value of [approved_by] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setApprovedBy($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->approved_by !== $v) {
			$this->approved_by = $v;
			$this->modifiedColumns[PurchaseOrderTableMap::COL_APPROVED_BY] = true;
		}

		return $this;
	}

	/**
	 * Sets the value of [approved_date] column to a normalized version of the date/time value specified.
	 *
	 * @param string|int|\DateTimeInterface|null $v string, integer (timestamp), or \DateTimeInterface value.
	 *               Empty strings are treated as NULL.
	 * @return $this The current object (for fluent API support)
	 */
	public function setApprovedDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');

		if (null !== $this->approved_date || null !== $dt) {
			if (null === $this->approved_date || null === $dt || $dt->format('Y-m-d H:i:s.u') !== $this->approved_date->format('Y-m-d H:i:s.u')) {
				$this->approved_date = null === $dt ? null : clone $dt;
				$this->modifiedColumns[PurchaseOrderTableMap::COL_APPROVED_DATE] = true;
			}
		} // if either are not null

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
		$pos = PurchaseOrderTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

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
				$this->setPurchaseOrderId($value);

				break;

			case 1:
				$this->setSupplierId($value);

				break;

			case 2:
				$this->setCreatedBy($value);

				break;

			case 3:
				$this->setSubmittedDate($value);

				break;

			case 4:
				$this->setCreationDate($value);

				break;

			case 5:
				$this->setPurchaseOrderStatusId($value);

				break;

			case 6:
				$this->setExpectedDate($value);

				break;

			case 7:
				$this->setShippingFee($value);

				break;

			case 8:
				$this->setTaxes($value);

				break;

			case 9:
				$this->setPaymentDate($value);

				break;

			case 10:
				$this->setPaymentAmount($value);

				break;

			case 11:
				$this->setPaymentMethod($value);

				break;

			case 12:
				$this->setNotes($value);

				break;

			case 13:
				$this->setApprovedBy($value);

				break;

			case 14:
				$this->setApprovedDate($value);

				break;

			case 15:
				$this->setSubmittedBy($value);

				break;
		} // switch()

		return $this;
	}

	/**
	 * Set the value of [created_by] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setCreatedBy($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->created_by !== $v) {
			$this->created_by = $v;
			$this->modifiedColumns[PurchaseOrderTableMap::COL_CREATED_BY] = true;
		}

		return $this;
	}

	/**
	 * Sets the value of [creation_date] column to a normalized version of the date/time value specified.
	 *
	 * @param string|int|\DateTimeInterface $v string, integer (timestamp), or \DateTimeInterface value.
	 *               Empty strings are treated as NULL.
	 * @return $this The current object (for fluent API support)
	 */
	public function setCreationDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');

		if (null !== $this->creation_date || null !== $dt) {
			if (null === $this->creation_date || null === $dt || $dt->format('Y-m-d H:i:s.u') !== $this->creation_date->format('Y-m-d H:i:s.u')) {
				$this->creation_date = null === $dt ? null : clone $dt;
				$this->modifiedColumns[PurchaseOrderTableMap::COL_CREATION_DATE] = true;
			}
		} // if either are not null

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
	 * Sets the value of [expected_date] column to a normalized version of the date/time value specified.
	 *
	 * @param string|int|\DateTimeInterface|null $v string, integer (timestamp), or \DateTimeInterface value.
	 *               Empty strings are treated as NULL.
	 * @return $this The current object (for fluent API support)
	 */
	public function setExpectedDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');

		if (null !== $this->expected_date || null !== $dt) {
			if (null === $this->expected_date || null === $dt || $dt->format('Y-m-d H:i:s.u') !== $this->expected_date->format('Y-m-d H:i:s.u')) {
				$this->expected_date = null === $dt ? null : clone $dt;
				$this->modifiedColumns[PurchaseOrderTableMap::COL_EXPECTED_DATE] = true;
			}
		} // if either are not null

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
			$this->modifiedColumns[PurchaseOrderTableMap::COL_NOTES] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [payment_amount] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setPaymentAmount($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->payment_amount !== $v) {
			$this->payment_amount = $v;
			$this->modifiedColumns[PurchaseOrderTableMap::COL_PAYMENT_AMOUNT] = true;
		}

		return $this;
	}

	/**
	 * Sets the value of [payment_date] column to a normalized version of the date/time value specified.
	 *
	 * @param string|int|\DateTimeInterface|null $v string, integer (timestamp), or \DateTimeInterface value.
	 *               Empty strings are treated as NULL.
	 * @return $this The current object (for fluent API support)
	 */
	public function setPaymentDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');

		if (null !== $this->payment_date || null !== $dt) {
			if (null === $this->payment_date || null === $dt || $dt->format('Y-m-d H:i:s.u') !== $this->payment_date->format('Y-m-d H:i:s.u')) {
				$this->payment_date = null === $dt ? null : clone $dt;
				$this->modifiedColumns[PurchaseOrderTableMap::COL_PAYMENT_DATE] = true;
			}
		} // if either are not null

		return $this;
	}

	/**
	 * Set the value of [payment_method] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setPaymentMethod($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->payment_method !== $v) {
			$this->payment_method = $v;
			$this->modifiedColumns[PurchaseOrderTableMap::COL_PAYMENT_METHOD] = true;
		}

		return $this;
	}

	/**
	 * Generic method to set the primary key (purchase_order_id column).
	 *
	 * @param int|null $key Primary key.
	 */
	public function setPrimaryKey(?int $key = null) : void
	{
		$this->setPurchaseOrderId($key);
	}

	/**
	 * Set the value of [purchase_order_id] column.
	 *
	 * @param int $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setPurchaseOrderId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->purchase_order_id !== $v) {
			$this->purchase_order_id = $v;
			$this->modifiedColumns[PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [purchase_order_status_id] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setPurchaseOrderStatusId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->purchase_order_status_id !== $v) {
			$this->purchase_order_status_id = $v;
			$this->modifiedColumns[PurchaseOrderTableMap::COL_PURCHASE_ORDER_STATUS_ID] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [shipping_fee] column.
	 *
	 * @param string $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setShippingFee($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->shipping_fee !== $v) {
			$this->shipping_fee = $v;
			$this->modifiedColumns[PurchaseOrderTableMap::COL_SHIPPING_FEE] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [submitted_by] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setSubmittedBy($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->submitted_by !== $v) {
			$this->submitted_by = $v;
			$this->modifiedColumns[PurchaseOrderTableMap::COL_SUBMITTED_BY] = true;
		}

		return $this;
	}

	/**
	 * Sets the value of [submitted_date] column to a normalized version of the date/time value specified.
	 *
	 * @param string|int|\DateTimeInterface|null $v string, integer (timestamp), or \DateTimeInterface value.
	 *               Empty strings are treated as NULL.
	 * @return $this The current object (for fluent API support)
	 */
	public function setSubmittedDate($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');

		if (null !== $this->submitted_date || null !== $dt) {
			if (null === $this->submitted_date || null === $dt || $dt->format('Y-m-d H:i:s.u') !== $this->submitted_date->format('Y-m-d H:i:s.u')) {
				$this->submitted_date = null === $dt ? null : clone $dt;
				$this->modifiedColumns[PurchaseOrderTableMap::COL_SUBMITTED_DATE] = true;
			}
		} // if either are not null

		return $this;
	}

	/**
	 * Set the value of [supplier_id] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setSupplierId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->supplier_id !== $v) {
			$this->supplier_id = $v;
			$this->modifiedColumns[PurchaseOrderTableMap::COL_SUPPLIER_ID] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [taxes] column.
	 *
	 * @param string $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setTaxes($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->taxes !== $v) {
			$this->taxes = $v;
			$this->modifiedColumns[PurchaseOrderTableMap::COL_TAXES] = true;
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
		if (isset($alreadyDumpedObjects['PurchaseOrder'][$this->hashCode()])) {
			return ['*RECURSION*'];
		}
		$alreadyDumpedObjects['PurchaseOrder'][$this->hashCode()] = true;
		$keys = PurchaseOrderTableMap::getFieldNames($keyType);
		$result = [
			$keys[0] => $this->getPurchaseOrderId(),
			$keys[1] => $this->getSupplierId(),
			$keys[2] => $this->getCreatedBy(),
			$keys[3] => $this->getSubmittedDate(),
			$keys[4] => $this->getCreationDate(),
			$keys[5] => $this->getPurchaseOrderStatusId(),
			$keys[6] => $this->getExpectedDate(),
			$keys[7] => $this->getShippingFee(),
			$keys[8] => $this->getTaxes(),
			$keys[9] => $this->getPaymentDate(),
			$keys[10] => $this->getPaymentAmount(),
			$keys[11] => $this->getPaymentMethod(),
			$keys[12] => $this->getNotes(),
			$keys[13] => $this->getApprovedBy(),
			$keys[14] => $this->getApprovedDate(),
			$keys[15] => $this->getSubmittedBy(),
		];

		if ($result[$keys[3]] instanceof \DateTimeInterface) {
			$result[$keys[3]] = $result[$keys[3]]->format('Y-m-d H:i:s.u');
		}

		if ($result[$keys[4]] instanceof \DateTimeInterface) {
			$result[$keys[4]] = $result[$keys[4]]->format('Y-m-d H:i:s.u');
		}

		if ($result[$keys[6]] instanceof \DateTimeInterface) {
			$result[$keys[6]] = $result[$keys[6]]->format('Y-m-d H:i:s.u');
		}

		if ($result[$keys[9]] instanceof \DateTimeInterface) {
			$result[$keys[9]] = $result[$keys[9]]->format('Y-m-d H:i:s.u');
		}

		if ($result[$keys[14]] instanceof \DateTimeInterface) {
			$result[$keys[14]] = $result[$keys[14]]->format('Y-m-d H:i:s.u');
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

		$this->modifiedColumns[PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID] = true;

		if (null !== $this->purchase_order_id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID)) {
			$modifiedColumns[':p' . $index++] = 'purchase_order_id';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_SUPPLIER_ID)) {
			$modifiedColumns[':p' . $index++] = 'supplier_id';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_CREATED_BY)) {
			$modifiedColumns[':p' . $index++] = 'created_by';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_SUBMITTED_DATE)) {
			$modifiedColumns[':p' . $index++] = 'submitted_date';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_CREATION_DATE)) {
			$modifiedColumns[':p' . $index++] = 'creation_date';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_PURCHASE_ORDER_STATUS_ID)) {
			$modifiedColumns[':p' . $index++] = 'purchase_order_status_id';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_EXPECTED_DATE)) {
			$modifiedColumns[':p' . $index++] = 'expected_date';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_SHIPPING_FEE)) {
			$modifiedColumns[':p' . $index++] = 'shipping_fee';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_TAXES)) {
			$modifiedColumns[':p' . $index++] = 'taxes';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_PAYMENT_DATE)) {
			$modifiedColumns[':p' . $index++] = 'payment_date';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_PAYMENT_AMOUNT)) {
			$modifiedColumns[':p' . $index++] = 'payment_amount';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_PAYMENT_METHOD)) {
			$modifiedColumns[':p' . $index++] = 'payment_method';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_NOTES)) {
			$modifiedColumns[':p' . $index++] = 'notes';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_APPROVED_BY)) {
			$modifiedColumns[':p' . $index++] = 'approved_by';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_APPROVED_DATE)) {
			$modifiedColumns[':p' . $index++] = 'approved_date';
		}

		if ($this->isColumnModified(PurchaseOrderTableMap::COL_SUBMITTED_BY)) {
			$modifiedColumns[':p' . $index++] = 'submitted_by';
		}

		$sql = \sprintf(
			'INSERT INTO purchase_order (%s) VALUES (%s)',
			\implode(', ', $modifiedColumns),
			\implode(', ', \array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);

			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case 'purchase_order_id':
						$stmt->bindValue($identifier, $this->purchase_order_id, PDO::PARAM_INT);

						break;

					case 'supplier_id':
						$stmt->bindValue($identifier, $this->supplier_id, PDO::PARAM_INT);

						break;

					case 'created_by':
						$stmt->bindValue($identifier, $this->created_by, PDO::PARAM_INT);

						break;

					case 'submitted_date':
						$stmt->bindValue($identifier, $this->submitted_date ? $this->submitted_date->format('Y-m-d H:i:s.u') : null, PDO::PARAM_STR);

						break;

					case 'creation_date':
						$stmt->bindValue($identifier, $this->creation_date ? $this->creation_date->format('Y-m-d H:i:s.u') : null, PDO::PARAM_STR);

						break;

					case 'purchase_order_status_id':
						$stmt->bindValue($identifier, $this->purchase_order_status_id, PDO::PARAM_INT);

						break;

					case 'expected_date':
						$stmt->bindValue($identifier, $this->expected_date ? $this->expected_date->format('Y-m-d H:i:s.u') : null, PDO::PARAM_STR);

						break;

					case 'shipping_fee':
						$stmt->bindValue($identifier, $this->shipping_fee, PDO::PARAM_STR);

						break;

					case 'taxes':
						$stmt->bindValue($identifier, $this->taxes, PDO::PARAM_STR);

						break;

					case 'payment_date':
						$stmt->bindValue($identifier, $this->payment_date ? $this->payment_date->format('Y-m-d H:i:s.u') : null, PDO::PARAM_STR);

						break;

					case 'payment_amount':
						$stmt->bindValue($identifier, $this->payment_amount, PDO::PARAM_STR);

						break;

					case 'payment_method':
						$stmt->bindValue($identifier, $this->payment_method, PDO::PARAM_STR);

						break;

					case 'notes':
						$stmt->bindValue($identifier, $this->notes, PDO::PARAM_STR);

						break;

					case 'approved_by':
						$stmt->bindValue($identifier, $this->approved_by, PDO::PARAM_INT);

						break;

					case 'approved_date':
						$stmt->bindValue($identifier, $this->approved_date ? $this->approved_date->format('Y-m-d H:i:s.u') : null, PDO::PARAM_STR);

						break;

					case 'submitted_by':
						$stmt->bindValue($identifier, $this->submitted_by, PDO::PARAM_INT);

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
		$this->setPurchaseOrderId($pk);

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
