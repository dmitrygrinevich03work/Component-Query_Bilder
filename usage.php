<?php

/* Connect component QueryBilder */
require_once "Component/QueryBilder.php";//We connect the component

$connect_db = new PDO("mysql:host=localhost; dbname=level; charset=utf8;" , "root", "");//DB connection

$db = new QueryBilder($connect_db);//Create a QueryBuilder object and pass it a database connection


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