<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="container">
      <a class="navbar-brand" href="task.php">Task</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav navbar-dark ml-auto">
  
        <li class="nav-item">
        <a href="auth_controller.php" class="nav-link">LogIn</a>
      </li>
      <?php if(!empty($_SESSION['user_id'])): ?>
      <li class="nav-item">
        <a href="logout_controller.php" class="nav-link">Logout</a>
      </li>
      <?php endif; ?>
      </ul>
    </div>
   </div>
  </nav>