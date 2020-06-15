<?php 
require 'dbconnection.php';
session_start();

if (!isset($_SESSION['user_id']))
{
    header('Location: auth_controller.php');
}

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