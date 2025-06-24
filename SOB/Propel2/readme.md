You will need to include "propel/propel": "dev-master" in composer.json

This code was generated via Propel's init script in vendor/bin.

The problem is you can not delete an active record as it tries to call a member function from a static.

Fatal error: Uncaught Error: Non-static method Propel\Runtime\ActiveQuery\ModelCriteria::delete() cannot be called statically in C:\websites\php-orm-sql-benchmarks\SOB\Propel2\Base\EmployeeQuery.php:222
Stack trace:
#0 C:\websites\php-orm-sql-benchmarks\vendor\propel\propel\src\Propel\Runtime\Connection\TransactionTrait.php(35): SOB\Propel2\Base\EmployeeQuery::{closure:SOB\Propel2\Base\EmployeeQuery::delete():217}()
#1 C:\websites\php-orm-sql-benchmarks\SOB\Propel2\Base\EmployeeQuery.php(217): Propel\Runtime\Connection\ConnectionWrapper->transaction(Object(Closure))
#2 C:\websites\php-orm-sql-benchmarks\SOB\Propel2\Base\Employee.php(516): SOB\Propel2\Base\EmployeeQuery->delete(Object(Propel\Runtime\Connection\ConnectionWrapper))
#3 C:\websites\php-orm-sql-benchmarks\vendor\propel\propel\src\Propel\Runtime\Connection\TransactionTrait.php(35): SOB\Propel2\Base\Employee->{closure:SOB\Propel2\Base\Employee::delete():510}()
#4 C:\websites\php-orm-sql-benchmarks\SOB\Propel2\Base\Employee.php(510): Propel\Runtime\Connection\ConnectionWrapper->transaction(Object(Closure))
#5 C:\websites\php-orm-sql-benchmarks\SOB\Propel2\Tests.php(37): SOB\Propel2\Base\Employee->delete()
#6 C:\websites\php-orm-sql-benchmarks\SOB\TestRunner.php(176): SOB\Propel2\Tests->delete(1)
#7 C:\websites\php-orm-sql-benchmarks\SOB\TestRunner.php(71): SOB\TestRunner->test(Object(SOB\Propel2\Tests), Object(SOB\Configuration))
#8 C:\websites\php-orm-sql-benchmarks\benchmark.php(24): SOB\TestRunner->runTests(Array)
#9 {main}
	thrown in C:\websites\php-orm-sql-benchmarks\SOB\Propel2\Base\EmployeeQuery.php on line 222

