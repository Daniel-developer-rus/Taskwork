<?php 

//--------------pagination---------- 
class limit{

    public static function page_selected(){

        $pageSelected = isset($_GET['page']) ? $_GET['page'] : 1;
        return $pageSelected;
    }
    public static function limit_task(){
        $elementsByPage = 3;
        $pageSelected = isset($_GET['page']) ? $_GET['page'] : false;
        if ($pageSelected == false) {
        $initLimit = 0;
        $pageSelected  = 1;
        } else {
        $initLimit =($pageSelected - 1)*$elementsByPage ;
        }
        $limit = "LIMIT $initLimit,$elementsByPage";
            return $limit;
        }

    public static function total_page(){
        $elementsByPage = 3;
        require_once("../model/task_model.php");
        $result_task = new task();
        $total_task = count($result_task->task());
        $totalPage = ceil($total_task / $elementsByPage);
        return $totalPage;
    }
}

?>