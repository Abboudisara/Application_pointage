<?php

session_start();

require('config.php');

if(isset($_POST['ok'])){

                $sql = 'SELECT * FROM fonctionnaire';
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $don = $stmt->fetchAll(PDO::FETCH_OBJ);
                    foreach($don as $info){
        if($_POST['matricule'] == $info->fn_mat){
            header("location: pointage.php?id=$info->fn_id");
        }else{
            echo "<script>alert('Wrong Matricule! plese check again!')</script>";
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
            <li><a href="login.php" class="nava">login</a></li>
        </ul>
    </nav>
       </header>
    
    <form class="container" method="POST" >
        
        <label class="title">Matricule
        <input class="inpo" type="text" name="matricule" placeholder="Saisi votre Matricule">
        </label>
        <input class="inpo btn" type="submit" value="OK" name="ok"> 

    </form>
</body>
</html>