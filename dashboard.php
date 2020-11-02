<?php
require('config.php');
$name = $_GET['name'];

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
             <li><a href=""> Welcome <?php echo $name ?></a></li>
            <li><a href="index.html">Home</a></li>
        </ul>
    </nav>
 </header>
   
   

    <form class="container" method="POST" >
        <label class="title">Recherche By ID
        <input class="inpo" type="text" name="id" placeholder="ID..." required>
        </label>
        <label for="day" class="title">
            <select name="days" id="day" class="inpo">
                <option value="" selected="selected" required>- Nombre du jours -</option>
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
        </label>
        <input class="inpo btn" type="submit" value="OK" name="valid"> 

    </form>
    
    <form class="tableContainer">
    <table id="table">
    
                <tr>
                    
                   
                    <th>First name</th>
                    <th>last name</th>
                    <th>matricule</th>
                    <th>date d'entrer</th>
                    <th>Heure d'entrer</th>
                    <th>Date sortie</th>
                    <th>Heure sortie</th>
                    <th>Date pause</th>
                    <th>Heure pause</th>
                    <th>Total heure</th>
                    
                </tr>
        <?php 
        if(isset($_POST['valid'])){
            $id = $_POST['id'];
            $days = $_POST['days'];
            if(empty($days)){
                echo"<script>alert('please select day value')</script>";
            }else{
       
            $sql ="SELECT fonctionnaire.fn_name, fonctionnaire.fn_lastName, fonctionnaire.fn_mat, entrer.e_date, entrer.e_time, sortie.s_date, sortie.s_time, pause.p_date, pause.p_pause FROM fonctionnaire
                    INNER JOIN entrer ON fonctionnaire.fn_id = entrer.fn_id
                    INNER JOIN sortie ON entrer.e_id = sortie.s_id
                    INNER JOIN pause ON sortie.s_id = pause.p_id
                    WHERE fonctionnaire.fn_id='$id'ORDER BY entrer.e_date DESC LIMIT $days ";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $don = $stmt->fetchAll(PDO::FETCH_OBJ);
            foreach($don as $info){
            
                $t1 = new DateTime($info->e_time);
                $t2 = new DateTime($info->s_time);
                $t3 = new DateTime($info->p_pause);

                $diff = $t1->diff( $t2 );
                $dtd= $diff->format( '%H:%I' );

                $dtd2 = new DateTime($dtd);
                $diff2 = $dtd2->diff( $t3 );
                $dtd3= $diff2->format( '%H.%I' );

     
            echo"<tr>
               
                    
                    <td>$info->fn_name</td>
                    <td>$info->fn_lastName</td>
                    <td>$info->fn_mat</td>
                    <td>$info->e_date</td>
                    <td>$info->e_time</td>
                    <td>$info->s_date</td>
                    <td>$info->s_time</td>
                    <td>$info->p_date</td>
                    <td>$info->p_pause</td>
                    <td class='combat'>$dtd3</td>
                    
                    ";
                   
        ?>
                    
                    
                </tr>
            
            <?php
            
        }
    }
    }
    
    
            ?>
           
            
        </table>
       

    </form>
    <form class="tableContainer">
    <table id="table">
                <tr>
               
                    
                    <!-- <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td> -->
                    <td>Total heure travaillé</td>
                    <td class='combat'><span id='val'></span> heures</td>
                </tr>
                <tr>
               
                    
                    <!-- <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td> -->
                    <td>Prix/h</td>
                    <td class='combat'>25 DH</td>
                </tr>
                <tr>
               
                    
                    <!-- <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td> -->
                    <td>Salaire</td>
                    <td class='combat'><span id='salaire'></span> DH</td>
                </tr>
    </table>
    </form>
    
<script src="js/calc.js"></script>
</body>
</html>