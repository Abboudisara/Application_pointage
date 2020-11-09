<?php
require('../config.php');

if(isset($_POST['ok'])){
    $fname= $_POST['fname'];
    $lname=$_POST['lname'];
    $mat=$_POST['mat'];

    if(!empty($_POST['fname']) AND !empty($_POST['lname']) AND !empty($_POST['mat'])) {

        $sql = "INSERT INTO fonctionnaire (fn_name, fn_lastName, fn_mat) VALUES (:fname,:lname,:mat)";
        $res = $pdo->prepare($sql);
        $exec = $res->execute(array('fname'=>"$fname",'lname'=>"$lname",'mat'=>"$mat"));
        header("location: fonct.php");
    
    }
    
      
}

?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../css/style.css">
    <title>Ajoueter</title>
</head>
<body>


<header>
    <nav class="navbar">
        <ul>
             <li><a href="fonct.php" class="nava">fonctionnaire</a></li>
            <li><a href="./../index.html" class="nava">Home</a></li>
        </ul>

        </nav>
 </header>
<form action="" method="POST" class="container">
    <input type="text" name="fname" placeholder="First name" class="inpo">
    <input type="text" name="lname" placeholder="Last name" class="inpo">
    <input type="text" name="mat" placeholder="Matricule" class="inpo">
    <input type="submit" value="enregistrer" name="ok" class="inpo">
    </form>
</body>
</html>