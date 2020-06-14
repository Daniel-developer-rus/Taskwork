<?php include("partials/header.php") ?>
<?php include("partials/nav.php") ?>

    <div class="contenedor-form">
        <div class="toggle">
            <span>New Task</span>
        </div>

        <div class="formulario">
            <h2>Create a New Task</h2>

            <form action="create_task_controller.php" method="POST">
                <input type="text" name="name" required placeholder="Insert Your Name" autofocus autocomplete="off">
                <input type="email" name="email" required placeholder="Insert Your Email" autocomplete="off" >
                <textarea name="description" placeholder="Insert Description" required autocomplete="off"></textarea>
                <input type="submit" name="save_task" value="Create">
            </form>

        </div>
        <?php include("partials/footer.php") ?>