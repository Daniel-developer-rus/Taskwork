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

if (isset($_POST['update'])){
    $id = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    if(isset($_POST['done']) == 0){
        $status = 1;
    }


    $querry = "UPDATE task set name = '$name',  description = '$description', status = '$status' WHERE id = $id";
    $stmt = $pdo->prepare($querry);
    $stmt->execute();

    if (!$stmt){
        die('Querry failed');
    }else{
        $message = "Task updated successfully";
    }
$pdo= null;
}
?>