<?php include("partials/header.php") ?>
<?php include("partials/nav.php") ?>
<?php if (!empty($message)): ?>
<div class="container text-center mt-1">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
        <strong><?php echo $message ?></strong> 
    </div>
</div>
<?php endif; ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">

                <form action="edit_controller.php?id=<?php echo $_GET['id'] ?>"  method="POST">
                    <div class="form-group">
                      <input type="text" autocomplete="off" name="name" class="form-control name" value="<?= $row['name']?>">  
                    </div>
                    <div class="form-group">
                        <textarea autocomplete="off" class="form-control description" name="description"  rows="2" ><?= $row['description'] ?></textarea>
                    </div>
                    <div class="form-group done">
                    <input type="checkbox"  name="status[]" value="done" <?php if($status=== "done") echo "checked" ?>>
                    <label for="done">Task done</label><br> 
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary update-task" name="update" value="Send">  
                      <a href="get_task_controller.php" class="btn btn-secondary">Go to task</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("partials/footer.php") ?>


