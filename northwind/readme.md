## Database History
Converted from MS Access 2010 Northwind database (northwind.accdb) using Bullzip MS Access to MySQL Version 5.1.242. http://www.bullzip.com

### CHANGES MADE AFTER INITIAL CONVERSION
* column and row names in CamelCase converted to lower_case_with_underscore
* space and slash ("/") in table and column names replaced with _underscore_
* tables converted to singular
* id column names converted to "table_name_id"
* foreign key column names converted to xxx_id
* variables of type TIMESTAMP converted to DATETIME to avoid TIMESTAMP range limitation (1997 - 2038 UTC), and other limitations.
* unique and foreign key checks disabled while loading data
