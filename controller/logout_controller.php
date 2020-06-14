<?php 
session_start();
session_unset();
session_destroy();
header('Location: get_task_controller.php');

?>