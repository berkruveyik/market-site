<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>card</title>
  
  <link rel="stylesheet" href="css.css">
  <script src="custom.js"></script>
  <script src="script/jquery-3.6.3.js"></script>
  <script src="alibaba.js"></script>  
</head>
<body>

<?php
session_start();
if(isset($_SESSION["shoppingCart"])){
  $shoppingCart = $_SESSION ["shoppingCart"];
  $total_count = $shoppingCart ["summary"] ["total_count"];
  $total_price = $shoppingCart["summary"]["total_price"];
  $shopping_products = $shoppingCart["products"];

}else{
  $total_count = 0;
  $total_price =0.0;
}

?>





</div>
    <div class="navbar">
        <a href="http://localhost/190218500/alibaba.php">Home</a>
    </div>
    <div class="das">
      <?php if($total_count > 0 ){?>
      
        <h2>You have <a href="alibaba.php" style="text-decoration: none;" style="color:#f44336;"><strong><?php echo $total_count; ?></strong></a> items in your cart</h2>
        <hr>

      <?php }else{?>
      
        <div class="alert">
          <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
          There are no items in your cart, please <a href="alibaba.php">click</a> to add items to your cart
        
        </div>
      

      <?php }  ?>
    
    
    
    </div>
    
    


    <table>
        <thead>
            <tr>
              <th>PRODUCT IMAGE</th>
              <th>Product Name</th>
              <th>price</th>
              <th>number</th>
              <th>total</th>
              <th>take out of the card</th>
              <th>stock</th>
            </tr>
        </thead>

        <tbody>
          <?php foreach($shopping_products as $product) { ?>
            
            <tr>
              <td><img src=<?php echo $product -> img; ?> alt="" style="width: 100px;"></td>
              <td><?php echo $product -> products_name; ?></td>
              <td><?php echo $product -> price; ?></td>
              <td>
                <a href="card_db.php?p=decCount&product_id=<?php echo $product -> id; ?>"><button class="removeFromCartBtn">-</button></a>
                <input type="text" value=<?php echo $product ->count ; ?> class="number">
                <a href="card_db.php?p=incCount&product_id=<?php echo $product -> id; ?>"><button class="removeFromCartBtn">+</button></a>
              </td>

              <td><?php echo $product -> total_price; ?>$</td>
              <td>
                <button product-id= "<?php echo $product ->id ; ?>" class="removeFromCartBtn"><span>take out of the card</span></button>
              </td>
              <td><?php echo $product -> stock; ?></td>
              

            </tr>


          <?php }  ?>  

            
            

        </tbody>
        <tfoot>
          <th>
          <p>total product: <span><?php echo $total_count; ?></span></p>
          </th>
          <th style="float: right;">
          <p>total amount: <span><?php echo  $total_price; ?>$</span></p>
          </th>
          <th style="float: left;">
          <a  href="/190218500/orders/ordersComplete.php" class="removeFromCart" accesskey=""
       >
          buy</a>
          
        </tfoot>
    </table>


    
</body>
<footer>
  <p style="text-align: center;">Creater by Mahir Berker Üveyik</p>
  <p style="text-align: center;">190218500</p>
</footer>
</html>

<script>
  <?php 
  if(isset($_GET['status'])) {
    ?>
    

    window.location.href = "/190218500/finish.php";
    session_destroy();
    <?php 
  }
  ?>
  $(document).ready(function() {
    $('.removeFromCartBtn').click(function() {
      var url = "http://localhost/190218500/card_db.php"
      var data = {
        p:"removeFromCart",
        product_id: $(this).attr("product-id")
      }
      $.post(url , data , function(response){
        window.location.reload();
      })
    });
  });
</script>




<style>
body {margin:0;}

.navbar {
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

.navbar a {
  float: left;
  display: block;
  color: orange;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.navbar a:hover {
  background: #ddd;
  color: black;
}

.main {
  padding: 16px;
  margin-top: 30px;
  height: 1500px; /* Used in this example to enable scrolling */
}

table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 100px solid #ddd;
  
}

th, td {
  text-align: center;
  
  padding: 20px;
  
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}
.number{
  width: 100px;
  text-align: center;
}
.removeFromCartBtn{
    
    text-decoration: none;
    background-color: rgb(238, 155, 59);
    font-size: 20px;
    top: -10px;
    left: 2px;
    border-radius: 10px;
    padding-left: 9px; 
    padding-right: 9px;
    padding-top: -4px;
    padding-bottom: -4px;
    color: #333;
}
.das{
  padding: 26px;
  margin-top: 30px;
  height: 50px; 
  
}



.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}

.closebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}

.removeFromCart{
    
    text-decoration: none;
    background-color: rgb(238, 155, 59);
    font-size: 20px;
    top: -10px;
    left: 2px;
    border-radius: 10px;
    padding-left: 9px; 
    padding-right: 9px;
    padding-top: -4px;
    padding-bottom: -4px;
    color: #333;
}
</style>