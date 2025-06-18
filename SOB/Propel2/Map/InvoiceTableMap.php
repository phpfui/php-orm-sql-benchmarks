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
use SOB\Propel2\Invoice;
use SOB\Propel2\InvoiceQuery;

/**
 * This class defines the structure of the 'invoice' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class InvoiceTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.Invoice';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.InvoiceTableMap';

	/**
	 * the column name for the amount_due field
	 */
	public const COL_AMOUNT_DUE = 'invoice.amount_due';

	/**
	 * the column name for the due_date field
	 */
	public const COL_DUE_DATE = 'invoice.due_date';

	/**
	 * the column name for the invoice_date field
	 */
	public const COL_INVOICE_DATE = 'invoice.invoice_date';

	/**
	 * the column name for the invoice_id field
	 */
	public const COL_INVOICE_ID = 'invoice.invoice_id';

	/**
	 * the column name for the order_id field
	 */
	public const COL_ORDER_ID = 'invoice.order_id';

	/**
	 * the column name for the shipping field
	 */
	public const COL_SHIPPING = 'invoice.shipping';

	/**
	 * the column name for the tax field
	 */
	public const COL_TAX = 'invoice.tax';

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
	public const NUM_COLUMNS = 7;

	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	public const NUM_HYDRATE_COLUMNS = 7;

	/**
	 * The number of lazy-loaded columns
	 */
	public const NUM_LAZY_LOAD_COLUMNS = 0;

	/**
	 * The related Propel class for this table
	 */
	public const OM_CLASS = '\\SOB\\Propel2\\Invoice';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'invoice';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'Invoice';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['InvoiceId' => 0, 'OrderId' => 1, 'InvoiceDate' => 2, 'DueDate' => 3, 'Tax' => 4, 'Shipping' => 5, 'AmountDue' => 6, ],
		self::TYPE_CAMELNAME => ['invoiceId' => 0, 'orderId' => 1, 'invoiceDate' => 2, 'dueDate' => 3, 'tax' => 4, 'shipping' => 5, 'amountDue' => 6, ],
		self::TYPE_COLNAME => [InvoiceTableMap::COL_INVOICE_ID => 0, InvoiceTableMap::COL_ORDER_ID => 1, InvoiceTableMap::COL_INVOICE_DATE => 2, InvoiceTableMap::COL_DUE_DATE => 3, InvoiceTableMap::COL_TAX => 4, InvoiceTableMap::COL_SHIPPING => 5, InvoiceTableMap::COL_AMOUNT_DUE => 6, ],
		self::TYPE_FIELDNAME => ['invoice_id' => 0, 'order_id' => 1, 'invoice_date' => 2, 'due_date' => 3, 'tax' => 4, 'shipping' => 5, 'amount_due' => 6, ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, ]
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
		self::TYPE_PHPNAME => ['InvoiceId', 'OrderId', 'InvoiceDate', 'DueDate', 'Tax', 'Shipping', 'AmountDue', ],
		self::TYPE_CAMELNAME => ['invoiceId', 'orderId', 'invoiceDate', 'dueDate', 'tax', 'shipping', 'amountDue', ],
		self::TYPE_COLNAME => [InvoiceTableMap::COL_INVOICE_ID, InvoiceTableMap::COL_ORDER_ID, InvoiceTableMap::COL_INVOICE_DATE, InvoiceTableMap::COL_DUE_DATE, InvoiceTableMap::COL_TAX, InvoiceTableMap::COL_SHIPPING, InvoiceTableMap::COL_AMOUNT_DUE, ],
		self::TYPE_FIELDNAME => ['invoice_id', 'order_id', 'invoice_date', 'due_date', 'tax', 'shipping', 'amount_due', ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'InvoiceId' => 'INVOICE_ID',
		'Invoice.InvoiceId' => 'INVOICE_ID',
		'invoiceId' => 'INVOICE_ID',
		'invoice.invoiceId' => 'INVOICE_ID',
		'InvoiceTableMap::COL_INVOICE_ID' => 'INVOICE_ID',
		'COL_INVOICE_ID' => 'INVOICE_ID',
		'invoice_id' => 'INVOICE_ID',
		'invoice.invoice_id' => 'INVOICE_ID',
		'OrderId' => 'ORDER_ID',
		'Invoice.OrderId' => 'ORDER_ID',
		'orderId' => 'ORDER_ID',
		'invoice.orderId' => 'ORDER_ID',
		'InvoiceTableMap::COL_ORDER_ID' => 'ORDER_ID',
		'COL_ORDER_ID' => 'ORDER_ID',
		'order_id' => 'ORDER_ID',
		'invoice.order_id' => 'ORDER_ID',
		'InvoiceDate' => 'INVOICE_DATE',
		'Invoice.InvoiceDate' => 'INVOICE_DATE',
		'invoiceDate' => 'INVOICE_DATE',
		'invoice.invoiceDate' => 'INVOICE_DATE',
		'InvoiceTableMap::COL_INVOICE_DATE' => 'INVOICE_DATE',
		'COL_INVOICE_DATE' => 'INVOICE_DATE',
		'invoice_date' => 'INVOICE_DATE',
		'invoice.invoice_date' => 'INVOICE_DATE',
		'DueDate' => 'DUE_DATE',
		'Invoice.DueDate' => 'DUE_DATE',
		'dueDate' => 'DUE_DATE',
		'invoice.dueDate' => 'DUE_DATE',
		'InvoiceTableMap::COL_DUE_DATE' => 'DUE_DATE',
		'COL_DUE_DATE' => 'DUE_DATE',
		'due_date' => 'DUE_DATE',
		'invoice.due_date' => 'DUE_DATE',
		'Tax' => 'TAX',
		'Invoice.Tax' => 'TAX',
		'tax' => 'TAX',
		'invoice.tax' => 'TAX',
		'InvoiceTableMap::COL_TAX' => 'TAX',
		'COL_TAX' => 'TAX',
		'Shipping' => 'SHIPPING',
		'Invoice.Shipping' => 'SHIPPING',
		'shipping' => 'SHIPPING',
		'invoice.shipping' => 'SHIPPING',
		'InvoiceTableMap::COL_SHIPPING' => 'SHIPPING',
		'COL_SHIPPING' => 'SHIPPING',
		'AmountDue' => 'AMOUNT_DUE',
		'Invoice.AmountDue' => 'AMOUNT_DUE',
		'amountDue' => 'AMOUNT_DUE',
		'invoice.amountDue' => 'AMOUNT_DUE',
		'InvoiceTableMap::COL_AMOUNT_DUE' => 'AMOUNT_DUE',
		'COL_AMOUNT_DUE' => 'AMOUNT_DUE',
		'amount_due' => 'AMOUNT_DUE',
		'invoice.amount_due' => 'AMOUNT_DUE',
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
			$criteria->addSelectColumn(InvoiceTableMap::COL_INVOICE_ID);
			$criteria->addSelectColumn(InvoiceTableMap::COL_ORDER_ID);
			$criteria->addSelectColumn(InvoiceTableMap::COL_INVOICE_DATE);
			$criteria->addSelectColumn(InvoiceTableMap::COL_DUE_DATE);
			$criteria->addSelectColumn(InvoiceTableMap::COL_TAX);
			$criteria->addSelectColumn(InvoiceTableMap::COL_SHIPPING);
			$criteria->addSelectColumn(InvoiceTableMap::COL_AMOUNT_DUE);
		} else {
			$criteria->addSelectColumn($alias . '.invoice_id');
			$criteria->addSelectColumn($alias . '.order_id');
			$criteria->addSelectColumn($alias . '.invoice_date');
			$criteria->addSelectColumn($alias . '.due_date');
			$criteria->addSelectColumn($alias . '.tax');
			$criteria->addSelectColumn($alias . '.shipping');
			$criteria->addSelectColumn($alias . '.amount_due');
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
	 * Performs a DELETE on the database, given a Invoice or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or Invoice object or primary key or array of primary keys
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
			$con = Propel::getServiceContainer()->getWriteConnection(InvoiceTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\Invoice) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(InvoiceTableMap::DATABASE_NAME);
			$criteria->add(InvoiceTableMap::COL_INVOICE_ID, (array)$values, Criteria::IN);
		}

		$query = InvoiceQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			InvoiceTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				InvoiceTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the invoice table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return InvoiceQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a Invoice or Criteria object.
	 *
	 * @param mixed $criteria Criteria or Invoice object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(InvoiceTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from Invoice object
		}

		if ($criteria->containsKey(InvoiceTableMap::COL_INVOICE_ID) && $criteria->keyContainsValue(InvoiceTableMap::COL_INVOICE_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . InvoiceTableMap::COL_INVOICE_ID . ')');
		}


		// Set the correct dbName
		$query = InvoiceQuery::create()->mergeWith($criteria);

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
		return $withPrefix ? InvoiceTableMap::CLASS_DEFAULT : InvoiceTableMap::OM_CLASS;
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
				: self::translateFieldName('InvoiceId', TableMap::TYPE_PHPNAME, $indexType)
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
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InvoiceId', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InvoiceId', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InvoiceId', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InvoiceId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InvoiceId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('InvoiceId', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(InvoiceTableMap::DATABASE_NAME)->getTable(InvoiceTableMap::TABLE_NAME);
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
		$this->setName('invoice');
		$this->setPhpName('Invoice');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\Invoice');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('invoice_id', 'InvoiceId', 'INTEGER', true, null, null);
		$this->addColumn('order_id', 'OrderId', 'INTEGER', false, null, null);
		$this->addColumn('invoice_date', 'InvoiceDate', 'DATETIME', true, null, 'CURRENT_TIMESTAMP');
		$this->addColumn('due_date', 'DueDate', 'DATETIME', false, null, null);
		$this->addColumn('tax', 'Tax', 'DECIMAL', false, 19, 0.0000);
		$this->addColumn('shipping', 'Shipping', 'DECIMAL', false, 19, 0.0000);
		$this->addColumn('amount_due', 'AmountDue', 'DECIMAL', false, 19, 0.0000);
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
	 * @return array (Invoice object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = InvoiceTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = InvoiceTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + InvoiceTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = InvoiceTableMap::OM_CLASS;
			/** @var Invoice $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			InvoiceTableMap::addInstanceToPool($obj, $key);
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
			$key = InvoiceTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = InvoiceTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var Invoice $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				InvoiceTableMap::addInstanceToPool($obj, $key);
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
			$criteria->removeSelectColumn(InvoiceTableMap::COL_INVOICE_ID);
			$criteria->removeSelectColumn(InvoiceTableMap::COL_ORDER_ID);
			$criteria->removeSelectColumn(InvoiceTableMap::COL_INVOICE_DATE);
			$criteria->removeSelectColumn(InvoiceTableMap::COL_DUE_DATE);
			$criteria->removeSelectColumn(InvoiceTableMap::COL_TAX);
			$criteria->removeSelectColumn(InvoiceTableMap::COL_SHIPPING);
			$criteria->removeSelectColumn(InvoiceTableMap::COL_AMOUNT_DUE);
		} else {
			$criteria->removeSelectColumn($alias . '.invoice_id');
			$criteria->removeSelectColumn($alias . '.order_id');
			$criteria->removeSelectColumn($alias . '.invoice_date');
			$criteria->removeSelectColumn($alias . '.due_date');
			$criteria->removeSelectColumn($alias . '.tax');
			$criteria->removeSelectColumn($alias . '.shipping');
			$criteria->removeSelectColumn($alias . '.amount_due');
		}
	}
}
