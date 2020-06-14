<?php include("partials/header.php") ?>
<?php include("partials/nav.php") ?>

    <div class="contenedor-form">
        <div class="toggle">
            <span>SingIn</span>
        </div>

        <div class="formulario">
            <h2>LogIn</h2>
            <?php if (!empty($message)): ?>
                <p><?php echo $message ?></p>
            <?php endif; ?>
            <form action="auth_controller.php" method="POST">
                <input type="text" name="login" required placeholder="Insert Your Login" autofocus autocomplete="off">
                <input type="password" name="password" required placeholder="Insert Your Passport" autocomplete="off" >
                <input type="submit" value="SigIn">
            </form>

        </div>
        <?php include("partials/footer.php") ?>