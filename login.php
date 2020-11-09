<?php
require('config.php');

if(isset($_POST['ok'])){

    $fulname = $_POST['name'];
    $pass = $_POST['pass'];

    $stmt = ('SELECT * FROM caissier');
    $query = $pdo->prepare($stmt);
    $query->execute();

    while($row = $query->fetch(PDO::FETCH_ASSOC)){
        
        if($fulname == $row['c_fulname'] AND $pass == $row['c_pass']){
            header("location: dashboard.php?name=$fulname");
        }else{
            echo"<script>alert('Full name or password wrong!')</script>";
        }
    }

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>gestion de pointage</title>
</head>
<body>
<header>
    <nav class="navbar">
        <ul>
            <li><a href="index.html" class="nava">Home</a></li>
            <li><a href="login.php" >login</a></li>
        </ul>
    </nav>
       </header>
   
    <form class="container" method="POST" >
        <label class="title">Caissier
        <input class="inpo" type="text" name="name" placeholder="Full name...">
        <input class="inpo" type="password" name="pass" placeholder="Saisi votre Mot de Pass">
        </label>
        <input class="inpo btn" type="submit" value="OK" name="ok"> 

    </form>
</body>
</html>