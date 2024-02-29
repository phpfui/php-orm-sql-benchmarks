<?php

namespace SOB\Eloquent\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * This code is automatically generated.  See SOB\Eloquent\scaffolding\generateModels.php.  Do not update by hand.
 *
 * @property int $employee_id MySQL type integer
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
class Employee extends Model
	{
	/**
	 * Indicates if the model's ID is auto-incrementing.
	 */
	public $incrementing = true;

	/**
	 * Indicates if the model should be timestamped.
	 */
	public $timestamps = false;

	/**
	 * The storage format of the model's date columns.
	 */
	protected $dateFormat = 'U';

	/**
	 * The primary key associated with the table.
	 */
	protected $primaryKey = 'employee_id';

	/**
	 * The table associated with the model.
	 */
	protected $table = 'employee';
	}
