<?php
require '../model/dbconnection.php';
$pdo=getDB();
//------------delete------------
if (isset($_GET['idDelete'])) {
  $id = $_GET['idDelete'];
  $querry = "DELETE FROM task WHERE id = $id";
  $delete = $pdo->prepare($querry);
  $delete->execute();

  if ($delete) {
    $message= "Task deleted successfuly";
    $class = "success";
}else{
  $message="An error has occurred";
  $class= "danger";
}
}
//------------get result for table-------

$res = $pdo->prepare("SELECT COUNT(*) AS totalTask FROM task");
$res->execute();
$result=$res->fetch(PDO::FETCH_ASSOC);
$totalTask = $result['totalTask'];

//--------------pagination---------- 
$elementsByPage = 3;
$totalPage = ceil($totalTask / $elementsByPage);
$pageSelected = isset($_GET['page']) ? $_GET['page'] : false;
if ($pageSelected == false) {
$initLimit = 0;
$pageSelected  = 1;
} else {
$initLimit =($pageSelected - 1)*$elementsByPage ;
}
$limit = "LIMIT $initLimit,$elementsByPage";

// --------------Order---------------
$order = '';
if (isset($_GET['column'])) {
  $order = "ORDER BY  " . $_GET['column'] . " " . $_GET['order'];
  
}

//--------------db query ----------------

$query = "SELECT  `id`,`name` , `email` , `description`, `status` FROM `task` $order $limit";
$stmt = $pdo->prepare($query);
$stmt->execute();
$results = $stmt->fetchAll();
$pdo= null;

if(!$_GET){
  header('location: task.php?page=1');
}
?>