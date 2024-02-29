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

|Date/Time          |System                                        |PHP   |Test    |Description    |Init Time|Init Memory|Insert Time|Insert Memory|Read Time|Read Memory|Update Time|Update Memory|Update Test Time|Update Test Memory|Random Read Time|Random Read Memory|Delete Time|Delete Memory|Total Runtime Time|Total Runtime Memory|
|-------------------|----------------------------------------------|------|--------|---------------|---------|-----------|-----------|-------------|---------|-----------|-----------|-------------|----------------|------------------|----------------|------------------|-----------|-------------|------------------|--------------------|
|2024-06-20 18:02:00|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|PHPFUI  |sqlite::memory:|0.0098595|     159736|  0.4017097|       156888|0.2747500|       -248|  0.7311500|          824|       0.2684810|              -984|       0.0287709|               -80|  0.4724338|          -80|         2.1774633|              158576|
|2024-06-20 18:02:02|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|PHPFUI  |sqlite file    |0.4403791|       1320| 35.3500766|          608|0.5957901|       -248| 36.1288402|          824|       0.5597627|              -984|       0.0528435|               -80| 35.5161805|          -80|       108.2036853|                2296|
|2024-06-20 18:03:51|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|PHPFUI  |MySQL          |2.7454799|      47232|  2.0613062|          704|1.8070773|        288|  3.6264053|          880|       1.5550738|             -1040|       0.1704495|               -80|  3.0068395|          -80|        12.2273152|                2928|
|2024-06-20 18:04:06|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|PHPFUI  |MariaDB        |1.4823708|      47240|  1.8261260|          704|1.3288766|       -248|  3.0231123|          880|       1.0951148|             -1040|       0.0970925|               -80|  2.4281508|          -80|         9.7986339|                2392|
|2024-06-20 18:04:17|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|Eloquent|sqlite::memory:|0.0460056|    2485840|  4.0716707|      1585176|2.9218725|     105952| 10.4888931|          400|       2.9134279|               -80|       0.2710464|               -80|  6.9869860|           80|        27.6540327|             1693704|
|2024-06-20 18:04:45|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|Eloquent|sqlite file    |0.4205238|       6024| 40.5552925|         1000|4.6195096|          0| 48.9653028|           80|       4.3187501|               -80|       0.4621176|               -80| 57.0627999|          400|       155.9839546|                3576|
|2024-06-20 18:07:21|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|Eloquent|MySQL          |2.2485506|     164616|  7.2578483|         1000|6.5304497|          0| 17.6399647|          136|       6.7980402|              -136|       0.6620523|               -80| 14.9904082|          400|        53.8789045|                3576|
|2024-06-20 18:08:17|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|Eloquent|MariaDB        |1.5655652|      51944|  6.8342190|         1000|7.0361329|          0| 17.3616969|          136|       6.7960654|              -136|       0.6646201|               -80| 16.2637274|          400|        54.9565981|                3576|

## 4. Contributions
If you are the developer or user of an ORM, data mapper, Active Record library and you want to have it included in this repo, please submit a pull-request.

Slight changes to the database schema are allowed and supported as long as the new schema is functionally equivalent.

If you see something wrong about the current usage of one of the libraries, please send a pull-request along with a short explanation of what that change does.

Please, try to implement the solutions using the most common configuration. If you want to include an optimized version of the test, create another namespace for the **Tests** class.
