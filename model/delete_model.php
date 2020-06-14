<?php 
require_once("dbconnection.php");

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $pdo= connect::conn();
    $querry = "DELETE FROM task WHERE id = $id";
    $delete = $pdo->prepare($querry);
    $delete->execute();
  
    if (!$delete){
        die('Querry failed');
    }
    $message = "Task deleted successfully";
}
?>