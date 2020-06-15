<?php 
require 'dbconnection.php';

if (isset($_GET['id'])){

    $id = $_GET['id'];
    $pdo = connect::conn();
    $querry = "SELECT * FROM  task WHERE id = $id";
    $stmt= $pdo->prepare($querry);
    $stmt->execute();
    if(isset($stmt)) {
       $row =  $stmt->fetch(PDO::FETCH_ASSOC);
        $status = $row['status'];
       $description = $row['description'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $status =array();
    if(isset($_POST['status'])){
        $stat = $_POST['status'];
        $status= $stat[0];
    }else{
        $status= [];
    }


    $querry = "UPDATE task set name = '$name',  description = '$description', status = '$status' WHERE id = $id";
    $update = $pdo->prepare($querry);
    $update->execute();
    $update->closeCursor();
    if (!$update){
        die('Querry failed');
    }else{
        $message = "Task updated successfully";
    }
}
?>