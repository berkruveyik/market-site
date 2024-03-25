<?php 
include_once 'conn.php';

$db = new PDO('sqlite:../products.sqlite3');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



if(!isset($_SESSION['users'])){
  header("location:/190218500/members/login.php");
  exit;
}

$user_id = $_SESSION['users']['mem_id'];

if( 
isset($_SESSION['shoppingCart']) && 
isset($_SESSION['shoppingCart']['products'])
) {

  try {
    $shoppingCart = $_SESSION['shoppingCart']['products'];

    // echo '<pre>';
    // print_r($shoppingCart);
    // echo '</pre>';
    // exit;
    
    foreach ($shoppingCart as $key => $item) {

        $item = (array) $item;
    
        $product_id = $item['id'];
        $product_name = $item['products_name'];
        $product_price = $item['price'];
        $product_count = $item['count'];
        $product_total_price = $item['total_price'];
        $product_img = $item['img'];
        $order_date = date("Y-m-d H:i:s");

        // drop out of stock 
        $query = "UPDATE products SET stock = stock - :stock WHERE id = :product_id";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':stock', $product_count);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();

        // add to payment table
        $query = "INSERT INTO payments (user_id) VALUES (:user_id)";
        $stmt = $o_conn->prepare($query);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        $last_id = $o_conn->lastInsertId();


   

        // Add to Order Table
        $query = "INSERT INTO orders (product_id, product_name, 
        product_price, product_count, product_total_price, product_img, order_date, user_id,payment_id)
         VALUES (:product_id, :product_name, :product_price, :product_count, :product_total_price,
          :product_img, :order_date, :user_id, :payment_id)";
        $stmt = $o_conn->prepare($query);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->bindParam(':product_name', $product_name);
        $stmt->bindParam(':product_price', $product_price);
        $stmt->bindParam(':product_count', $product_count);
        $stmt->bindParam(':product_total_price', $product_total_price);
        $stmt->bindParam(':product_img', $product_img);
        $stmt->bindParam(':order_date', $order_date);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':payment_id', $last_id);
        $stmt->execute();


        // Empty Cart
        unset($_SESSION['shoppingCart']['products'][$key]);

        // back 
        header('location: ' . $_SERVER['HTTP_REFERER'] . '?status=success');
    }
  } catch (Exception $e) {
    echo $e->getMessage();
  }
 
}

