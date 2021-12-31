<?php
/* Connect component QueryBilder */
include "Component/QueryBilder.php";//We connect the component

$connect_db = new PDO("mysql:host=localhost; dbname=level; charset=utf8;" , "root", "");//DB connection
$db = new QueryBilder($connect_db);//Create a QueryBuilder object and pass it a database connection


$db->getAll('posts');//We call the function to load all records from the database
$db->getOne('posts', 1);//Get one record from a table
$db->create('posts', ['title' => 'text random']);//Create record in table
$db->update('posts', ['title' => 'text random'], 2);//Update a record in a table
$db->delete('posts', 2);//Delete a record in a table
