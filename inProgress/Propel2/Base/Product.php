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
use SOB\Propel2\Map\ProductTableMap;
use SOB\Propel2\ProductQuery as ChildProductQuery;

/**
 * Base class that represents a row from the 'product' table.
 *
 *
 *
 * @package    propel.generator.SOB.Propel2.Base
 */
abstract class Product implements ActiveRecordInterface
{
	/**
	 * TableMap class name
	 *
	 * @var string
	 */
	public const TABLE_MAP = '\\SOB\\Propel2\\Map\\ProductTableMap';

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
	 * The value for the category field.
	 *
	 * @var        string|null
	 */
	protected $category;

	/**
	 * attribute to determine whether this object has been deleted.
	 * @var bool
	 */
	protected $deleted = false;

	/**
	 * The value for the description field.
	 *
	 * @var        string|null
	 */
	protected $description;

	/**
	 * The value for the discontinued field.
	 *
	 * Note: this column has a database default value of: 0
	 * @var        int
	 */
	protected $discontinued;

	/**
	 * The value for the list_price field.
	 *
	 * Note: this column has a database default value of: '0.0000'
	 * @var        string
	 */
	protected $list_price;

	/**
	 * The value for the minimum_reorder_quantity field.
	 *
	 * @var        int|null
	 */
	protected $minimum_reorder_quantity;

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
	 * The value for the product_code field.
	 *
	 * @var        string|null
	 */
	protected $product_code;

	/**
	 * The value for the product_id field.
	 *
	 * @var        int
	 */
	protected $product_id;

	/**
	 * The value for the product_name field.
	 *
	 * @var        string|null
	 */
	protected $product_name;

	/**
	 * The value for the quantity_per_unit field.
	 *
	 * @var        string|null
	 */
	protected $quantity_per_unit;

	/**
	 * The value for the reorder_level field.
	 *
	 * @var        int|null
	 */
	protected $reorder_level;

	/**
	 * The value for the standard_cost field.
	 *
	 * Note: this column has a database default value of: '0.0000'
	 * @var        string|null
	 */
	protected $standard_cost;

	/**
	 * The value for the target_level field.
	 *
	 * @var        int|null
	 */
	protected $target_level;

	/**
	 * The (virtual) columns that are added at runtime
	 * The formatters can add supplementary columns based on a resultset
	 * @var array
	 */
	protected $virtualColumns = [];

	/**
	 * Initializes internal state of SOB\Propel2\Base\Product object.
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
		return (string)$this->exportTo(ProductTableMap::DEFAULT_STRING_FORMAT);
	}

	/**
	 * Applies default values to this object.
	 * This method should be called from the object's constructor (or
	 * equivalent initialization method).
	 * @see __construct()
	 */
	public function applyDefaultValues() : void
	{
		$this->standard_cost = '0.0000';
		$this->list_price = '0.0000';
		$this->discontinued = 0;
	}

	/**
	 * Build a Criteria object containing the values of all modified columns in this object.
	 *
	 * @return \Propel\Runtime\ActiveQuery\Criteria The Criteria object containing all modified values.
	 */
	public function buildCriteria() : Criteria
	{
		$criteria = new Criteria(ProductTableMap::DATABASE_NAME);

		if ($this->isColumnModified(ProductTableMap::COL_PRODUCT_ID)) {
			$criteria->add(ProductTableMap::COL_PRODUCT_ID, $this->product_id);
		}

		if ($this->isColumnModified(ProductTableMap::COL_PRODUCT_CODE)) {
			$criteria->add(ProductTableMap::COL_PRODUCT_CODE, $this->product_code);
		}

		if ($this->isColumnModified(ProductTableMap::COL_PRODUCT_NAME)) {
			$criteria->add(ProductTableMap::COL_PRODUCT_NAME, $this->product_name);
		}

		if ($this->isColumnModified(ProductTableMap::COL_DESCRIPTION)) {
			$criteria->add(ProductTableMap::COL_DESCRIPTION, $this->description);
		}

		if ($this->isColumnModified(ProductTableMap::COL_STANDARD_COST)) {
			$criteria->add(ProductTableMap::COL_STANDARD_COST, $this->standard_cost);
		}

		if ($this->isColumnModified(ProductTableMap::COL_LIST_PRICE)) {
			$criteria->add(ProductTableMap::COL_LIST_PRICE, $this->list_price);
		}

		if ($this->isColumnModified(ProductTableMap::COL_REORDER_LEVEL)) {
			$criteria->add(ProductTableMap::COL_REORDER_LEVEL, $this->reorder_level);
		}

		if ($this->isColumnModified(ProductTableMap::COL_TARGET_LEVEL)) {
			$criteria->add(ProductTableMap::COL_TARGET_LEVEL, $this->target_level);
		}

		if ($this->isColumnModified(ProductTableMap::COL_QUANTITY_PER_UNIT)) {
			$criteria->add(ProductTableMap::COL_QUANTITY_PER_UNIT, $this->quantity_per_unit);
		}

		if ($this->isColumnModified(ProductTableMap::COL_DISCONTINUED)) {
			$criteria->add(ProductTableMap::COL_DISCONTINUED, $this->discontinued);
		}

		if ($this->isColumnModified(ProductTableMap::COL_MINIMUM_REORDER_QUANTITY)) {
			$criteria->add(ProductTableMap::COL_MINIMUM_REORDER_QUANTITY, $this->minimum_reorder_quantity);
		}

		if ($this->isColumnModified(ProductTableMap::COL_CATEGORY)) {
			$criteria->add(ProductTableMap::COL_CATEGORY, $this->category);
		}

		if ($this->isColumnModified(ProductTableMap::COL_ATTACHMENTS)) {
			$criteria->add(ProductTableMap::COL_ATTACHMENTS, $this->attachments);
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
		$criteria = ChildProductQuery::create();
		$criteria->add(ProductTableMap::COL_PRODUCT_ID, $this->product_id);

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
		$this->product_id = null;
		$this->product_code = null;
		$this->product_name = null;
		$this->description = null;
		$this->standard_cost = null;
		$this->list_price = null;
		$this->reorder_level = null;
		$this->target_level = null;
		$this->quantity_per_unit = null;
		$this->discontinued = null;
		$this->minimum_reorder_quantity = null;
		$this->category = null;
		$this->attachments = null;
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
	 * @return \SOB\Propel2\Product Clone of current object.
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
	 * @param object $copyObj An object of \SOB\Propel2\Product (or compatible) type.
	 * @param bool $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
	 * @param bool $makeNew Whether to reset autoincrement PKs and make the object new.
	 * @throws \Propel\Runtime\Exception\PropelException
	 */
	public function copyInto(object $copyObj, bool $deepCopy = false, bool $makeNew = true) : void
	{
		$copyObj->setProductCode($this->getProductCode());
		$copyObj->setProductName($this->getProductName());
		$copyObj->setDescription($this->getDescription());
		$copyObj->setStandardCost($this->getStandardCost());
		$copyObj->setListPrice($this->getListPrice());
		$copyObj->setReorderLevel($this->getReorderLevel());
		$copyObj->setTargetLevel($this->getTargetLevel());
		$copyObj->setQuantityPerUnit($this->getQuantityPerUnit());
		$copyObj->setDiscontinued($this->getDiscontinued());
		$copyObj->setMinimumReorderQuantity($this->getMinimumReorderQuantity());
		$copyObj->setCategory($this->getCategory());
		$copyObj->setAttachments($this->getAttachments());

		if ($makeNew) {
			$copyObj->setNew(true);
			$copyObj->setProductId(null); // this is a auto-increment column, so set to default value
		}
	}

	/**
	 * Removes this object from datastore and sets delete attribute.
	 *
	 * @throws \Propel\Runtime\Exception\PropelException
	 * @see Product::setDeleted()
	 * @see Product::isDeleted()
	 */
	public function delete(?ConnectionInterface $con = null) : void
	{
		if ($this->isDeleted()) {
			throw new PropelException('This object has already been deleted.');
		}

		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(ProductTableMap::DATABASE_NAME);
		}

		$con->transaction(function() use ($con) : void {
			$deleteQuery = ChildProductQuery::create()
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
	 * Compares this with another <code>Product</code> instance.  If
	 * <code>obj</code> is an instance of <code>Product</code>, delegates to
	 * <code>equals(Product)</code>.  Otherwise, returns <code>false</code>.
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
		$keys = ProductTableMap::getFieldNames($keyType);

		if (\array_key_exists($keys[0], $arr)) {
			$this->setProductId($arr[$keys[0]]);
		}

		if (\array_key_exists($keys[1], $arr)) {
			$this->setProductCode($arr[$keys[1]]);
		}

		if (\array_key_exists($keys[2], $arr)) {
			$this->setProductName($arr[$keys[2]]);
		}

		if (\array_key_exists($keys[3], $arr)) {
			$this->setDescription($arr[$keys[3]]);
		}

		if (\array_key_exists($keys[4], $arr)) {
			$this->setStandardCost($arr[$keys[4]]);
		}

		if (\array_key_exists($keys[5], $arr)) {
			$this->setListPrice($arr[$keys[5]]);
		}

		if (\array_key_exists($keys[6], $arr)) {
			$this->setReorderLevel($arr[$keys[6]]);
		}

		if (\array_key_exists($keys[7], $arr)) {
			$this->setTargetLevel($arr[$keys[7]]);
		}

		if (\array_key_exists($keys[8], $arr)) {
			$this->setQuantityPerUnit($arr[$keys[8]]);
		}

		if (\array_key_exists($keys[9], $arr)) {
			$this->setDiscontinued($arr[$keys[9]]);
		}

		if (\array_key_exists($keys[10], $arr)) {
			$this->setMinimumReorderQuantity($arr[$keys[10]]);
		}

		if (\array_key_exists($keys[11], $arr)) {
			$this->setCategory($arr[$keys[11]]);
		}

		if (\array_key_exists($keys[12], $arr)) {
			$this->setAttachments($arr[$keys[12]]);
		}

		return $this;
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
		$pos = ProductTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
				return $this->getProductId();

			case 1:
				return $this->getProductCode();

			case 2:
				return $this->getProductName();

			case 3:
				return $this->getDescription();

			case 4:
				return $this->getStandardCost();

			case 5:
				return $this->getListPrice();

			case 6:
				return $this->getReorderLevel();

			case 7:
				return $this->getTargetLevel();

			case 8:
				return $this->getQuantityPerUnit();

			case 9:
				return $this->getDiscontinued();

			case 10:
				return $this->getMinimumReorderQuantity();

			case 11:
				return $this->getCategory();

			case 12:
				return $this->getAttachments();

			default:
				return;
		} // switch()
	}

	/**
	 * Get the [category] column value.
	 *
	 * @return string|null
	 */
	public function getCategory()
	{
		return $this->category;
	}

	/**
	 * Get the [description] column value.
	 *
	 * @return string|null
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Get the [discontinued] column value.
	 *
	 * @return int
	 */
	public function getDiscontinued()
	{
		return $this->discontinued;
	}

	/**
	 * Get the [list_price] column value.
	 *
	 * @return string
	 */
	public function getListPrice()
	{
		return $this->list_price;
	}

	/**
	 * Get the [minimum_reorder_quantity] column value.
	 *
	 * @return int|null
	 */
	public function getMinimumReorderQuantity()
	{
		return $this->minimum_reorder_quantity;
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
	 * Returns the primary key for this object (row).
	 * @return int
	 */
	public function getPrimaryKey()
	{
		return $this->getProductId();
	}

	/**
	 * Get the [product_code] column value.
	 *
	 * @return string|null
	 */
	public function getProductCode()
	{
		return $this->product_code;
	}

	/**
	 * Get the [product_id] column value.
	 *
	 * @return int
	 */
	public function getProductId()
	{
		return $this->product_id;
	}

	/**
	 * Get the [product_name] column value.
	 *
	 * @return string|null
	 */
	public function getProductName()
	{
		return $this->product_name;
	}

	/**
	 * Get the [quantity_per_unit] column value.
	 *
	 * @return string|null
	 */
	public function getQuantityPerUnit()
	{
		return $this->quantity_per_unit;
	}

	/**
	 * Get the [reorder_level] column value.
	 *
	 * @return int|null
	 */
	public function getReorderLevel()
	{
		return $this->reorder_level;
	}

	/**
	 * Get the [standard_cost] column value.
	 *
	 * @return string|null
	 */
	public function getStandardCost()
	{
		return $this->standard_cost;
	}

	/**
	 * Get the [target_level] column value.
	 *
	 * @return int|null
	 */
	public function getTargetLevel()
	{
		return $this->target_level;
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
		$validPk = null !== $this->getProductId();

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
			if ('0.0000' !== $this->standard_cost) {
				return false;
			}

			if ('0.0000' !== $this->list_price) {
				return false;
			}

			return ! (0 !== $this->discontinued);



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

			$col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : ProductTableMap::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)];
			$this->product_id = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : ProductTableMap::translateFieldName('ProductCode', TableMap::TYPE_PHPNAME, $indexType)];
			$this->product_code = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : ProductTableMap::translateFieldName('ProductName', TableMap::TYPE_PHPNAME, $indexType)];
			$this->product_name = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : ProductTableMap::translateFieldName('Description', TableMap::TYPE_PHPNAME, $indexType)];
			$this->description = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : ProductTableMap::translateFieldName('StandardCost', TableMap::TYPE_PHPNAME, $indexType)];
			$this->standard_cost = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : ProductTableMap::translateFieldName('ListPrice', TableMap::TYPE_PHPNAME, $indexType)];
			$this->list_price = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : ProductTableMap::translateFieldName('ReorderLevel', TableMap::TYPE_PHPNAME, $indexType)];
			$this->reorder_level = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : ProductTableMap::translateFieldName('TargetLevel', TableMap::TYPE_PHPNAME, $indexType)];
			$this->target_level = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : ProductTableMap::translateFieldName('QuantityPerUnit', TableMap::TYPE_PHPNAME, $indexType)];
			$this->quantity_per_unit = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : ProductTableMap::translateFieldName('Discontinued', TableMap::TYPE_PHPNAME, $indexType)];
			$this->discontinued = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : ProductTableMap::translateFieldName('MinimumReorderQuantity', TableMap::TYPE_PHPNAME, $indexType)];
			$this->minimum_reorder_quantity = (null !== $col) ? (int)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : ProductTableMap::translateFieldName('Category', TableMap::TYPE_PHPNAME, $indexType)];
			$this->category = (null !== $col) ? (string)$col : null;

			$col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : ProductTableMap::translateFieldName('Attachments', TableMap::TYPE_PHPNAME, $indexType)];

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

			return $startcol + 13; // 13 = ProductTableMap::NUM_HYDRATE_COLUMNS.

		} catch (Exception $e) {
			throw new PropelException(\sprintf('Error populating %s object', '\\SOB\\Propel2\\Product'), 0, $e);
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
		return null === $this->getProductId();
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
			$con = Propel::getServiceContainer()->getReadConnection(ProductTableMap::DATABASE_NAME);
		}

		// We don't need to alter the object instance pool; we're just modifying this instance
		// already in the pool.

		$dataFetcher = ChildProductQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
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
			$con = Propel::getServiceContainer()->getWriteConnection(ProductTableMap::DATABASE_NAME);
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
				ProductTableMap::addInstanceToPool($this);
			} else {
				$affectedRows = 0;
			}

			return $affectedRows;
		});
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
		$this->modifiedColumns[ProductTableMap::COL_ATTACHMENTS] = true;

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
		$pos = ProductTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

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
				$this->setProductId($value);

				break;

			case 1:
				$this->setProductCode($value);

				break;

			case 2:
				$this->setProductName($value);

				break;

			case 3:
				$this->setDescription($value);

				break;

			case 4:
				$this->setStandardCost($value);

				break;

			case 5:
				$this->setListPrice($value);

				break;

			case 6:
				$this->setReorderLevel($value);

				break;

			case 7:
				$this->setTargetLevel($value);

				break;

			case 8:
				$this->setQuantityPerUnit($value);

				break;

			case 9:
				$this->setDiscontinued($value);

				break;

			case 10:
				$this->setMinimumReorderQuantity($value);

				break;

			case 11:
				$this->setCategory($value);

				break;

			case 12:
				$this->setAttachments($value);

				break;
		} // switch()

		return $this;
	}

	/**
	 * Set the value of [category] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setCategory($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->category !== $v) {
			$this->category = $v;
			$this->modifiedColumns[ProductTableMap::COL_CATEGORY] = true;
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
	 * Set the value of [description] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setDescription($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[ProductTableMap::COL_DESCRIPTION] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [discontinued] column.
	 *
	 * @param int $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setDiscontinued($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->discontinued !== $v) {
			$this->discontinued = $v;
			$this->modifiedColumns[ProductTableMap::COL_DISCONTINUED] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [list_price] column.
	 *
	 * @param string $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setListPrice($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->list_price !== $v) {
			$this->list_price = $v;
			$this->modifiedColumns[ProductTableMap::COL_LIST_PRICE] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [minimum_reorder_quantity] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setMinimumReorderQuantity($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->minimum_reorder_quantity !== $v) {
			$this->minimum_reorder_quantity = $v;
			$this->modifiedColumns[ProductTableMap::COL_MINIMUM_REORDER_QUANTITY] = true;
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
	 * Generic method to set the primary key (product_id column).
	 *
	 * @param int|null $key Primary key.
	 */
	public function setPrimaryKey(?int $key = null) : void
	{
		$this->setProductId($key);
	}

	/**
	 * Set the value of [product_code] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setProductCode($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->product_code !== $v) {
			$this->product_code = $v;
			$this->modifiedColumns[ProductTableMap::COL_PRODUCT_CODE] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [product_id] column.
	 *
	 * @param int $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setProductId($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->product_id !== $v) {
			$this->product_id = $v;
			$this->modifiedColumns[ProductTableMap::COL_PRODUCT_ID] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [product_name] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setProductName($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->product_name !== $v) {
			$this->product_name = $v;
			$this->modifiedColumns[ProductTableMap::COL_PRODUCT_NAME] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [quantity_per_unit] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setQuantityPerUnit($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->quantity_per_unit !== $v) {
			$this->quantity_per_unit = $v;
			$this->modifiedColumns[ProductTableMap::COL_QUANTITY_PER_UNIT] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [reorder_level] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setReorderLevel($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->reorder_level !== $v) {
			$this->reorder_level = $v;
			$this->modifiedColumns[ProductTableMap::COL_REORDER_LEVEL] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [standard_cost] column.
	 *
	 * @param string|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setStandardCost($v)
	{
		if (null !== $v) {
			$v = (string)$v;
		}

		if ($this->standard_cost !== $v) {
			$this->standard_cost = $v;
			$this->modifiedColumns[ProductTableMap::COL_STANDARD_COST] = true;
		}

		return $this;
	}

	/**
	 * Set the value of [target_level] column.
	 *
	 * @param int|null $v New value
	 * @return $this The current object (for fluent API support)
	 */
	public function setTargetLevel($v)
	{
		if (null !== $v) {
			$v = (int)$v;
		}

		if ($this->target_level !== $v) {
			$this->target_level = $v;
			$this->modifiedColumns[ProductTableMap::COL_TARGET_LEVEL] = true;
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
		if (isset($alreadyDumpedObjects['Product'][$this->hashCode()])) {
			return ['*RECURSION*'];
		}
		$alreadyDumpedObjects['Product'][$this->hashCode()] = true;
		$keys = ProductTableMap::getFieldNames($keyType);
		$result = [
			$keys[0] => $this->getProductId(),
			$keys[1] => $this->getProductCode(),
			$keys[2] => $this->getProductName(),
			$keys[3] => $this->getDescription(),
			$keys[4] => $this->getStandardCost(),
			$keys[5] => $this->getListPrice(),
			$keys[6] => $this->getReorderLevel(),
			$keys[7] => $this->getTargetLevel(),
			$keys[8] => $this->getQuantityPerUnit(),
			$keys[9] => $this->getDiscontinued(),
			$keys[10] => $this->getMinimumReorderQuantity(),
			$keys[11] => $this->getCategory(),
			$keys[12] => $this->getAttachments(),
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

		$this->modifiedColumns[ProductTableMap::COL_PRODUCT_ID] = true;

		if (null !== $this->product_id) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProductTableMap::COL_PRODUCT_ID . ')');
		}

		 // check the columns in natural order for more readable SQL queries
		if ($this->isColumnModified(ProductTableMap::COL_PRODUCT_ID)) {
			$modifiedColumns[':p' . $index++] = 'product_id';
		}

		if ($this->isColumnModified(ProductTableMap::COL_PRODUCT_CODE)) {
			$modifiedColumns[':p' . $index++] = 'product_code';
		}

		if ($this->isColumnModified(ProductTableMap::COL_PRODUCT_NAME)) {
			$modifiedColumns[':p' . $index++] = 'product_name';
		}

		if ($this->isColumnModified(ProductTableMap::COL_DESCRIPTION)) {
			$modifiedColumns[':p' . $index++] = 'description';
		}

		if ($this->isColumnModified(ProductTableMap::COL_STANDARD_COST)) {
			$modifiedColumns[':p' . $index++] = 'standard_cost';
		}

		if ($this->isColumnModified(ProductTableMap::COL_LIST_PRICE)) {
			$modifiedColumns[':p' . $index++] = 'list_price';
		}

		if ($this->isColumnModified(ProductTableMap::COL_REORDER_LEVEL)) {
			$modifiedColumns[':p' . $index++] = 'reorder_level';
		}

		if ($this->isColumnModified(ProductTableMap::COL_TARGET_LEVEL)) {
			$modifiedColumns[':p' . $index++] = 'target_level';
		}

		if ($this->isColumnModified(ProductTableMap::COL_QUANTITY_PER_UNIT)) {
			$modifiedColumns[':p' . $index++] = 'quantity_per_unit';
		}

		if ($this->isColumnModified(ProductTableMap::COL_DISCONTINUED)) {
			$modifiedColumns[':p' . $index++] = 'discontinued';
		}

		if ($this->isColumnModified(ProductTableMap::COL_MINIMUM_REORDER_QUANTITY)) {
			$modifiedColumns[':p' . $index++] = 'minimum_reorder_quantity';
		}

		if ($this->isColumnModified(ProductTableMap::COL_CATEGORY)) {
			$modifiedColumns[':p' . $index++] = 'category';
		}

		if ($this->isColumnModified(ProductTableMap::COL_ATTACHMENTS)) {
			$modifiedColumns[':p' . $index++] = 'attachments';
		}

		$sql = \sprintf(
			'INSERT INTO product (%s) VALUES (%s)',
			\implode(', ', $modifiedColumns),
			\implode(', ', \array_keys($modifiedColumns))
		);

		try {
			$stmt = $con->prepare($sql);

			foreach ($modifiedColumns as $identifier => $columnName) {
				switch ($columnName) {
					case 'product_id':
						$stmt->bindValue($identifier, $this->product_id, PDO::PARAM_INT);

						break;

					case 'product_code':
						$stmt->bindValue($identifier, $this->product_code, PDO::PARAM_STR);

						break;

					case 'product_name':
						$stmt->bindValue($identifier, $this->product_name, PDO::PARAM_STR);

						break;

					case 'description':
						$stmt->bindValue($identifier, $this->description, PDO::PARAM_STR);

						break;

					case 'standard_cost':
						$stmt->bindValue($identifier, $this->standard_cost, PDO::PARAM_STR);

						break;

					case 'list_price':
						$stmt->bindValue($identifier, $this->list_price, PDO::PARAM_STR);

						break;

					case 'reorder_level':
						$stmt->bindValue($identifier, $this->reorder_level, PDO::PARAM_INT);

						break;

					case 'target_level':
						$stmt->bindValue($identifier, $this->target_level, PDO::PARAM_INT);

						break;

					case 'quantity_per_unit':
						$stmt->bindValue($identifier, $this->quantity_per_unit, PDO::PARAM_STR);

						break;

					case 'discontinued':
						$stmt->bindValue($identifier, $this->discontinued, PDO::PARAM_INT);

						break;

					case 'minimum_reorder_quantity':
						$stmt->bindValue($identifier, $this->minimum_reorder_quantity, PDO::PARAM_INT);

						break;

					case 'category':
						$stmt->bindValue($identifier, $this->category, PDO::PARAM_STR);

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
		$this->setProductId($pk);

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
