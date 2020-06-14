<?php
session_start();
require_once("order_controller.php");
require_once("limit_controller.php");
require_once("../model/get_task_model.php");
require_once("../model/delete_model.php");

$task= new task_model();
$result_task=$task->get_task();
if(!$_GET){
    header('Location: get_task_controller.php?page=1&column=name&order=asc');
}
require_once("../views/task_view.php");

?>

