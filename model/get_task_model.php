<?php
require_once("dbconnection.php");
class task_model
{
    private $db;
    private $task;
    var $order;
    var $limit;

    public function __construct()
    {
        $this->db = connect::conn();
        $this->task = array();
        $this->order= order::order_task() ;
        $this->limit= limit::limit_task();
    }

    public function get_task()
    {   
        $limit= $this->limit;
        $order=$this->order;
        $query = "SELECT  `id`,`name` , `email` , `description`, `status` FROM `task` $order $limit";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->task[] = $row;
        }
        return $this->task;
    }
}
