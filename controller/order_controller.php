<?php

class order
{

    public static function order_task()
    {
        $order = '';

        if (isset($_GET['column'])) {
            $order = "ORDER BY  " . $_GET['column'] . " " . $_GET['order'];
        }

        return $order;
    }

    public static function ordenator($columnSelected, $columnValue, $orderBy)
    {

?>
        <div class="float-right">
            <?php if (
                isset($columnSelected) && $columnSelected == $columnValue && $orderBy ==
                'asc'
            ) : ?>
                <i class="fas fa-arrow-up"></i>
            <?php else : ?>
                <a href="get_task_controller.php?<?php echo $_GET['page'] ? '&page=' . $_GET['page'] : '' ?>&column=<?php echo $columnValue ?>&order=asc"> <i class="fas fa-arrow-up"></i></a>
            <?php endif; ?>
            <?php if (
                isset($columnSelected) && $columnSelected == $columnValue && $orderBy ==
                'desc'
            ) : ?>
                <i class="fas fa-arrow-down"></i>
            <?php else : ?>
                <a href="get_task_controller.php?<?php echo $_GET['page'] ? '&page=' . $_GET['page'] : '' ?>&column=<?php echo $columnValue ?>&order=desc"><i class="fas fa-arrow-down"></i></a>
            <?php endif; ?>
        </div>

<?php
    }
}
?>