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
|2024-07-08 14:58:12|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|PHPFUI  |sqlite::memory:|0.0765732|      90840|  0.3862823|       116680|0.2109417|       -248|  0.5851675|          824|       0.2127549|              -984|       0.0208847|               -80|  0.3753493|          -80|         1.8681531|              212728|
|2024-07-08 14:58:13|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|PHPFUI  |sqlite file    |0.4607009|       1320| 35.7201889|          608|0.5574109|       -248| 36.9189774|          824|       0.4800420|              -984|       0.0472498|               -80| 48.5164816|          -80|       122.7012134|                3776|
|2024-07-08 15:00:16|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|PHPFUI  |MySQL          |2.2641022|      47232|  1.5117000|          704|0.9277432|        288|  2.5369164|          880|       1.1175533|             -1040|       0.0995517|               -80|  2.1686470|          -80|        10.6263777|               50320|
|2024-07-08 15:00:27|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|PHPFUI  |MariaDB        |1.6843715|      47240|  1.1468933|          704|0.9391296|       -248|  2.7408786|          880|       0.9083748|             -1040|       0.0835396|               -80|  1.7504692|          -80|         9.2538189|               49792|
|2024-07-08 15:00:36|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|Eloquent|sqlite::memory:|0.8603331|    2551376|  3.3881619|      1520016|2.4422147|     101856|  8.4600866|          400|       2.3383331|               -80|       0.2366295|               -80|  5.3739589|           80|        23.0998701|             4175984|
|2024-07-08 15:00:59|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|Eloquent|sqlite file    |0.4768760|       6024| 41.0673353|         1000|2.7616418|          0| 44.0138250|           80|       2.8993845|               -80|       0.2858098|               -80| 47.1341429|          400|       138.6392718|                9760|
|2024-07-08 15:03:18|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|Eloquent|MySQL          |5.0309200|     230152|  6.7172747|         1000|5.0864580|          0| 16.1164827|          136|       5.0748560|              -136|       0.4826687|               -80| 11.8507673|          400|        50.3596375|              233888|
|2024-07-08 15:04:08|Windows NT 10.0 build 22631 (Windows 11) AMD64|8.2.13|Eloquent|MariaDB        |1.5799138|      51944|  5.4307018|         1000|4.8108392|          0| 13.8429003|          136|       4.5546164|              -136|       0.4588738|               -80| 10.9557804|          400|        41.6338259|               55680|

## 4. Contributions
If you are the developer or user of an ORM, data mapper, Active Record library and you want to have it included in this repo, please submit a pull-request.

Slight changes to the database schema are allowed and supported as long as the new schema is functionally equivalent.

If you see something wrong about the current usage of one of the libraries, please send a pull-request along with a short explanation of what that change does.

Please, try to implement the solutions using the most common configuration. If you want to include an optimized version of the test, create another namespace for the **Tests** class.
