<?php declare(strict_types=1);

namespace SOB\Composite;

use Composite\DB\Attributes\Table;
use Composite\DB\Attributes\PrimaryKey;
use Composite\Sync\Attributes\Index;
use Composite\Entity\AbstractEntity;

#[Table(connection: 'sqlite', name: 'employee')]
#[Index(columns: ['city'], name: 'employee_city')]
#[Index(columns: ['company'], name: 'employee_company')]
#[Index(columns: ['first_name'], name: 'employee_first_name')]
#[Index(columns: ['last_name'], name: 'employee_last_name')]
#[Index(columns: ['zip_postal_code'], name: 'employee_zip_postal_code')]
#[Index(columns: ['state_province'], name: 'employee_state_province')]
class Employee extends AbstractEntity
{
    #[PrimaryKey(autoIncrement: true)]
    public int $employee_id;

    public function __construct(
        public ?string $company = null,
        public ?string $last_name = null,
        public ?string $first_name = null,
        public ?string $email_address = null,
        public ?string $job_title = null,
        public ?string $business_phone = null,
        public ?string $home_phone = null,
        public ?string $mobile_phone = null,
        public ?string $fax_number = null,
        public ?string $address = null,
        public ?string $city = null,
        public ?string $state_province = null,
        public ?string $zip_postal_code = null,
        public ?string $country_region = null,
        public ?string $web_page = null,
        public ?string $notes = null,
        public ?string $attachments = null,
    ) {}
}
