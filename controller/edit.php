<?php 
require '../model/dbconnection.php';

if (!empty($_SESSION['user_id'])){


if (isset($_GET['id'])){

    $id = $_GET['id'];

    $pdo = getDB();
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

    if($_POST['done'] == 0){
        $status = 1;
    }


    $querry = "UPDATE task set name = '$name',  description = '$description', status = '$status' WHERE id = $id";
    $stmt = $pdo->prepare($querry);
    $stmt->execute();

    if (!$stmt){
        die('Querry failed');
    }
    header('Location: task.php');
} 
} else {
    header('Location: ../views/task.php');
}
$pdo= null;
?>