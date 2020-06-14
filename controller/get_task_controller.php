<?php
session_start();
require_once("order_controller.php");
require_once("limit_controller.php");
require_once("../model/get_task_model.php");

$task= new task_model();
$result_task=$task->get_task();

require_once("../views/task_view.php");

?>