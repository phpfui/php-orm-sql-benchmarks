# PHP ORM and SQL Benchmarks
This is a modern benchmark for PHP ORM implementations and SQL servers.

## 1. Methodology
This project uses a modified version of the NorthWind database schema from Microsoft Access.

Testing includes insertion, update, read, delete, and large dataset iterations.

Tests should be run on the same machine at the same time. The idea is not to care about a specific machine's performance, but rather the relative performance of different SQL servers and PHP ORM implementations on the same machine.

Tests can be taylored to include or exclude specific servers, orms and iterations.

## 2. Requirements
* PHP 8.1 or greater
* sqlite support
* mysql support
* Any other SQL server your want to test

### Installation
```
git clone https://github.com/phpfui/php-sql-orm-benchmarks.git
cd php-sql-orm-benchmarks
composer install
```

### Configuration
Tests are configured via the config.php file.  The *namespace* must contain a **Tests** class which extends the **\SOB\Test** abstract class.

```php
return [
	'iterations' => 5000, // default is 5000
	'tests' => [
		['namespace' => 'PHPFUI', 'description' => 'sqlite::memory:', 'dbname' => ':memory:'],
		['namespace' => 'PHPFUI', 'description' => 'sqlite file', ],
		['namespace' => 'PHPFUI', 'description' => 'MySQL', 'driver' => 'mysql', ],
		['namespace' => 'PHPFUI', 'description' => 'MariaDB', 'driver' => 'mysql', 'port' => 3307,],
		['namespace' => 'Eloquent', 'description' => 'sqlite::memory:', 'dbname' => ':memory:'],
		['namespace' => 'Eloquent', 'description' => 'sqlite file', ],
		['namespace' => 'Eloquent', 'description' => 'MySQL', 'driver' => 'mysql', ],
		['namespace' => 'Eloquent', 'description' => 'MariaDB', 'driver' => 'mysql', 'port' => 3307,],
		],
	];
```

The following options are available:
* namespace, default PHPFUI
* description, PDO connection string
* dbname, default namespace
* driver, default 'sqlite'
* host, default 'localhost'
* port, default 3306
* user, default root
* password, default ''

Create databases to match namespaces for each SQL server you want to test. Without a configuration file, sqlite::memory: and sqlite file will be used for all instances of the **Tests** class.

### Running All The Benchmarks
```
php benchmark.php
```

## 3. Results
Results after each run are appended to the *results.csv* file. Delete the file to start fresh.  Use the **csvToMDTable.php** file to create a nice MarkDown table like this:

|Date/Time          |System                                        |PHP   |Test      |Description    |Init Time|Init Memory|Insert Time|Insert Memory|Read Time|Read Memory|Update Time|Update Memory|Update Test Time|Update Test Memory|Random Read Time|Random Read Memory|Delete Time|Delete Memory|Total Runtime Time|Total Runtime Memory|
|-------------------|----------------------------------------------|------|----------|---------------|---------|-----------|-----------|-------------|---------|-----------|-----------|-------------|----------------|------------------|----------------|------------------|-----------|-------------|------------------|--------------------|
|2024-07-16 17:31:21|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|Cake      |sqlite::memory:|0.0218766|     466248|  9.1099903|      3494224|7.3511032|     517992| 10.5186761|       521552|       7.6394803|            570248|       0.8596352|            805168| 17.3687186|      1025144|        52.8696784|             7406336|
|2024-07-16 17:32:14|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|Cake      |sqlite file    |0.4816907|       3432|  9.6208151|       461728|7.6451882|     733984| 10.5082477|       269952|       7.6775034|            786776|       0.7706298|            805168| 17.8191856|     -6463720|        54.5233947|            -3400264|
|2024-07-16 17:33:09|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|CakeCached|sqlite::memory:|0.0088097|       4120|  5.8615605|        16888|4.2825175|        -80|  7.3652013|          -80|       4.1289402|               -80|       0.3975561|               -80| 10.8846376|         5336|        32.9293566|               28440|
|2024-07-16 17:33:42|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|CakeCached|sqlite file    |0.5156268|       4176|  5.4202041|        16888|3.6071088|        -80|  6.3696062|          -80|       3.5480014|               -80|       0.3617130|               -80|  9.6405036|         5336|        29.4629193|               28496|
|2024-07-16 17:34:11|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|Eloquent  |sqlite::memory:|0.0364290|    2587088|  3.5048188|      1521272|2.5072958|     167104|  9.0476664|          400|       2.4602980|               -80|       0.2531012|               -80|  6.0763064|           80|        23.8860547|             4278200|
|2024-07-16 17:34:35|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|Eloquent  |sqlite file    |0.5023757|       6152| 43.2081514|         1000|3.2310657|          0| 50.2343509|           80|       2.9356257|               -80|       0.3575013|               -80| 46.1161104|          400|       146.5853567|                9888|
|2024-07-16 17:37:02|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|PHPFUI    |sqlite::memory:|0.0097719|      80408|  0.4048142|       115072|0.2575646|       -248|  0.6795625|          824|       0.2628937|              -984|       0.0254970|               -80|  0.4699398|          -80|         2.1102089|              197328|
|2024-07-16 17:37:04|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|PHPFUI    |sqlite file    |0.5375158|       1320| 36.8494255|          608|0.5676036|       -248| 38.4077615|          824|       0.6113671|              -984|       0.0558636|               -80| 37.7609949|          -80|       114.7907345|                3776|

## 4. Contributions
If you are the developer or user of an ORM, data mapper, Active Record library and you want to have it included in this repo, please submit a pull-request.

Slight changes to the database schema are allowed and supported as long as the new schema is functionally equivalent.

If you see something wrong about the current usage of one of the libraries, please send a pull-request along with a short explanation of what that change does.

Please, try to implement the solutions using the most common configuration. If you want to include an optimized version of the test, create another namespace for the **Tests** class.
