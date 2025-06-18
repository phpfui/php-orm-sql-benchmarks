
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- customer
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer`
(
    `customer_id` INTEGER NOT NULL AUTO_INCREMENT,
    `company` VARCHAR(50),
    `last_name` VARCHAR(50),
    `first_name` VARCHAR(50),
    `email_address` VARCHAR(50),
    `job_title` VARCHAR(50),
    `business_phone` VARCHAR(25),
    `home_phone` VARCHAR(25),
    `mobile_phone` VARCHAR(25),
    `fax_number` VARCHAR(25),
    `address` LONGTEXT,
    `city` VARCHAR(50),
    `state_province` VARCHAR(50),
    `zip_postal_code` VARCHAR(15),
    `country_region` VARCHAR(50),
    `web_page` LONGTEXT,
    `notes` LONGTEXT,
    `attachments` LONGBLOB,
    PRIMARY KEY (`customer_id`),
    INDEX `customer_city` (`city`),
    INDEX `customer_company` (`company`),
    INDEX `customer_first_name` (`first_name`),
    INDEX `customer_last_name` (`last_name`),
    INDEX `customer_zip_postal_code` (`zip_postal_code`),
    INDEX `customer_state_province` (`state_province`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- daterecord
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `daterecord`;

CREATE TABLE `daterecord`
(
    `dateRecordId` INTEGER NOT NULL AUTO_INCREMENT,
    `dateRequired` DATE NOT NULL,
    `dateDefaultNull` DATE,
    `dateDefaultNullable` DATE DEFAULT '2000-01-02',
    `dateDefaultNotNull` DATE DEFAULT '2000-01-02' NOT NULL,
    `timestampDefaultCurrentNullable` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    `timestampDefaultCurrentNotNull` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`dateRecordId`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- employee
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee`
(
    `employee_id` INTEGER NOT NULL AUTO_INCREMENT,
    `company` VARCHAR(50),
    `last_name` VARCHAR(50),
    `first_name` VARCHAR(50),
    `email_address` VARCHAR(50),
    `job_title` VARCHAR(50),
    `business_phone` VARCHAR(25),
    `home_phone` VARCHAR(25),
    `mobile_phone` VARCHAR(25),
    `fax_number` VARCHAR(25),
    `address` LONGTEXT,
    `city` VARCHAR(50),
    `state_province` VARCHAR(50),
    `zip_postal_code` VARCHAR(15),
    `country_region` VARCHAR(50),
    `web_page` LONGTEXT,
    `notes` LONGTEXT,
    `attachments` LONGBLOB,
    PRIMARY KEY (`employee_id`),
    INDEX `employee_city` (`city`),
    INDEX `employee_company` (`company`),
    INDEX `employee_first_name` (`first_name`),
    INDEX `employee_last_name` (`last_name`),
    INDEX `employee_zip_postal_code` (`zip_postal_code`),
    INDEX `employee_state_province` (`state_province`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- employee_privilege
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `employee_privilege`;

CREATE TABLE `employee_privilege`
(
    `employee_id` INTEGER NOT NULL,
    `privilege_id` INTEGER NOT NULL,
    INDEX `employee_privilege_employee_id` (`employee_id`),
    INDEX `employee_privilege_privilege_id` (`privilege_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- image
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `image`;

CREATE TABLE `image`
(
    `imageId` INTEGER NOT NULL AUTO_INCREMENT,
    `imageableId` INTEGER,
    `imageable_type` VARCHAR(128),
    `path` VARCHAR(128) NOT NULL,
    PRIMARY KEY (`imageId`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- inventory_transaction
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `inventory_transaction`;

CREATE TABLE `inventory_transaction`
(
    `inventory_transaction_id` INTEGER NOT NULL AUTO_INCREMENT,
    `inventory_transaction_type_id` INTEGER NOT NULL,
    `transaction_created_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `transaction_modified_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `product_id` INTEGER NOT NULL,
    `quantity` INTEGER NOT NULL,
    `purchase_order_id` INTEGER,
    `order_id` INTEGER,
    `comments` VARCHAR(255),
    PRIMARY KEY (`inventory_transaction_id`),
    INDEX `inventory_transaction_order_id` (`order_id`),
    INDEX `inventory_transaction_product_id` (`product_id`),
    INDEX `inventory_transaction_purchase_order_id` (`purchase_order_id`),
    INDEX `inventory_transaction_inventory_transaction_type_id` (`inventory_transaction_type_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- inventory_transaction_type
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `inventory_transaction_type`;

CREATE TABLE `inventory_transaction_type`
(
    `inventory_transaction_type_id` INTEGER NOT NULL,
    `inventory_transaction_type_name` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`inventory_transaction_type_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- invoice
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `invoice`;

CREATE TABLE `invoice`
(
    `invoice_id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_id` INTEGER,
    `invoice_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `due_date` DATETIME,
    `tax` DECIMAL(19,4) DEFAULT 0.0000,
    `shipping` DECIMAL(19,4) DEFAULT 0.0000,
    `amount_due` DECIMAL(19,4) DEFAULT 0.0000,
    PRIMARY KEY (`invoice_id`),
    INDEX `invoice_order_id` (`order_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- migration
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `migration`;

CREATE TABLE `migration`
(
    `migrationId` INTEGER NOT NULL,
    `ran` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`migrationId`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- order
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order`
(
    `order_id` INTEGER NOT NULL AUTO_INCREMENT,
    `employee_id` INTEGER,
    `customer_id` INTEGER,
    `order_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `shipped_date` DATETIME,
    `shipper_id` INTEGER,
    `ship_name` VARCHAR(50),
    `ship_address` LONGTEXT,
    `ship_city` VARCHAR(50),
    `ship_state_province` VARCHAR(50),
    `ship_zip_postal_code` VARCHAR(50),
    `ship_country_region` VARCHAR(50),
    `shipping_fee` DECIMAL(19,4) DEFAULT 0.0000,
    `taxes` DECIMAL(19,4) DEFAULT 0.0000,
    `payment_type` VARCHAR(50),
    `paid_date` DATETIME,
    `notes` LONGTEXT,
    `tax_rate` DOUBLE DEFAULT 0,
    `order_tax_status_id` INTEGER,
    `order_status_id` INTEGER DEFAULT 0,
    PRIMARY KEY (`order_id`),
    INDEX `fk_order_order_status1` (`order_status_id`),
    INDEX `order_customer_id` (`customer_id`),
    INDEX `order_employee_id` (`employee_id`),
    INDEX `order_shipper_id` (`shipper_id`),
    INDEX `order_tax_status` (`order_tax_status_id`),
    INDEX `order_ship_zip_postal_code` (`ship_zip_postal_code`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- order_detail
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `order_detail`;

CREATE TABLE `order_detail`
(
    `order_detail_id` INTEGER NOT NULL AUTO_INCREMENT,
    `order_id` INTEGER NOT NULL,
    `product_id` INTEGER,
    `quantity` DECIMAL(18,4) DEFAULT 0.0000 NOT NULL,
    `unit_price` DECIMAL(19,4) DEFAULT 0.0000,
    `discount` DOUBLE DEFAULT 0 NOT NULL,
    `order_detail_status_id` INTEGER,
    `date_allocated` DATETIME,
    `purchase_order_id` INTEGER,
    `inventory_transaction_id` INTEGER,
    PRIMARY KEY (`order_detail_id`),
    INDEX `order_detail_inventory_id` (`inventory_transaction_id`),
    INDEX `order_detail_product_id` (`product_id`),
    INDEX `order_detail_purchase_order_id` (`purchase_order_id`),
    INDEX `order_detail_order_id` (`order_id`),
    INDEX `order_detail_status_id` (`order_detail_status_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- order_detail_status
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `order_detail_status`;

CREATE TABLE `order_detail_status`
(
    `order_detail_status_id` INTEGER NOT NULL,
    `order_detail_status_name` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`order_detail_status_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- order_status
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `order_status`;

CREATE TABLE `order_status`
(
    `order_status_id` INTEGER NOT NULL,
    `order_status_name` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`order_status_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- order_tax_status
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `order_tax_status`;

CREATE TABLE `order_tax_status`
(
    `order_tax_status_id` INTEGER NOT NULL,
    `order_tax_status_name` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`order_tax_status_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- privilege
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `privilege`;

CREATE TABLE `privilege`
(
    `privilege_id` INTEGER NOT NULL AUTO_INCREMENT,
    `privilege` VARCHAR(50),
    PRIMARY KEY (`privilege_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- product
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product`
(
    `product_id` INTEGER NOT NULL AUTO_INCREMENT,
    `product_code` VARCHAR(25),
    `product_name` VARCHAR(50),
    `description` LONGTEXT,
    `standard_cost` DECIMAL(19,4) DEFAULT 0.0000,
    `list_price` DECIMAL(19,4) DEFAULT 0.0000 NOT NULL,
    `reorder_level` INTEGER,
    `target_level` INTEGER,
    `quantity_per_unit` VARCHAR(50),
    `discontinued` INTEGER DEFAULT 0 NOT NULL,
    `minimum_reorder_quantity` INTEGER,
    `category` VARCHAR(50),
    `attachments` LONGBLOB,
    PRIMARY KEY (`product_id`),
    INDEX `product_product_code` (`product_code`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- product_supplier
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `product_supplier`;

CREATE TABLE `product_supplier`
(
    `product_id` INTEGER NOT NULL,
    `supplier_id` INTEGER NOT NULL,
    INDEX `product_supplier_product_id` (`product_id`),
    INDEX `product_supplier_supplier_id` (`supplier_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- purchase_order
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `purchase_order`;

CREATE TABLE `purchase_order`
(
    `purchase_order_id` INTEGER NOT NULL AUTO_INCREMENT,
    `supplier_id` INTEGER,
    `created_by` INTEGER,
    `submitted_date` DATETIME,
    `creation_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `purchase_order_status_id` INTEGER DEFAULT 0,
    `expected_date` DATETIME,
    `shipping_fee` DECIMAL(19,4) DEFAULT 0.0000 NOT NULL,
    `taxes` DECIMAL(19,4) DEFAULT 0.0000 NOT NULL,
    `payment_date` DATETIME,
    `payment_amount` DECIMAL(19,4) DEFAULT 0.0000,
    `payment_method` VARCHAR(50),
    `notes` LONGTEXT,
    `approved_by` INTEGER,
    `approved_date` DATETIME,
    `submitted_by` INTEGER,
    PRIMARY KEY (`purchase_order_id`),
    INDEX `purchase_order_created_by` (`created_by`),
    INDEX `purchase_order_status_id` (`purchase_order_status_id`),
    INDEX `purchase_order_supplier_id` (`supplier_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- purchase_order_detail
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `purchase_order_detail`;

CREATE TABLE `purchase_order_detail`
(
    `purchase_order_detail_id` INTEGER NOT NULL AUTO_INCREMENT,
    `purchase_order_id` INTEGER NOT NULL,
    `product_id` INTEGER,
    `quantity` DECIMAL(18,4) NOT NULL,
    `unit_cost` DECIMAL(19,4) NOT NULL,
    `date_received` DATETIME,
    `posted_to_inventory` INTEGER DEFAULT 0 NOT NULL,
    `inventory_transaction_id` INTEGER,
    PRIMARY KEY (`purchase_order_detail_id`),
    INDEX `purchase_order_detail_inventory_id` (`inventory_transaction_id`),
    INDEX `purchase_order_detail_purchase_order_id` (`purchase_order_id`),
    INDEX `purchase_order_detail_product_id` (`product_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- purchase_order_status
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `purchase_order_status`;

CREATE TABLE `purchase_order_status`
(
    `purchase_order_status_id` INTEGER NOT NULL,
    `purchase_order_status_name` VARCHAR(50),
    PRIMARY KEY (`purchase_order_status_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- sales_report
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sales_report`;

CREATE TABLE `sales_report`
(
    `group_by` VARCHAR(50) NOT NULL,
    `display` VARCHAR(50),
    `title` VARCHAR(50),
    `filter_row_source` LONGTEXT,
    `default` INTEGER DEFAULT 0 NOT NULL,
    PRIMARY KEY (`group_by`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- setting
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting`
(
    `setting_id` INTEGER NOT NULL AUTO_INCREMENT,
    `setting_data` VARCHAR(255),
    PRIMARY KEY (`setting_id`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- shipper
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `shipper`;

CREATE TABLE `shipper`
(
    `shipper_id` INTEGER NOT NULL AUTO_INCREMENT,
    `company` VARCHAR(50),
    `last_name` VARCHAR(50),
    `first_name` VARCHAR(50),
    `email_address` VARCHAR(50),
    `job_title` VARCHAR(50),
    `business_phone` VARCHAR(25),
    `home_phone` VARCHAR(25),
    `mobile_phone` VARCHAR(25),
    `fax_number` VARCHAR(25),
    `address` LONGTEXT,
    `city` VARCHAR(50),
    `state_province` VARCHAR(50),
    `zip_postal_code` VARCHAR(15),
    `country_region` VARCHAR(50),
    `web_page` LONGTEXT,
    `notes` LONGTEXT,
    `attachments` LONGBLOB,
    PRIMARY KEY (`shipper_id`),
    INDEX `shipper_city` (`city`),
    INDEX `shipper_company` (`company`),
    INDEX `shipper_first_name` (`first_name`),
    INDEX `shipper_last_name` (`last_name`),
    INDEX `shipper_zip_postal_code` (`zip_postal_code`),
    INDEX `shipper_state_province` (`state_province`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- stringrecord
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `stringrecord`;

CREATE TABLE `stringrecord`
(
    `stringRecordId` INTEGER NOT NULL AUTO_INCREMENT,
    `stringRequired` VARCHAR(100) NOT NULL,
    `stringDefaultNull` VARCHAR(100),
    `stringDefaultNullable` VARCHAR(100) DEFAULT 'default',
    `stringDefaultNotNull` VARCHAR(100) DEFAULT 'default' NOT NULL,
    PRIMARY KEY (`stringRecordId`)
) ENGINE=MyISAM;

-- ---------------------------------------------------------------------
-- supplier
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier`
(
    `supplier_id` INTEGER NOT NULL AUTO_INCREMENT,
    `company` VARCHAR(50),
    `last_name` VARCHAR(50),
    `first_name` VARCHAR(50),
    `email_address` VARCHAR(50),
    `job_title` VARCHAR(50),
    `business_phone` VARCHAR(25),
    `home_phone` VARCHAR(25),
    `mobile_phone` VARCHAR(25),
    `fax_number` VARCHAR(25),
    `address` LONGTEXT,
    `city` VARCHAR(50),
    `state_province` VARCHAR(50),
    `zip_postal_code` VARCHAR(15),
    `country_region` VARCHAR(50),
    `web_page` LONGTEXT,
    `notes` LONGTEXT,
    `attachments` LONGBLOB,
    PRIMARY KEY (`supplier_id`),
    INDEX `supplier_city` (`city`),
    INDEX `supplier_company` (`company`),
    INDEX `supplier_first_name` (`first_name`),
    INDEX `supplier_last_name` (`last_name`),
    INDEX `supplier_zip_postal_code` (`zip_postal_code`),
    INDEX `supplier_state_province` (`state_province`)
) ENGINE=MyISAM;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
