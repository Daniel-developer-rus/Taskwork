<?php
require '../model/dbconnection.php';
// define variables and set to empty values
$login = $password ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $login = test_input($_POST["login"]);
  $password = test_input($_POST["password"]);

  //Retrieve the user account information for the given username.
  $pdo = getDB();
  $sql = "SELECT id, login, password FROM users WHERE login = :login and password = :password";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':login', $login);
  $stmt->bindValue(':password', $password);
  //Execute.
  $stmt->execute();
  //Fetch row.
  $user = $stmt->fetch(PDO::FETCH_ASSOC);
   //If $row is FALSE.
   if($user === false){

    $message = "Incorrect username / password combination!";

} else{
  $_SESSION['user_id'] = $user['login'];
  header('Location: ../views/task.php');
}
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
