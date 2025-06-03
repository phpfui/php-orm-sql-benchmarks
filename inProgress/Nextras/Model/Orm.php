<?php

namespace SOB\Nextras\Model;

use Nextras\Orm\Model\Model;
use SOB\Nextras\Model\Customer\CustomerRepository;
use SOB\Nextras\Model\DateRecord\DateRecordRepository;
use SOB\Nextras\Model\Employee\EmployeeRepository;
use SOB\Nextras\Model\EmployeePrivilege\EmployeePrivilegeRepository;
use SOB\Nextras\Model\Image\ImageRepository;
use SOB\Nextras\Model\InventoryTransaction\InventoryTransactionRepository;
use SOB\Nextras\Model\InventoryTransactionType\InventoryTransactionTypeRepository;
use SOB\Nextras\Model\Invoice\InvoiceRepository;
use SOB\Nextras\Model\Migration\MigrationRepository;
use SOB\Nextras\Model\Order\OrderRepository;
use SOB\Nextras\Model\OrderDetail\OrderDetailRepository;
use SOB\Nextras\Model\OrderDetailStatus\OrderDetailStatusRepository;
use SOB\Nextras\Model\OrderStatus\OrderStatusRepository;
use SOB\Nextras\Model\OrderTaxStatus\OrderTaxStatusRepository;
use SOB\Nextras\Model\Privilege\PrivilegeRepository;
use SOB\Nextras\Model\Product\ProductRepository;
use SOB\Nextras\Model\ProductSupplier\ProductSupplierRepository;
use SOB\Nextras\Model\PurchaseOrder\PurchaseOrderRepository;
use SOB\Nextras\Model\PurchaseOrderDetail\PurchaseOrderDetailRepository;
use SOB\Nextras\Model\PurchaseOrderStatus\PurchaseOrderStatusRepository;
use SOB\Nextras\Model\SalesReport\SalesReportRepository;
use SOB\Nextras\Model\Setting\SettingRepository;
use SOB\Nextras\Model\Shipper\ShipperRepository;
use SOB\Nextras\Model\StringRecord\StringRecordRepository;
use SOB\Nextras\Model\Supplier\SupplierRepository;

/**
 * @property-read CustomerRepository $customer {default } {enum self::_*}
 * @property-read DateRecordRepository $dateRecord {default } {enum self::_*}
 * @property-read EmployeeRepository $employee {default } {enum self::_*}
 * @property-read EmployeePrivilegeRepository $employeePrivilege {default } {enum self::_*}
 * @property-read ImageRepository $image {default } {enum self::_*}
 * @property-read InventoryTransactionRepository $inventoryTransaction {default } {enum self::_*}
 * @property-read InventoryTransactionTypeRepository $inventoryTransactionType {default } {enum self::_*}
 * @property-read InvoiceRepository $invoice {default } {enum self::_*}
 * @property-read MigrationRepository $migration {default } {enum self::_*}
 * @property-read OrderRepository $order {default } {enum self::_*}
 * @property-read OrderDetailRepository $orderDetail {default } {enum self::_*}
 * @property-read OrderDetailStatusRepository $orderDetailStatus {default } {enum self::_*}
 * @property-read OrderStatusRepository $orderStatus {default } {enum self::_*}
 * @property-read OrderTaxStatusRepository $orderTaxStatus {default } {enum self::_*}
 * @property-read PrivilegeRepository $privilege {default } {enum self::_*}
 * @property-read ProductRepository $product {default } {enum self::_*}
 * @property-read ProductSupplierRepository $productSupplier {default } {enum self::_*}
 * @property-read PurchaseOrderRepository $purchaseOrder {default } {enum self::_*}
 * @property-read PurchaseOrderDetailRepository $purchaseOrderDetail {default } {enum self::_*}
 * @property-read PurchaseOrderStatusRepository $purchaseOrderStatus {default } {enum self::_*}
 * @property-read SalesReportRepository $salesReport {default } {enum self::_*}
 * @property-read SettingRepository $setting {default } {enum self::_*}
 * @property-read ShipperRepository $shipper {default } {enum self::_*}
 * @property-read StringRecordRepository $stringRecord {default } {enum self::_*}
 * @property-read SupplierRepository $supplier {default } {enum self::_*}
 */
class Orm extends Model
{
}
