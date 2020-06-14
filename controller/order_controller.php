<?php 

class order{


public static function order_task(){
    $order = '';

    if (isset($_GET['column']))
     {
        $order = "ORDER BY  " . $_GET['column'] . " " . $_GET['order'];

     }

    return $order;
}

}

?>