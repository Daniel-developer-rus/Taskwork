<?php 
require_once("dbconnection.php");
class task
{
    private $db;
    private $totalTask;

    public function __construct()
    {
        $this->db = connect::conn();
        $this->totalTask = array();
    }

    public function task()
    {   
        $query = "SELECT  `id`,`name` , `email` , `description`, `status` FROM `task`";
        $res = $this->db->prepare($query);
        $res->execute();

        while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
            $this->totalTask[] = $row;
        }
        return $this->totalTask;
    }
}



?>