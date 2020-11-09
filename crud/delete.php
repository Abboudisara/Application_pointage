<?php
require("../config.php");

$id = $_GET['id'];

$sql = 'DELETE FROM fonctionnaire WHERE fn_id =:id';

$stmt = $pdo->prepare($sql);

if($stmt->execute(['id'=>$id])){

 
    header("location: fonct.php");
}
?>

?>