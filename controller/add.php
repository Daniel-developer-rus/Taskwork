<?php 

require '../model/dbconnection.php';

    $name = $email = $description = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $name = test_input($_POST["name"]);
      $email = test_input($_POST["email"]);
      $description = test_input($_POST["description"]);

      try{

        $db = getDB();
        $stmt = $db->prepare("INSERT INTO task(name, email,description) VALUES (:name,:email,:description)"); 
        $stmt->bindValue(':name', $name );
        $stmt->bindValue(':email', $email);
        $stmt->bindValue(':description', $description);
        $stmt->execute();
        header('Location: ../views/task.php');
        $db = null;
    }catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
  
      
    }
    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
    
   

  



?>