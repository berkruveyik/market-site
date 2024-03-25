<?php

try{
    
$db = new PDO('sqlite:products.sqlite3');
//Setting connection attributes
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo $e -> getMessage();

}


