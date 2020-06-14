<?php include("partials/header.php") ?>
<?php include("partials/nav.php") ?>
<?php if (!empty($message)) : ?>
    <div class="container text-center mt-1">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong><?php echo $message ?></strong>
        </div>
    </div>
<?php endif; ?>
<div class="container p-1">
    <div class="row">

        <div class="col-md-12">
            <table class="table table-bordered">
                <thead>
                    <?php if (!empty($result_task)) : ?>
                        <tr>
                            <?php
                            $column = isset($_GET['column']) ? $_GET['column'] : null;
                            $orderBy = isset($_GET['order']) ? $_GET['order'] : null;
                            ?>
                            <th>Name
                                <?php order::ordenator($column, 'name', $orderBy) ?>
                            </th>

                            <th>Email
                                <?php order::ordenator($column, 'email', $orderBy) ?>
                            </th>
                            <th>Task</th>
                            <?php if (!empty($_SESSION['user_id'])) : ?>
                                <th>Action</th>
                            <?php endif; ?>
                            <th>Status
                                <?php order::ordenator($column, 'status', $orderBy) ?>
                            </th>
                            </th>
                        </tr>
                    <?php endif; ?>
                </thead>
                <tbody>

                    <?php foreach ($result_task as $row) : ?>
                        <tr>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <?php if (!empty($_SESSION['user_id'])) : ?>
                                <td class="text-center">
                                    <a href="edit_controller.php?id=<?php echo $row['id'] ?>" class="btn btn-secondary mb-1 mr-2">
                                        <i class="fas fa-marker"></i></a>
                                    <a href="get_task_controller.php?id=<?php echo $row['id'] ?><?php echo $_GET['column'] ? '&column=' . $_GET['column'] : '' ?><?php echo $_GET['order'] ? '&order=' . $_GET['order'] : '' ?>" class="btn btn-danger mb-1 ">
                                        <i class="far fa-trash-alt"></i></a>
                                </td>
                            <?php endif; ?>
                            <?php if ($row['status'] == 1) : ?>

                                <td class="text-center"><span class="btn btn-success "><i class="fas fa-angle-down"></i></span></td>

                            <?php else : ?>
                                <td>Task not done</td>
                            <?php endif; ?>
                        </tr>

                    <?php endforeach ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row text-center">
        <a href="create_task_controller.php" class="btn btn-primary btn-lg active mx-auto" role="button" aria-pressed="true">Add a new task</a>
    </div>
</div>
<?php $total_class = new limit();
$totalPage = $total_class->total_page();
$pageSelected = $total_class->page_selected();
?>
<?php if ($totalPage > 0) : ?>
    <div class="container">
        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php if ($pageSelected != 1) : ?>
                        <li class="page-item"><a class="page-link" href="get_task_controller.php?page=<?php echo ($pageSelected - 1) ?><?php echo $_GET['column'] ? '&column=' . $_GET['column'] : '' ?><?php echo $_GET['order'] ? '&order=' . $_GET['order'] : '' ?>">Previous</a></li>
                    <?php endif; ?>

                    <?php for ($i = 1; $i <= $totalPage; $i++) : $active = ($pageSelected == $i) ? 'active' : '';  ?>

                        <li class="page-item <?php echo $active ?>"><a class="page-link" href="get_task_controller.php?page=<?php echo $i ?><?php echo $_GET['column'] ? '&column=' . $_GET['column'] : '' ?><?php echo $_GET['order'] ? '&order=' . $_GET['order'] : '' ?>"><?php echo $i ?></a></li>
                    <?php endfor; ?>

                    <?php if ($pageSelected != $totalPage) : ?>
                        <li class="page-item"><a class="page-link" href="get_task_controller.php?page=<?php echo ($pageSelected + 1) ?><?php echo $_GET['column'] ? '&column=' . $_GET['column'] : '' ?><?php echo $_GET['order'] ? '&order=' . $_GET['order'] : '' ?>">Next</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
    </div>
<?php endif; ?>

<?php include("partials/footer.php") ?>