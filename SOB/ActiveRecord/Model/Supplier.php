<?php

namespace SOB\ActiveRecord\Model;

/**
 * @property int $supplier_id MySQL type integer
 * @property ?string $company MySQL type varchar(50)
 * @property ?string $last_name MySQL type varchar(50)
 * @property ?string $first_name MySQL type varchar(50)
 * @property ?string $email_address MySQL type varchar(50)
 * @property ?string $job_title MySQL type varchar(50)
 * @property ?string $business_phone MySQL type varchar(25)
 * @property ?string $home_phone MySQL type varchar(25)
 * @property ?string $mobile_phone MySQL type varchar(25)
 * @property ?string $fax_number MySQL type varchar(25)
 * @property ?string $address MySQL type longtext
 * @property ?string $city MySQL type varchar(50)
 * @property ?string $state_province MySQL type varchar(50)
 * @property ?string $zip_postal_code MySQL type varchar(15)
 * @property ?string $country_region MySQL type varchar(50)
 * @property ?string $web_page MySQL type longtext
 * @property ?string $notes MySQL type longtext
 * @property ?string $attachments MySQL type longblob
 */
class Supplier extends \ActiveRecord\Model
{
	public static string $primary_key = 'supplier_id';

	public static string $table_name = 'supplier';
}
