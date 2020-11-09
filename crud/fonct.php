<?php
require('./../config.php');
$sql='SELECT * FROM `fonctionnaire`';
$stmt = $pdo->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/style.css">
    <title>Fonctionnaire</title>
    
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

 <form class="tableContainer">
    <table id="table">
    
                <tr>
                    
                   
                    <th>First name</th>
                    <th>last name</th>
                    <th>matricule</th>
                    <th>Actions</th>
                    
                </tr>
               
             
               
        
                <?php while($row=$stmt->fetch(PDO::FETCH_ASSOC)) : ?>
           <tr>
                <td><?php echo htmlspecialchars($row['fn_name']);?></td>
                <td><?php echo htmlspecialchars($row['fn_lastName']);?></td>
                <td><?php echo htmlspecialchars($row['fn_mat']);?></td>
                <td><a href="delete.php?id=<?=($row['fn_id']);?>"id="action"> supprimer</a></td>
               
            </tr>
            <?php endwhile; ?>


            <button><a href="add.php">Ajouter</a></button>
   
</body>
</html>