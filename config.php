
<?php

try{
   
    $pdo = new PDO('mysql:host=localhost;dbname=gestion','root','');

} catch(PDOException $e){

    echo 'Erreur : '.$e->getMessage();

    die();
}


