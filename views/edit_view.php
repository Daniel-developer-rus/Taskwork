<?php include("partials/header.php") ?>
<?php include("partials/nav.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">

                <form action="edit_controller.php?id=<?php echo $_GET['id'] ?>"  method="POST">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" value="<?= $row['name']?>">  
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="description"  rows="2" ><?= $row['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <?php if ($status==1): ?>
                    <input type="checkbox" checked id="done" name="done" value="done">
                        <?php else: ?>
                            <input type="checkbox" id="done" name="done" value="done">
                        <?php endif; ?>
                    <label for="done">Task done</label><br> 
                    </div>
                    <div class="form-group">
                      <input type="submit" class="btn btn-primary btn-block" name="update" value="Send">  
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("partials/footer.php") ?>


