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
use SOB\Propel2\Product;
use SOB\Propel2\ProductQuery;

/**
 * This class defines the structure of the 'product' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 */
class ProductTableMap extends TableMap
{
	use InstancePoolTrait;
	use TableMapTrait;

	/**
	 * A class that can be returned by this tableMap
	 */
	public const CLASS_DEFAULT = 'SOB.Propel2.Product';

	/**
	 * The (dot-path) name of this class
	 */
	public const CLASS_NAME = 'SOB.Propel2.Map.ProductTableMap';

	/**
	 * the column name for the attachments field
	 */
	public const COL_ATTACHMENTS = 'product.attachments';

	/**
	 * the column name for the category field
	 */
	public const COL_CATEGORY = 'product.category';

	/**
	 * the column name for the description field
	 */
	public const COL_DESCRIPTION = 'product.description';

	/**
	 * the column name for the discontinued field
	 */
	public const COL_DISCONTINUED = 'product.discontinued';

	/**
	 * the column name for the list_price field
	 */
	public const COL_LIST_PRICE = 'product.list_price';

	/**
	 * the column name for the minimum_reorder_quantity field
	 */
	public const COL_MINIMUM_REORDER_QUANTITY = 'product.minimum_reorder_quantity';

	/**
	 * the column name for the product_code field
	 */
	public const COL_PRODUCT_CODE = 'product.product_code';

	/**
	 * the column name for the product_id field
	 */
	public const COL_PRODUCT_ID = 'product.product_id';

	/**
	 * the column name for the product_name field
	 */
	public const COL_PRODUCT_NAME = 'product.product_name';

	/**
	 * the column name for the quantity_per_unit field
	 */
	public const COL_QUANTITY_PER_UNIT = 'product.quantity_per_unit';

	/**
	 * the column name for the reorder_level field
	 */
	public const COL_REORDER_LEVEL = 'product.reorder_level';

	/**
	 * the column name for the standard_cost field
	 */
	public const COL_STANDARD_COST = 'product.standard_cost';

	/**
	 * the column name for the target_level field
	 */
	public const COL_TARGET_LEVEL = 'product.target_level';

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
	public const NUM_COLUMNS = 13;

	/**
	 * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
	 */
	public const NUM_HYDRATE_COLUMNS = 13;

	/**
	 * The number of lazy-loaded columns
	 */
	public const NUM_LAZY_LOAD_COLUMNS = 0;

	/**
	 * The related Propel class for this table
	 */
	public const OM_CLASS = '\\SOB\\Propel2\\Product';

	/**
	 * The table name for this class
	 */
	public const TABLE_NAME = 'product';

	/**
	 * The PHP name of this class (PascalCase)
	 */
	public const TABLE_PHP_NAME = 'Product';

	/**
	 * holds an array of keys for quick access to the fieldnames array
	 *
	 * first dimension keys are the type constants
	 * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
	 *
	 * @var array<string, mixed>
	 */
	protected static $fieldKeys = [
		self::TYPE_PHPNAME => ['ProductId' => 0, 'ProductCode' => 1, 'ProductName' => 2, 'Description' => 3, 'StandardCost' => 4, 'ListPrice' => 5, 'ReorderLevel' => 6, 'TargetLevel' => 7, 'QuantityPerUnit' => 8, 'Discontinued' => 9, 'MinimumReorderQuantity' => 10, 'Category' => 11, 'Attachments' => 12, ],
		self::TYPE_CAMELNAME => ['productId' => 0, 'productCode' => 1, 'productName' => 2, 'description' => 3, 'standardCost' => 4, 'listPrice' => 5, 'reorderLevel' => 6, 'targetLevel' => 7, 'quantityPerUnit' => 8, 'discontinued' => 9, 'minimumReorderQuantity' => 10, 'category' => 11, 'attachments' => 12, ],
		self::TYPE_COLNAME => [ProductTableMap::COL_PRODUCT_ID => 0, ProductTableMap::COL_PRODUCT_CODE => 1, ProductTableMap::COL_PRODUCT_NAME => 2, ProductTableMap::COL_DESCRIPTION => 3, ProductTableMap::COL_STANDARD_COST => 4, ProductTableMap::COL_LIST_PRICE => 5, ProductTableMap::COL_REORDER_LEVEL => 6, ProductTableMap::COL_TARGET_LEVEL => 7, ProductTableMap::COL_QUANTITY_PER_UNIT => 8, ProductTableMap::COL_DISCONTINUED => 9, ProductTableMap::COL_MINIMUM_REORDER_QUANTITY => 10, ProductTableMap::COL_CATEGORY => 11, ProductTableMap::COL_ATTACHMENTS => 12, ],
		self::TYPE_FIELDNAME => ['product_id' => 0, 'product_code' => 1, 'product_name' => 2, 'description' => 3, 'standard_cost' => 4, 'list_price' => 5, 'reorder_level' => 6, 'target_level' => 7, 'quantity_per_unit' => 8, 'discontinued' => 9, 'minimum_reorder_quantity' => 10, 'category' => 11, 'attachments' => 12, ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, ]
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
		self::TYPE_PHPNAME => ['ProductId', 'ProductCode', 'ProductName', 'Description', 'StandardCost', 'ListPrice', 'ReorderLevel', 'TargetLevel', 'QuantityPerUnit', 'Discontinued', 'MinimumReorderQuantity', 'Category', 'Attachments', ],
		self::TYPE_CAMELNAME => ['productId', 'productCode', 'productName', 'description', 'standardCost', 'listPrice', 'reorderLevel', 'targetLevel', 'quantityPerUnit', 'discontinued', 'minimumReorderQuantity', 'category', 'attachments', ],
		self::TYPE_COLNAME => [ProductTableMap::COL_PRODUCT_ID, ProductTableMap::COL_PRODUCT_CODE, ProductTableMap::COL_PRODUCT_NAME, ProductTableMap::COL_DESCRIPTION, ProductTableMap::COL_STANDARD_COST, ProductTableMap::COL_LIST_PRICE, ProductTableMap::COL_REORDER_LEVEL, ProductTableMap::COL_TARGET_LEVEL, ProductTableMap::COL_QUANTITY_PER_UNIT, ProductTableMap::COL_DISCONTINUED, ProductTableMap::COL_MINIMUM_REORDER_QUANTITY, ProductTableMap::COL_CATEGORY, ProductTableMap::COL_ATTACHMENTS, ],
		self::TYPE_FIELDNAME => ['product_id', 'product_code', 'product_name', 'description', 'standard_cost', 'list_price', 'reorder_level', 'target_level', 'quantity_per_unit', 'discontinued', 'minimum_reorder_quantity', 'category', 'attachments', ],
		self::TYPE_NUM => [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, ]
	];

	/**
	 * Holds a list of column names and their normalized version.
	 *
	 * @var array<string>
	 */
	protected $normalizedColumnNameMap = [
		'ProductId' => 'PRODUCT_ID',
		'Product.ProductId' => 'PRODUCT_ID',
		'productId' => 'PRODUCT_ID',
		'product.productId' => 'PRODUCT_ID',
		'ProductTableMap::COL_PRODUCT_ID' => 'PRODUCT_ID',
		'COL_PRODUCT_ID' => 'PRODUCT_ID',
		'product_id' => 'PRODUCT_ID',
		'product.product_id' => 'PRODUCT_ID',
		'ProductCode' => 'PRODUCT_CODE',
		'Product.ProductCode' => 'PRODUCT_CODE',
		'productCode' => 'PRODUCT_CODE',
		'product.productCode' => 'PRODUCT_CODE',
		'ProductTableMap::COL_PRODUCT_CODE' => 'PRODUCT_CODE',
		'COL_PRODUCT_CODE' => 'PRODUCT_CODE',
		'product_code' => 'PRODUCT_CODE',
		'product.product_code' => 'PRODUCT_CODE',
		'ProductName' => 'PRODUCT_NAME',
		'Product.ProductName' => 'PRODUCT_NAME',
		'productName' => 'PRODUCT_NAME',
		'product.productName' => 'PRODUCT_NAME',
		'ProductTableMap::COL_PRODUCT_NAME' => 'PRODUCT_NAME',
		'COL_PRODUCT_NAME' => 'PRODUCT_NAME',
		'product_name' => 'PRODUCT_NAME',
		'product.product_name' => 'PRODUCT_NAME',
		'Description' => 'DESCRIPTION',
		'Product.Description' => 'DESCRIPTION',
		'description' => 'DESCRIPTION',
		'product.description' => 'DESCRIPTION',
		'ProductTableMap::COL_DESCRIPTION' => 'DESCRIPTION',
		'COL_DESCRIPTION' => 'DESCRIPTION',
		'StandardCost' => 'STANDARD_COST',
		'Product.StandardCost' => 'STANDARD_COST',
		'standardCost' => 'STANDARD_COST',
		'product.standardCost' => 'STANDARD_COST',
		'ProductTableMap::COL_STANDARD_COST' => 'STANDARD_COST',
		'COL_STANDARD_COST' => 'STANDARD_COST',
		'standard_cost' => 'STANDARD_COST',
		'product.standard_cost' => 'STANDARD_COST',
		'ListPrice' => 'LIST_PRICE',
		'Product.ListPrice' => 'LIST_PRICE',
		'listPrice' => 'LIST_PRICE',
		'product.listPrice' => 'LIST_PRICE',
		'ProductTableMap::COL_LIST_PRICE' => 'LIST_PRICE',
		'COL_LIST_PRICE' => 'LIST_PRICE',
		'list_price' => 'LIST_PRICE',
		'product.list_price' => 'LIST_PRICE',
		'ReorderLevel' => 'REORDER_LEVEL',
		'Product.ReorderLevel' => 'REORDER_LEVEL',
		'reorderLevel' => 'REORDER_LEVEL',
		'product.reorderLevel' => 'REORDER_LEVEL',
		'ProductTableMap::COL_REORDER_LEVEL' => 'REORDER_LEVEL',
		'COL_REORDER_LEVEL' => 'REORDER_LEVEL',
		'reorder_level' => 'REORDER_LEVEL',
		'product.reorder_level' => 'REORDER_LEVEL',
		'TargetLevel' => 'TARGET_LEVEL',
		'Product.TargetLevel' => 'TARGET_LEVEL',
		'targetLevel' => 'TARGET_LEVEL',
		'product.targetLevel' => 'TARGET_LEVEL',
		'ProductTableMap::COL_TARGET_LEVEL' => 'TARGET_LEVEL',
		'COL_TARGET_LEVEL' => 'TARGET_LEVEL',
		'target_level' => 'TARGET_LEVEL',
		'product.target_level' => 'TARGET_LEVEL',
		'QuantityPerUnit' => 'QUANTITY_PER_UNIT',
		'Product.QuantityPerUnit' => 'QUANTITY_PER_UNIT',
		'quantityPerUnit' => 'QUANTITY_PER_UNIT',
		'product.quantityPerUnit' => 'QUANTITY_PER_UNIT',
		'ProductTableMap::COL_QUANTITY_PER_UNIT' => 'QUANTITY_PER_UNIT',
		'COL_QUANTITY_PER_UNIT' => 'QUANTITY_PER_UNIT',
		'quantity_per_unit' => 'QUANTITY_PER_UNIT',
		'product.quantity_per_unit' => 'QUANTITY_PER_UNIT',
		'Discontinued' => 'DISCONTINUED',
		'Product.Discontinued' => 'DISCONTINUED',
		'discontinued' => 'DISCONTINUED',
		'product.discontinued' => 'DISCONTINUED',
		'ProductTableMap::COL_DISCONTINUED' => 'DISCONTINUED',
		'COL_DISCONTINUED' => 'DISCONTINUED',
		'MinimumReorderQuantity' => 'MINIMUM_REORDER_QUANTITY',
		'Product.MinimumReorderQuantity' => 'MINIMUM_REORDER_QUANTITY',
		'minimumReorderQuantity' => 'MINIMUM_REORDER_QUANTITY',
		'product.minimumReorderQuantity' => 'MINIMUM_REORDER_QUANTITY',
		'ProductTableMap::COL_MINIMUM_REORDER_QUANTITY' => 'MINIMUM_REORDER_QUANTITY',
		'COL_MINIMUM_REORDER_QUANTITY' => 'MINIMUM_REORDER_QUANTITY',
		'minimum_reorder_quantity' => 'MINIMUM_REORDER_QUANTITY',
		'product.minimum_reorder_quantity' => 'MINIMUM_REORDER_QUANTITY',
		'Category' => 'CATEGORY',
		'Product.Category' => 'CATEGORY',
		'category' => 'CATEGORY',
		'product.category' => 'CATEGORY',
		'ProductTableMap::COL_CATEGORY' => 'CATEGORY',
		'COL_CATEGORY' => 'CATEGORY',
		'Attachments' => 'ATTACHMENTS',
		'Product.Attachments' => 'ATTACHMENTS',
		'attachments' => 'ATTACHMENTS',
		'product.attachments' => 'ATTACHMENTS',
		'ProductTableMap::COL_ATTACHMENTS' => 'ATTACHMENTS',
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
			$criteria->addSelectColumn(ProductTableMap::COL_PRODUCT_ID);
			$criteria->addSelectColumn(ProductTableMap::COL_PRODUCT_CODE);
			$criteria->addSelectColumn(ProductTableMap::COL_PRODUCT_NAME);
			$criteria->addSelectColumn(ProductTableMap::COL_DESCRIPTION);
			$criteria->addSelectColumn(ProductTableMap::COL_STANDARD_COST);
			$criteria->addSelectColumn(ProductTableMap::COL_LIST_PRICE);
			$criteria->addSelectColumn(ProductTableMap::COL_REORDER_LEVEL);
			$criteria->addSelectColumn(ProductTableMap::COL_TARGET_LEVEL);
			$criteria->addSelectColumn(ProductTableMap::COL_QUANTITY_PER_UNIT);
			$criteria->addSelectColumn(ProductTableMap::COL_DISCONTINUED);
			$criteria->addSelectColumn(ProductTableMap::COL_MINIMUM_REORDER_QUANTITY);
			$criteria->addSelectColumn(ProductTableMap::COL_CATEGORY);
			$criteria->addSelectColumn(ProductTableMap::COL_ATTACHMENTS);
		} else {
			$criteria->addSelectColumn($alias . '.product_id');
			$criteria->addSelectColumn($alias . '.product_code');
			$criteria->addSelectColumn($alias . '.product_name');
			$criteria->addSelectColumn($alias . '.description');
			$criteria->addSelectColumn($alias . '.standard_cost');
			$criteria->addSelectColumn($alias . '.list_price');
			$criteria->addSelectColumn($alias . '.reorder_level');
			$criteria->addSelectColumn($alias . '.target_level');
			$criteria->addSelectColumn($alias . '.quantity_per_unit');
			$criteria->addSelectColumn($alias . '.discontinued');
			$criteria->addSelectColumn($alias . '.minimum_reorder_quantity');
			$criteria->addSelectColumn($alias . '.category');
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
	 * Performs a DELETE on the database, given a Product or Criteria object OR a primary key value.
	 *
	 * @param mixed $values Criteria or Product object or primary key or array of primary keys
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
			$con = Propel::getServiceContainer()->getWriteConnection(ProductTableMap::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			// rename for clarity
			$criteria = $values;
		} elseif ($values instanceof \SOB\Propel2\Product) { // it's a model object
			// create criteria based on pk values
			$criteria = $values->buildPkeyCriteria();
		} else { // it's a primary key, or an array of pks
			$criteria = new Criteria(ProductTableMap::DATABASE_NAME);
			$criteria->add(ProductTableMap::COL_PRODUCT_ID, (array)$values, Criteria::IN);
		}

		$query = ProductQuery::create()->mergeWith($criteria);

		if ($values instanceof Criteria) {
			ProductTableMap::clearInstancePool();
		} elseif (! \is_object($values)) { // it's a primary key, or an array of pks
			foreach ((array)$values as $singleval) {
				ProductTableMap::removeInstanceFromPool($singleval);
			}
		}

		return $query->delete($con);
	}

	/**
	 * Deletes all rows from the product table.
	 *
	 * @param ConnectionInterface $con the connection to use
	 * @return int The number of affected rows (if supported by underlying database driver).
	 */
	public static function doDeleteAll(?ConnectionInterface $con = null) : int
	{
		return ProductQuery::create()->doDeleteAll($con);
	}

	/**
	 * Performs an INSERT on the database, given a Product or Criteria object.
	 *
	 * @param mixed $criteria Criteria or Product object containing data that is used to create the INSERT statement.
	 * @param ConnectionInterface $con the ConnectionInterface connection to use
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 * @return mixed The new primary key.
	 */
	public static function doInsert($criteria, ?ConnectionInterface $con = null)
	{
		if (null === $con) {
			$con = Propel::getServiceContainer()->getWriteConnection(ProductTableMap::DATABASE_NAME);
		}

		if ($criteria instanceof Criteria) {
			$criteria = clone $criteria; // rename for clarity
		} else {
			$criteria = $criteria->buildCriteria(); // build Criteria from Product object
		}

		if ($criteria->containsKey(ProductTableMap::COL_PRODUCT_ID) && $criteria->keyContainsValue(ProductTableMap::COL_PRODUCT_ID) ) {
			throw new PropelException('Cannot insert a value for auto-increment primary key (' . ProductTableMap::COL_PRODUCT_ID . ')');
		}


		// Set the correct dbName
		$query = ProductQuery::create()->mergeWith($criteria);

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
		return $withPrefix ? ProductTableMap::CLASS_DEFAULT : ProductTableMap::OM_CLASS;
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
				: self::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)
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
		if (null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)]) {
			return null;
		}

		return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] || \is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)]) || \is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string)$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('ProductId', TableMap::TYPE_PHPNAME, $indexType)];
	}

	/**
	 * Returns the TableMap related to this object.
	 * This method is not needed for general use but a specific application could have a need.
	 * @throws \Propel\Runtime\Exception\PropelException Any exceptions caught during processing will be
	 *                         rethrown wrapped into a PropelException.
	 */
	public static function getTableMap() : TableMap
	{
		return Propel::getServiceContainer()->getDatabaseMap(ProductTableMap::DATABASE_NAME)->getTable(ProductTableMap::TABLE_NAME);
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
		$this->setName('product');
		$this->setPhpName('Product');
		$this->setIdentifierQuoting(false);
		$this->setClassName('\\SOB\\Propel2\\Product');
		$this->setPackage('SOB.Propel2');
		$this->setUseIdGenerator(true);
		// columns
		$this->addPrimaryKey('product_id', 'ProductId', 'INTEGER', true, null, null);
		$this->addColumn('product_code', 'ProductCode', 'VARCHAR', false, 25, null);
		$this->addColumn('product_name', 'ProductName', 'VARCHAR', false, 50, null);
		$this->addColumn('description', 'Description', 'CLOB', false, null, null);
		$this->addColumn('standard_cost', 'StandardCost', 'DECIMAL', false, 19, 0.0000);
		$this->addColumn('list_price', 'ListPrice', 'DECIMAL', true, 19, 0.0000);
		$this->addColumn('reorder_level', 'ReorderLevel', 'INTEGER', false, null, null);
		$this->addColumn('target_level', 'TargetLevel', 'INTEGER', false, null, null);
		$this->addColumn('quantity_per_unit', 'QuantityPerUnit', 'VARCHAR', false, 50, null);
		$this->addColumn('discontinued', 'Discontinued', 'INTEGER', true, null, 0);
		$this->addColumn('minimum_reorder_quantity', 'MinimumReorderQuantity', 'INTEGER', false, null, null);
		$this->addColumn('category', 'Category', 'VARCHAR', false, 50, null);
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
	 * @return array (Product object, last column rank)
	 */
	public static function populateObject(array $row, int $offset = 0, string $indexType = TableMap::TYPE_NUM) : array
	{
		$key = ProductTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);

		if (null !== ($obj = ProductTableMap::getInstanceFromPool($key))) {
			// We no longer rehydrate the object, since this can cause data loss.
			// See http://www.propelorm.org/ticket/509
			// $obj->hydrate($row, $offset, true); // rehydrate
			$col = $offset + ProductTableMap::NUM_HYDRATE_COLUMNS;
		} else {
			$cls = ProductTableMap::OM_CLASS;
			/** @var Product $obj */
			$obj = new $cls();
			$col = $obj->hydrate($row, $offset, false, $indexType);
			ProductTableMap::addInstanceToPool($obj, $key);
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
			$key = ProductTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());

			if (null !== ($obj = ProductTableMap::getInstanceFromPool($key))) {
				// We no longer rehydrate the object, since this can cause data loss.
				// See http://www.propelorm.org/ticket/509
				// $obj->hydrate($row, 0, true); // rehydrate
				$results[] = $obj;
			} else {
				/** @var Product $obj */
				$obj = new $cls();
				$obj->hydrate($row);
				$results[] = $obj;
				ProductTableMap::addInstanceToPool($obj, $key);
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
			$criteria->removeSelectColumn(ProductTableMap::COL_PRODUCT_ID);
			$criteria->removeSelectColumn(ProductTableMap::COL_PRODUCT_CODE);
			$criteria->removeSelectColumn(ProductTableMap::COL_PRODUCT_NAME);
			$criteria->removeSelectColumn(ProductTableMap::COL_DESCRIPTION);
			$criteria->removeSelectColumn(ProductTableMap::COL_STANDARD_COST);
			$criteria->removeSelectColumn(ProductTableMap::COL_LIST_PRICE);
			$criteria->removeSelectColumn(ProductTableMap::COL_REORDER_LEVEL);
			$criteria->removeSelectColumn(ProductTableMap::COL_TARGET_LEVEL);
			$criteria->removeSelectColumn(ProductTableMap::COL_QUANTITY_PER_UNIT);
			$criteria->removeSelectColumn(ProductTableMap::COL_DISCONTINUED);
			$criteria->removeSelectColumn(ProductTableMap::COL_MINIMUM_REORDER_QUANTITY);
			$criteria->removeSelectColumn(ProductTableMap::COL_CATEGORY);
			$criteria->removeSelectColumn(ProductTableMap::COL_ATTACHMENTS);
		} else {
			$criteria->removeSelectColumn($alias . '.product_id');
			$criteria->removeSelectColumn($alias . '.product_code');
			$criteria->removeSelectColumn($alias . '.product_name');
			$criteria->removeSelectColumn($alias . '.description');
			$criteria->removeSelectColumn($alias . '.standard_cost');
			$criteria->removeSelectColumn($alias . '.list_price');
			$criteria->removeSelectColumn($alias . '.reorder_level');
			$criteria->removeSelectColumn($alias . '.target_level');
			$criteria->removeSelectColumn($alias . '.quantity_per_unit');
			$criteria->removeSelectColumn($alias . '.discontinued');
			$criteria->removeSelectColumn($alias . '.minimum_reorder_quantity');
			$criteria->removeSelectColumn($alias . '.category');
			$criteria->removeSelectColumn($alias . '.attachments');
		}
	}
}
