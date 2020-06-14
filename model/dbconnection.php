<?php 
    class connect{   

   public static function conn() {


        $dbhost="bngcsifk7ngxiqxnxkak-mysql.services.clever-cloud.com";
        $dbuser="uelk4nmqftpgd1tw";
        $dbpass="aas6b7NJquuU7u5EJyKv";
        $dbname="bngcsifk7ngxiqxnxkak";
       
        try {
        $conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
        $conn->exec("SET CHARACTER SET utf8");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();

        }

        return $conn;
    }

}
?>