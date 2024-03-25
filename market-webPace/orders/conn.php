<?php
session_start();
//check if the database file exists and create a new if not
if(!is_file('db/orders.sqlite3')){
    file_put_contents('db/orders.sqlite3', null);
}
// connecting the database
$o_conn = new PDO('sqlite:./db/orders.sqlite3');
//Setting connection attributes
$o_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Query for creating reating the member table in the database if not exist yet.

$query = "CREATE TABLE IF NOT EXISTS
orders(order_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, product_id INTEGER,
product_name TEXT, product_price INTEGER, product_count 
INTEGER, product_total_price INTEGER, product_img TEXT,
TEXT, order_date TEXT, user_id INTEGER , payment_id INTEGER)";

//Executing the query
$o_conn->exec($query);


// payments 
$query = "CREATE TABLE IF NOT EXISTS
payments(payment_id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, user_id INTEGER)";
$o_conn->exec($query);

