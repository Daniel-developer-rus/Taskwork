<?php include("partials/header.php") ?>
<?php include("partials/nav.php") ?>
<?php if (!empty($message)) : ?>
    <div class="container text-center p-1">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong><?php echo $message ?></strong>
        </div>
    </div>
<?php endif; ?>
<div class="contenedor-form">
    <div class="toggle">
        <span>New Task</span>
    </div>

    <div class="formulario">
        <h2>Create a New Task</h2>

        <form action="create_task_controller.php" method="POST">
            <input type="text" name="name" required placeholder="Insert Your Name" autofocus autocomplete="off">
            <input type="email" name="email" required placeholder="Insert Your Email" autocomplete="off">
            <textarea name="description" placeholder="Insert Description" required autocomplete="off"></textarea>
            <div class="form-group">
            <input type="submit" class="btn btn-primary update-task" value="Create">
            <a href="get_task_controller.php" class="btn btn-secondary">Go to task</a>
            </div>
        </form>

    </div>
    <?php include("partials/footer.php") ?>