<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=donation_app; port=3310','root','');
    session_start();
    
}catch(PDOEXception $e){
    echo $e;
}

?>