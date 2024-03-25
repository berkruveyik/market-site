<!DOCTYPE html>
<html lang="pt-br">
<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment</title>
  <link rel="shortcut icon" href="./images/security.svg" type="image/x-icon">

  <link rel="stylesheet" href="style.css">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
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





  <form>
    <section id="credit-card">
      <div class="front"></div>
      <div class="back"></div>
    </section>
    
    <section class="input-wrapper">
      <p style="margin-top: -20px; ">total amount: <span><?php echo  $total_price; ?></span></p>
      <div id="input-number">
        <label for="cc-number">card number</label>
        <input id="cc-number"
        type="text"
        placeholder="**** **** **** ****"
        />
      </div>

      <div id="input-name">
        <label for="cc-holder">name surname</label>
        <input id="cc-holder"
        type="text"
        placeholder="Name as it appears on the card"
        required
        />
        <div class="warning">
          <img src="images/warning.svg"
          alt="ícone de cuidado">
          <p>Owner's name is required</p>
        </div>
      </div>

      <div id="input-val">
        <label for="cc-val">Validade</label>
        <input id="cc-val"
        type="text"
        placeholder="mm/aa"
        />
      </div>

      <div id="input-cvv">
        <label for="cc-cvv">CVV
          <img src="./images/help.svg"
          alt="ícone de ajuda"
          title="Esse número está, geralmente, nas costas
          do seu cartão"
          >
        </label>
        <input id="cc-cvv"
        type="text"
        placeholder="***"
        />
      </div>
    </section>

    <section class="info-security">
     <img src="./images/security.svg"
     alt="ícone de um escudo">
      <p>Your data is safe</p>
    </section>
    <section class="button">
     <button> Add Card</button>
    </section>
  </form>
  
  <script src="https://unpkg.com/imask"></script>
  <script src="script.js"></script>
</body>
</html>

