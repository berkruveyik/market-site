<?php
require_once  'conn.php';

if(!isset($_SESSION['users'])) {
    header("Location: /190218500/members/login.php");
    exit;
}

$user_id = $_SESSION['users']['mem_id'];


$query = 'SELECT * FROM payments 
INNER JOIN orders ON payments.payment_id = orders.payment_id 
WHERE payments.user_id = :user_id';

$stmt = $o_conn->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

$orders = $stmt->fetchAll(PDO::FETCH_OBJ);



?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    
  <div class="mt-2 px-2 " >
    <a href="/190218500/alibaba.php" class="btn btn-primary">Home</a>
    </div>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Payment Id</th>
      <th scope="col">Product Name</th>
      <th scope="col">Product Price </th>
      <th scope="col">Total Price </th>
        <th scope="col">Order Date </th>
      </tr>
      

  </thead>
  <tbody>
    <?php

    foreach ($orders as $order) {
        echo '<tr>';
        echo '<td>' . $order->payment_id . '</td>';
        echo '<td>' . $order->product_name . '</td>';
        echo '<td>' . $order->product_price . '</td>';
        echo '<td>' . $order->product_total_price . '</td>';
        echo '<td>' . $order->order_date . '</td>';
        echo '<td><a href="cancel_order.php?order_id=' . $order->order_id . '" onclick="return confirm(\'Are you sure you want to cancel this order?\');" class="btn btn-danger">cancel</a></td>';
        echo '</tr>';
        
    }
    
    ?>
  </tbody>

  


</table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>