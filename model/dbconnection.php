<?php 

session_start();
/* DATABASE CONFIGURATION */
define('DB_SERVER', 'bngcsifk7ngxiqxnxkak-mysql.services.clever-cloud.com');
define('DB_USERNAME', 'uelk4nmqftpgd1tw');
define('DB_PASSWORD', 'aas6b7NJquuU7u5EJyKv');
define('DB_DATABASE', 'bngcsifk7ngxiqxnxkak');
define("BASE_URL", "https://worktask.herokuapp.com/"); // Eg. http://yourwebsite.com

    function getDB() {
        
        $dbhost=DB_SERVER;
        $dbuser=DB_USERNAME;
        $dbpass=DB_PASSWORD;
        $dbname=DB_DATABASE;
        try {
        $dbConn = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass); 
        $dbConn->exec("SET CHARACTER SET utf8");
        $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $dbConn;
        }
        catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        }

    }
?>