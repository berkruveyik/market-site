<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'conn.php'; //connection file for orders.sqlite3
// We establish the connection for products.sqlite3 directly here
$db = new PDO('sqlite:../products.sqlite3');// Specify the full path to the products.sqlite3 file here

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(!isset($_SESSION['users'])) {
    header("Location: /190218500/members/login.php");
    exit;
}

if(isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];

    // Get order information
    $orderQuery = "SELECT * FROM orders WHERE order_id = :order_id";
    $orderStmt = $o_conn->prepare($orderQuery);
    $orderStmt->bindParam(':order_id', $order_id);
    $orderStmt->execute();
    $order = $orderStmt->fetch(PDO::FETCH_ASSOC);

    if($order) {
       //Update the product's stock quantity
        $updateStockQuery = "UPDATE products SET stock = stock + :quantity WHERE id = :product_id";
        $updateStockStmt = $db->prepare($updateStockQuery);
        $updateStockStmt->bindParam(':quantity', $order['product_count']);
        $updateStockStmt->bindParam(':product_id', $order['product_id']);

        if($updateStockStmt->execute()) {
            // Delete order
            $deleteQuery = "DELETE FROM orders WHERE order_id = :order_id";
            $deleteStmt = $o_conn->prepare($deleteQuery);
            $deleteStmt->bindParam(':order_id', $order_id);
            $deleteStmt->execute();
            header("Location: myOrders.php?status=success");
        } else {
            header("Location: myOrders.php?status=error");
        }
    } else {
        header("Location: myOrders.php?status=error");
    }
}
?>
