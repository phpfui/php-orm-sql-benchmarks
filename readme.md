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

|Date/Time          |System                                        |PHP  |Test      |Description    |Init Time|Init Memory|Insert Time|Insert Memory|Read Time|Read Memory|Update Time|Update Memory|Update Test Time|Update Test Memory|Random Read Time|Random Read Memory|Delete Time|Delete Memory|Total Runtime Time|Total Runtime Memory|
|-------------------|----------------------------------------------|-----|----------|---------------|---------|-----------|-----------|-------------|---------|-----------|-----------|-------------|----------------|------------------|----------------|------------------|-----------|-------------|------------------|--------------------|
|2024-12-24 21:35:39|Windows NT 10.0 build 26100 (Windows 11) AMD64|8.4.0|Cake      |sqlite::memory:|0.3864072|     452528|  4.7987664|      7172760|2.8997750|   -3313816|  4.5564180|      4250608|       4.1355289|          -3258104|       0.3561980|            437344|  8.5663418|       895344|        25.6995629|             6642120|
|2024-12-24 21:36:05|Windows NT 10.0 build 26100 (Windows 11) AMD64|8.4.0|Cake      |sqlite file    |0.5649630|       3504|  5.7709075|     -3280824|3.9963206|    4389912|  4.4525825|     -3452632|       3.1223837|           4445088|       0.3350854|            437344|  7.9578252|       776864|        26.2001984|             3321672|
|2024-12-24 21:36:31|Windows NT 10.0 build 26100 (Windows 11) AMD64|8.4.0|CakeCached|sqlite::memory:|0.0122030|       4208|  2.9163795|        16920|1.6817722|        -80|  2.3998698|          -80|       1.3207647|               -80|       0.1484511|               -80|  3.7483831|          -80|        12.2278989|               23144|
|2024-12-24 21:36:43|Windows NT 10.0 build 26100 (Windows 11) AMD64|8.4.0|CakeCached|sqlite file    |0.4962930|       4264|  2.2587298|        16920|1.5141711|        -80|  2.4559431|          -80|       1.2716724|               -80|       0.1383385|               -80|  3.7262737|          -80|        11.8614954|               23200|
|2024-12-24 21:36:55|Windows NT 10.0 build 26100 (Windows 11) AMD64|8.4.0|Doctrine  |sqlite::memory:|0.0703101|    2842624|300.5623402|      6569608|0.0109360|       1000|505.3371687|        40496|       0.0117593|               -80|       0.0013659|               -80|269.0243543|    -10735344|     1,075.0183673|            -1279360|
|2024-12-24 21:54:50|Windows NT 10.0 build 26100 (Windows 11) AMD64|8.4.0|Doctrine  |sqlite file    |0.0079949|       6768|227.3766263|     12257616|0.0188366|        -80|462.4604857|        40712|       0.0086476|               -80|       0.0009674|               -80|213.0787087|    -11112456|       902.9523802|             1194816|
|2024-12-24 22:09:53|Windows NT 10.0 build 26100 (Windows 11) AMD64|8.4.0|Eloquent  |sqlite::memory:|0.6989101|    2295464|  1.2159845|      1666384|0.7744099|      99760|  2.1031329|        65936|       0.7071536|               -80|       0.0861693|               -80|  2.0346760|           80|         7.6205455|             4129880|
|2024-12-24 22:10:01|Windows NT 10.0 build 26100 (Windows 11) AMD64|8.4.0|Eloquent  |sqlite file    |0.4894172|       6200| 37.8267340|         1000|1.1614052|          0| 37.2059720|           80|       1.1111649|               -80|       0.1163515|               -80| 40.2058679|          400|       118.1170041|                9936|
|2024-12-24 22:11:59|Windows NT 10.0 build 26100 (Windows 11) AMD64|8.4.0|PHPFUI    |sqlite::memory:|0.0097072|      71680|  0.2245116|        99184|0.1674389|       -248|  0.4470442|          832|       0.1663797|              -992|       0.0166409|               -80|  0.3135178|          -80|         1.3453434|              172712|
|2024-12-24 22:12:00|Windows NT 10.0 build 26100 (Windows 11) AMD64|8.4.0|PHPFUI    |sqlite file    |0.4429463|       1336| 37.2659511|          608|0.5252738|       -248| 61.0093581|          832|       0.5912322|              -992|       0.0521919|               -80| 75.6630321|          -80|       175.5501097|                3792|

## 4. Contributions
If you are the developer or user of an ORM, data mapper, Active Record library and you want to have it included in this repo, please submit a pull-request.

Slight changes to the database schema are allowed and supported as long as the new schema is functionally equivalent.

If you see something wrong about the current usage of one of the libraries, please send a pull-request along with a short explanation of what that change does.

Please, try to implement the solutions using the most common configuration. If you want to include an optimized version of the test, create another namespace for the **Tests** class.
