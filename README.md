# Usage
### 1. Connect component Query Builder:
```php
require_once "Component/QueryBilder.php";
```
### 2. Set up your Database connection configuration:
```php
$connect_db = new PDO("mysql:host=localhost; dbname=level; charset=utf8;" , "root", "");
```
### 3. You need to create a Query Builder object and transfer the connection to the Database
```php
$db = new QueryBilder($connect_db);
```
### 4. Execute a query as in examples below:
```php
/* We call the function to load all records from the database */
$db->getAll('posts');

/* Get one record from a table */
$db->getOne('posts', 1);

/* Create record in table */
$db->create('posts', ['title' => 'text random']);

/* Update a record in a table */
$db->update('posts', ['title' => 'text random'], 2);

/* Delete a record in a table */
$db->delete('posts', 2);
```

