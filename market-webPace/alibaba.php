<html>
  
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>project</title>
<link rel="stylesheet" href="css.css">
<script src="script/alibaba.js"></script>

<script src="script/jquery-3.6.3.js"></script>


<style>
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
  padding: 20px;
  font-family: Arial;
}

/* Center website */
.main {
  max-width: 1500px;
  margin: auto;
}

h1 {
  font-size: 50px;
  word-break: break-all;
}

.row {
  margin: 20px -16px;
}

/* Add padding BETWEEN each column */
.row,
.row > .column {
  padding: 10px;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 25%;
  margin-left: 100px;
  display: none; /* Hide all elements by default */
}

/* Clear floats after rows */ 
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Content */
.content {
  background-color: white;
  padding: 10px;
}

/* The "show" class is added to the filtered elements */
.show {
  display: block;
}

/* Style the buttons */
.topnav {
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: rgb(245, 149, 6);
  text-align: center;
  cursor: pointer;
  font-size: 18px;
  
  
}


.btn:hover {
  background-color: #ddd;
}

.btn.active {
  background-color: #666;
  color: rgb(3, 2, 0);
}
</style>
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


<!-- MAIN (Center website) -->
<div class="main">

  <header>
    <div class="box1">
        
        <div><img src="watces/e-store 19.11.27.png" style="width: 150px; margin-left: 60px; margin-top: -0px; margin-bottom: -50px;" ></div>
    
        <nav class="navbar" id="search">
            <div class="box1">
                <form class="d-flex" role="search">
                    <input id="author-container" class="form-control " type="text" placeholder="Search" onkeyup="search()" aria-label="Search" >
                    <button class="btn" id="button"  type="submit:">Search</button>
                </form>
            </div>
        </nav>
        <hr> 
        
    
        <nav id="line">
            <ul id="main" onclick="showAlert()">
                <li id="catalog"><a href="">catagories</a></li>
                <li id="ready_to_ship"><a href="">ready to ship</a></li>
                <li id="protective"><a href="">Protective essentials</a></li>
                <li id="trade_show"><a href="">Trade Shows</a></li>
                
                <li><a href="#">buyer center</a>
                    <ul>
                        <li id="blogs"><a href="">blogs</a></li>
                        <li id="trade"><a href="">trade Assurance</a></li>
                        <li id="logistics"><a href="">logistics service</a></li>
                        <li id="credit"><a href="">leter of credit</a></li>
                    </ul>
                </li>

              

                <li><a href="#">help</a>
                    <ul>
                        <li><a href="">for buyers</a></a></li>
                        <li><a href="">for suppliers</a></li>
                        <li><a href="">submit a Dispute</a></li>
                        <li><a href="">report IPR Infringement</a></li>
                        <li><a href="">report Abuse</a></li>
                    </ul>
                </li>
                
            </ul>

        
              
            <ul id="right-side">
              <li onclick="showAlert()"><a href="">get the app</a></li>
              <div class="nav">
                <li><a href="shopping-card.php" style="text-decoration: none;">Cart <span class="badge cart-count"><?php echo $total_count; ?></span></a></li>
              </div>
            </ul>
            
          </nav>

     
        <hr>
    </div>

    <div class="login">
      <?php 
      if(isset($_SESSION["users"])){
        // orders 
        echo "<a href='orders/myOrders.php'><button class='login1'>orders</button></a>";
        echo "<a href='members/logout.php'><button class='login1'>logout</button></a>";
      } else {
        ?>
        <a href="members/index.php"><button class="login1">registon</button></a>
        <?php
        echo "<a href='members/login.php'><button class='login1'>login</button></a>";
      }
      ?> 
      
    </div>
    
  </header>
  
  <?php 
  if(isset($_SESSION['users'])) {
     ?>
        Welcome <?php echo $_SESSION['users']['firstname']?>
     <?php
  }
?>
<div id="myBtnContainer" >
  
  <button class="topnav" onclick="filterSelection('all')"> Show all</button>
  <button class="topnav" onclick="filterSelection('Digital Watches')"> smart phone</button>
  <button class="topnav" onclick="filterSelection('Fashion Smart Watches')"> Tablets</button>
  <button class="topnav" onclick="filterSelection('Mechanical Watches')"> Smart Watches</button>
</div>


<div style="display:flex; justify-content: end;margin:10px 0">

</div>
<!-- Portfolio Gallery Grid -->
<div class="row" id="row1">

<?php  
  include "db.php";

  $produts = $db-> query("SELECT * FROM products where number=1", PDO::FETCH_OBJ) ->fetchAll();
    foreach($produts as $produt){ ?>
      <div class="column Digital Watches">
        <div class="content">
          <img src=<?php echo $produt -> img; ?> alt="Mountains" style="width:100%">
          <h4><?php echo $produt -> products_name; ?></h4>
          <p class="price"><?php echo $produt -> price; ?></p>
          <p><?php echo $produt -> detail; ?></p>
          <p class="card button "><button class="addToCartBtn" product-id="<?php echo $produt ->id;?>">Add to Cart</button></p>
        </div>
      </div>
  
<?php } ?>


  
<?php  
  include "db.php";

  $produts = $db-> query("SELECT * FROM products where number=2", PDO::FETCH_OBJ) ->fetchAll();
    foreach($produts as $produt){ ?>
      
      
      
      <div class="column Fashion Smart Watches">
        <div class="content">
          <img src=<?php echo $produt -> img; ?> alt="Mountains" style="width:100%">
          <h4><?php echo $produt -> products_name; ?></h4>
          <p class="price"><?php echo $produt -> price; ?></p>
          <p><?php echo $produt -> detail; ?></p>
          <p class="card button"><button class="addToCartBtn" product-id="<?php echo $produt ->id;?>">Add to Cart</button></p>
        </div>
      </div>
      
<?php } ?>

  <?php  
  include "db.php";

  $produts = $db-> query("SELECT * FROM products where number=3", PDO::FETCH_OBJ) ->fetchAll();
    foreach($produts as $produt){ ?>
      
      
      
      <div class="column Mechanical Watches">
        <div class="content">
          <img src=<?php echo $produt -> img; ?> alt="Mountains" style="width:100%">
          <h4><?php echo $produt -> products_name; ?></h4>
          <p class="price"><?php echo $produt -> price; ?></p>
          <p><?php echo $produt -> detail; ?></p>
          <p class="card button"><button class="addToCartBtn" product-id="<?php echo $produt ->id;?>">Add to Cart</button></p>
        </div>
      </div>
      
      
      
  <?php } ?>
  

<!-- END GRID -->
</div>
<footer>
  <p style="text-align: center;">Creater by Mahir Berker Üveyik</p>
  <p style="text-align: center;">190218500</p>
</footer>
<!-- END MAIN -->
</div>

<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

<script>
  $(document).ready(function() {
    $('.addToCartBtn').click(function() {
      var url = "http://localhost/190218500/card_db.php"
      var data = {
        p:"addToCart",
        product_id: $(this).attr("product-id")
      }
      $.post(url , data , function(response){
        $(".cart-count").text(response);
      })
    });
  });
</script>


</body>
</html>


</style>