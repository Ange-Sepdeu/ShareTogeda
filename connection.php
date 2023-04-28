<?php

try{
    $db = new PDO('mysql:host=localhost;dbname=sharetogeda','root','');
    session_start();
    
}catch(PDOEXception $e){
    echo $e;
}

?>