<?php

namespace SOB\CakeCached\Record;

/**
 * @property int $shipper_id MySQL type integer
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
 *
 */
class Shipper extends \Cake\ORM\Entity
	{
	protected array $_accessible = [
		'shipper_id' => true,
		'company' => true,
		'last_name' => true,
		'first_name' => true,
		'email_address' => true,
		'job_title' => true,
		'business_phone' => true,
		'home_phone' => true,
		'mobile_phone' => true,
		'fax_number' => true,
		'address' => true,
		'city' => true,
		'state_province' => true,
		'zip_postal_code' => true,
		'country_region' => true,
		'web_page' => true,
		'notes' => true,
		'attachments' => true,
	];
	}
