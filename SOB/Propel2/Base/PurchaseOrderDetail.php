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
use SOB\Propel2\Map\PurchaseOrderDetailTableMap;
use SOB\Propel2\PurchaseOrderDetailQuery as ChildPurchaseOrderDetailQuery;

/**
 * Base class that represents a row from the 'purchase_order_detail' table.
 *
 *
 *
 * @package    propel.generator.SOB.Propel2.Base
 */
abstract class PurchaseOrderDetail implements ActiveRecordInterface
{
	/**
	 * TableMap class name
	 *
	 * @var string
	 */
	public const TABLE_MAP = '\\SOB\\Propel2\\Map\\PurchaseOrderDetailTableMap';

	/**
	 * Flag to prevent endless save loop, if this object is referenced
	 * by another object which falls in this transaction.
	 *
	 * @var bool
	 */
	protected $alreadyInSave = false;

	/**
	 * The value for the date_received field.
	 *
	 * @var        DateTime|null
	 */
	protected $date_received;

	/**
	 * attribute to determine whether this object has been deleted.
	 * @var bool
	 */
	protected $deleted = false;

	/**
	 * The value for the inventory_transaction_id field.
	 *
	 * @var        int|null
	 */
	protected $inventory_transaction_id;

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
	 * The value for the posted_to_inventory field.
	 *
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $posted_to_inventory;

	/**
	 * The value for the product_id field.
	 *
	 * @var        int|null
	 */
	protected $product_id;

	/**
	 * The value for the purchase_order_detail_id field.
	 *
	 * @var        int
	 */
	protected $purchase_order_detail_id;

	/**
	 * The value for the purchase_order_id field.
	 *
	 * @var        int
	 */
	protected $purchase_order_id;

	/**
	 * The value for the quantity field.
	 *
	 * @var        string
	 */
	protected $quantity;

	/**
	 * The value for the unit_cost field.
	 *
	 * @var        string
	 */
	protected $unit_cost;

	/**
	 * The (virtual) columns that are added at runtime
	 * The formatters can add supplementary columns based on a resultset
	 * @var array
	 */
	protected $virtualColumns = [];

	/**
	 * Initializes internal state of SOB\Propel2\Base\PurchaseOrderDetail object.
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
		return (string)$this->exportTo(PurchaseOrderDetailTableMap::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see __construct()
	 */
	public function applyDefaultValues() : void
	{
		$this->posted_to_inventory = 0;
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria() : Criteria
	{
		$criteria = new Criteria(PurchaseOrderDetailTableMap::DATABASE_NAME);

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID)) {
			$criteria->add(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID, $this->purchase_order_detail_id);
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_ID)) {
			$criteria->add(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_ID, $this->purchase_order_id);
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_PRODUCT_ID)) {
			$criteria->add(PurchaseOrderDetailTableMap::COL_PRODUCT_ID, $this->product_id);
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_QUANTITY)) {
			$criteria->add(PurchaseOrderDetailTableMap::COL_QUANTITY, $this->quantity);
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_UNIT_COST)) {
			$criteria->add(PurchaseOrderDetailTableMap::COL_UNIT_COST, $this->unit_cost);
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_DATE_RECEIVED)) {
			$criteria->add(PurchaseOrderDetailTableMap::COL_DATE_RECEIVED, $this->date_received);
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_POSTED_TO_INVENTORY)) {
			$criteria->add(PurchaseOrderDetailTableMap::COL_POSTED_TO_INVENTORY, $this->posted_to_inventory);
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID)) {
			$criteria->add(PurchaseOrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID, $this->inventory_transaction_id);
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
		$criteria = ChildPurchaseOrderDetailQuery::create();
		$criteria->add(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID, $this->purchase_order_detail_id);

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
		$this->purchase_order_detail_id = null;
		$this->purchase_order_id = null;
		$this->product_id = null;
		$this->quantity = null;
		$this->unit_cost = null;
		$this->date_received = null;
		$this->posted_to_inventory = null;
		$this->inventory_transaction_id = null;
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
	 * @return \SOB\Propel2\PurchaseOrderDetail Clone of current object.
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
	 * @param object $copyObj An object of \SOB\Propel2\PurchaseOrderDetail (or compatible) type.
	 * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true) : void
	{
		$copyObj->setPurchaseOrderId($this->getPurchaseOrderId());
		$copyObj->setProductId($this->getProductId());
		$copyObj->setQuantity($this->getQuantity());
		$copyObj->setUnitCost($this->getUnitCost());
		$copyObj->setDateReceived($this->getDateReceived());
		$copyObj->setPostedToInventory($this->getPostedToInventory());
		$copyObj->setInventoryTransactionId($this->getInventoryTransactionId());

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setPurchaseOrderDetailId(null); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 * @see PurchaseOrderDetail::setDeleted()
	 * @see PurchaseOrderDetail::isDeleted()
	 */
	public function delete(?ConnectionInterface $con = null) : void
	{
		if ($this->isDeleted()) {
			throw new PropelException('This object has already been deleted.');
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderDetailTableMap::DATABASE_NAME);
		}

		$con->transaction(function() use ($con) : void {
			$deleteQuery = ChildPurchaseOrderDetailQuery::create()
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
	 * Compares this with another <code>PurchaseOrderDetail</code> instance.  If
	 * <code>obj</code> is an instance of <code>PurchaseOrderDetail</code>, delegates to
	 * <code>equals(PurchaseOrderDetail)</code>.  Otherwise, returns <code>false</code>.
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
		$keys = PurchaseOrderDetailTableMap::getFieldNames($keyType);

		if (\array_key_exists($keys[0], $arr)) {
			$this->setPurchaseOrderDetailId($arr[$keys[0]]);
		}

		if (\array_key_exists($keys[1], $arr)) {
			$this->setPurchaseOrderId($arr[$keys[1]]);
		}

		if (\array_key_exists($keys[2], $arr)) {
			$this->setProductId($arr[$keys[2]]);
		}

		if (\array_key_exists($keys[3], $arr)) {
			$this->setQuantity($arr[$keys[3]]);
		}

		if (\array_key_exists($keys[4], $arr)) {
			$this->setUnitCost($arr[$keys[4]]);
		}

		if (\array_key_exists($keys[5], $arr)) {
			$this->setDateReceived($arr[$keys[5]]);
		}

		if (\array_key_exists($keys[6], $arr)) {
			$this->setPostedToInventory($arr[$keys[6]]);
		}

		if (\array_key_exists($keys[7], $arr)) {
			$this->setInventoryTransactionId($arr[$keys[7]]);
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
		$pos = PurchaseOrderDetailTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
				return $this->getPurchaseOrderDetailId();

			case 1:
				return $this->getPurchaseOrderId();

			case 2:
				return $this->getProductId();

			case 3:
				return $this->getQuantity();

			case 4:
				return $this->getUnitCost();

			case 5:
				return $this->getDateReceived();

			case 6:
				return $this->getPostedToInventory();

			case 7:
				return $this->getInventoryTransactionId();

			default:
				return;
		} // switch()
	}

	/**
	 * Get the [optionally formatted] temporal [date_received] column value.
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
	public function getDateReceived($format = null)
	{
		if (null === $format) {
			return $this->date_received;
		}

			return $this->date_received instanceof \DateTimeInterface ? $this->date_received->format($format) : null;

	}

	/**
	 * Get the [inventory_transaction_id] column value.
	 *
	 * @return int|null
	 */
	public function getInventoryTransactionId()
	{
		return $this->inventory_transaction_id;
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
	 * Get the [posted_to_inventory] column value.
	 *
	 * @return int
	 */
	public function getPostedToInventory()
	{
		return $this->posted_to_inventory;
	}

	/**
	 * Returns the primary key for this object (row).
	 * @return int
	 */
	public function getPrimaryKey()
	{
		return $this->getPurchaseOrderDetailId();
	}

	/**
	 * Get the [product_id] column value.
	 *
	 * @return int|null
	 */
	public function getProductId()
	{
		return $this->product_id;
	}

	/**
	 * Get the [purchase_order_detail_id] column value.
	 *
	 * @return int
	 */
	public function getPurchaseOrderDetailId()
	{
		return $this->purchase_order_detail_id;
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
	 * Get the [quantity] column value.
	 *
	 * @return string
	 */
	public function getQuantity()
	{
		return $this->quantity;
	}

	/**
	 * Get the [unit_cost] column value.
	 *
	 * @return string
	 */
	public function getUnitCost()
	{
		return $this->unit_cost;
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
		$validPk = null !== $this->getPurchaseOrderDetailId();

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
			return ! (0 !== $this->posted_to_inventory);



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

			$col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PurchaseOrderDetailTableMap::translateFieldName('PurchaseOrderDetailId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->purchase_order_detail_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PurchaseOrderDetailTableMap::translateFieldName('PurchaseOrderId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->purchase_order_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PurchaseOrderDetailTableMap::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->product_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PurchaseOrderDetailTableMap::translateFieldName('Quantity', TableMap::TYPE_PHPNAME, $indexType)];
			$this->quantity = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PurchaseOrderDetailTableMap::translateFieldName('UnitCost', TableMap::TYPE_PHPNAME, $indexType)];
			$this->unit_cost = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PurchaseOrderDetailTableMap::translateFieldName('DateReceived', TableMap::TYPE_PHPNAME, $indexType)];

			if ('0000-00-00 00:00:00' === $col) {
				$col = null;
			}
			$this->date_received = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PurchaseOrderDetailTableMap::translateFieldName('PostedToInventory', TableMap::TYPE_PHPNAME, $indexType)];
			$this->posted_to_inventory = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PurchaseOrderDetailTableMap::translateFieldName('InventoryTransactionId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->inventory_transaction_id = (null !== $col) ? (int)$col : null;

			$this->resetModified();
			$this->setNew(false);

			if ($rehydrate) {
				$this->ensureConsistency();
			}

			return $startcol + 8; // 8 = PurchaseOrderDetailTableMap::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException(\sprintf('Error populating %s object', '\\SOB\\Propel2\\PurchaseOrderDetail'), 0, $e);
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
		return null === $this->getPurchaseOrderDetailId();
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
			$con = Propel::getServiceContainer()->getReadConnection(PurchaseOrderDetailTableMap::DATABASE_NAME);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$dataFetcher = ChildPurchaseOrderDetailQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderDetailTableMap::DATABASE_NAME);
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
				PurchaseOrderDetailTableMap::addInstanceToPool($this);
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
		$pos = PurchaseOrderDetailTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

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
				$this->setPurchaseOrderDetailId($value);

				break;

			case 1:
				$this->setPurchaseOrderId($value);

				break;

			case 2:
				$this->setProductId($value);

				break;

			case 3:
				$this->setQuantity($value);

				break;

			case 4:
				$this->setUnitCost($value);

				break;

			case 5:
				$this->setDateReceived($value);

				break;

			case 6:
				$this->setPostedToInventory($value);

				break;

			case 7:
				$this->setInventoryTransactionId($value);

				break;
		} // switch()

		return $this;
	}

	/**
	 * Sets the value of [date_received] column to a normalized version of the date/time value specified.
	 *
	 * @param string|int|\DateTimeInterface|null $v string, integer (timestamp), or \DateTimeInterface value.
	 *               Empty strings are treated as NULL.
	 * @return $this The current object (for fluent API support)
	 */
	public function setDateReceived($v)
	{
		$dt = PropelDateTime::newInstance($v, null, 'DateTime');

		if (null !== $this->date_received || null !== $dt) {
			if (null === $this->date_received || null === $dt || $dt->format('Y-m-d H:i:s.u') !== $this->date_received->format('Y-m-d H:i:s.u')) {
				$this->date_received = null === $dt ? null : clone $dt;
				$this->modifiedColumns[PurchaseOrderDetailTableMap::COL_DATE_RECEIVED] = true;
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
	 * Set the value of [inventory_transaction_id] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setInventoryTransactionId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->inventory_transaction_id !== $v) {
			$this->inventory_transaction_id = $v;
			$this->modifiedColumns[PurchaseOrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID] = true;
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
	 * Set the value of [posted_to_inventory] column.
	 *
	 * @param int $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setPostedToInventory($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->posted_to_inventory !== $v) {
			$this->posted_to_inventory = $v;
			$this->modifiedColumns[PurchaseOrderDetailTableMap::COL_POSTED_TO_INVENTORY] = true;
		}

		return $this;
	}

	/**
	 * Generic method to set the primary key (purchase_order_detail_id column).
	 *
	 * @param int|null $key Primary key.
	 */
	public function setPrimaryKey(?int $key = null) : void
	{
		$this->setPurchaseOrderDetailId($key);
	}

	/**
	 * Set the value of [product_id] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setProductId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->product_id !== $v) {
			$this->product_id = $v;
			$this->modifiedColumns[PurchaseOrderDetailTableMap::COL_PRODUCT_ID] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [purchase_order_detail_id] column.
	 *
	 * @param int $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setPurchaseOrderDetailId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->purchase_order_detail_id !== $v) {
			$this->purchase_order_detail_id = $v;
			$this->modifiedColumns[PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID] = true;
		}

		return $this;
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
			$this->modifiedColumns[PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_ID] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [quantity] column.
	 *
	 * @param string $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setQuantity($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->quantity !== $v) {
			$this->quantity = $v;
			$this->modifiedColumns[PurchaseOrderDetailTableMap::COL_QUANTITY] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [unit_cost] column.
	 *
	 * @param string $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setUnitCost($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->unit_cost !== $v) {
			$this->unit_cost = $v;
			$this->modifiedColumns[PurchaseOrderDetailTableMap::COL_UNIT_COST] = true;
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
		if (isset($alreadyDumpedObjects['PurchaseOrderDetail'][$this->hashCode()])) {
			return ['*RECURSION*'];
		}
		$alreadyDumpedObjects['PurchaseOrderDetail'][$this->hashCode()] = true;
		$keys = PurchaseOrderDetailTableMap::getFieldNames($keyType);
		$result = [
			$keys[0] => $this->getPurchaseOrderDetailId(),
			$keys[1] => $this->getPurchaseOrderId(),
			$keys[2] => $this->getProductId(),
			$keys[3] => $this->getQuantity(),
			$keys[4] => $this->getUnitCost(),
			$keys[5] => $this->getDateReceived(),
			$keys[6] => $this->getPostedToInventory(),
			$keys[7] => $this->getInventoryTransactionId(),
		];

		if ($result[$keys[5]] instanceof \DateTimeInterface) {
			$result[$keys[5]] = $result[$keys[5]]->format('Y-m-d H:i:s.u');
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

		$this->modifiedColumns[PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID] = true;

		if (null !== $this->purchase_order_detail_id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_DETAIL_ID)) {
			$modifiedColumns[':p' . $index++] = 'purchase_order_detail_id';
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_PURCHASE_ORDER_ID)) {
			$modifiedColumns[':p' . $index++] = 'purchase_order_id';
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_PRODUCT_ID)) {
			$modifiedColumns[':p' . $index++] = 'product_id';
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_QUANTITY)) {
			$modifiedColumns[':p' . $index++] = 'quantity';
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_UNIT_COST)) {
			$modifiedColumns[':p' . $index++] = 'unit_cost';
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_DATE_RECEIVED)) {
			$modifiedColumns[':p' . $index++] = 'date_received';
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_POSTED_TO_INVENTORY)) {
			$modifiedColumns[':p' . $index++] = 'posted_to_inventory';
		}

		if ($this->isColumnModified(PurchaseOrderDetailTableMap::COL_INVENTORY_TRANSACTION_ID)) {
			$modifiedColumns[':p' . $index++] = 'inventory_transaction_id';
		}

		$sql = \sprintf(
			'INSERT INTO purchase_order_detail (%s) VALUES (%s)',
			\implode(', ', $modifiedColumns),
			\implode(', ', \array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);

			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case 'purchase_order_detail_id':
						$stmt->bindValue($identifier, $this->purchase_order_detail_id, PDO::PARAM_INT);

						break;

					case 'purchase_order_id':
						$stmt->bindValue($identifier, $this->purchase_order_id, PDO::PARAM_INT);

						break;

					case 'product_id':
						$stmt->bindValue($identifier, $this->product_id, PDO::PARAM_INT);

						break;

					case 'quantity':
						$stmt->bindValue($identifier, $this->quantity, PDO::PARAM_STR);

						break;

					case 'unit_cost':
						$stmt->bindValue($identifier, $this->unit_cost, PDO::PARAM_STR);

						break;

					case 'date_received':
						$stmt->bindValue($identifier, $this->date_received ? $this->date_received->format('Y-m-d H:i:s.u') : null, PDO::PARAM_STR);

						break;

					case 'posted_to_inventory':
						$stmt->bindValue($identifier, $this->posted_to_inventory, PDO::PARAM_INT);

						break;

					case 'inventory_transaction_id':
						$stmt->bindValue($identifier, $this->inventory_transaction_id, PDO::PARAM_INT);

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
		$this->setPurchaseOrderDetailId($pk);

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
