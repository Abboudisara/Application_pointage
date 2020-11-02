<?php

session_start();
require('config.php');
     
     $_SESSION['msg']="Information sauvegarder!";
     
     $myid= $_GET['id'];
if(isset($_POST['entrer'])){
    
    
    $stmt = $pdo->prepare('INSERT INTO entrer (fn_id, e_date, e_time) VALUES (:myid, now(), now())') ;
    $stmt -> execute(array(
        'myid'=>"$myid",
       
    ));
    
        header("location: indexp.php?data_successfully_saved!");
        echo $_SESSION['msg'];
        
 
    
   
}

if(isset($_POST['sortie'])){

    $stmt = $pdo->prepare('INSERT INTO sortie (fn_id, s_date, s_time) VALUES (:myid, now(), now())') ;
    $stmt -> execute(array(
        'myid'=>"$myid",
       
    ));
    
        header("location: indexp.php");
        echo $_SESSION['msg'];
    
    header("location: index.php?data_successfully_saved!");
    echo"<script>alert('action réusite!')</script>";
  

}

if(isset($_POST['pause'])){
    $pause=$_POST['pause'];
    $stmt = $pdo->prepare("INSERT INTO pause (fn_id, p_date, p_pause) VALUES (:myid, now(), '$pause')") ;
    $stmt -> execute(array(
        'myid'=>"$myid",
       
    ));
    
        header("location: index.php?date_successfully_saved!");
        echo $_SESSION['msg'];
    
    header("location: indexp.php");
    echo"<script>alert('action réusite!')</script>";
  

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>pointage</title>
</head>
<body>



<header>
    <nav class="navbar">
        <ul>
       
            <li><a href="index.html">Home</a></li>
            <li><a href="login.php">login</a></li>
            <li><a href=""><?php echo date("d-m-Y | h:i") ?></a></li>
        </ul>
    </nav>
 </header>
   
<form class="container" method="POST">
    <label class="title">Pointage
    
    <input class="inpo btn" type="submit" value="Entrer" name="entrer"> 
    <input class="inpo btn" type="submit" value="Sortie" name="sortie">
</label>
</form> 
<form class="container containerForm2" method="POST">
    <label class="title">Entrer la durée de pause
        <input class="inpo" type="text" name="id" placeholder="00:00:00" required>
    </label>
    <input class="inpo btn" type="submit" value="Pause" name="pause">

</form>
</body>
</html>