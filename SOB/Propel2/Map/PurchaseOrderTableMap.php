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
use SOB\Propel2\PurchaseOrder;
use SOB\Propel2\PurchaseOrderQuery;

/**
 * This class defines the structure of the 'purchase_order' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class PurchaseOrderTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.PurchaseOrder';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.PurchaseOrderTableMap';

	/**
	 * the column name for the approved_by field
	 */
	public const COL_APPROVED_BY = 'purchase_order.approved_by';

	/**
	 * the column name for the approved_date field
	 */
	public const COL_APPROVED_DATE = 'purchase_order.approved_date';

	/**
	 * the column name for the created_by field
	 */
	public const COL_CREATED_BY = 'purchase_order.created_by';

	/**
	 * the column name for the creation_date field
	 */
	public const COL_CREATION_DATE = 'purchase_order.creation_date';

	/**
	 * the column name for the expected_date field
	 */
	public const COL_EXPECTED_DATE = 'purchase_order.expected_date';

	/**
	 * the column name for the notes field
	 */
	public const COL_NOTES = 'purchase_order.notes';

	/**
	 * the column name for the payment_amount field
	 */
	public const COL_PAYMENT_AMOUNT = 'purchase_order.payment_amount';

	/**
	 * the column name for the payment_date field
	 */
	public const COL_PAYMENT_DATE = 'purchase_order.payment_date';

	/**
	 * the column name for the payment_method field
	 */
	public const COL_PAYMENT_METHOD = 'purchase_order.payment_method';

	/**
	 * the column name for the purchase_order_id field
	 */
	public const COL_PURCHASE_ORDER_ID = 'purchase_order.purchase_order_id';

	/**
	 * the column name for the purchase_order_status_id field
	 */
	public const COL_PURCHASE_ORDER_STATUS_ID = 'purchase_order.purchase_order_status_id';

	/**
	 * the column name for the shipping_fee field
	 */
	public const COL_SHIPPING_FEE = 'purchase_order.shipping_fee';

	/**
	 * the column name for the submitted_by field
	 */
	public const COL_SUBMITTED_BY = 'purchase_order.submitted_by';

	/**
	 * the column name for the submitted_date field
	 */
	public const COL_SUBMITTED_DATE = 'purchase_order.submitted_date';

	/**
	 * the column name for the supplier_id field
	 */
	public const COL_SUPPLIER_ID = 'purchase_order.supplier_id';

	/**
	 * the column name for the taxes field
	 */
	public const COL_TAXES = 'purchase_order.taxes';

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
	public const NUM_COLUMNS = 16;

	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	public const NUM_HYDRATE_COLUMNS = 16;

	/**
	 * The number of lazy-loaded columns
	 */
	public const NUM_LAZY_LOAD_COLUMNS = 0;

	/**
	 * The related Propel class for this table
	 */
	public const OM_CLASS = '\\SOB\\Propel2\\PurchaseOrder';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'purchase_order';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'PurchaseOrder';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['PurchaseOrderId' => 0, 'SupplierId' => 1, 'CreatedBy' => 2, 'SubmittedDate' => 3, 'CreationDate' => 4, 'PurchaseOrderStatusId' => 5, 'ExpectedDate' => 6, 'ShippingFee' => 7, 'Taxes' => 8, 'PaymentDate' => 9, 'PaymentAmount' => 10, 'PaymentMethod' => 11, 'Notes' => 12, 'ApprovedBy' => 13, 'ApprovedDate' => 14, 'SubmittedBy' => 15, ],
		self::TYPE_CAMELNAME => ['purchaseOrderId' => 0, 'supplierId' => 1, 'createdBy' => 2, 'submittedDate' => 3, 'creationDate' => 4, 'purchaseOrderStatusId' => 5, 'expectedDate' => 6, 'shippingFee' => 7, 'taxes' => 8, 'paymentDate' => 9, 'paymentAmount' => 10, 'paymentMethod' => 11, 'notes' => 12, 'approvedBy' => 13, 'approvedDate' => 14, 'submittedBy' => 15, ],
		self::TYPE_COLNAME => [PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID => 0, PurchaseOrderTableMap::COL_SUPPLIER_ID => 1, PurchaseOrderTableMap::COL_CREATED_BY => 2, PurchaseOrderTableMap::COL_SUBMITTED_DATE => 3, PurchaseOrderTableMap::COL_CREATION_DATE => 4, PurchaseOrderTableMap::COL_PURCHASE_ORDER_STATUS_ID => 5, PurchaseOrderTableMap::COL_EXPECTED_DATE => 6, PurchaseOrderTableMap::COL_SHIPPING_FEE => 7, PurchaseOrderTableMap::COL_TAXES => 8, PurchaseOrderTableMap::COL_PAYMENT_DATE => 9, PurchaseOrderTableMap::COL_PAYMENT_AMOUNT => 10, PurchaseOrderTableMap::COL_PAYMENT_METHOD => 11, PurchaseOrderTableMap::COL_NOTES => 12, PurchaseOrderTableMap::COL_APPROVED_BY => 13, PurchaseOrderTableMap::COL_APPROVED_DATE => 14, PurchaseOrderTableMap::COL_SUBMITTED_BY => 15, ],
		self::TYPE_FIELDNAME => ['purchase_order_id' => 0, 'supplier_id' => 1, 'created_by' => 2, 'submitted_date' => 3, 'creation_date' => 4, 'purchase_order_status_id' => 5, 'expected_date' => 6, 'shipping_fee' => 7, 'taxes' => 8, 'payment_date' => 9, 'payment_amount' => 10, 'payment_method' => 11, 'notes' => 12, 'approved_by' => 13, 'approved_date' => 14, 'submitted_by' => 15, ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, ]
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
		self::TYPE_PHPNAME => ['PurchaseOrderId', 'SupplierId', 'CreatedBy', 'SubmittedDate', 'CreationDate', 'PurchaseOrderStatusId', 'ExpectedDate', 'ShippingFee', 'Taxes', 'PaymentDate', 'PaymentAmount', 'PaymentMethod', 'Notes', 'ApprovedBy', 'ApprovedDate', 'SubmittedBy', ],
		self::TYPE_CAMELNAME => ['purchaseOrderId', 'supplierId', 'createdBy', 'submittedDate', 'creationDate', 'purchaseOrderStatusId', 'expectedDate', 'shippingFee', 'taxes', 'paymentDate', 'paymentAmount', 'paymentMethod', 'notes', 'approvedBy', 'approvedDate', 'submittedBy', ],
		self::TYPE_COLNAME => [PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID, PurchaseOrderTableMap::COL_SUPPLIER_ID, PurchaseOrderTableMap::COL_CREATED_BY, PurchaseOrderTableMap::COL_SUBMITTED_DATE, PurchaseOrderTableMap::COL_CREATION_DATE, PurchaseOrderTableMap::COL_PURCHASE_ORDER_STATUS_ID, PurchaseOrderTableMap::COL_EXPECTED_DATE, PurchaseOrderTableMap::COL_SHIPPING_FEE, PurchaseOrderTableMap::COL_TAXES, PurchaseOrderTableMap::COL_PAYMENT_DATE, PurchaseOrderTableMap::COL_PAYMENT_AMOUNT, PurchaseOrderTableMap::COL_PAYMENT_METHOD, PurchaseOrderTableMap::COL_NOTES, PurchaseOrderTableMap::COL_APPROVED_BY, PurchaseOrderTableMap::COL_APPROVED_DATE, PurchaseOrderTableMap::COL_SUBMITTED_BY, ],
		self::TYPE_FIELDNAME => ['purchase_order_id', 'supplier_id', 'created_by', 'submitted_date', 'creation_date', 'purchase_order_status_id', 'expected_date', 'shipping_fee', 'taxes', 'payment_date', 'payment_amount', 'payment_method', 'notes', 'approved_by', 'approved_date', 'submitted_by', ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'PurchaseOrderId' => 'PURCHASE_ORDER_ID',
		'PurchaseOrder.PurchaseOrderId' => 'PURCHASE_ORDER_ID',
		'purchaseOrderId' => 'PURCHASE_ORDER_ID',
		'purchaseOrder.purchaseOrderId' => 'PURCHASE_ORDER_ID',
		'PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID' => 'PURCHASE_ORDER_ID',
		'COL_PURCHASE_ORDER_ID' => 'PURCHASE_ORDER_ID',
		'purchase_order_id' => 'PURCHASE_ORDER_ID',
		'purchase_order.purchase_order_id' => 'PURCHASE_ORDER_ID',
		'SupplierId' => 'SUPPLIER_ID',
		'PurchaseOrder.SupplierId' => 'SUPPLIER_ID',
		'supplierId' => 'SUPPLIER_ID',
		'purchaseOrder.supplierId' => 'SUPPLIER_ID',
		'PurchaseOrderTableMap::COL_SUPPLIER_ID' => 'SUPPLIER_ID',
		'COL_SUPPLIER_ID' => 'SUPPLIER_ID',
		'supplier_id' => 'SUPPLIER_ID',
		'purchase_order.supplier_id' => 'SUPPLIER_ID',
		'CreatedBy' => 'CREATED_BY',
		'PurchaseOrder.CreatedBy' => 'CREATED_BY',
		'createdBy' => 'CREATED_BY',
		'purchaseOrder.createdBy' => 'CREATED_BY',
		'PurchaseOrderTableMap::COL_CREATED_BY' => 'CREATED_BY',
		'COL_CREATED_BY' => 'CREATED_BY',
		'created_by' => 'CREATED_BY',
		'purchase_order.created_by' => 'CREATED_BY',
		'SubmittedDate' => 'SUBMITTED_DATE',
		'PurchaseOrder.SubmittedDate' => 'SUBMITTED_DATE',
		'submittedDate' => 'SUBMITTED_DATE',
		'purchaseOrder.submittedDate' => 'SUBMITTED_DATE',
		'PurchaseOrderTableMap::COL_SUBMITTED_DATE' => 'SUBMITTED_DATE',
		'COL_SUBMITTED_DATE' => 'SUBMITTED_DATE',
		'submitted_date' => 'SUBMITTED_DATE',
		'purchase_order.submitted_date' => 'SUBMITTED_DATE',
		'CreationDate' => 'CREATION_DATE',
		'PurchaseOrder.CreationDate' => 'CREATION_DATE',
		'creationDate' => 'CREATION_DATE',
		'purchaseOrder.creationDate' => 'CREATION_DATE',
		'PurchaseOrderTableMap::COL_CREATION_DATE' => 'CREATION_DATE',
		'COL_CREATION_DATE' => 'CREATION_DATE',
		'creation_date' => 'CREATION_DATE',
		'purchase_order.creation_date' => 'CREATION_DATE',
		'PurchaseOrderStatusId' => 'PURCHASE_ORDER_STATUS_ID',
		'PurchaseOrder.PurchaseOrderStatusId' => 'PURCHASE_ORDER_STATUS_ID',
		'purchaseOrderStatusId' => 'PURCHASE_ORDER_STATUS_ID',
		'purchaseOrder.purchaseOrderStatusId' => 'PURCHASE_ORDER_STATUS_ID',
		'PurchaseOrderTableMap::COL_PURCHASE_ORDER_STATUS_ID' => 'PURCHASE_ORDER_STATUS_ID',
		'COL_PURCHASE_ORDER_STATUS_ID' => 'PURCHASE_ORDER_STATUS_ID',
		'purchase_order_status_id' => 'PURCHASE_ORDER_STATUS_ID',
		'purchase_order.purchase_order_status_id' => 'PURCHASE_ORDER_STATUS_ID',
		'ExpectedDate' => 'EXPECTED_DATE',
		'PurchaseOrder.ExpectedDate' => 'EXPECTED_DATE',
		'expectedDate' => 'EXPECTED_DATE',
		'purchaseOrder.expectedDate' => 'EXPECTED_DATE',
		'PurchaseOrderTableMap::COL_EXPECTED_DATE' => 'EXPECTED_DATE',
		'COL_EXPECTED_DATE' => 'EXPECTED_DATE',
		'expected_date' => 'EXPECTED_DATE',
		'purchase_order.expected_date' => 'EXPECTED_DATE',
		'ShippingFee' => 'SHIPPING_FEE',
		'PurchaseOrder.ShippingFee' => 'SHIPPING_FEE',
		'shippingFee' => 'SHIPPING_FEE',
		'purchaseOrder.shippingFee' => 'SHIPPING_FEE',
		'PurchaseOrderTableMap::COL_SHIPPING_FEE' => 'SHIPPING_FEE',
		'COL_SHIPPING_FEE' => 'SHIPPING_FEE',
		'shipping_fee' => 'SHIPPING_FEE',
		'purchase_order.shipping_fee' => 'SHIPPING_FEE',
		'Taxes' => 'TAXES',
		'PurchaseOrder.Taxes' => 'TAXES',
		'taxes' => 'TAXES',
		'purchaseOrder.taxes' => 'TAXES',
		'PurchaseOrderTableMap::COL_TAXES' => 'TAXES',
		'COL_TAXES' => 'TAXES',
		'purchase_order.taxes' => 'TAXES',
		'PaymentDate' => 'PAYMENT_DATE',
		'PurchaseOrder.PaymentDate' => 'PAYMENT_DATE',
		'paymentDate' => 'PAYMENT_DATE',
		'purchaseOrder.paymentDate' => 'PAYMENT_DATE',
		'PurchaseOrderTableMap::COL_PAYMENT_DATE' => 'PAYMENT_DATE',
		'COL_PAYMENT_DATE' => 'PAYMENT_DATE',
		'payment_date' => 'PAYMENT_DATE',
		'purchase_order.payment_date' => 'PAYMENT_DATE',
		'PaymentAmount' => 'PAYMENT_AMOUNT',
		'PurchaseOrder.PaymentAmount' => 'PAYMENT_AMOUNT',
		'paymentAmount' => 'PAYMENT_AMOUNT',
		'purchaseOrder.paymentAmount' => 'PAYMENT_AMOUNT',
		'PurchaseOrderTableMap::COL_PAYMENT_AMOUNT' => 'PAYMENT_AMOUNT',
		'COL_PAYMENT_AMOUNT' => 'PAYMENT_AMOUNT',
		'payment_amount' => 'PAYMENT_AMOUNT',
		'purchase_order.payment_amount' => 'PAYMENT_AMOUNT',
		'PaymentMethod' => 'PAYMENT_METHOD',
		'PurchaseOrder.PaymentMethod' => 'PAYMENT_METHOD',
		'paymentMethod' => 'PAYMENT_METHOD',
		'purchaseOrder.paymentMethod' => 'PAYMENT_METHOD',
		'PurchaseOrderTableMap::COL_PAYMENT_METHOD' => 'PAYMENT_METHOD',
		'COL_PAYMENT_METHOD' => 'PAYMENT_METHOD',
		'payment_method' => 'PAYMENT_METHOD',
		'purchase_order.payment_method' => 'PAYMENT_METHOD',
		'Notes' => 'NOTES',
		'PurchaseOrder.Notes' => 'NOTES',
		'notes' => 'NOTES',
		'purchaseOrder.notes' => 'NOTES',
		'PurchaseOrderTableMap::COL_NOTES' => 'NOTES',
		'COL_NOTES' => 'NOTES',
		'purchase_order.notes' => 'NOTES',
		'ApprovedBy' => 'APPROVED_BY',
		'PurchaseOrder.ApprovedBy' => 'APPROVED_BY',
		'approvedBy' => 'APPROVED_BY',
		'purchaseOrder.approvedBy' => 'APPROVED_BY',
		'PurchaseOrderTableMap::COL_APPROVED_BY' => 'APPROVED_BY',
		'COL_APPROVED_BY' => 'APPROVED_BY',
		'approved_by' => 'APPROVED_BY',
		'purchase_order.approved_by' => 'APPROVED_BY',
		'ApprovedDate' => 'APPROVED_DATE',
		'PurchaseOrder.ApprovedDate' => 'APPROVED_DATE',
		'approvedDate' => 'APPROVED_DATE',
		'purchaseOrder.approvedDate' => 'APPROVED_DATE',
		'PurchaseOrderTableMap::COL_APPROVED_DATE' => 'APPROVED_DATE',
		'COL_APPROVED_DATE' => 'APPROVED_DATE',
		'approved_date' => 'APPROVED_DATE',
		'purchase_order.approved_date' => 'APPROVED_DATE',
		'SubmittedBy' => 'SUBMITTED_BY',
		'PurchaseOrder.SubmittedBy' => 'SUBMITTED_BY',
		'submittedBy' => 'SUBMITTED_BY',
		'purchaseOrder.submittedBy' => 'SUBMITTED_BY',
		'PurchaseOrderTableMap::COL_SUBMITTED_BY' => 'SUBMITTED_BY',
		'COL_SUBMITTED_BY' => 'SUBMITTED_BY',
		'submitted_by' => 'SUBMITTED_BY',
		'purchase_order.submitted_by' => 'SUBMITTED_BY',
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
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_SUPPLIER_ID);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_CREATED_BY);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_SUBMITTED_DATE);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_CREATION_DATE);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_PURCHASE_ORDER_STATUS_ID);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_EXPECTED_DATE);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_SHIPPING_FEE);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_TAXES);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_PAYMENT_DATE);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_PAYMENT_AMOUNT);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_PAYMENT_METHOD);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_NOTES);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_APPROVED_BY);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_APPROVED_DATE);
			$criteria->addSelectColumn(PurchaseOrderTableMap::COL_SUBMITTED_BY);
		} else {
			$criteria->addSelectColumn($alias . '.purchase_order_id');
			$criteria->addSelectColumn($alias . '.supplier_id');
			$criteria->addSelectColumn($alias . '.created_by');
			$criteria->addSelectColumn($alias . '.submitted_date');
			$criteria->addSelectColumn($alias . '.creation_date');
			$criteria->addSelectColumn($alias . '.purchase_order_status_id');
			$criteria->addSelectColumn($alias . '.expected_date');
			$criteria->addSelectColumn($alias . '.shipping_fee');
			$criteria->addSelectColumn($alias . '.taxes');
			$criteria->addSelectColumn($alias . '.payment_date');
			$criteria->addSelectColumn($alias . '.payment_amount');
			$criteria->addSelectColumn($alias . '.payment_method');
			$criteria->addSelectColumn($alias . '.notes');
			$criteria->addSelectColumn($alias . '.approved_by');
			$criteria->addSelectColumn($alias . '.approved_date');
			$criteria->addSelectColumn($alias . '.submitted_by');
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
	 * Performs a DELETE on the database, given a PurchaseOrder or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or PurchaseOrder object or primary key or array of primary keys
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
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\PurchaseOrder) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(PurchaseOrderTableMap::DATABASE_NAME);
			$criteria->add(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID, (array)$values, Criteria::IN);
		}

		$query = PurchaseOrderQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			PurchaseOrderTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				PurchaseOrderTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the purchase_order table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return PurchaseOrderQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a PurchaseOrder or Criteria object.
	 *
	 * @param mixed $criteria Criteria or PurchaseOrder object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(PurchaseOrderTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from PurchaseOrder object
		}

		if ($criteria->containsKey(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID) && $criteria->keyContainsValue(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID . ')');
		}


		// Set the correct dbName
		$query = PurchaseOrderQuery::create()->mergeWith($criteria);

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
		return $withPrefix ? PurchaseOrderTableMap::CLASS_DEFAULT : PurchaseOrderTableMap::OM_CLASS;
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
				: self::translateFieldName('PurchaseOrderId', TableMap::TYPE_PHPNAME, $indexType)
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
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PurchaseOrderId', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PurchaseOrderId', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PurchaseOrderId', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PurchaseOrderId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PurchaseOrderId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('PurchaseOrderId', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(PurchaseOrderTableMap::DATABASE_NAME)->getTable(PurchaseOrderTableMap::TABLE_NAME);
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
		$this->setName('purchase_order');
		$this->setPhpName('PurchaseOrder');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\PurchaseOrder');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('purchase_order_id', 'PurchaseOrderId', 'INTEGER', true, null, null);
		$this->addColumn('supplier_id', 'SupplierId', 'INTEGER', false, null, null);
		$this->addColumn('created_by', 'CreatedBy', 'INTEGER', false, null, null);
		$this->addColumn('submitted_date', 'SubmittedDate', 'DATETIME', false, null, null);
		$this->addColumn('creation_date', 'CreationDate', 'DATETIME', true, null, 'CURRENT_TIMESTAMP');
		$this->addColumn('purchase_order_status_id', 'PurchaseOrderStatusId', 'INTEGER', false, null, 0);
		$this->addColumn('expected_date', 'ExpectedDate', 'DATETIME', false, null, null);
		$this->addColumn('shipping_fee', 'ShippingFee', 'DECIMAL', true, 19, 0.0000);
		$this->addColumn('taxes', 'Taxes', 'DECIMAL', true, 19, 0.0000);
		$this->addColumn('payment_date', 'PaymentDate', 'DATETIME', false, null, null);
		$this->addColumn('payment_amount', 'PaymentAmount', 'DECIMAL', false, 19, 0.0000);
		$this->addColumn('payment_method', 'PaymentMethod', 'VARCHAR', false, 50, null);
		$this->addColumn('notes', 'Notes', 'CLOB', false, null, null);
		$this->addColumn('approved_by', 'ApprovedBy', 'INTEGER', false, null, null);
		$this->addColumn('approved_date', 'ApprovedDate', 'DATETIME', false, null, null);
		$this->addColumn('submitted_by', 'SubmittedBy', 'INTEGER', false, null, null);
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
	 * @return array (PurchaseOrder object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = PurchaseOrderTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = PurchaseOrderTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + PurchaseOrderTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = PurchaseOrderTableMap::OM_CLASS;
			/** @var PurchaseOrder $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			PurchaseOrderTableMap::addInstanceToPool($obj, $key);
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
			$key = PurchaseOrderTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = PurchaseOrderTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var PurchaseOrder $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				PurchaseOrderTableMap::addInstanceToPool($obj, $key);
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
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_PURCHASE_ORDER_ID);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_SUPPLIER_ID);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_CREATED_BY);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_SUBMITTED_DATE);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_CREATION_DATE);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_PURCHASE_ORDER_STATUS_ID);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_EXPECTED_DATE);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_SHIPPING_FEE);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_TAXES);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_PAYMENT_DATE);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_PAYMENT_AMOUNT);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_PAYMENT_METHOD);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_NOTES);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_APPROVED_BY);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_APPROVED_DATE);
			$criteria->removeSelectColumn(PurchaseOrderTableMap::COL_SUBMITTED_BY);
		} else {
			$criteria->removeSelectColumn($alias . '.purchase_order_id');
			$criteria->removeSelectColumn($alias . '.supplier_id');
			$criteria->removeSelectColumn($alias . '.created_by');
			$criteria->removeSelectColumn($alias . '.submitted_date');
			$criteria->removeSelectColumn($alias . '.creation_date');
			$criteria->removeSelectColumn($alias . '.purchase_order_status_id');
			$criteria->removeSelectColumn($alias . '.expected_date');
			$criteria->removeSelectColumn($alias . '.shipping_fee');
			$criteria->removeSelectColumn($alias . '.taxes');
			$criteria->removeSelectColumn($alias . '.payment_date');
			$criteria->removeSelectColumn($alias . '.payment_amount');
			$criteria->removeSelectColumn($alias . '.payment_method');
			$criteria->removeSelectColumn($alias . '.notes');
			$criteria->removeSelectColumn($alias . '.approved_by');
			$criteria->removeSelectColumn($alias . '.approved_date');
			$criteria->removeSelectColumn($alias . '.submitted_by');
		}
	}
}
